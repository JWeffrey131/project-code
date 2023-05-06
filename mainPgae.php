<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="mainPage.css">
</head>
<?php 	
include_once('lib/db.inc.php'); //connect the database
include('header.php'); //use the header UI
$result=csci3100_course_fetchall();
?>

<div class="search">
	<form action="mainPage.php" method="post">
		<input type="text" placeholder="Search for course..." name="key"> <!--Input the course ID or name to search -->
		<input type="submit" value="Search" name="submit"> <!--Press submit to send request to the database-->
	</form>
</div>


<?php
if($_POST['submit']){ //after pressing submit, search the course in database 
	$key = "%".$_POST['key']."%";
	$results = csci3100_course_search($key);
	if(count($results) != 0){
        	$result = $results;
	} else {
        	echo 'No result found';
	}
}
?>

<?php
echo '<ul class="courses">';
foreach ($result as $course) { //print out the course info
	$cID = $course['cID'];
	$cCode = $course['cCode'];
	$cName = $course['cName'];
	$cInstructor = $course['cInstructor'];
?>
	<li>
		<div class="course">
			<a href='details.php?cID=<?php echo htmlspecialchars($cID)?>'>
			</a>
			<div class="course-id">
				<?php echo $cCode;?>
			</div>
			<div class="course-name">
				<?php echo $cName;?>
			</div>
			<div class="course-check"> <!--check the course detail info after pressing view details-->
			<button id="check-button" course_id='<?php echo $cID; ?>' class="fullwid primary" onclick="location.href='http://3.86.208.156/details.php?course_id=<?php echo $cID?>'"> View Details
		</div>
	</li>
		
	<?php
	} ?>
<?php echo '</ul>';?>

<html>
</head>
<body>
	<style>
		table{
			border-collapse: collapse;
			width:80%;
			margin-bottom:20px;
			}
	</style>
<?php 
include_once('lib/db.inc.php'); //connect to the database
include('header.php'); // use the header file as UI 
 
$uID = $_COOKIE['uID'];

	if (!isset($_GET['course_id'])) //get the course ID after submit 
		echo "ERROR, NO _GET"; //message shown if input is empty
	$res = csci3100_course_detail($_GET['course_id']); //fetch all course information of the course 
	foreach ($res as $value) {
?>		<br><br><br><br><br><br>
		<td>Department: <?php echo $value['cDepartment'];?></td><br><br>
		<td>Course Code: <?php echo $value['cCode'];?></td><br><br>
		<td>Course Name: <?php echo $value['cName'];?></td><br><br>
		<td>Course Outline: <?php echo $value['cDescription'];?></td><br><br><br>
	<table>
		<tr>
			<th>Date</th>
			<th>Time</th>
			<th>Venue</th>
			<th>Instructor</th>
			<th>Vacancy</th>
		</tr>
		<tr>
			<td><?php echo $value['cDate'];?>
			<td><?php echo $value['cTime'];?>
			<td><?php echo $value['cVenue'];?>
			<td><?php echo $value['cInstructor'];?>
			<td><?php echo $value['cVacancy'];?>
		</tr>
	</table>
	<form method="POST" action="lib/addCourse.php">
	<button type="submit" value="submit">Add Course</button> <!--Click the add course button to execute the function-->
	<input type="hidden" name="cID" value='<?php echo $value['cID'];?>'> <!--Input the course ID-->
	<input type="hidden" name="uID" value='<?php echo $uID; ?>'> <!--input the user ID-->
    
	</form>
	
	<?php
	}
		
?>
</body>
</html>

<?php

function csci3100_DB(){ //Connect to the database to fetch data
    $db = new PDO('sqlite:/var/www/cart.db');

    $db->query('PRAGMA foreign_keys =ON;');

    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    return $db;
}

function csci3100_course_fetchall(){ //Get the all course information 
    global $db;
    $db = csci3100_DB();
    $q = $db->prepare("SELECT * FROM course LIMIT 100;");
    if ($q->execute())
        return $q->fetchAll();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@3.0.0/fonts/remixicon.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="AList.css">
    <title>Course List</title>
</head>
<body>
<div class="wrap">
<table> <!--Create a table with the following title order-->
<tr>
    <th>Course Code: </th>
    <th>Course Name: </th>
    <th>Department: </th>
    <th>Description: </th>
    <th>Date: </th>
    <th>Time: </th>
    <th>Venue: </th>
    <th>Instructor: </th>
    <th>Vacancy: </th>
</tr>

<tr>
<?php 
    $c = csci3100_course_fetchall();
	foreach ($c as $value) { //Act as a for loop to fetch all course information 
?>
	<tr>
	<td><?php echo $value['cID'];?></td>
	<td><?php echo $value['cCode'];?></td>
    <td><?php echo $value['cName'];?></td>
	<td><?php echo $value['cDepartment'];?></td>
    <td><?php echo $value['cDescription'];?></td>
	<td><?php echo $value['cDate'];?></td>
    <td><?php echo $value['cTime'];?></td>
	<td><?php echo $value['cVenue'];?></td>
    <td><?php echo $value['cVacancy'];?></td>
	</tr>
<?php
	}		
?>
</tr>

</table>
</div>
</body>
</html>

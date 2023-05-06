<?php

function csci3100_DB(){ //call the database
    $db = new PDO('sqlite:/var/www/cart.db');

    $db->query('PRAGMA foreign_keys =ON;');

    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    return $db;
}

function csci3100_user_fetchall(){ // fetch all users info from database
    global $db;
    $db = csci3100_DB();
    $q = $db->prepare("SELECT * FROM user LIMIT 100;");
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
    <title>Student List</title>
</head>
<body>
<div class="wrap">
<table> <!--Create a table with following title-->
<tr>
    <th>Student ID: </th>
    <th>Name: </th>
</tr>

<tr>
<?php 
    $c = csci3100_user_fetchall();
	foreach ($c as $value) { //show all users with their name and ID
?>
	<tr>
	<td><?php echo $value['uID'];?></td>
	<td><?php echo $value['uName'];?></td>
	</tr>
<?php
	}		
?>
</tr>

</table>
</div>
</body>
</html>


<?php

function csci3100_DB() //this function is used for connecting the database from sqlite
{
    $db = new PDO('sqlite:/var/www/cart.db');

    // enable foreign key support
    $db->query('PRAGMA foreign_keys = ON;');

    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    return $db;
}

function csci3100_course_fetchall() //this function is to fetch all the courses created in the database
{
	global $db;
	$db = csci3100_DB();
	$q = $db->prepare("SELECT * FROM course LIMIT 100;");
	if ($q->execute())
        	return $q->fetchAll();
}
function csci3100_department_fetchall(){ //this function is to fetch the department info of a course 
	global $db;
        $db = csci3100_DB();
        $q = $db->prepare("SELECT DISTINCT cDepartment FROM course LIMIT 100;");
        if ($q->execute())
                return $q->fetchAll();
}
function csci3100_searchByDepartment($department){ //this function is to fetch a course by searching the department 
	global $db;
        $db = csci3100_DB();
	$q = $db->prepare("SELECT * FROM course WHERE cDepartment = ?;");
	$b->bindParam(1,$department);
        if ($q->execute())
                return $q->fetchAll();
}
function csci3100_course_Add(){ //this function is to add a course into the database by inputing the variables
    global $db;
    $db = csci3100_DB();
    $cID = NULL;
    $cCode = "CSCI3250";
    $cName = "Computers and Society";
    $cDepartment = "Computer Science";
    $cDescription = "This course studies social, legal, ethical issues of information technology in society.";
    $cDate = "12/1,19/1,2/2,9/2,16/2";
    $cTime = "13:30-15:15";
    $cVenue = "MWM Eng Bldg LT";
    $cInstructor = "Dr. Chau";
    $cVacancy = 200;
    $sql = "INSERT INTO course (cID, cCode, cName, cDepartment, cDescription, cDate, cTime, cVenue, cInstructor, cVacancy) VALUES (?,?,?,?,?,?,?,?,?,?);";
    $a = $db -> prepare($sql);
    $a -> bindParam(1,$cID);
    $a -> bindParam(2,$cCode);
    $a -> bindParam(3,$cName);
    $a -> bindParam(4,$cDepartment);
    $a -> bindParam(5,$cDescription);
    $a -> bindParam(6,$cDate);
    $a -> bindParam(7,$cTime);
    $a -> bindParam(8,$cVenue);   
    $a -> bindParam(9,$cInstructor);
    $a -> bindParam(10,$cVacancy);
    $a -> execute(); 
}
function csci3100_course_DEL(){ //this fucntion is to delete a course in the database by inputting the course code 
    global $db;
    $db = csci3100_DB();
    $cCode = "CENG3430";
    $sql = "DELETE FROM course WHERE cCode =(?);";
    $b = $db -> prepare($sql);
    $b->bindParam(1,$cCode);
    $b-> execute();
}
function csci3100_course_detail($cID){ //this fucntion is to fetch the information of a course by inputting the course ID
	global $db;
	$db = csci3100_DB();
	$q = $db->prepare("SELECT * FROM course WHERE cID= $cID;");
	if ($q->execute())
        	return $q->fetchAll();
}
function csci3100_user_Add(){ ////this fucntion is to add a student into the database by inputting the variables
    global $db;
    $db = csci3100_DB();
    $uID = 1155152468;
    $uName = "John";
    $uPw = "12345678";
    $is_admin = 0;
    $sql = "INSERT INTO user (uID, uName, uPw, is_admin) VALUES(?,?,?,?);";
    $c = $db -> prepare($sql);
    $c -> bindParam(1, $uID);
    $c -> bindParam(2, $uName);
    $c -> bindParam(3, $uPw);
    $c -> bindParam(4, $is_admin);
    $c -> execute();
}

function csci3100_user_fetchall(){ //this fucntion is to fetch all the users in the database 
    $db = csci3100_DB();
    $q = $db->prepare("SELECT * FROM user LIMIT 100;");
    if ($q->execute())
        return $q->fetchAll();
}
function csci3100_user_Del(){ //this fucntion is to delete a student in the database by inputting the password 
    global $db;
    $db = csci3100_DB();
    $uPw = "12345678";
    $sql = "DELETE FROM user WHERE uPw = (?);";
    $b = $db -> prepare($sql);
    $b -> bindParam(1, $uPw);
    $b -> execute();
}

function csci3100_course_search($keyword){//this fucntion is to search courses by inputting course code or course name
    global $db;
    $db = csci3100_DB();
    $q = $db->prepare("SELECT * FROM course WHERE cCode LIKE (?) OR cName LIKE (?);");
    $q->bindParam(1, $keyword);
    $q->bindParam(2,$keyword);
    if ($q->execute())
        return $q->fetchAll();
}

function csci3100_user_fetchuName($uName){ //this fucntion is to fetch a user with their name 
	global $db;
	$db = csci3100_DB();
	$q = $db->prepare("SELECT * FROM user WHERE uName = '$uName'");
	if($q->execute())
		return $q->fetchAll();
}


function csci3100_user_countuName($uName){ //this function is to count the number of users in the database
 	global $db;
	$db = csci3100_DB();
	$s = $db->prepare("SELECT COUNT(*) as count FROM user WHERE uName = '$uName'");
	if ($s->execute())
		return $s->fetchAll();
	else
		return 0;
}

function csci3100_insert_user($uName, $uPw){ //this function is to add a user by inputting the variables
        global $db;
        $db = csci3100_DB();
        $uID = NULL;
        $is_admin = 0;
        $sql = "INSERT INTO user(uID,uName,uPw,is_admin) VALUES(?,?,?,?);";
        $c = $db->prepare($sql);
        $c -> bindParam(1,$uID);
        $c -> bindParam(2,$uName);
        $c -> bindParam(3,$uPw);
        $c -> bindParam(4,$is_admin);
        $c -> execute();
}
function csci3100_get_user_by_name($uName){ //this function is to fetch a user by name 
        global $db;
        $db = csci3100_DB();
        $sql = "SELECT * FROM user WHERE uName=?;";
        $q = $db->prepare($sql);
        $q -> bindParam(1,$uName);
        if($q->execute())
                return $q->fetchall();
}

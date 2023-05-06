<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@3.0.0/fonts/remixicon.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src = "admin.js"></script>
    <title>Admin Page</title>

</head>
<body>
    <header>
        <h2 class="logo"><span>Welcome!</span></h2> <!-- A "welcome text shown-->
        <div class="topbar">
	    <button type="submit" value="submit" id="logout-button" class ="logout"> <i class="ri-logout-box-r-line"></i> Logout </button> <!--A submit type button to logout and return to the login page-->
	</div>
	<script>
                $('#logout-button').click(function() { //pressing the logout button will redirect to the following link
                    window.location.href = 'http://3.86.208.156/login.php';
                    return false;
		});
	</script>
    </header>
    <div class = "container"> <!--Four buttons refer to four function: Show Student/Course List, Delete User/Course-->
        <button type= "button" class ="btn btn1" onclick= "studentList()"> <i class="ri-creative-commons-by-line"></i> Student list </button> 
        <button type= "button" class ="btn btn2" onclick= "courseList()"> <i class="ri-server-line"></i> Course list </button> 
        <button type= "button" class ="btn btn3" onclick= "deleteCourse()" > <i class="ri-edit-box-line"></i> Delete Course </button> 
        <button type= "button" class ="btn btn4" onclick= "removeUser()"> <i class="ri-close-line"></i> Remove Student </button> 
    </div>
</body>
</html>
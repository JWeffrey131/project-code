<?php
include 'lib/db.inc.php';

$uID = $_COOKIE['uID'];

if(!isset($uID)){ //if the user ID is not received, it redirects to the login page
   header('location:login.php');
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="UI.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@3.0.0/fonts/remixicon.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
</head>

<body>
  
  <?php
      $userInfo = csci3100_DB(); // call the database
      $res = $userInfo->query("SELECT * FROM user WHERE uID = '$uID';"); //get the user info by user ID
      $res = $res->fetch(PDO::FETCH_ASSOC);
      $uName = $res['uName'];
  ?>
  <script src = "myscript.js"></script>
  <header>
      <p class="logo" id="stuID"><span>Welcome! <?php echo $uName?></span></p>
      <div class="topbar">
        <button type= "submit" value="submit" id="profile-button" class="btn btn1"> <i class="ri-user-fill"></i> User Profile </button>
            <script>
                $('#profile-button').click(function() { // redirect to the profile page after pressing profile
                    window.location.href = 'http://3.86.208.156/index.php';
                    return false;
		    });
	        </script>
            <button type="submit" value="logout" id="logout-button" class ="btn btn2"> <i class="ri-logout-box-r-line"></i> Logout </button>   
	        <script>
                $('#logout-button').click(function() { // redirect to the login page after pressing logout
                    window.location.href = 'http://3.86.208.156/login.php';
                    return false;
		    });
	    </script>
      </div>
  </header>
  
  <br><br><br><br><br>
  
  <div class = "bar">
    <h3>User ID</h3>
    
    <h2><?php echo $uID;?></h2>
    
    <!--<h2>1155158888</h2>-->
  </div>
  <br><br>
  
  <div class = "bar"> 
  <h3>Course Selected</h3> <!--Show the courses selected by user-->
  
    <?php
    $db = csci3100_DB();
    $query = "SELECT * FROM course WHERE cID IN ( SELECT cID FROM selectedCourse WHERE uID = '$uID');";
    $courseSelected = $db->query($query); //fetch all courses by userID

    

    foreach ($courseSelected as $value){ //print out all coure information 
    ?>
      <h3 class="removeLineBreak" ><?php echo $value['cID'];?></h3>
      <h3 class="removeLineBreak" ><?php echo $value['cCode'];?></h3>
      <h3 class="removeLineBreak" ><?php echo $value['cName'];?></h3>
      <h3 class="removeLineBreak" ><?php echo $value['cInstructor'];?></h3>
      <h3 class="removeLineBreak" ><?php echo $value['cDepartment'];?></h3>
      <br>
    <?php
    }
    ?>


  <button class = "btn" onclick = "dropCourse()">Drop Course</button> <!--Execute the drop coure function after pressing drop course-->
  </div>
  <br>
  
  <button class = "bar btn" onclick = "changePassword()">Change Password</button> <!--Execute the change password function after pressing-->
  
</body>
</html>


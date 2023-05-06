<?php
include 'lib/db.inc.php';

$uID=$_COOKIE['uID'];
global $db;
$db = csci3100_DB();

if(!isset($uID)){ //It checks whether the user have already login, if yes it shows the user's ID, else it will redirect to the login page
   header('location:login.php'); 
};


if(isset($_POST['Confirm'])){ 
  $drop_Course = $_POST['dropCourseID']; 
  $confirm_drop = $_POST['cDropCourseID'];

  if(!empty($drop_Course) || !empty($confirm_drop)){ //Check if the input for two boxes sre empty
      if($drop_Course != $confirm_drop){
         $message[] = 'Course ID not matched!'; // if the input are not the same, a warning message will be popped
      }
      else{
         $db->query("DELETE FROM selectedCourse WHERE uID = '$uID' and cID = '$confirm_drop' ");//delete the course by send the request to database
         $message[] = 'Course drop successfully!'; // success message will be shown 
      }
  }
}

?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="drop.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@3.0.0/fonts/remixicon.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  </head>

  <body>
    
<?php
	global $db;
      $db = csci3100_DB();
      $userCourse = $db->query("SELECT * FROM selectedCourse WHERE uID = '$uID';"); //fetch all course added by the user
      ?>
      
    <h2 class = "middle">Course drop</h2> 
    <h4 class = "middle">Input Course ID</h4>
    <br>

    <form action = "drop.php" method="post">
      
      <?php
         if(isset($message)){
            foreach($message as $message){
               echo '<div class="message">'.$message.'</div>'; //message function 
            }
         }
      ?>
      
      <p class = "ps">course ID</p>
      <input type = "number" name = "dropCourseID" class = "ps"> <!--Input the course ID here-->

      <p class = "ps">confirm course ID</p>
      <input type = "number" name = "cDropCourseID" class = "ps"> <!--Input agin the course ID here-->

      <br>
      <input type="submit" value="Confirm" name="Confirm" class="confirm"> <!--Confirm will send the request to database-->
    </form>
    
    <br><br>
    <script src = "drop.js"></script> <!--The window will be closed after clicking cancel-->
    <button class ="cancel" onclick="cancel()">Cancel</button>
  </body>
</html>
  

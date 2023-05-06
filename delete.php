<?php

function csci3100_DB(){ //call the database
    $db = new PDO('sqlite:/var/www/cart.db');

    $db->query('PRAGMA foreign_keys =ON;');

    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    return $db;
}

if(isset($_POST['Confirm'])){ //after pressing confirm, the inputs will be checked 
  $drop_Course = $_POST['dropCourseID'];
  $confirm_drop = $_POST['cDropCourseID'];

  if(!empty($drop_Course) || !empty($confirm_drop)){ //check if the input are empty
      if($drop_Course != $confirm_drop){ 
         $message[] = 'Course ID not matched!'; //message shown if input are different 
      } 
      else{ //the input are same
        global $db;
        $db = csci3100_DB(); 
        $sql = "DELETE FROM course WHERE cCode = (?);"; //delete the course by the course ID
        $b = $db->prepare($sql);
        $b -> bindParam(1,$_POST['cDropCourseID']);
        $b -> execute();
        $message[] = 'Course delete successfully!'; //message shown after delete
      }
  }
}

?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="delete.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@3.0.0/fonts/remixicon.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <title>Delete Course</title>
  </head>

  <body>

    <form action = "" method="post">
      
      <?php
         if(isset($message)){
            foreach($message as $message){
               echo '<div class="message">'.$message.'</div>'; //message function 
            }
         }
      ?>
      
      <p class = "ps">course ID</p>
      <input type = "text" name = "dropCourseID" class = "ps"> <!--Input the course ID-->

      <p class = "ps">confirm course ID</p>
      <input type = "text" name = "cDropCourseID" class = "ps"> <!--Re enter course ID-->

      <br>
      <input type="submit" value="Confirm" name="Confirm" class="confirm"> <!--Confirm to check the ID--> 
    </form>
    
    <br><br>
    <script src = "admin.js"></script>
    <button class ="cancel" onclick="cancel()">Cancel</button> <!--Close the window by clicking cancel-->
  </body>

  
</html>

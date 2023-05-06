<?php

function csci3100_DB(){ //connect to the database
    $db = new PDO('sqlite:/var/www/cart.db');

    $db->query('PRAGMA foreign_keys =ON;');

    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    return $db;
}

if(isset($_POST['Confirm'])){ //After pressing confirm, the input will be checked
  $UserID = $_POST['UserID'];
  $uID = $_POST['uID'];

  if(!empty($UserID) || !empty($uID)){ // check if the inputs are empty 
      if($UserID != $uID){
         $message[] = 'User ID not matched!'; // if the input arent same, the message will be shown 
      }
      else{ // the input are same 
        global $db;
        $db = csci3100_DB(); 
        $sql = "DELETE FROM user WHERE uID = (?);"; // remove the student by the users ID
        $b = $db -> prepare($sql);
        $b -> bindParam(1,$_POST['uID']);
        $b -> execute();
        $message[] = 'User Remove successfully!'; //message shown after success removal
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
    <title>Remove Student</title>
  </head>

  <body>

    <form action = "" method="post">
      
      <?php
         if(isset($message)){ // message function 
            foreach($message as $message){
               echo '<div class="message">'.$message.'</div>';
            }
         }
      ?>
      
      <p class = "ps">User ID</p>
      <input type = "text" name = "UserID" class = "ps"> <!--Input the user ID-->

      <p class = "ps">confirm User ID</p>
      <input type = "text" name = "uID" class = "ps"> <!--Input the user ID  again-->

      <br>
      <input type="submit" value="Confirm" name="Confirm" class="confirm">  <!--The inputs will be checked after confirm -->
    </form>
    
    <br><br>
    <script src = "admin.js"></script>
    <button class ="cancel" onclick="cancel()">Cancel</button>  <!--Close the pop window after cancel-->
  </body>

  
</html>

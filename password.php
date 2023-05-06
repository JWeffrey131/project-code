<?php
include 'lib/db.inc.php';


$uID = $_COOKIE['uID'];
$db = csci3100_DB();

if(!isset($uID)){ //if the user hasnt login, redirect to the login page
   header('location:login.php');
};


if(isset($_POST['Confirm'])){ //execute the following code after pressing confirm 
  $old_pass = $_POST['oldPassword']; //define the variables
  $update_pass = $_POST['updatePassword'];
  $new_pass = $_POST['newPassword'];
  $confirm_pass = $_POST['cNewPassword'];

  if(!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)){ //check if the input are empty
      if($update_pass != $old_pass){
         $message[] = 'old password not matched!'; //message will be shown if the passeword didnt match 
      }elseif($new_pass != $confirm_pass){
         $message[] = 'confirm password not matched!'; //message will be shown if the passeword didnt match 
      }else{
         $db->query("UPDATE `user` SET uPw = '$confirm_pass' WHERE uID = '$uID'");
         $message[] = 'password updated successfully!'; //message will be shown if the input are correct 
      }
  }
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="password.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@3.0.0/fonts/remixicon.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  </head>

  <body>
      
      <?php
      $userInfo = csci3100_DB();
      $res = $userInfo->query("SELECT * FROM user WHERE uID = '$uID';");
      $res = $res->fetch(PDO::FETCH_ASSOC);
      ?>

    <div class = middle>
    <h2 class = "middle">Change Password</h2>
    <h4 class = "middle">input your old and new password</h4>
    </div>
    <br>

    <form action = "" method="post">
      
      <?php
         if(isset($message)){
            foreach($message as $message){ //message function 
               echo '<div class="message">'.$message.'</div>';
            }
         }
      ?>
      <input type="hidden" name="oldPassword" value="<?php echo $res['uPw']; ?>">
      <p class = "ps">old password</p>
      <input type = "password" name = "updatePassword" class = "ps"> <!--Input old password-->

      <p class = "ps">new password</p>
      <input type = "password" name = "newPassword" class = "ps"> <!--Input new password-->

      <p class = "ps">confirm new password</p>
      <input type = "password" name = "cNewPassword" class = "ps"> <!--Confirm new password-->
      
      <br>
      <input type="submit" value="Confirm" name="Confirm" class="confirm"> <!--submit the password to check-->
    </form>
      
    <br><br>
    <script src = "pwScript.js"></script>
    <button class ="cancel" onclick="cancel()">Cancel</button> <!--close the window by pressing cancel-->
  </body>

  
</html>

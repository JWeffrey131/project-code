<?php
include_once('lib/db.inc.php');


if(isset($_POST["submit"])){ //aftering pressing submit, the uName and uPw will be stored temporary 
  $uName = $_POST["uName"];
  $uPw = $_POST["uPw"];
  
  $result = csci3100_user_fetchuName($uName); // fetch the username
  $count=0;
  foreach ($result as $row){
      $count++;
  }
  if($count > 0){
	  if(isset($result[0]["uPw"]) && $uPw == $result[0]["uPw"]){ //to check if the password is valid
		  $uID = $result[0]['uID'];
		  if (isset($_COOKIE['uID'])) {
			  setcookie('uID', "", time() - 3600);
		     }		
		  setcookie('uID', $uID, time() + 3600 * 24 * 3, '/');
		  if($result[0]['is_admin'] == 1){ //if the user is an admin, it redirects to the admin page
		  	header("Location: admin.php");
			exit();
		  }else{
    			header("Location: mainPage.php"); // else it redirects to the users' page
			exit();
		  }
    	   }
	  else{
		echo "<script> alert('Wrong Password'); </script>"; // if the pw is not valid, a warning will be shown
	  }
  }
  else{
    echo
    "<script> alert('User Not Registered'); </script>"; // if the database have no match information, the message will be shown 
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="lognreg.css">
    <div style="position: absolute; top: 0; left: 0; margin-top: 22px; margin-left: 20px; width: 50px; text-align:left; color:white;">
        <b>Welcome!Vistor</b>
  </div>
  </head>
  <body>
    <div class="container">  
     <h2>Login</h2>
     <form class="" action="" method="post" autocomplete="off">
       <label for="uName">Username : </label>
       <input type="text" name="uName" id = "uName" required value=""> <br> <!--Input their username here-->
       <label for="uPw">Password : </label>
       <input type="password" name="uPw" id = "uPw" required value=""> <br> <!--Input their password here-->
       <button type="submit" name="submit">Login</button>   <!--Press login will redirect the page base on thier role-->
     </form>
     <a href="registration1.php">Registration</a>  <!--Clicking it will redirect to the registration page-->
    </div>
    
  </body>
</html>

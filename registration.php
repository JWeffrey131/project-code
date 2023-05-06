<?php

include_once('lib/db.inc.php'); //connect to the database
if(!empty($_SESSION["uID"])){
	  header("Location: mainPage.php");
}
if(isset($_POST["submit"])){ //after pressing submit execute following checks
	  $uName = $_POST["uName"];
	    $uPw = $_POST["uPw"];
	    $confirmpassword = $_POST["confirmpassword"]; //declare variables
	    $duplicate = csci3100_user_countuName($uName);
	    if($duplicate[0]['count'] > 0){ // check if the name is duplicate in the database
		        echo
				      "<script> alert('Username Has Already Taken'); </script>"; // message will be shown if duplicate
			    }
	      else{
		          if($uPw == $confirmpassword){ // check if the input is same
				        $db->exec("INSERT INTO user(uName,uPw,is_admin) VALUES('$uName','$uPw',0)");
					      echo
						            "<script> alert('Registration Successful'); </script>"; // success if same input 
					    }
			      else{
				            echo
						          "<script> alert('Password Does Not Match'); </script>"; // wrong if different input 
					        }
			    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registration</title>
    <div style="position: absolute; top: 0; left: 0; margin-top: 22px; margin-left: 20px; width: 50px; text-align:left; color:white;">
    <b>Welcome!Vistor</b>
    </div>
    <link rel="stylesheet" type="text/css" href="lognreg.css">
    
  </head>
  <body>
    <div class="container"> 
    <h2>Registration</h2>
    <form class="" action="" method="post" autocomplete="off">
      <label for="uName">Username : </label>
      <input type="text" name="uName" id = "uName" required value=""> <br> <!--input the username-->
      <label for="uPw">Password : </label>
      <input type="text" name="uPw" id = "uPw" required value=""> <br> <!--input the password-->
      <label for="confirmpassword">Confirm Password : </label>
      <input type="text" name="confirmpassword" id = "confirmpassword" required value=""> <br> <!--input the password again-->
      <button type="submit" name="submit">Register</button> <!--Click register to execute the check-->
    </form>
    <br>
    <a href="login.php">Login</a> <!--redirect to login page-->
    </div>
  </body>
</html>

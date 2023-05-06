<!DOCTYPE html>
<html lang="en"> <!--The header file is used in several page as a heeader UI-->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@3.0.0/fonts/remixicon.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="header.css">
</head>

<body>
<header>
        <h2 class="logo"><span>Welcome! </span></h2> <!--Welcome text is shown -->
        <div class="topbar">
            <button type= "submit" value="submit" id="profile-button" class="btn btn1"> <i class="ri-user-fill"></i> User Profile </button>
            <script>
                $('#profile-button').click(function() { //redirect to profile page after pressing profile button
                    window.location.href = 'http://3.86.208.156/index.php';
                    return false;
		    });
	        </script>
            <button type="submit" value="logout" id="logout-button" class ="btn btn2"> <i class="ri-logout-box-r-line"></i> Logout </button>   
	        <script>
                $('#logout-button').click(function() { //redirect to login page after pressing logout button
                    window.location.href = 'http://3.86.208.156/login.php';
                    return false;
		    });
	    </script>

        </div>
</header>
</body>

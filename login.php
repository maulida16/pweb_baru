<?php
    session_start();
    
    include 'conn.php';

    if($_SESSION){
        header('location: index.php');
    } else{

        if(isset($_GET['redirectProfile'])){
            $profileId = $_GET['redirectProfile'];
        }
    
        if(isset($_POST['submit'])){
            // session_start();
            $username = $_POST['username'];
            $hash = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $password = password_verify($_POST['password'], $hash);
    
            $sql = "SELECT * FROM users WHERE `username`='$username'";
            $result = mysqli_query($conn,$sql);
            $row = $result->fetch_assoc();
            if($row != NULL){
                if(password_verify($_POST['password'],$row['password'])){
                    session_start();
                    $_SESSION['username'] = $username;
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['status'] = 'login';
                    // var_dump($_SESSION['id']);
                    if($profileId != NULL){
                        header('location: profile.php?id='.$profileId);
                    } else{
                        header('Location: index.php');
                    }
                }
            } else{
                echo "No Dataset";
            }
        
        }
        mysqli_close($conn);

    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Beyouty</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="login_assets/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login_assets/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login_assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login_assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login_assets/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="login_assets/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login_assets/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login_assets/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="login_assets/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login_assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="login_assets/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('login_assets/images/login-bg.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Sign In
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5" action="login.php<?php if(isset($_GET['redirectProfile'])){echo "?redirectProfile=".$_GET['redirectProfile'];}?>" method="POST">

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
						<button button type="submit" name="submit" id="submit" class="login100-form-btn">
							Login
						</button>
					</div>
					<p style='text-align: center; margin-top: 20px;'>Belum punya akun? <a href='register.php'>Sign up</a></p>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="login_assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="login_assets/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="login_assets/vendor/bootstrap/js/popper.js"></script>
	<script src="login_assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="login_assets/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="login_assets/vendor/daterangepicker/moment.min.js"></script>
	<script src="login_assets/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="login_assets/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="login_assets/js/main.js"></script>

</body>
</html>
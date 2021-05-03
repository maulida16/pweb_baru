<?php
session_start();

include 'conn.php';

if($_SESSION){
	header('location: index.php');
} else{

	if(isset($_POST['submit'])){
		if($_POST['password'] !== $_POST['confirm_password'])
			header('Location: register.php');

		$email = $_POST['email'];
		$username = $_POST['username'];
		$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
	

		$sql = "INSERT INTO user (`email`, `username`, `password`)
		VALUES ('$email', '$username', '$password')";

		if (mysqli_query($conn, $sql)) {
			$msg = "Pendaftaran Berhasil";

		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}
	mysqli_close($conn);

}
if(isset($msg)){
	echo "<script>alert('".$msg."')</script>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>UpdatEarthquake.id</title>
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
				Hi User Baru, Daftar Yuk!
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5" action="register.php" method="POST">
					
					<div class="wrap-input100 validate-input" data-validate = "Enter email">
						<input class="input100" type="email" name="email" placeholder="Email">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="Username" minlength="2">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" id="password" type="password" name="password" placeholder="Password" onkeyup="check();" minlength="2" maxlength="15">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Confirm Password">
						<input class="input100" id="confirm_password" type="password" name="confirm_password" placeholder="Confirm Password" onkeyup="check();" minlength="2" maxlength="8">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>
					<p style="text-align: center; margin-top: 20px;" id="message"></p>

					<div class="container-login100-form-btn m-t-32">
						<button type="submit" name="submit" id="submit" class="login100-form-btn">
							Sign Up
						</button>
					</div>
					<p style='text-align: center; margin-top: 20px;'>Sudah punya akun? <a href='login.php'>Login</a></p>
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
<script type="text/javascript">
	var check= function(){
		if (document.getElementById('password').value ==
			document.getElementById('confirm_password').value) {
			document.getElementById('message').style.color = 'green';
		document.getElementById('message').innerHTML = 'Password Matches!';
	} else {
		document.getElementById('message').style.color = 'red';
		document.getElementById('message').innerHTML = 'Password is not the same!';
	}
}
</script>
</html>
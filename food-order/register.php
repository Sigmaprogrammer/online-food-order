<?php 
include("config/constants.php");
if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$fullname = $_POST['fullname'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

	if ($password == $cpassword) {
		$sql = "SELECT * FROM tbl_user WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO tbl_user (username, fullname, email, password)
					VALUES ('$username', '$fullname', '$email', '$password')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				header("location:".SITEURL.'login_user.php');
				$username = "";
				$fullname = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
			} else {
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('Woops! pls enter something.')</script>";
		}
		
	} else {
		echo "<script>alert('Password Not Matched.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="css/register.css">

	<title>Register Form </title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
			<h2 style="text-align: center; color: #53e3a6; font-weight: 800">Welcome To MK Hotel</h4>
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
			<div class="input-group">
          <input type="text" name="username" placeholder="Enter Your User name" required>
		 
			</div>

			<div class="input-group">
          
		  <input type="text" name="fullname" placeholder="Enter Full Name" required>
			</div>
		

            <div class="input-group">
          <input type="email" name="email" placeholder="Enter Your Email-id" required>
			</div>
			
            <div class="input-group">
          <input type="password" name="password" placeholder="Enter Your password" required minlength="8">
			</div>

            
            <div class="input-group">
          <input type="password" name="cpassword" placeholder="Enter Your password again" required>
			</div>
            
            <div class="input-group">
				<button name="submit" class="btn">Register</button>
			</div>
			
			
			<p class="login-register-text">Have an account? <a href="login_user.php" target="blank">Login Here</a>.</p>
		</form>
	</div>
</body>
</html>
<?php include('../config/constants.php');

?>
<html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
<div class="wrapper">
	<div class="container">
		<h1>Welcome to Admin-Login</h1>
		<?php
          if(isset($_SESSION['login']))
          {
           echo $_SESSION['login'];
           unset($_SESSION['login']);
          }   

          if(isset($_SESSION['no-login-message']))
          {
           echo $_SESSION['no-login-message'];
           unset($_SESSION['no-login-message']);
          }

        ?>
        <br><br>
		<form action="" method="POST" class="form">
			<input type="text"  name="username" placeholder="Username">
			<input type="password" name="password" placeholder="Password">
			<button type="submit" name="submit">Login</button>
		</form>
	</div>
	
	<ul class="bg-bubbles">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
</div>
</body>
</html>
<?php
 if(isset($_POST['submit']))
 {
     $_username = $_POST['username']; 
     $_password = md5($_POST['password']);

     $sql = "SELECT * FROM tbl_admin where username ='$_username' AND password='$_password'";

     $res = mysqli_query($conn, $sql);
    
     $count = mysqli_num_rows($res);
     if($count==1)
     {
        $_SESSION['login'] = "<div class='success'>LogIn sucessfully</div>";
        $_SESSION['user'] = $_username;
        header('location:'.SITEURL.'admin/');


     }
     else{
        $_SESSION['login'] = "<div class='error'>LogIn Failed may your UserName Or Password In Correct Try Again </div>";
         header('location:'.SITEURL.'admin/login.php');
     }
 }
?>

<?php
if(!isset($_SESSION['user']))
{
    $_SESSION['no-login-message'] = "<div class='error'>please login.</div>";
    header('location:'.SITEURL.'login_user.php');
}
?>
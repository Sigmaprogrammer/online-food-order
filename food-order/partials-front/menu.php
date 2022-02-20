<?php
include("config/constants.php");
include("login-checkup.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style2.css">

</head>

<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
    <div class="user">
       
      <?php
      echo "<h3>Welcome ".$_SESSION['user'].".</h3>";
      ?>
      <br>
      <a class="btn-primary2" href="<?php echo SITEURL; ?>userprofile.php">User Profile</a>
         
</div>  

        <div class="container">
            <div class="logo">
            
                    
                    <img src="images/logo1.png" alt="Restaurant Logo" class="img-responsive">
               
            </div>
                        
            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="<?php echo SITEURL; ?>index.php">Home</a>
                    </li>
                    <li>
                    <a href="<?php echo SITEURL; ?>aboutus.php">About Us</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>categories.php">Categories</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>foods.php">Foods</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>contact_us.php">Contact Us</a>
                    </li>

                    <li>
                        <a class="btn-primary1" href="<?php echo SITEURL; ?>log_out.php">Logout</a>
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
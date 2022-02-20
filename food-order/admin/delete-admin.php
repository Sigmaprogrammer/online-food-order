<?php
include('../config/constants.php');

 $id =$_GET['id'];

 $sql ="DELETE FROM tbl_admin WHERE id=$id";

 $res = mysqli_query($conn, $sql);

 if($res==true)
 {
   // echo"Admin Deleted";
   $_SESSION['delete'] ="<div class='success'>Admin Deleted Sucessfully.</div>";
   header('location:'.SITEURL.'admin/manage-admin.php');
 }
 else{
    //echo"Failed To Deleted Admin";
    $_SESSION['delete'] ="<div class='error'>Failed To Deleted Admin</div>";
    header('location:'.SITEURL.'admin/manage-admin.php');
 }

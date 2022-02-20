<?php
include('../config/constants.php');

if(isset($_GET['id']) && isset($_GET['image_name']))
{
    //echo 'process';
    $id = $_GET['id'];
 $image_name = $_GET['image_name'];

 if($image_name != "")
 {
     $path ="../images/food/".$image_name;
     $remove = unlink($path);

     if($remove==false)
     {
         $_SESSION['upload']="<div class='error'> Fail to remove picture </div>";
         header('location:'.SITEURL.'admin/manage-food.php');
         die();
     }
 }
    
 $sql ="DELETE FROM tbl_food WHERE id=$id";

 $res = mysqli_query($conn, $sql);

 if($res==true)
 {
   // echo"Admin Deleted";
   $_SESSION['delete'] ="<div class='success'>Food Deleted Sucessfully.</div>";
   header('location:'.SITEURL.'admin/manage-food.php');
 }
 else{
    //echo"Failed To Deleted Admin";
    $_SESSION['delete'] ="<div class='error'>Failed To Deleted Food</div>";
    header('location:'.SITEURL.'admin/food-category.php');
 }

}
else
{

    $_SESSION['unauthorized'] ="<div class='error'>Unauthorized Access.</div>";
    header('location:'.SITEURL.'admin/manage-food.php');
    
}

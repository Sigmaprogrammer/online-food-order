<?php
include('../config/constants.php');

if(isset($_GET['id']) AND isset($_GET['image_name']))
{
 //echo "get ";
 $id = $_GET['id'];
 $image_name = $_GET['image_name'];

 if($image_name != "")
 {
     $path ="../images/category/".$image_name;
     $remove = unlink($path);

     if($remove==false)
     {
         $_SESSION['remove']="<div class='error'> Fail to remove picture </div>";
         header('location:'.SITEURL.'admin/manage-category.php');
         die();
     }
 }

 $sql ="DELETE FROM tbl_category WHERE id=$id";

 $res = mysqli_query($conn, $sql);
 if($res==true)
 {
   // echo"Admin Deleted";
   $_SESSION['delete'] ="<div class='success'>Category Deleted Sucessfully.</div>";
   header('location:'.SITEURL.'admin/manage-category.php');
 }
 else{
    //echo"Failed To Deleted Admin";
    $_SESSION['delete'] ="<div class='error'>Failed To Deleted Category</div>";
    header('location:'.SITEURL.'admin/manage-category.php');
 }

}

else
{
    header('location:'.SITEURL.'admin/manage-category.php');
}

<?php include('partials/menu.php');?>

<div class="main-content">
    <div class="wrapper">
  <h1>UPDATE ORDER</h1>

  <br/><br/>
<?php
if(isset($_GET['id']))
{
    $id =$_GET['id'];
    $sql = "SELECT * FROM tbl_order WHERE id=$id";
    $res = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($res);

    if($count==1)
    {
               $row = mysqli_fetch_assoc($res);

               $food =$row['food'];
               $price =$row['price'];
               $qty =$row['qty'];
               $status =$row['status'];

               $customer_name =$row['customer_name'];
               $customer_contact =$row['customer_contact'];
               $customer_email =$row['customer_email'];
               $customer_address =$row['customer_address'];





    }

    else{
        header('location:'.SITEURL.'admin/manage-order.php');
    }
}
else
{

             header('location:'.SITEURL.'admin/manage-order.php');
}


?>



                  <form action="" method="post">

                  <table class="blueTable">
                      <thead>
                         <tr>  
                         <th>Food Name</th>
                         <th>Price</th>
                         <th>Qty.</th>
                         <th>Status</th>
                         <th>Customer Name</th>
                         <th>Customer Contact</th>
                         <th>Customer Email</th>
                         <th>Customer Address</th>
                         </tr>

                      </thead> 



                      <tbody>                  
                           <tr>
                                 <td><b><?php echo $food; ?></b></td>
                                 <td><b>$<?php echo $price; ?>  </b> </td>
                                 <td><input type="number" name="qty" value="<?php echo $qty; ?>"></td>   
                                 <td><select name="status">
                                     <option <?php if($status=="Ordered") {echo $food;} ?> value="Ordered">Ordered</option>
                                     <option <?php if($status=="Ordered") {echo $food;} ?> value="Ontheway">On the Way</option>
                                     <option  <?php if($status=="Delivered") {echo $food;} ?> value="Delivered">Delivered</option>
                                     <option   <?php if($status=="Cancelled") {echo $food;} ?> value="Cancelled">Cancelled</option>
                                 </select></td>   
                                  <td><input type="text" name="customer_name" value="<?php echo $customer_name; ?>"></td> 
                                  <td><input type="text" name="customer_contact" value="<?php echo $customer_contact; ?>"></td> 
                                  <td><input type="text" name="customer_email" value="<?php echo $customer_email; ?>"></td> 
                                  <td><textarea name="customer_address"  cols="20" rows="5"><?php echo $customer_address; ?></textarea></td> 
                           </tr>
                                  <tr>
                                      <td colspan="8">
                                          <input type="hidden" name="id" value="<?php echo $id; ?>">
                                          <input type="hidden" name="price" value="<?php echo $price; ?>">
                                          <input type="submit" name="submit" value="Update order" class="up_btn1">
                                      </td>
                                  </tr>
                     </tbody>

                         </table>

                  </form>


<?php

if(isset($_POST['submit']))
{


   // echo 'ok';

   $food =$_POST['food'];
   $price =$_POST['price'];
   $qty =$_POST['qty'];

   $total = $price * $qty;
   $status =$_POST['status'];

   $customer_name =$_POST['customer_name'];
   $customer_contact =$_POST['customer_contact'];
   $customer_email =$_POST['customer_email'];
   $customer_address =$_POST['customer_address'];

   $sql2 = "UPDATE tbl_order SET
   qty = $qty,
   total = $total,
   status ='$status',
   customer_name ='$customer_name',
   customer_contact ='$customer_contact',
   customer_email ='$customer_email',
   customer_address ='$customer_address'
   WHERE id=$id
    ";

    $res2 = mysqli_query($conn, $sql2);
    if($res2==true)
{
    $_SESSION['update'] = "<div class='success'>Order Updated Successfully. </div>";
    header('location:'.SITEURL.'admin/manage-order.php');
}

else
{
    $_SESSION['update'] = "<div class='error text-center'> Failed Ordered Food. </div>";
    header('location:'.SITEURL.'admin/manage-order.php');
}

}

?>


</div>
</div>




<?php include('partials/footer.php');
?>
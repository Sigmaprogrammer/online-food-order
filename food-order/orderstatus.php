
<?php include('partials-front/menu.php');?>

<style>
    table.blueTable {
    border: 1px solid #1C6EA4;
    background-color: #EEEEEE;
    width: 100%;
    text-align: left;
    border-collapse: collapse;
  }
  table.blueTable td, table.blueTable th {
    border: 1px solid #AAAAAA;
    padding: 3px 9px;
  }
  table.blueTable tbody td {
    font-size: 13px;
    color: #292929;
  }
  table.blueTable tr:nth-child(even) {
    background: #D0E4F5;
  }
  table.blueTable thead {
    background: #FFFFFF;
    background: -moz-linear-gradient(top, #ffffff 0%, #ffffff 66%, #FFFFFF 100%);
    background: -webkit-linear-gradient(top, #ffffff 0%, #ffffff 66%, #FFFFFF 100%);
    background: linear-gradient(to bottom, #ffffff 0%, #ffffff 66%, #FFFFFF 100%);
    border-bottom: 2px solid #444444;
  }
  table.blueTable thead th {
    font-size: 15px;
    font-weight: bold;
    color: #1F1F1F;
    border-left: 2px solid #FFFFFF;
  }
  table.blueTable thead th:first-child {
    border-left: none;
  }
  
  table.blueTable tfoot td {
    font-size: 14px;
  }
  table.blueTable tfoot .links {
    text-align: right;
  }
  table.blueTable tfoot .links a{
    display: inline-block;
    background: #1C6EA4;
    color: #FFFFFF;
    padding: 2px 8px;
    border-radius: 5px;
  }


  .up_btn{
    background-color:#44c767;
	border-radius:20px;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	padding:15px 16px;
	text-decoration:none;
	text-shadow:0px 1px 0px #2f6627;
  }


  .up_btn1{
    background-color:#44c767;
	border-radius:20px;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:12px;
	padding:15px 15px;
	text-decoration:none;
  }
</style>
<div class="text-center">
    <h1>Your Order Is Placed Sucessfully</h1>
</div>
<br>

<div class="text-center" style="font-size:40px; color:#476175;"><?php if(isset($_SESSION['login']))
{
 echo $_SESSION['user'];
}?> 
 <br><br>
 </div>

 <div class="main-content">
 <div class="text-center">
  <h1>Order Details</h1>
<br>
<br>

 <table class="blueTable">
 <thead>
     <tr>
         <th>S.N</th>
         <th>Food</th>
         <th>Price</th>
         <th>Qty.</th>
         <th>Total</th>
         <th>Order Date</th>
         <th>Status</th>
         <th>Customer Name</th>
         <th>Contact</th>
         <th>Email</th>
         <th>Address</th>
     </tr>
     </thead>

         <?php 
                    
                    $sql="SELECT * FROM tbl_order ORDER BY id DESC LIMIT 1";
                    $res= mysqli_query($conn, $sql);
                    $count =mysqli_num_rows($res);
                    $sn =1;
                    if($count>0)
                    {
                        while($row=mysqli_fetch_assoc($res))
                        {

                            $id = $row['id'];
                            $food =$row['food'];
                            $price =$row['price'];
                            $qty =$row['qty'];
            
                            $total = $row['total'];
                            $order_date = $row['order_date'];
                            $status =$row['status'];
            
                            $customer_name =$row['customer_name'];
                            $customer_contact =$row['customer_contact'];
                            $customer_email =$row['customer_email'];
                            $customer_address =$row['customer_address'];


                            ?>
           <tbody>                  
          <tr>
         <td><?php echo $sn++; ?></td>
          <td><?php echo  $food; ?></td>
         <td>&#8377;<?php echo  $price; ?></td>
         <td><?php echo  $qty; ?></td>
         <td><?php echo  $total; ?></td>
         <td><?php echo  $order_date; ?></td>

         <td>

         <?php
          if($status=="Ordered")
          {
              echo "<label> $status </label>";
          }
          elseif($status=="Ontheway")
          {
             echo "<label style='color:orange;'> $status </label>";
          }
         elseif($status=="Delivered")
         {
            echo "<label style='color:green;'> $status </label>";
         }
         elseif($status=="Cancelled")
         {
            echo "<label style='color:red;'> $status </label>";
         }

         ?>
         </td>

         <td><?php echo  $customer_name; ?></td>
         <td><?php echo  $customer_contact; ?></td>
         <td><?php echo  $customer_email; ?></td>
         <td><?php echo  $customer_address; ?></td>
        
          </tbody>
     </tr>
<?php
                        }


                    }

                    else
                    {
                                  echo "<tr> <td colspan ='12' class='error'>Order Not Avaliable</td> </tr>";
                    }
         ?>

    

    
 </table>
              </div>
                </div>
 
 <div class="text-center"  style="font-size:20px; background-color:#90ee90; color:white; padding:1%;">
 <b style="color:black;">Order will be delivered within 15 minutes</b>
 
 <br>
 <p style="color:#476175;">our delivery staff no:7**524***</p>
 </div>
<br>
<br>
<div class="text-center" style="height:225px; font-size:30px;">
<p style="color:#476175;">Thanks for ordering</p>
</div>
<br>
<br>
<br>
<?php include('partials-front/footer.php');?>
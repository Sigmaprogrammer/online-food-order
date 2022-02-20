<?php include('partials/menu.php');
                ?>
<div class="main-content">
    <div class="wrapper">
  <h1>MANAGE FOOD</h1>
  <br/><br/>

<a href="<?php echo SITEURL; ?>admin/add-food.php" class="btn-primary">Add Food</a>

<br/> <br/>
<?php

if(isset($_SESSION['add']))
           {
               echo $_SESSION['add'];
               unset($_SESSION['add']);
           }

           if(isset($_SESSION['delete']))
           {
               echo $_SESSION['delete'];
               unset($_SESSION['delete']);
           }
           
           if(isset($_SESSION['upload']))
           {
               echo $_SESSION['upload'];
               unset($_SESSION['upload']);
           }
          
           if(isset($_SESSION['unauthorized']))
           {
               echo $_SESSION['unauthorized'];
               unset($_SESSION['unauthorized']);
           }

           if(isset($_SESSION['update']))
           {
               echo $_SESSION['update'];
               unset($_SESSION['update']);
           }
           
?>


<table class="tbl-full">
   <tr>
       <th>S.N</th>
       <th>Title</th>
       <th>Price</th>
       <th>Image</th>
       <th>Featured</th>
       <th>Active</th>
       <th>Action</th>
   </tr>
    <?php

$sql ="SELECT * FROM tbl_food";
$res = mysqli_query($conn, $sql);
$count = mysqli_num_rows($res);
$sn=1;
 if($count>0){
      while($rows=mysqli_fetch_assoc($res))
      {
          $id=$rows['id'];
          $title=$rows['title'];
          $price=$rows['price'];
          $image_name=$rows['image_name'];
          $featured=$rows['featured'];
          $active=$rows['active'];
          ?>
                      <tr>
                            <td><?php echo $sn++;?></td>
                            <td><?php echo $title;?></td>
                            <td>&#8377;<?php echo $price;?></td>
                            <td>
                    <?php 
                           if($image_name=="")
                           {
                               echo "<div class ='error'>Image not added.</div>";
                           }
                            else
                            {
                                ?>

                                <img src="<?php echo SITEURL;?>images/food/<?php echo $image_name;?>" width="100px" height="100px">
                                <?php
                            }
                               
                            ?>
                            </td>
                            <td><?php echo $featured;?></td>
                            <td><?php echo $active;?></td>
                            <td>
                           <pre><a href="<?php echo SITEURL;?>admin/update-food.php?id=<?php echo $id;?>" class="btn-secondary"> Update Food </a>  <a href="<?php echo SITEURL;?>admin/delete-food.php?id=<?php echo $id;?>&image_name=<?php echo $image_name;?> " class="btn-danger"> Delete Food</a>  </pre>
                             </td>
                        </tr>
          
          <?php
      }
    }
    else{
        echo "<tr> <td colspan ='7' class='error'>FOOD NOT ADDED YET.</td></tr>";

    }
    ?>
   

   
</table>


              </div>
                </div>

<?php include('partials/footer.php');
?>
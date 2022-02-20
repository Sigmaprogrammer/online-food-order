<?php include('partials-front/menu.php');?>
    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">

        <?php
                   
                   $search =$_POST['search'];

               ?>
            
            <h2 style="color:#f3e5ab; background-color:grey;">Foods on Your Search <a href="#" class="text-white">"<?php echo $search;?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>


            <?php
                        
                         $sql ="SELECT * FROM tbl_food WHERE title LIKE '%$search'  OR description LIKE '%$search'";
                         $res =mysqli_query($conn, $sql);

                         $count= mysqli_num_rows($res);

                         if($count>0)
                         {
                                 while($row=mysqli_fetch_assoc($res))
                                 {
                                    $id =$row['id'];
                                  $title =$row['title'];
                                 $description =$row['description'];
                                  $price =$row['price'];
                                 $image_name =$row['image_name'];
                                 ?>


               <div class="food-menu-box">
                <div class="food-menu-img">

                <?php
                
                if($image_name=="")
                {
                 echo "<div class='error>Image not Found.</div>";
                }
                else{

                    ?>
                               <img src="<?php echo SITEURL;?>images/food/<?php echo $image_name ?>" class="img-responsive img-curve">

                              <?php
                }


                     ?>
                   
                </div>

                <div class="food-menu-desc">
                    <h4><?php echo $title;?></h4>
                    <p class="food-price">&#8377;<?php echo $price;?></p>
                    <p class="food-detail">
                    <?php echo $description;?>
                         </p>
                    <br>

                    <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id;?>" class="btn btn-primary">Order Now</a>
                </div>
            </div>

                                 <?php

                                 }
                                }
                                else
                                {
                                    echo '<div class ="error">Food Not Found</div>';
                                }

                ?>

           

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('partials-front/footer.php');?>
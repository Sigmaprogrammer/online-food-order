<?php include('partials-front/menu.php');?>
<?php 
error_reporting(0); // For not showing any error

if (isset($_POST['submit'])) { // Check press or not Post Comment Button
	$name = $_POST['name']; // Get Name from form
  $email = $_POST['email'];
	$comment = $_POST['comment']; // Get Comment from form

	$sql = "INSERT INTO tbl_comment (name,email,comment)
			VALUES ('$name', '$email', '$comment')";
	$result = mysqli_query($conn, $sql);
	if ($result) {
		echo "";
	} else {
		echo "<script>alert('Comment does not add.')</script>";
	}
}

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/review.css">
<style>

.about-section {
  padding: 50px;
  text-align: center;
  background-color: #474e5d;
  color: white;
}
.image {
  text-align: center;
  color: white;
}

.title {
  color: grey;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.button:hover {
  background-color: #555;
}


div.gallery {
  border: 1px solid #ccc;
}

div.gallery img {
  width: 100%;
  height: auto;
}

div.desc {
  padding: 15px;
  text-align: center;
}

* {
  box-sizing: border-box;
}

.responsive {
  padding: 0 6px;
  float: left;
  width: 24.99999%;
}

@media only screen and (max-width: 700px) {
  .responsive {
    width: 49.99999%;
    margin: 6px 0;
  }
}

@media only screen and (max-width: 500px) {
  .responsive {
    width: 100%;
  }
}

.clearfix:after {
  content: "";
  display: table;
  clear: both;
  margin-top: 1%;
}

@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}
</style>
</head>
<body>

<div class="about-section">
  <h1>About Us </h1>
  <br>
  <p>"Restaurants provide you with different cuisines of food to satisfy your hunger.
The food preparation and presentation gives you a happy feel during your dull
The ambiance that a restaurant provides you with gives one all the more reason to visit to cherish their time.
The restaurant is a life savior when one doesn’t feel like cooking or wants to eat something else.
You get to explore places when you plan to visit a restaurant.
The fast-food restaurant provides your meals on the go to save your time at affordable prices.
The restaurant is a place to enjoy your special occasions like Birthdays, Anniversaries, Achievements"</p>
</div>
<div class="image">
<img class="plate" style="text-align:center;" src="images/plates.png" width="225px" height="auto" alt="">
</div>
<div>
<h1 class="text-center"  style=" text-decoration:underline;" > Our Gallery</h1>
<br>
</div>

<div class="responsive">
  <div class="gallery">
     <img src="images/hotel1.jpg" alt="Cinque Terre" width="300px" height="300px">
    <div class="desc">Our Hotel Interior Dinning Room</div>
  </div>
</div>

<div class="responsive">
  <div class="gallery">
     <img src="images/hotel2.jpg" alt="Cinque Terre" width="600" height="300">
    <div class="desc">Our Hotel Outspace Dinning Room</div>
  </div>
</div>

<div class="responsive">
  <div class="gallery">
     <img src="images/hotel3.jpg" alt="Cinque Terre" width="600" height="300">
    <div class="desc">Our Hotel CaveSetup Dinning Room</div>
  </div>
</div>

<div class="responsive">
  <div class="gallery">
     <img src="images/hotel1.jpg" alt="Cinque Terre" width="600" height="300">
    <div class="desc">Our Hotel Interior Dinning Room</div>
  </div>
</div>




<div class="clearfix"></div>
<div class="clearfix"></div>
<div class="about-section">
  <h1>User Review </h1>
</div>
<div class="total">
<div class="wrapper">
		<form action="" method="POST" class="form">
			<div class="row">
				<div class="input-group">
					<label for="name">Name</label>
					<input type="text" name="name" id="name" placeholder="Enter your Name" required>
				</div>
        <div class="input-group">
					<label for="email">Email</label>
					<input type="email" name="email" id="email" placeholder="Enter your Email" required>
				</div>
			</div>
			<div class="input-group textarea">
				<label for="comment">Comment</label>
				<textarea id="comment" name="comment" placeholder="Enter your Review" required></textarea>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Post Comment</button>
			</div>
		</form>
    <h1 style="color:grey; text-decoration: underline;">Some reviews by users</h1>
		<div class="prev-comments">
			<?php 
			
			$sql = "SELECT * FROM tbl_comment";
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) {

			?>
      
			<div class="single-item">
				<h4><?php echo $row['name']; ?></h4>
        <a href="mailto:<?php echo $row['email']; ?>"><?php echo $row['email']; ?></a>
				<p><?php echo $row['comment']; ?></p>
			</div>
			<?php

				}
			}
			
			?>
		</div>
	</div>
    </div>
</body>
</html>

<?php include('partials-front/footer.php');?>
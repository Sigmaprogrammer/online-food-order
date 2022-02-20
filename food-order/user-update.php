<?php include('partials-front/menu.php'); ?>

<style>
  .tbl-full {
    width: 100%;
  }

  .tbl-30 {
    width: 30%;
  }


  table tr th {
    border-bottom: 1px solid black;
    padding: 1%;
    text-align: left;
  }

  table tr td {
    padding: 2%;
  }

  .btn-primary {
    background-color: #1e90ff;
    color: white;
    padding: 1%;
    text-decoration: none;
    font-weight: bold;
    border-radius: 25px;
  }

  .btn-primary:hover {
    background-color: lightgreen;
    color: black;
  }
</style>

<div class="container" style="background-color:#e5e6eb; height:600px; width:100%">
  <h2 style="font-size:30pt; margin:10px 50px ;">Update Profile</h2>


  <?php
  $id = $_GET['id'];
  $sql = "SELECT *FROM tbl_user WHERE id=$id";
  $res = mysqli_query($conn, $sql);
  if ($res == true) {
    // echo"Admin Deleted";
    $count = mysqli_num_rows($res);
    if ($count == 1) {
      // echo"<div class='success'>Admin Avaliable</div>";  
      $row = mysqli_fetch_assoc($res);
      $fullname = $row['fullname'];
      $email = $row['email'];
    } else {
      header('location' . SITEURL . 'userprofile.php');
    }
  }

  ?>

  <form action="" method="POST">
    <table class="tbl-30">
      <tr>
        <td>FullName</td>
        <td><input type="text" name="fullname" value="<?php echo $fullname; ?>"></td>
      </tr>

      <tr>
        <td>EmailId</td>
        <td><input type="text" name="email" value="<?php echo $email; ?>"></td>
      </tr>

      <tr>
        <td colspan="2">
          <input type="hidden" name="id" value="<?php echo $id; ?>">
          <input type="submit" name="submit" value="Update Admin" class="btn-primary">
        </td>
      </tr>
    </table>

  </form>

</div>


<?php
if (isset($_POST['submit'])) {
  //echo 'button clicked';
  $id = $_POST['id'];
  $fullname = $_POST['fullname'];
  $email = $_POST['email'];

  $sql = "UPDATE tbl_user SET
     fullname = '$fullname',
     email ='$email'
     WHERE id='$id'
     ";
  $res = mysqli_query($conn, $sql);

  if ($res == true) {
    $_SESSION['update'] = "<div class='success'><h1>User Updated Sucessfully.<h1></div>";
    header('location:' . SITEURL . 'userprofile.php');
  } else {
    $_SESSION['update'] = "<div class='error'>Failed  To Admin Update.</div>";
    header('location:' . SITEURL . 'userprofile.php');
  }
}

?>

<?php include('partials-front/footer.php'); ?>
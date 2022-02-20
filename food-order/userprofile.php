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
</style>

<section>
    <div class="container" style="background-color:#e5e6eb; height:600px; width:100%">
        <h2 style="font-size:30pt; margin:10px 50px ;">User Profile</h2>

        <table class="tbl-full">
            <tr>
                <th>Username</th>
                <th>Fullname</th>
                <th>Email-Id</th>
            </tr>

            <?php
            $user = $_SESSION['user'];
            $sql = "SELECT * FROM tbl_user where username ='$user'";
            $res = mysqli_query($conn, $sql);

            if ($res == TRUE) {

                $count = mysqli_num_rows($res);

                if ($count > 0) {
                    while ($rows = mysqli_fetch_assoc($res)) {
                        $id = $rows['id'];
                        $username = $rows['username'];
                        $fullname = $rows['fullname'];
                        $email = $rows['email'];
            ?>

                        <tr>
                            <td><?php echo $username; ?></td>
                            <td><?php echo $fullname; ?></td>
                            <td><?php echo $email; ?></td>
                            <td> <a href="<?php echo SITEURL; ?>user-password.php?id=<?php echo $id; ?>" class="btn-primary3">Change Password</a>
                                <a href="<?php echo SITEURL; ?>user-update.php?id=<?php echo $id; ?>" class="btn-primary3"> Update Profile</a>

                        </tr>
            <?php

                    }
                } else {
                    echo "<tr> <td colspan ='7' class='success'>Logout again to view the changes.</td></tr>";
                }
            }

            ?>
        </table>
        <?php

        if (isset($_SESSION['update'])) {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }

        if (isset($_SESSION['user-not-found'])) {
            echo $_SESSION['user-not-found'];
            unset($_SESSION['user-not-found']);
        }

        if (isset($_SESSION['password-not-found'])) {
            echo $_SESSION['password-not-found'];
            unset($_SESSION['password-not-found']);
        }

        if (isset($_SESSION['change-pwd'])) {
            echo $_SESSION['change-pwd'];
            unset($_SESSION['change-pwd']);
        }

        ?>
    </div>
</section>
<?php include('partials-front/footer.php'); ?>
<!doctype html>
<html lang="en">

<?php include "header.php"; ?>

<?php

include "config.php";

if (isset($_POST['save'])) {
    # code...
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $user = mysqli_real_escape_string($conn, $_POST['user']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));
    $date = date("d M,Y");
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $add_by = $_SESSION['username'];

    $sql = "SELECT username FROM admin_user WHERE username = '{$user}'";

    $result = mysqli_query($conn, $sql) or die("Query Failed.");

    if (mysqli_num_rows($result) > 0) {
        echo "<p style='color:red;text-align:center;margin: 10px 0;'>UserName already Exists.</p>";
    } else {
        $sql1 = "INSERT INTO admin_user (first_name,last_name,username,email, password, add_by,date)
                VALUES ('{$fname}','{$lname}','{$user}','{$email}','{$password}','{$add_by}','{$date}')";
        if (mysqli_query($conn, $sql1)) {
            header("Location: {$hostname}/Admin/Admin-user.php");
        } else {
            echo "<p style='color:red;text-align:center;margin: 10px 0;'>Can't Insert User.</p>";
        }
    }
}

?>

<body>
    <?php include "nav-bar.php"; ?>
    <div class="container-fluid">
        <div class="row">
            <?php include "slide-bar.php"; ?>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

                <!-- Form Start -->
                <div class="">
                    <div class="col-5 mx-auto">
                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" name="fname" class="form-control" placeholder="First Name" required>
                            </div>
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
                            </div>
                            <div class="form-group">
                                <label>User Name</label>
                                <input type="text" name="user" class="form-control" placeholder="Username" required>
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password"
                                    required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Password" required>
                            </div>

                            <input type="submit" name="save" class="btn btn-primary px-3 py-2" value="Save" required />
                        </form>
                    </div>
                </div>
                <!-- Form End-->

            </main>
        </div>
    </div>
    <?php include "footer.php"; ?>
</body>

</html>
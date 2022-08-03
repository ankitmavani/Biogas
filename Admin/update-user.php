<!doctype html>
<html lang="en">

<?php include "header.php";

include "config.php";

if (isset($_POST['save'])) {

    # code...
    $userid = mysqli_real_escape_string($conn, $_POST['user_id']);
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $user = mysqli_real_escape_string($conn, $_POST['user']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));
    $date = date("d M,Y");
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $add_by = $_SESSION['username'];


    $sql = "SELECT username FROM admin_user WHERE username = '{$user}'";

    $result = mysqli_query($conn, $sql) or die("Query Failed.");

    if (strcmp($_SESSION["username"], $user)) {
        $sql1 = "UPDATE admin_user SET first_name = '{$fname}', last_name = '{$lname}', username = '{$user}',email='{$email}', password = '{$password}',add_by='{$add_by}',date='{$date}' WHERE admin_id = {$userid}";;
        if (mysqli_query($conn, $sql1)) {
            header("Location: {$hostname}/Admin/Admin-user.php");
        } else {
            echo "<p style='color:red;text-align:center;margin: 10px 0;'>Can't Insert User.</p>";
        }
    } else {

        if (mysqli_num_rows($result) > 0) {
            echo "<p style='color:red;text-align:center;margin: 10px 0;'>UserName already Exists.</p>";
        } else {

            $sql1 = "UPDATE admin_user SET first_name = '{$fname}', last_name = '{$lname}', username = '{$user}',email='{$email}', password = '{$password}',add_by='{$add_by}',date='{$date}' WHERE admin_id = {$userid}";;
            if (mysqli_query($conn, $sql1)) {
                header("Location: {$hostname}/Admin/Admin-user.php");
            } else {
                echo "<p style='color:red;text-align:center;margin: 10px 0;'>Can't Insert User.</p>";
            }
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

                <?php

                include "config.php";

                $sql = "SELECT * from admin_user where admin_id='{$_GET['id']}'";

                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        # code...

                ?>
                <!-- Form Start -->
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">

                    <div class="form-group">
                        <input type="hidden" name="user_id" class="form-control"
                            value="<?php echo $row['admin_id'];  ?>">
                    </div>
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="fname" value="<?php echo $row['first_name']; ?>" class="form-control"
                            placeholder="First Name" required>
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="lname" value="<?php echo $row['last_name']; ?>" class="form-control"
                            placeholder="Last Name" required>
                    </div>
                    <div class="form-group">
                        <label>User Name</label>
                        <input type="text" name="user" value="<?php echo $row['username']; ?>" class="form-control"
                            placeholder="Username" required>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" value="<?php echo $row['password']; ?>"
                            class="form-control" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" value="<?php echo $row['email']; ?>" class="form-control"
                            placeholder="Password" required>
                    </div>

                    <input type="submit" name="save" class="btn btn-primary" value="update" required />
                </form>
                <!-- Form End-->
                <?php }
                } ?>
            </main>
        </div>
    </div>
    <?php include "footer.php"; ?>
</body>

</html>
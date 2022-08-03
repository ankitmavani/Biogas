<!doctype html>
<html lang="en">

<?php include "header.php"; ?>

<?php

include "config.php";

if (isset($_POST['save'])) {

    $old_password = md5($_POST['old_password']);
    $admin_id = $_SESSION['admin_id'];

    $sql = "SELECT admin_id FROM admin_user WHERE admin_id = '{$admin_id}' AND password= '{$old_password}'";

    $result = mysqli_query($conn, $sql) or die("Query Failed.");

    $new_password = mysqli_real_escape_string($conn, $_POST['new_password']);
    $conform_password = mysqli_real_escape_string($conn, $_POST['conform_password']);

    if (mysqli_num_rows($result) > 0) {
        if ($new_password == $conform_password) {
            $new_password = md5($new_password);
            $sql1 = "UPDATE admin_user SET password='{$new_password}' WHERE admin_id=$admin_id ";
            if (mysqli_query($conn, $sql1)) {
                header("location: {$hostname}/Admin/change-password.php");
                # code...
            } else {
                echo "<p style='color:red;text-align:center;margin: 10px 0;'>Can't Insert User.</p>";
            }
            # code...
        }
    } else {
        echo '<div class="alert alert-danger">Username and Password are not matched.</div>';
    }
}

?>

<body>
    <?php include "nav-bar.php"; ?>
    <div class="container-fluid">
        <div class="row">
            <?php include "slide-bar.php"; ?>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
                    <div class="form-group">
                        <label>old password</label>
                        <input type="password" name="old_password" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label>new password</label>
                        <input type="password" name="new_password" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label>conform password</label>
                        <input type="password" name="conform_password" class="form-control" placeholder="Password"
                            required>
                    </div>
                    <input type="submit" onclick="return confirm('Please click on OK to continue.');" name="save"
                        class="btn btn-primary" value="Save" required />
                </form>
            </main>
        </div>
    </div>
    <?php include "footer.php"; ?>
</body>

</html>
<!doctype html>
<html lang="en">

<?php include "header.php"; ?>

<?php

include "config.php";

if (isset($_POST['submit'])) {
    # code...

    if (isset($_FILES['fileToUpload'])) {
        $errors = array();

        $file_name = $_FILES['fileToUpload']['name'];
        $file_size = $_FILES['fileToUpload']['size'];
        $file_tmp = $_FILES['fileToUpload']['tmp_name'];
        $file_type = $_FILES['fileToUpload']['type'];
        $temp = explode('.', $file_name);
        $file_ext = end($temp);
        $extensions = array("jpeg", "jpg", "png","JPEG","JPG","PNG");

        if (in_array($file_ext, $extensions) === false) {
            $errors[] = "This extension file not allowed, Please choose a JPG or PNG file.";
        }

        if ($file_size > 5097152) {
            $errors[] = "File size must be 5mb or lower.";
        }
        $new_name = time() . "-" . basename($file_name);
        $target = "upload/services bio/" . $new_name;

        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, $target);
        } else {
            print_r($errors);
            die();
        }
    }

    $sb_name = mysqli_real_escape_string($conn, $_POST['sb_name']);
    $date = date("d M, Y");
    $add_by = $_SESSION['username'];

    $sql = "INSERT INTO services_bio (sb_name,sb_image,sb_add_by,sb_date)
              VALUES('{$sb_name}','{$new_name}','{$add_by}','{$date}');";

    if (mysqli_query($conn, $sql)) {
        header("location: {$hostname}/Admin/services-biogas-plat.php");
    } else {
        echo "<div class='alert alert-danger'>Query Failed.</div>";
    }
}

?>


<body>
    <?php include "nav-bar.php"; ?>
    <div class="container-fluid">
        <div class="row">
            <?php include "slide-bar.php"; ?>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <!-- Form -->
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="sb_name">Title</label>
                        <input type="text" name="sb_name" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">services biogas image</label>
                        <input type="file" name="fileToUpload" required>
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary" value="Save" required />
                </form>
                <!--/Form -->
            </main>
        </div>
    </div>
    <?php include "footer.php"; ?>
</body>

</html>
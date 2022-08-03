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
        $target = "upload/certificate/" . $new_name;

        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, $target);
        } else {
            print_r($errors);
            die();
        }
    }

    $cer_name = mysqli_real_escape_string($conn, $_POST['cer_title']);
    $date = date("d M, Y");
    $add_by = $_SESSION['username'];

    $sql = "INSERT INTO certificate(cer_name,cer_image,cer_add_by,cer_date)
              VALUES('{$cer_name}','{$new_name}','{$add_by}','{$date}');";

    if (mysqli_query($conn, $sql)) {
        header("location: {$hostname}/Admin/certificate.php");
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
                        <label for="post_title">Title</label>
                        <input type="text" name="cer_title" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">certificate image</label>
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
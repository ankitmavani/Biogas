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
        $target = "upload/client project management/" . $new_name;

        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, $target);
        } else {
            print_r($errors);
            die();
        }
    }

    $cpm_name = mysqli_real_escape_string($conn, $_POST['cpm_name']);
    $date = date("d M, Y");
    $add_by = $_SESSION['username'];

    $sql = "INSERT INTO client_project_management (cpm_name,cpm_image,cpm_add_by,cpm_date)
              VALUES('{$cpm_name}','{$new_name}','{$add_by}','{$date}');";

    if (mysqli_query($conn, $sql)) {
        header("location: {$hostname}/Admin/client-project-management.php");
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
                        <label for="cpm_name">Title</label>
                        <input type="text" name="cpm_name" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Clinet management project image</label>
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
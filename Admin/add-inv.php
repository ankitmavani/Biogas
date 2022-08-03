<!doctype html>
<html lang="en">

<?php include "header.php"; ?>
<?php

include "config.php";

if (isset($_POST['submit'])) {
    # code...

    if (isset($_FILES['fileToUpload'])) {
        if (empty($_FILES['fileToUpload']['tmp_name'])) {
            $catagary = 0;
            $new_name = "";
        } else {
            $errors = array();

            $file_name = $_FILES['fileToUpload']['name'];
            $file_size = $_FILES['fileToUpload']['size'];
            $file_tmp = $_FILES['fileToUpload']['tmp_name'];
            $file_type = $_FILES['fileToUpload']['type'];
            $temp = explode('.', $file_name);
            $file_ext = end($temp);
            $extensions = array("jpeg", "jpg", "png");

            if (in_array($file_ext, $extensions) === false) {
                $errors[] = "This extension file not allowed, Please choose a JPG or PNG file.";
            }

            if ($file_size > 5097152) {
                $errors[] = "File size must be 2mb or lower.";
            }
            $new_name = time() . "-" . basename($file_name);
            $target = "upload/investor/" . $new_name;

            if (empty($errors) == true) {
                move_uploaded_file($file_tmp, $target);
            } else {
                print_r($errors);
                die();
            }
            $catagary = 1;
        }
    }

    $inv_title = mysqli_real_escape_string($conn, $_POST['inv_title']);
    $inv_desc = mysqli_real_escape_string($conn, $_POST['inv_desc']);
    $date = date("d M, Y");
    $add_by = $_SESSION['username'];

    $sql = "INSERT INTO investor(inv_title,inv_desc,inv_image,inv_add_by,inv_date,inv_rank)
              VALUES('{$inv_title}','{$inv_desc}','{$new_name}','{$add_by}','{$date}','{$catagary}');";

    if (mysqli_query($conn, $sql)) {
        header("location: {$hostname}/Admin/investor.php");
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
                        <input type="text" name="inv_title" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1"> Description</label>
                        <textarea name="inv_desc" class="form-control" rows="5"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">image</label>
                        <input type="file" name="fileToUpload">
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
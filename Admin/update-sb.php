<!doctype html>
<html lang="en">

<?php include "header.php"; ?>

<?php
include "config.php";

if (isset($_POST['submit'])) {
    # code...
    if (empty($_FILES['new-image']['name'])) {
        $image_name = $_POST['old_image'];
    } else {
        $errors = array();

        $file_name = $_FILES['new-image']['name'];
        $file_size = $_FILES['new-image']['size'];
        $file_tmp = $_FILES['new-image']['tmp_name'];
        $file_type = $_FILES['new-image']['type'];
        $temp = explode('.', $file_name);
        $file_ext = end($temp);

        $sb_id = $_GET['id'];

        $sql1 = "SELECT * FROM services_bio WHERE sb_id = {$sb_id}";
        $result = mysqli_query($conn, $sql1) or die("Query Failed : Select");
        $row = mysqli_fetch_assoc($result);

        unlink("upload/services bio/" . $row['sb_image']);


        $extensions = array("jpeg", "jpg", "png","JPEG","JPG","PNG");

        if (in_array($file_ext, $extensions) === false) {
            $errors[] = "This extension file not allowed, Please choose a JPG or PNG file.";
        }

        if ($file_size > 5097152) {
            $errors[] = "File size must be 5mb or lower.";
        }

        if ($file_size > 5097152) {
            $errors[] = "File size must be 5mb or lower.";
        }
        $new_name = time() . "-" . basename($file_name);
        $target = "upload/services bio/" . $new_name;
        $image_name = $new_name;
        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, $target);
        } else {
            print_r($errors);
            die();
        }
    }

    $sb_name = mysqli_real_escape_string($conn, $_POST['sb_name']);
    $sb_date = date("d M,Y");
    $sb_add_by = $_SESSION['username'];

    $sql = "UPDATE services_bio SET sb_name='{$sb_name}',sb_image='{$image_name}',sb_date='{$sb_date}',sb_add_by='{$sb_add_by}'
            WHERE sb_id={$_POST["sb_id"]};";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("location: {$hostname}/Admin/services-biogas-plat.php");
    } else {
        echo "Query Failed";
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

                $sb_id = $_GET['id'];
                $sql = "SELECT sb_id,sb_name,sb_image FROM services_bio WHERE sb_id=$sb_id";

                $result = mysqli_query($conn, $sql) or die("Query Failed.");
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <!-- Form for show -->
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data"
                    autocomplete="off">
                    <div class="form-group">
                        <input type="hidden" name="sb_id" class="form-control" value="<?php echo $row['sb_id']; ?>"
                            placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTile">Title</label>
                        <input type="text" name="sb_name" class="form-control" id="exampleInputUsername"
                            value="<?php echo $row['sb_name']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="">services biogas image</label>
                        <input type="file" name="new-image">
                        <img src="upload/services bio/<?php echo $row['sb_image']; ?>" height="150px">
                        <input type="hidden" name="old_image" value="<?php echo $row['sb_image']; ?>">
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary" value="Update" />
                </form>
                <!-- Form End -->
                <?php
                    }
                } else {
                    echo "Result Not Found.";
                }
                ?>
            </main>
        </div>
    </div>
    <?php include "footer.php"; ?>
</body>

</html>
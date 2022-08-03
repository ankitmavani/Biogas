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

        $cer_id = $_GET['id'];

        $sql1 = "SELECT * FROM certificate WHERE cer_id = {$cer_id}";
        $result = mysqli_query($conn, $sql1) or die("Query Failed : Select");
        $row = mysqli_fetch_assoc($result);

        unlink("upload/certificate/" . $row['cer_image']);

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
        $target = "upload/certificate/" . $new_name;
        $image_name = $new_name;
        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, $target);
        } else {
            print_r($errors);
            die();
        }
    }

    $cer_name = mysqli_real_escape_string($conn, $_POST['cer_title']);
    $cer_date = date("d M,Y");
    $cer_add_by = $_SESSION['username'];

    $sql = "UPDATE certificate SET cer_name='{$cer_name}',cer_image='{$image_name}',cer_date='{$cer_date}',cer_add_by='{$cer_add_by}'
            WHERE cer_id={$_POST["cer_id"]};";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("location: {$hostname}/Admin/certificate.php");
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

                $cer_id = $_GET['id'];
                $sql = "SELECT cer_id,cer_name,cer_image FROM certificate WHERE cer_id=$cer_id";

                $result = mysqli_query($conn, $sql) or die("Query Failed.");
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <!-- Form for show -->
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data"
                    autocomplete="off">
                    <div class="form-group">
                        <input type="hidden" name="cer_id" class="form-control" value="<?php echo $row['cer_id']; ?>"
                            placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTile">Title</label>
                        <input type="text" name="cer_title" class="form-control" id="exampleInputUsername"
                            value="<?php echo $row['cer_name']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="">certificate image</label>
                        <input type="file" name="new-image">
                        <img src="upload/certificate/<?php echo $row['cer_image']; ?>" height="150px">
                        <input type="hidden" name="old_image" value="<?php echo $row['cer_image']; ?>">
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
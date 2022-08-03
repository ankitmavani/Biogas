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

        $fc_id = $_GET['id'];

        $sql1 = "SELECT * FROM flow_chart WHERE fc_id = {$fc_id}";
        $result = mysqli_query($conn, $sql1) or die("Query Failed : Select");
        $row = mysqli_fetch_assoc($result);

        unlink("upload/flow chart/" . $row['fc_image']);


        $extensions = array("jpeg", "jpg", "png", "svg","JPEG","JPG","PNG","SVG");

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
        $target = "upload/flow chart/" . $new_name;
        $image_name = $new_name;
        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, $target);
        } else {
            print_r($errors);
            die();
        }
    }

    $fc_name = mysqli_real_escape_string($conn, $_POST['fc_name']);
    $fc_date = date("d M,Y");
    $fc_add_by = $_SESSION['username'];

    $sql = "UPDATE flow_chart SET fc_name='{$fc_name}',fc_image='{$image_name}',fc_date='{$fc_date}',fc_add_by='{$fc_add_by}'
            WHERE fc_id={$_POST["fc_id"]};";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("location: {$hostname}/Admin/flow-chart.php");
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

                $fc_id = $_GET['id'];
                $sql = "SELECT fc_id,fc_name,fc_image FROM flow_chart WHERE fc_id=$fc_id";

                $result = mysqli_query($conn, $sql) or die("Query Failed.");
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <!-- Form for show -->
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data"
                    autocomplete="off">
                    <div class="form-group">
                        <input type="hidden" name="fc_id" class="form-control" value="<?php echo $row['fc_id']; ?>"
                            placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTile">Title</label>
                        <input type="text" name="fc_name" class="form-control" id="exampleInputUsername"
                            value="<?php echo $row['fc_name']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="">flow chart image</label>
                        <input type="file" name="new-image">
                        <img src="upload/flow chart/<?php echo $row['fc_image']; ?>" height="150px">
                        <input type="hidden" name="old_image" value="<?php echo $row['fc_image']; ?>">
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
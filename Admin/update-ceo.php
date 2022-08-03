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


        $extensions = array("jpeg", "jpg", "png", "PNG","JPEG","JPG");

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
        $target = "upload/CEO/" . $new_name;
        $image_name = $new_name;
        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, $target);
        } else {
            print_r($errors);
            die();
        }
    }

    $CEO_name = mysqli_real_escape_string($conn, $_POST['CEO_name']);
    $CEO_desc = mysqli_real_escape_string($conn, $_POST['CEO_desc']);

    $CEO_date = date("d M,Y");
    $CEO_add_by = $_SESSION['username'];

    $sql = "UPDATE ceo_info SET CEO_name='{$CEO_name}',CEO_image='{$image_name}',CEO_desc='{$CEO_desc}',CEO_date='{$CEO_date}',CEO_add_by='{$CEO_add_by}'
            WHERE CEO_id={$_GET["id"]}";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("location: {$hostname}/Admin/CEO-info.php");
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

                $CEO_id = $_GET['id'];
                $sql = "SELECT CEO_id,CEO_name,CEO_desc,CEO_image FROM ceo_info WHERE CEO_id=$CEO_id";

                $result = mysqli_query($conn, $sql) or die("Query Failed.");
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <!-- Form -->
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="post_title">Name</label>
                        <input type="text" name="CEO_name" value="<?php echo $row['CEO_name']; ?>" class="form-control"
                            autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1"> Description</label>
                        <textarea name="CEO_desc" class="form-control"
                            rows="5"><?php echo $row['CEO_desc']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">CEO image</label>
                        <input type="file" name="new-image">
                        <img src="upload/CEO/<?php echo $row['CEO_image']; ?>" height="150px">
                        <input type="hidden" name="old_image" value="<?php echo $row['CEO_image']; ?>">
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                </form>
                <!--/Form -->
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
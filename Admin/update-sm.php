<!doctype html>
<html lang="en">

<?php include "header.php"; ?>

<?php
include "config.php";

if (isset($_POST['submit'])) {
    # code...
    
    if (empty($_FILES['new-image']['name'])) {
        $image_name = $_POST['old_image'];
            $sm_rank = 1;
        if ( $_POST['old_image']=="") {
            $image_name = "";
            $sm_rank = 0;
        } else {
            
        }
    } else {
        $errors = array();

        $file_name = $_FILES['new-image']['name'];
        $file_size = $_FILES['new-image']['size'];
        $file_tmp = $_FILES['new-image']['tmp_name'];
        $file_type = $_FILES['new-image']['type'];
        $temp = explode('.', $file_name);
        $file_ext = end($temp);

        $extensions = array("jpeg", "jpg", "png","JPEG","JPG","PNG");

        $sm_id = $_GET['id'];

        $sql1 = "SELECT * FROM services_machinary WHERE sm_id = {$sm_id}";
        $result = mysqli_query($conn, $sql1) or die("Query Failed : Select");
        $row = mysqli_fetch_assoc($result);

        unlink("upload/services machinary/" . $row['sm_image']);


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
        $target = "upload/services machinary/" . $new_name;
        $image_name = $new_name;
        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, $target);
        } else {
            print_r($errors);
            die();
        }
        $sm_rank = 1;
    }

    $sm_id = $_GET['id'];

    $sm_title = mysqli_real_escape_string($conn, $_POST['sm_title']);
    $sm_desc = mysqli_real_escape_string($conn, $_POST['sm_desc']);
    $sm_date = date("d M,Y");
    $sm_add_by = $_SESSION['username'];

    $sql = "UPDATE services_machinary SET sm_title='{$sm_title}',sm_image='{$image_name}',sm_desc='{$sm_desc}',sm_date='{$sm_date}',sm_add_by='{$sm_add_by}',sm_rank='{$sm_rank}' WHERE sm_id={$sm_id}";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("location: {$hostname}/Admin/services-machinary.php");
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

                $sm_id = $_GET['id'];
                $sql = "SELECT sm_id,sm_title,sm_desc,sm_image,sm_rank FROM services_machinary WHERE sm_id=$sm_id";

                $result = mysqli_query($conn, $sql) or die("Query Failed.");
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <!-- Form -->
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="post_title">Title</label>
                        <input type="text" name="sm_title" value="<?php echo $row['sm_title']; ?>" class="form-control"
                            autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1"> Description</label>
                        <textarea name="sm_desc" class="form-control" rows="5"><?php echo $row['sm_desc']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Machinary image</label>
                        <input type="file" name="new-image">
                        <img src="upload/services machinary/<?php echo $row['sm_image']; ?>" height="150px">
                        <input type="hidden" name="old_image" value="<?php echo $row['sm_image']; ?>">
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary" value="update" required />
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
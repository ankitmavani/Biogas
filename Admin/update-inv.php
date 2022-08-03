<!doctype html>
<html lang="en">

<?php include "header.php"; ?>

<?php
include "config.php";

if (isset($_POST['submit'])) {
    # code...
    if (empty($_FILES['new-image']['name'])) {
        if (empty($_FILES['old_image']['name'])) {
            $image_name = "";
            $sm_rank = 0;
        } else {
            $image_name = $_POST['old_image'];
            $sm_rank = 1;
        }
    } else {
        $errors = array();

        $file_name = $_FILES['new-image']['name'];
        $file_size = $_FILES['new-image']['size'];
        $file_tmp = $_FILES['new-image']['tmp_name'];
        $file_type = $_FILES['new-image']['type'];
        $temp = explode('.', $file_name);
        $file_ext = end($temp);

        $extensions = array("jpeg", "jpg", "png");

        $sm_id = $_GET['id'];

        $sql1 = "SELECT * FROM investor WHERE inv_id = {$sm_id}";
        $result = mysqli_query($conn, $sql1) or die("Query Failed : Select");
        $row = mysqli_fetch_assoc($result);

        unlink("upload/investor/" . $row['inv_image']);


        if (in_array($file_ext, $extensions) === false) {
            $errors[] = "This extension file not allowed, Please choose a JPG or PNG file.";
        }

        if ($file_size > 2097152) {
            $errors[] = "File size must be 2mb or lower.";
        }

        if ($file_size > 2097152) {
            $errors[] = "File size must be 2mb or lower.";
        }
        $new_name = time() . "-" . basename($file_name);
        $target = "upload/investor/" . $new_name;
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

    $sm_title = mysqli_real_escape_string($conn, $_POST['inv_title']);
    $sm_desc = mysqli_real_escape_string($conn, $_POST['inv_desc']);
    $sm_date = date("d M,Y");
    $sm_add_by = $_SESSION['username'];

    $sql = "UPDATE investor SET inv_title='{$sm_title}',inv_image='{$image_name}',inv_desc='{$sm_desc}',inv_date='{$sm_date}',inv_add_by='{$sm_add_by}',inv_rank='{$sm_rank}' WHERE inv_id={$sm_id}";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("location: {$hostname}/Admin/investor.php");
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
                $sql = "SELECT inv_id,inv_title,inv_desc,inv_image,inv_rank FROM investor WHERE inv_id=$sm_id";

                $result = mysqli_query($conn, $sql) or die("Query Failed.");
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <!-- Form -->
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="post_title">Title</label>
                        <input type="text" name="inv_title" value="<?php echo $row['inv_title']; ?>"
                            class="form-control" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1"> Description</label>
                        <textarea name="inv_desc" class="form-control"
                            rows="5"><?php echo $row['inv_desc']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">image</label>
                        <input type="file" name="new-image">
                        <img src="upload/investor/<?php echo $row['inv_image']; ?>" height="150px">
                        <input type="hidden" name="old_image" value="<?php echo $row['inv_image']; ?>">
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary" value="Save" required />
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
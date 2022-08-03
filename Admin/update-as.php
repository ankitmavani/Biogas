<!doctype html>
<html lang="en">

<?php include "header.php"; ?>

<?php
include "config.php";

if (isset($_POST['submit'])) {
    # code...
    if (empty($_FILES['new-image']['name'])) {
        $image_name = $_POST['old_image'];
        $as_rank = 1;
        if ($_POST['old_image']=="") {
            $image_name = "";
            $as_rank = 0;
        } else {
        }
        
    } else {
        $errors = array();

        $as_id = $_GET['id'];

        $sql1 = "SELECT * FROM about_as WHERE as_id = {$as_id}";
        $result = mysqli_query($conn, $sql1) or die("Query Failed : Select");
        $row = mysqli_fetch_assoc($result);

        unlink("upload/About as/" . $row['as_image']);

        $file_name = $_FILES['new-image']['name'];
        $file_size = $_FILES['new-image']['size'];
        $file_tmp = $_FILES['new-image']['tmp_name'];
        $file_type = $_FILES['new-image']['type'];
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
        $target = "upload/About as/" . $new_name;
        $image_name = $new_name;
        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, $target);
        } else {
            print_r($errors);
            die();
        }
        $as_rank = 1;
    }

    $sm_id = $_GET['id'];

    $as_title = mysqli_real_escape_string($conn, $_POST['as_title']);
    $as_desc = mysqli_real_escape_string($conn, $_POST['as_desc']);
    $as_date = date("d M,Y");
    $as_add_by = $_SESSION['username'];

    $sql = "UPDATE about_as SET as_title='{$as_title}',as_image='{$image_name}',as_desc='{$as_desc}',as_date='{$as_date}',as_add_by='{$as_add_by}',as_rank='{$as_rank}'
            WHERE as_id='{$sm_id}'";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("location: {$hostname}/Admin/About-us.php");
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

                $as_id = $_GET['id'];
                $sql = "SELECT as_id,as_title,as_desc,as_image,as_rank FROM about_as WHERE as_id=$as_id";

                $result = mysqli_query($conn, $sql) or die("Query Failed.");
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <!-- Form -->
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="post_title">Title</label>
                        <input type="text" name="as_title" value="<?php echo $row['as_title']; ?>" class="form-control"
                            autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1"> Description</label>
                        <textarea name="as_desc" class="form-control" rows="5"><?php echo $row['as_desc']; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="">About us image</label>
                        <input type="file" name="new-image">
                        <img src="upload/About as/<?php echo $row['as_image']; ?>" height="150px">
                        <input type="hidden" name="old_image" value="<?php echo $row['as_image']; ?>">
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary" value="UPDATE" required />
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
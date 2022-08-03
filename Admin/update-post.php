<!doctype html>
<html lang="en">

<?php include "header.php"; ?>

<?php
include "config.php";

if (isset($_POST['submit'])) {
    # code...

    if (empty($_FILES['new-image']['name'])) {
     $image_name = $_POST['old_image'];
        $post_rank = 1;
        if ($_POST['old_image']=="") {
            $image_name = "";
            $post_rank = 0;
        } 
    } else {
        $errors = array();

        $post_id = $_GET['id'];

        $sql1 = "SELECT * FROM post WHERE post_id = {$post_id}";
        $result = mysqli_query($conn, $sql1) or die("Query Failed : Select");
        $row = mysqli_fetch_assoc($result);

        unlink("upload/post/" . $row['post_image']);


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

        if ($file_size > 5097152) {
            $errors[] = "File size must be 5mb or lower.";
        }
        $new_name = time() . "-" . basename($file_name);
        $target = "upload/post/" . $new_name;
        $image_name = $new_name;
        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, $target);
        } else {
            print_r($errors);
            die();
        }
        $post_rank = 1;
    }

    $post_title = mysqli_real_escape_string($conn, $_POST['post_title']);
    $post_desc = mysqli_real_escape_string($conn, $_POST['post_desc']);
    $post_date = date("d M,Y");
    $post_add_by = $_SESSION['username'];

    $sql = "UPDATE post SET post_title='{$post_title}',post_image='{$image_name}',post_desc='{$post_desc}',post_date='{$post_date}',post_add_by='{$post_add_by}',post_rank='{$post_rank}'
            WHERE post_id={$_GET["id"]}";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("location: {$hostname}/Admin/post.php");
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

                $post_id = $_GET['id'];
                $sql = "SELECT post_id,post_title,post_desc,post_image,post_rank FROM post WHERE post_id=$post_id";

                $result = mysqli_query($conn, $sql) or die("Query Failed.");
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <!-- Form -->
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="post_title">Title</label>
                        <input type="text" name="post_title" value="<?php echo $row['post_title']; ?>"
                            class="form-control" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1"> Description</label>
                        <textarea name="post_desc" class="form-control" rows="5"
                            required><?php echo $row['post_desc']; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="">Post image</label>
                        <input type="file" name="new-image">
                        <img src="upload/post/<?php echo $row['post_image']; ?>" height="150px">
                        <input type="hidden" name="old_image" value="<?php echo $row['post_image']; ?>">
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
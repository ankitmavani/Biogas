<!doctype html>
<html lang="en">

<?php include "header.php"; ?>

<?php
include "config.php";

if (isset($_POST['submit'])) {

    $setting_location = mysqli_real_escape_string($conn, $_POST['setting_location']);
    $setting_email = mysqli_real_escape_string($conn, $_POST['setting_email']);
    $setting_contect = mysqli_real_escape_string($conn, $_POST['setting_contect']);
    $setting_video_link = mysqli_real_escape_string($conn, $_POST['setting_video_link']);


    $sql = "UPDATE setting SET setting_location='{$setting_location}',setting_video_link='{$setting_video_link}',setting_email='{$setting_email}',setting_contect='{$setting_contect}'";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("location: {$hostname}/Admin/setting.php");
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

                $setting_id = $_GET['id'];
                $sql = "SELECT setting_id,setting_location,setting_contect,setting_email,setting_video_link FROM setting WHERE setting_id=$setting_id";

                $result = mysqli_query($conn, $sql) or die("Query Failed.");
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <!-- Form for show -->
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data"
                    autocomplete="off">
                    <div class="form-group">
                        <input type="hidden" name="setting_id" class="form-control" value="<?php echo $row['sb_id']; ?>"
                            placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTile">Location</label>
                        <input type="text" name="setting_location" class="form-control" id="exampleInputUsername"
                            value="<?php echo $row['setting_location']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTile">E mail</label>
                        <input type="email" name="setting_email" class="form-control" id="exampleInputUsername"
                            value="<?php echo $row['setting_email']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTile">Phone number</label>
                        <input type="text" name="setting_contect" class="form-control" id="exampleInputUsername"
                            value="<?php echo $row['setting_contect']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTile">You tube video link</label>
                        <input type="text" name="setting_video_link" class="form-control" id="exampleInputUsername"
                            value="<?php echo $row['setting_video_link']; ?>">
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
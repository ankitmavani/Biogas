<!DOCTYPE html>
<html>
<?php include "header.php"; ?>

<body class="">
    <!-- Nav start  -->
    <?php include "nav-bar.php"; ?>
    <!-- nav End -->
    <?php
    include "Admin/config.php";

    $sm_id = $_GET['id'];
    $sql = "SELECT sm_id,sm_title,sm_desc,sm_image,sm_rank FROM services_machinary WHERE sm_id=$sm_id";

    $result = mysqli_query($conn, $sql) or die("Query Failed.");
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
    ?>
    <div class="container">
        <div class="head machinery-4"><?php echo $row['sm_title']; ?></div>
    </div>
    <div class="container">
        <div class="row">
            <div class="mx-auto col-7">
                <img class="w-100" src="Admin/upload/services machinary/<?php echo $row['sm_image']; ?>">
            </div>
            <div class="mx-auto col-12">
                <?php echo $row['sm_desc']; ?>
            </div>
        </div>
    </div>
    <?php }
    } ?>

    <?php include "footer.php"; ?>
</body>

</html>
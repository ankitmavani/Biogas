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
    $sql = "SELECT inv_id,inv_title,inv_desc,inv_image,inv_rank FROM investor WHERE inv_id=$sm_id";

    $result = mysqli_query($conn, $sql) or die("Query Failed.");
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
    ?>
    <div class="container">
        <div class="head machinery-4 mt-5 mb-4"><?php echo $row['inv_title']; ?></div>
    </div>
    <div class="container">

        <div class="row">
            <div class="mx-auto col-12">

                <?php echo $row['inv_desc']; ?>
            </div>
        </div>

    </div>
    <?php }
    } ?>
    <?php include "footer.php"; ?>
</body>

</html>
<!DOCTYPE html>
<html>
<?php include "header.php"; ?>

<body class="">
    <!-- Nav start  -->
    <?php include "nav-bar.php"; ?>
    <!-- nav End -->
    <?php
	include "Admin/config.php";

	$post_id = $_GET['id'];
	$sql = "SELECT post_id,post_title,post_desc,post_image,post_rank FROM post WHERE post_id=$post_id";

	$result = mysqli_query($conn, $sql) or die("Query Failed.");
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
	?>
    <div class="container">
        <div class="head machinery-4"><?php echo $row['post_title']; ?></div>
    </div>
    <div class="container">
        <div class="row">
            <div class="mx-auto col-7">
                <img class="w-100" src="Admin/upload/post/<?php echo $row['post_image']; ?>">
            </div>
            <div class="mx-auto col-12">
                <?php echo $row['post_desc']; ?>
            </div>
        </div>
    </div>
    <?php }
	} ?>

    <?php include "footer.php"; ?>
</body>

</html>
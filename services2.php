<!DOCTYPE html>
<html>
<?php include "header.php"; ?>

<body class="">
    <?php include "nav-bar.php"; ?>
    <div class="col-12 p-0">
        <img class="w-100" src="assets/img/biogas_plant.png">
    </div>
    <div class="container">
        <?php
		include "Admin/config.php";
		$sql = "SELECT * FROM services_bio ORDER BY sb_id DESC";
		$result = mysqli_query($conn, $sql) or die("Query Failed.");
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
		?>
        <div class="mx-auto col-8">
            <img class="w-100" src="Admin/upload/services bio/<?php echo $row['sb_image']; ?>">
        </div>
        <?php }
		} ?>
    </div>

    <?php include "footer.php"; ?>
</body>

</html>
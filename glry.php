<!DOCTYPE html>
<html>
<?php include "header.php";

include "Admin/config.php";

?>

<body class="">
    <?php include "nav-bar.php"; ?>
    <div class="col-12 p-0">
        <img class="w-100" src="assets/img/glry.png">
    </div>
    <div class="container main_detail">
        <div class="head mb-4">Our References / Gellery</div>
        <div class="row text-center">
            <?php
			$sql = "SELECT * FROM client_project_management ORDER BY cpm_id DESC";
			$result = mysqli_query($conn, $sql) or die("Query Failed.");
			if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) {
			?>
            <div class="col-6 col-md-4 img_main">
                <div class="m-1"><img class="w-100"
                        src="Admin/upload/client project management/<?php echo $row['cpm_image']; ?>">
                </div>
            </div>

            <?php }
			} ?>
        </div>
    </div>
    </div>
    <?php include "footer.php"; ?>
</body>

</html>
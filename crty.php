<!DOCTYPE html>
<html>

<?php include "header.php"; ?>

<body class="">
    <!-- Nav start  -->
    <?php include "nav-bar.php"; ?>
    <!-- nav End -->
    <div class="col-12 p-0">
        <img class="w-100" src="assets/img/crty.png">
    </div>
    <div class="container main_detail">
        <div class="head mb-4">Certificates and Awards</div>
        <div class="row text-center">
            <?php
			include "Admin/config.php";
			$sql = "SELECT * FROM certificate";
			$result = mysqli_query($conn, $sql) or die("Query Failed.");
			if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="col-4 img_main  mx-auto">
                <div class="m-1"><img class="w-100" src="Admin/upload/certificate/<?php echo $row['cer_image']; ?>">
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
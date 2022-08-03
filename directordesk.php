<!DOCTYPE html>
<html>
<?php include "header.php"; ?>

<body class="">
    <?php include "nav-bar.php"; ?>
    <div class="col-12 p-0">
        <img class="w-100" src="assets/img/drctr.png">
    </div>
    <div class="container">
        <?php
        include "Admin/config.php";


        $sql = "SELECT CEO_id,CEO_name,CEO_desc,CEO_image FROM ceo_info";

        $result = mysqli_query($conn, $sql) or die("Query Failed.");
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="head mt-5"><?php echo $row['CEO_name']; ?></div>
        <div data-aos="fade-right" 
                    data-aos-duration="2000"  class="row mt-3">
            <div  class="col-md-7 text-justify">
                <div>
                    <?php echo $row['CEO_desc']; ?>
                </div>
            </div>
            <div data-aos="fade-left" 
                    data-aos-duration="2000"  class="col-md-5">
                <img  class="w-100" src="Admin/upload/CEO/<?php echo $row['CEO_image']; ?>">
            </div>
        </div>
        <?php }
        } ?>
    </div>
    </div>
    <?php include "footer.php"; ?>
</body>

</html>
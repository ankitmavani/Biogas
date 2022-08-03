<!DOCTYPE html>
<html>
<?php include "header.php"; ?>

<body class="">
    <?php include "nav-bar.php"; ?>
    <div class="col-12 p-0">
        <img class="w-100" src="assets/img/mtcnry.png">
    </div>
    <div class="container">

        <div class="main_detail">
            <?php
            include "Admin/config.php";
            $sql = "SELECT sm_id,sm_title,sm_desc,sm_image,sm_rank FROM services_machinary ORDER BY sm_id DESC";

            $result = mysqli_query($conn, $sql) or die("Query Failed.");
            if (mysqli_num_rows($result) > 0) {
                $flag = 0;

                while ($row = mysqli_fetch_assoc($result)) {
                    $rank = $row['sm_rank'];
                    if ($rank == 0) {

            ?><div class="col-12 p-0 mt-5">
                <div class="head_details">
                    <div class="head mb-4"><?php echo $row['sm_title']; ?></div>
                    <?php echo substr($row['sm_desc'], 0, 400); ?>
                    <a href="blog2-sm.php?id=<?php echo $row['sm_id']; ?>">more...</a>
                </div>
            </div>
            <?php } else {
                        if ($flag == 0) { ?>
            <div class="row mt-5">
                <div class="col-md-6 head_details">
                    <div class="head mb-4"><?php echo $row['sm_title']; ?></div>
                    <?php echo substr($row['sm_desc'], 0, 250); ?></a>
                    <a href="blog-sm.php?id=<?php echo $row['sm_id']; ?>">more...</a>
                </div>
                <div class="col-md-6"><img class="w-100"
                        src="Admin/upload/services machinary/<?php echo $row['sm_image']; ?>">

                </div>

            </div> <?php $flag = 1;
                                } else { ?>
            <div class="row mt-5">
                <div class="col-md-6"><img class="w-100"
                        src="Admin/upload/services machinary/<?php echo $row['sm_image']; ?>"></div>
                <div class="col-md-6 head_details">
                    <div class="head2 text-right mb-4"><?php echo $row['sm_title']; ?></div>
                    <?php echo substr($row['sm_desc'], 0, 250); ?></a>
                    <a href="blog-sm.php?id=<?php echo $row['sm_id']; ?>">more...</a>
                </div>

            </div><?php $flag = 0;
                                }
                            }
                        }
                    } ?>

        </div>
    </div>
    <?php include "footer.php"; ?>
</body>

</html>
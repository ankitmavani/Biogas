<!DOCTYPE html>
<html>
<?php include "header.php"; ?>

<body class="">
    <!-- Nav start  -->
    <?php include "nav-bar.php"; ?>
    <!-- nav End -->
    <div class="col-12 p-0">
        <img class="w-100" src="assets/img/investor.png">
    </div>
    <div class="container">
        <div class="main_detail">
 	
            <?php
            include "Admin/config.php";
            $sql = "SELECT inv_id,inv_title,inv_desc,inv_image,inv_rank FROM investor ORDER BY inv_id DESC";

            $result = mysqli_query($conn, $sql) or die("Query Failed.");
            if (mysqli_num_rows($result) > 0) {
                $flag = 0;

                while ($row = mysqli_fetch_assoc($result)) {
                    $rank = $row['inv_rank'];
                    if ($rank == 0) {

            ?><div class="col-12 p-0 mt-5">
                <div class="head_details">
                    <div class="head mb-4"><?php echo $row['inv_title']; ?></div>
                    <?php echo substr($row['inv_desc'], 0, 400); ?>
                    <a href="blog2-inv.php?id=<?php echo $row['inv_id']; ?>">more...</a>
                </div>
            </div>
            <?php } else {
                        if ($flag == 0) { ?>
            <div class="row mt-5">
                <div class="col-6 head_details">
                    <div class="head mb-4"><?php echo $row['inv_title']; ?></div>
                    <?php echo substr($row['inv_desc'], 0, 250); ?></a>
                    <a href="blog-inv.php?id=<?php echo $row['inv_id']; ?>">more...</a>
                </div>
                <div class="col-6"><img class="w-100"
                        src="Admin/upload/investor/<?php echo $row['inv_image']; ?>">

                </div>

            </div> <?php $flag = 1;
                                } else { ?>
            <div class="row mt-5">
                <div class="col-6"><img class="w-100"
                        src="Admin/upload/investor/<?php echo $row['inv_image']; ?>"></div>
                <div class="col-6 head_details">
                    <div class="head2 text-right mb-4"><?php echo $row['inv_title']; ?></div>
                    <?php echo substr($row['inv_desc'], 0, 250); ?></a>
                    <a href="blog-inv.php?id=<?php echo $row['inv_id']; ?>">more...</a>
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
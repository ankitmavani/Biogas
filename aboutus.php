<!DOCTYPE html>
<html>
<?php include "header.php"; ?>

<body class="">
    <?php include "nav-bar.php"; ?>
    <div class="col-12 p-0">
        <img class="w-100" src="assets/img/about_us.png">
    </div>
    <div class="container">
        <div class="main_detail">
            <?php include "Admin/config.php";
            $sql = "SELECT as_id,as_title,as_desc,as_image,as_rank FROM about_as ORDER BY as_id DESC";

            $result = mysqli_query($conn, $sql) or die("Query Failed.");
            if (mysqli_num_rows($result) > 0) {
                $flag = 0;

                while ($row = mysqli_fetch_assoc($result)) {
                    $rank = $row['as_rank'];
                    if ($rank == 0) { ?>
            <div class="head"><?php echo $row['as_title']; ?></div>
            <div class="row mt-4">
                <div class="col-12 head_details">
                    <?php echo $row['as_desc'];  ?>
                </div>
            </div><?php  } else {
                                if ($flag == 0) { ?>
            <div class="row mt-4">
                <div class="col-6 head_details">
                    <div class="head mb-4"><?php echo $row['as_title']; ?></div>
                    <?php echo $row['as_desc'];  ?>
                </div>
                <div class="col-6"><img class="w-100" src="Admin/upload/About as/<?php echo $row['as_image']; ?>"></div>
            </div><?php $flag = 1;
                                } else { ?>
            <div class="row mt-4">
                <div class="col-6"><img class="w-100" src="Admin/upload/About as/<?php echo $row['as_image']; ?>"></div>
                <div class="col-6 head_details">
                    <div class="head2 text-right mb-4"><?php echo $row['as_title']; ?></div>
                    <?php echo $row['as_desc'];  ?>
                </div>

            </div><?php $flag = 0;
                                }
                            }
                        }
                    } ?>
        </div>

    </div>
    <?php include "footer.php";  ?>
</body>

</html>
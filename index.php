<!DOCTYPE html>
<html>

<?php include  "header.php"; ?>

<body class="">
    <?php include "nav-bar.php"; ?>
 <div class="container-fluid">
      <div class="hero_img ">
                    <!--<img class="w-100"src="assets/img/bio.png">-->
            <!--<div data-aos="fade-up" class=" qut text-white text-center ">-->
            <!--    Green enrgy for<br>-->
            <!--    the green <i>future.</i>-->
            <!--</div>-->
        </div>
 </div>
    <div class="container">
        <!-- hero start -->
        <!--<div class="hero_img">-->

        <!--    <div data-aos="fade-up" class=" qut text-white text-center ">-->
        <!--        Green enrgy for<br>-->
        <!--        the green <i>future.</i>-->
        <!--    </div>-->
        <!--</div>-->

        <!-- hero end -->
        <?php
        include "Admin/config.php";
        $sql = "SELECT post_id,post_title,post_desc,post_image,post_rank FROM post ORDER BY post_id DESC";

        $result = mysqli_query($conn, $sql) or die("Query Failed.");
        if (mysqli_num_rows($result) > 0) {
            $flag = 0;

            while ($row = mysqli_fetch_assoc($result)) {
                $rank = $row['post_rank'];
                if ($rank == 1) {
                    if ($flag == 0) {
        ?>
        <!--IMAGE DESC 1 -->
        <div class="main_detail main_details_fst">
            <div data-aos="fade-down" data-aos-easing="linear" data-aos-duration="2000" class="head">
                <?php echo $row['post_title']; ?></div>
            <div class="row mt-4">
                <div data-aos="fade-right" 
                    data-aos-duration="2000" class="col-lg-7 head_details">
                    <?php echo nl2br(substr($row['post_desc'], 0, 1000)); ?><a
                        href="blog.php?id=<?php echo $row['post_id']; ?>">more...</a>
                </div>
                <div     data-aos="fade-left" 
                    data-aos-duration="2000"   class=" col-lg-5">
                    <img class="w-100" src="Admin/upload/post/<?php echo $row['post_image']; ?>">
                </div>
            </div>
        </div><?php $flag = 1;
                            } else { ?>
        <!--IMAGE DESC 1 END -->
        <!-- IMAGE DESC 2 -->
        <div class="main_detail">
            <div  data-aos="fade-down" 
                    data-aos-duration="2000"   class=" head2 text-right"><?php echo $row['post_title']; ?></div>
            <div class="row mt-4">
                <div class="col-lg-5">
                    <img  data-aos="fade-right"
                    data-aos-duration="2000"   class="w-100" src="Admin/upload/post/<?php echo $row['post_image']; ?>">
                </div>
                <div  data-aos="fade-left"
                    data-aos-duration="2000"   class="col-lg-7 head_details">
                    <?php echo nl2br(substr($row['post_desc'], 0, 1000)); ?><a
                        href="blog.php?id=<?php echo $row['post_id']; ?>">more...</a>
                </div>
            </div>
        </div><?php $flag = 0;
                            }
                        } else {
                            if ($flag == 0) { ?>
        <!-- IMAGE DESC 2 END -->


        <!-- DESC 1 -->
        <div class=" main_detail">
            <div   data-aos="fade-right" 
                    data-aos-duration="2000"   class="head"><?php echo $row['post_title']; ?></div>
            <div class="row mt-4">
                <div  data-aos="fade-left" 
                    data-aos-duration="2000"   class="col-12 head_details">
                    <?php echo nl2br(substr($row['post_desc'], 0, 1000)); ?><a
                        href="blog2.php?id=<?php echo $row['post_id']; ?>">more...</a>
                </div>
            </div>
        </div><?php $flag = 1;
                            } else { ?>
        <!-- DESC END -->
        <!--DESC 2 -->
        <div class=" main_detail">
            <div  data-aos="fade-left" 
                    data-aos-duration="2000"   class="head2 text-right"><?php echo $row['post_title']; ?></div>
            <div class="row mt-4">
                <div  data-aos="fade-right" 
                    data-aos-duration="2000"   class="col-12 head_details">
                    <?php echo nl2br(substr($row['post_desc'], 0, 1000)); ?><a
                        href="blog2.php?id=<?php echo $row['post_id']; ?>">more...</a>
                </div>
            </div>
        </div><?php $flag = 0;
                            }
                        }
                    }
                }  ?>
        <!--DESC 2 END -->
        <?php $sql = "SELECT setting_video_link FROM setting";

        $result = mysqli_query($conn, $sql) or die("Query Failed.");
        $c = 0;
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                if ($row["setting_video_link"] != NULL) {
        ?>
        <div  data-aos="fade-right" 
                    data-aos-duration="2000"   class="head mb-4 mt-5">Video</div>
        <div  data-aos="fade-left" 
                    data-aos-duration="2000"   class=" video_main">
            <?php



                        ?>
            <div class="video">
            </div>

            <div  class="grn_lyr">
                <a target="blank" href="<?php echo $row['setting_video_link']; ?>"><img class="ply_btn"
                        src="assets/img/ply2.png"></a>
            </div>

        </div>
        <?php
                }
            }
        }
        ?>


        <!-- -->

        <div class="main_detail">
            <?php $sql = "SELECT * FROM certificate";
            $result = mysqli_query($conn, $sql) or die("Query Failed.");
            $cer = 0;
            if (mysqli_num_rows($result) > 0) {
                if ($cer == 0) {
            ?>
            <div  data-aos="fade-left" 
                    data-aos-duration="2000"   class="head2 text-right">Certificate</div>
            <div class="row mt-4">
                <div  data-aos="fade-up" 
                    data-aos-duration="2000"   class="owl-carousel main_slider2"><?php } ?>
                    <?php

                        while ($row = mysqli_fetch_assoc($result)) { ?>

                    <div><img class="w-100" src="Admin/upload/certificate/<?php echo $row['cer_image']; ?>"></div>

                    <?php }
                        ?>
                </div>
            </div>
            <div  data-aos="fade-up" 
                    data-aos-duration="2000"   class="text-center mt-4">
                <div class="btn btn_gen text-decoration-none text-white">
                    <a class="text-decoration-none text-white" href="crty.php">
                        View All Projects</a>
                </div>
            </div>
            <?php } ?>

        </div>
        <!-- -->
        <div class="main_detail">
            <?php
            $sql = "SELECT * FROM flow_chart ORDER BY fc_id DESC";
            $result = mysqli_query($conn, $sql) or die("Query Failed.");
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {

            ?>

            <div  data-aos="fade-right" 
                    data-aos-duration="2000"   class="head">Flow Chart</div>
            <div class="row mt-4">
                <div  data-aos="fade-left" 
                    data-aos-duration="2000"   class="col-12 head_details">
                    <img src="Admin/upload/flow chart/<?php echo $row['fc_image']; ?>">
                </div>
            </div>
            <?php }
            } ?>
        </div>


        <div class="main_detail">
            <?php
            $sql = "SELECT * FROM client_project_management ORDER BY cpm_id DESC";
            $result = mysqli_query($conn, $sql) or die("Query Failed.");
            if (mysqli_num_rows($result) > 0) {
                $cl = 0;
                if ($cl == 0) {

            ?>
            <div  data-aos="fade-left"
                    data-aos-duration="2000"   class="head2 text-right">Client Project Management</div>
            <div class="row mt-4">
                <div  data-aos="fade-up" 
                    data-aos-duration="2000"   class="owl-carousel main_slider"><?php } ?>
                    <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>


                    <div><img src="Admin/upload/client project management/<?php echo $row['cpm_image']; ?>"> </div>

                    <?php }
                        ?></div>
            </div>
            <div  data-aos="fade-up" 
                    data-aos-duration="2000"   class="text-center">
                <div class="btn btn_gen text-decoration-none text-white">
                    <a class="text-decoration-none text-white" href="glry.php">
                        View All Projects</a>
                </div>
            </div><?php } ?>
        </div>
        <div class="main_detail">
            <div class="head">Inquiry</div>
            <div class=" mt-4">
                <form class="" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                    <div class="row">
                        <div  data-aos="fade-right" 
                    data-aos-duration="2000"   class="form-group col-12 col-md-6">
                            <label for="name">Your Name:</label>
                            <input type="name" class="form-control inqry_area" name="name"
                                placeholder="Enter Your Name here..." required>
                        </div>
                        <div  data-aos="fade-left" 
                    data-aos-duration="2000"   class="form-group col-md-6">
                            <label for="name">Your Mobile Number:</label>
                            <input type="tel" name="phone" class="form-control inqry_area"
                                placeholder="Enter Your Mobile Number here..." required>
                        </div>
                        <div  data-aos="fade-right" 
                    data-aos-duration="2000"   class="form-group col-md-6">
                        <label for="email">Email:</label>
                        <input type="email" name="email" class="form-control inqry_area" id="email"
                            placeholder="Enter email" name="email" required>
                        </div>
                        <div  data-aos="fade-up" 
                    data-aos-duration="2000"   class="col-12">
                        <div  class="form-group">
                            <label for="exampleFormControlTextarea1">How can we help You?</label>
                            <textarea name="comment" class="form-control inqry_area" id="exampleFormControlTextarea1"
                                rows="5" required></textarea>
                        </div>
                    </div>
                    </div>
                    
                    
                    <div  data-aos="fade-down" 
                    data-aos-duration="2000"   class="text-center">
                        <div class="btn btn_gen">
                            <input style="border: none; background-color:rgba(0, 0, 0, 0); color:#ffffff;"
                                class="bg-none" type="submit" name="submit">
                        </div>
                    </div>
                </form>
                <?php

                if (isset($_POST['submit'])) {




                    $in_name = mysqli_real_escape_string($conn, $_POST['name']);
                    $in_phone = $_POST['phone'];
                    $in_email = mysqli_real_escape_string($conn, $_POST['email']);
                    $in_com = mysqli_real_escape_string($conn, $_POST['comment']);
                    $date = date("d M, Y");


                    $sql = "INSERT INTO inqry(in_title,in_desc,in_date,in_phone,in_email)
            					  VALUES('{$in_name}','{$in_com}','{$date}',{$in_phone},'{$in_email}');";

                    if (mysqli_query($conn, $sql)) {
                    } else {
                        echo "<div class='alert alert-danger'>Query Failed.</div>";
                    }
                    # code...
                }

                ?>
            </div>
        </div>
    </div>
    <?php include "footer.php"; ?>
</body>

</html>
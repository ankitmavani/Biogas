<footer class="main_detail p-4  pt-5">
    <div class="row">
        <div class="col-md-4">
            <img class="w-100" src="assets/img/akshar-logo3.png">
        </div>
        <div class="col-md-4">
            <div class="head_ftr">
                Contact us
            </div>
            <?php

            include "Admin/config.php";
            $sql = "SELECT setting_location,setting_contect,setting_email,setting_id FROM setting where setting_id=1";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="row pt-3">
                <div class="col-1 text-right pr-0"><i class="ftr_icon fas fa-map-marker-alt"></i></div>
                <div class="col text-white"><a href="https://maps.app.goo.gl/LPiCYj6Duwo2tzKF9" class="text-white text-decoration-none"><?php echo nl2br($row['setting_location']); ?></a> </div>
            </div>
            <div class="row pt-2">
                <div class="col-1 text-right pr-0"><i class="ftr_icon fas fa-phone-alt"></i></div>
                <div class="col text-white"><a class="text-decoration-none text-white" href="tel:<?php echo $row['setting_contect']; ?>"><?php echo nl2br($row['setting_contect']); ?></a></div>
            </div>
            <div class="row pt-2">
                <div class="col-1 text-right pr-0"><i class="ftr_icon fas fa-envelope"></i></div>
                <div class="col text-white"><a class="text-decoration-none text-white" href="mailto:<?php echo $row['setting_email']; ?>"><?php echo $row['setting_email']; ?></a></div>
            </div>
            <?php
                }
            } ?>
        </div>
        <div class="col-md-4">
            <div class="head_ftr">
                Information
            </div>
            <div class="row pt-3">
                <div class="col-1 text-right pr-0"><i class="ftr_icon fas fa-address-card"></i></div>
                <div class="col text-white"><a class="text-decoration-none text-white" href="aboutus.php">About us</a>
                </div>
            </div>
             <div class="row pt-3 mb-4 mb-md-0">
                <div class="col-1 text-right pr-0"><i class="ftr_icon fas fa-diagnoses"></i></div>
                <div class="col text-white"><a class="text-decoration-none text-white" href="investor.php">Investor</a>
                </div>
            </div>
            <!-- <div class="row pt-2">
                <div class="col-1 text-right pr-0"><i class="ftr_icon fas fa-hand-paper"></i></div>
                <div class="col text-white">Privecy & policy</div>
            </div>
            <div class="row pt-2">
                <div class="col-1 text-right pr-0"><i class="ftr_icon fas fa-file-alt"></i></div>
                <div class="col text-white">Terms & condition</div>
            </div> -->
        </div>
    </div>
    <div class="container" style="border-top: 2px solid #fff;">
        <div class="row text-center mt-3">
            <div class="col h1 text-white social_icon">
                <a href="https://www.facebook.com/aksharbiosciencetechnology-107545124034006/"><i class="fab fa-facebook"></i></a>
            </div>
            <div class="col h1 text-white social_icon">
                <a href="https://www.youtube.com/watch?v=qfEGvkW4dsE&feature=youtu.be"><i class="fab fa-youtube"></i></a>
            </div>
            <div class="col h1 text-white social_icon">
                <a href="https://twitter.com/LtdAkshar?s=09"><i class="fab fa-twitter"></i></a>
            </div>
            <div class="col h1 text-white social_icon">
                <a href="https://www.instagram.com/aksharbiotech/?igshid=fc6a8csz84a6"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>
</footer>


<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
AOS.init();
</script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-159290588-2">
</script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-159290588-2');
</script>
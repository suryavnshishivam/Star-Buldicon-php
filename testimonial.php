<?php 
include("include/connaction.php");
include("header.php");
?>


    <?php
$result_address_footer=$connectiondb->query("SELECT *  FROM address_footer");
$result_news=$connectiondb->query("SELECT *  FROM news_footer");
$result_Testimonial=$connectiondb->query("SELECT *  FROM testimonial");
$result_header=$connectiondb->query("SELECT *  FROM header");
$result_header_nav=$connectiondb->query("SELECT *  FROM header_nav");
?>


    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Testimonial</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                  
                    <li class="breadcrumb-item text-white active" aria-current="page">Testimonial</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

 <!-- Testimonial Start -->
 <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="section-title text-center">
                <h1 class="display-5 mb-5">Testimonial</h1>
            </div>
            <div class="owl-carousel testimonial-carousel">
            <?php
                    while ($ggg = mysqli_fetch_assoc($result_Testimonial)) {
                    ?> 
                <div class="testimonial-item text-center">
                    <img class="img-fluid bg-light p-2 mx-auto mb-3" src="admin/Testimonial_img/<?= $ggg['image']; ?>" style="width: 90px; height: 90px;">
                    <div class="testimonial-text text-center p-4">
                        <p><?php echo $ggg['bio']; ?></p>
                        <h5 class="mb-1"><?php echo $ggg['name']; ?></h5>
                        <span class="fst-italic"><?php echo $ggg['profession']; ?></span>
                    </div>
                </div>
                <?php } ?>
                
               
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
        
 
    <?php include('footer.php');?>

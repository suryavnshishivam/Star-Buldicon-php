<?php 
include("include/connaction.php");
include("header.php");

?>

    <?php 

$result_features_two=$connectiondb->query("SELECT *  FROM features_two");
$result_features_support=$connectiondb->query("SELECT *  FROM features_support");

?>



    <!-- Page Header Start -->
    <div class="container-fluid page-header3 py-5 mb-5">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Feature</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                  
                    <li class="breadcrumb-item text-white active" aria-current="page">Feature</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Feature Start -->
    <div class="container-fluid bg-light overflow-hidden my-5 px-lg-0">
        <div class="container feature px-lg-0">
            <div class="row g-0 mx-lg-0">
            <?php
                    while ($ggg = mysqli_fetch_assoc($result_features_two)) {
                    ?>
                <div class="col-lg-6 feature-text py-5 wow fadeIn" data-wow-delay="0.5s">
                    <div class="p-lg-5 ps-lg-0">
                        <div class="section-title text-start">
                            <h1 class="display-5 mb-4"><?php echo $ggg['title']; ?></h1>
                        </div>
                        <p class="mb-4 pb-2"><?php echo $ggg['bio']; ?></p>
                       
                        <div class="row g-4">
                        <?php
                    while ($ddd = mysqli_fetch_assoc($result_features_support)) {
                    ?>
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-white" style="width: 60px; height: 60px;">
                                    <img class="img-fluid" src="admin/Support1/<?= $ddd['image']; ?>" alt="">
                                    </div>
                                    <div class="ms-4">
                                        <p class="mb-2"><?php echo $ddd['title']; ?></p>
                                        <h5 class="mb-0"><?php echo $ddd['service']; ?></h5>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
               
                <div class="col-lg-6 pe-lg-0" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute img-fluid w-100 h-100" src="admin/featuries_img2/<?= $ggg['image']; ?>" style="object-fit: cover;" alt="">
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- Feature End -->
      
 
    <?php include('footer.php');?>
   
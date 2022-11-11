<?php 
include("include/connaction.php");
include("header.php");

?>
   
<?php
$result_about = $connectiondb->query("SELECT *  FROM about");
$result_features_list = $connectiondb->query("SELECT *  FROM features_list");
$result_about_count = $connectiondb->query("SELECT *  FROM count");
$result_team=$connectiondb->query("SELECT *  FROM team");


?>





    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">About Us</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">About</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


      <!-- Feature Start -->
      <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
            <?php
                $i = 0;
                foreach ($result_features_list as $row) {
                    $actives = '';
                    if ($i == 0) {
                        $actives = 'active';
                    }
                ?>
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.1s">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="d-flex align-items-center justify-content-center bg-light" style="width: 60px; height: 60px;">
                        <img class="img-fluid" src="admin/Featuries_img/<?= $row['img']; ?>" alt="">
                        </div>
                        <h1 class="display-1 text-light mb-0"><?php echo $row['features_id']; ?></h1>
                    </div>
                    <h5><?php echo $row['features_name']; ?></h5>
                </div>
                
                <?php $i++; }?>
            </div>
        </div>
    </div>
    <!-- Feature Start -->


  <!-- About Start -->
  <div class="container-fluid bg-light overflow-hidden my-5 px-lg-0">
        <div class="container about px-lg-0">
            <div class="row g-0 mx-lg-0">
            <?php
                $i = 0;
                foreach ($result_about as $row) {
                    $actives = '';
                    if ($i == 0) {
                        $actives = 'active';
                    }
                ?>
                <div class="col-lg-6 ps-lg-0" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute img-fluid w-100 h-100" src="admin/about_image/<?= $row['image']; ?>"  style="object-fit: cover;" alt="">
                    </div>
                </div>
                <div class="col-lg-6 about-text py-5 wow fadeIn" data-wow-delay="0.5s">
                    <div class="p-lg-5 pe-lg-0">
                        <div class="section-title text-start">
                            <h1 class="display-5 mb-4"><?php echo $row['title']; ?></h1>
                        </div>
                        <p class="mb-4 pb-2"><?php echo $row['heading']; ?></p>
                        <?php $i++; }?>

                        <div class="row g-4 mb-4 pb-2">
                        <?php
                $i = 0;
                foreach ($result_about_count as $row) {
                    $actives = '';
                    if ($i == 0) {
                        $actives = 'active';
                    }
                ?>
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.1s">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-white" style="width: 60px; height: 60px;">
                                        <i class="fa fa-users fa-2x text-primary"></i>
                                    </div>
                                    <div class="ms-3">

                                        <h2 class="text-primary mb-1" data-toggle="counter-up"> <?php echo $row['happy_client']; ?></h2>
                                        <p class="fw-medium mb-0">Happy Clients</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.3s">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-white" style="width: 60px; height: 60px;">
                                        <i class="fa fa-check fa-2x text-primary"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h2 class="text-primary mb-1" data-toggle="counter-up"><?php echo $row['project_done']; ?></h2>
                                        <p class="fw-medium mb-0">Projects Done</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php $i++; }?>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    
    <?php include('footer.php');?> 
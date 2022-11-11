<?php 
$page='home';
include("include/connaction.php");
include("header.php");

?>

    <?php
$result = $connectiondb->query("SELECT *  FROM banner");
$result_features_list = $connectiondb->query("SELECT *  FROM features_list");
$result_about = $connectiondb->query("SELECT *  FROM about");
$result_about_count = $connectiondb->query("SELECT *  FROM count");
$result_features_two=$connectiondb->query("SELECT *  FROM features_two");
$result_features_support=$connectiondb->query("SELECT *  FROM features_support");
$result_project_list=$connectiondb->query("SELECT *  FROM project_list");
$result_project_post=$connectiondb->query("SELECT *  FROM project_post");
$result_quote=$connectiondb->query("SELECT *  FROM quote");

$result_Testimonial=$connectiondb->query("SELECT *  FROM testimonial");

?>






<div class="container-fluid p-0 pb-5">
        <div class="owl-carousel header-carousel position-relative">
    <?php

                $i = 0;
                foreach ($result as $row) {
                    $actives = '';
                    if ($i == 0) {
                        $actives = 'active';
                    }
                ?>
   
            <div class="owl-carousel-item position-relative">
        
           
          
                    <img class="img-fluid" src="admin/banner_img/<?= $row['image']; ?>" alt="" >
           
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(53, 53, 53, .7);">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-8 text-center">
                                
                                <!-- <h5 class="text-white text-uppercase mb-3 animated slideInDown"><?php echo $row['title']; ?></h5> -->
                                <h1 class="display-3 text-white animated slideInDown mb-4"><?php echo $row['heading']; ?></h1>
                                <!-- <p class="fs-5 fw-medium text-white mb-4 pb-2"><?php echo $row['text']; ?></p> -->
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $i++; }?>
           
        </div>
    </div>
   
  
    <!-- Carousel End -->


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
    <div class="container-fluid bg-light overflow-hidden my-6 px-lg-0">
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
                        <p class="mb-4 pb-2 "><?php echo $row['heading']; ?></p>
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
                        <a href="about.php" class="btn btn-primary py-3 px-5">Explore More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="section-title text-center">
                <h1 class="display-5 mb-5">Our Services</h1>
            </div>
            <div class="row g-4">

               <?php 
               global $connectiondb;
               $sql =" SELECT * FROM service";
               $query_run = $connectiondb->query($sql);
               $Sr =0;
               while ($DataRows=$query_run->fetch_array())
               {
                       $Id         =  $DataRows["id"];
                       $Image   =  $DataRows["image"];
                       $Title  =  $DataRows["title"];
                       $Bio   =  $DataRows["bio"];
                       $Sr++;
        ?>    
                    

                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="admin/service_img/<?= $DataRows['image']; ?>" alt="" >
                        </div>
                        <div class="p-4 text-center border border-5 border-light border-top-0">
                            <h4 class="mb-3"><?php 
                           if (strlen($Title)>3){ $Title = substr($Title,0,30);} 
                           echo  $Title; ?></h4>
                            <p><?php 
                           if (strlen($Bio)>3){ $Bio = substr($Bio,0,100).'..';} 
                           echo  $Bio; ?> </p>
                            <a class="fw-medium" href="service_details.php?id=<?php echo $DataRows['id']; ?>">Read More<i class="fa fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- Feature Start -->
    <div class="container-fluid bg-light overflow-hidden my-6 px-lg-0">
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


    <!-- Projects Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="section-title text-center">
                <h1 class="display-5 mb-5">Our Projects</h1>
                </div>
            <div class="row mt-n2 wow fadeInUp" data-wow-delay="0.3s">
                <div class="col-12 text-center">
                    <ul class="list-inline mb-5" id="portfolio-flters">
                    <li class="mx-2 active" data-filter=".all">All</li>
                    <?php
                    while ($ttt = mysqli_fetch_assoc($result_project_list)) {
                    ?> 
                        <li class="mx-2 " data-filter=".<?php echo $ttt['link']; ?>"><?php echo $ttt['list'];  ?></li>
                        <?php }  ?>
                    </ul>
                   </div>
                </div>
       
            <div class="row g-4 portfolio-container">
            <?php
                    while ($vvv = mysqli_fetch_assoc($result_project_post)) {
                    ?> 

                <div class="col-lg-4 col-md-6 portfolio-item all <?php echo $vvv['link']; ?> wow fadeInUp" data-wow-delay="0.1s">
                
                    <div class="rounded overflow-hidden">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="admin/project_post/<?= $vvv['image']; ?>" alt="">
                            <div class="portfolio-overlay">
                                <a class="btn btn-square btn-outline-light mx-1" href="admin/project_post/<?= $vvv['image']; ?>" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-square btn-outline-light mx-1" href=""><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                        <div class="border border-5 border-light border-top-0 p-4">
                            <p class="text-primary fw-medium mb-2"><?php echo $vvv['list']; ?></p>
                            <h5 class="lh-base mb-0"><?php echo $vvv['bio'];?></a>
                        </div>
                    </div>
                </div>
                <?php }  ?> 
            </div>
        </div>
    </div>

    <!-- Projects End -->


    <!-- Quote Start -->
    <div class="container-fluid bg-light overflow-hidden my-6 px-lg-0">
        <div class="container quote px-lg-0">
            <div class="row g-0 mx-lg-0">
            <?php
                    while ($fff = mysqli_fetch_assoc($result_quote)) {
                    ?> 
                <div class="col-lg-6 ps-lg-0" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute img-fluid w-100 h-100" src="admin/quote_img/<?= $fff['image']; ?>" style="object-fit: cover;" alt="">
                    </div>
                </div>
                <div class="col-lg-6 quote-text py-5 wow fadeIn" data-wow-delay="0.5s">
                    <div class="p-lg-5 pe-lg-0">
                        <div class="section-title text-start">
                            <h1 class="display-5 mb-4"><?php echo $fff['title']; ?></h1>
                        </div>
                        <p class="mb-4 pb-2"><?php echo $fff['bio']; ?></p>
                        <?php } ?>  
                        
  
 <?php




if (isset($_POST['submit']))
 {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile_no'];
    $service = $_POST['service'];
    $note = $_POST['note'];
    


    $sql = "INSERT INTO `quote_report` (`name`,`email`,`mobile_no`,`service`,`note`) VALUES
     ('$name','$email','$mobile','$service','$note')"; 

    $query_run = mysqli_query($connectiondb, $sql);
}


?>                   
                     
                     
                        <form action="index.php" method="POST" >
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <input type="text" name="name" class="form-control border-0" required="required" placeholder="Your Name" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="email" name="email" class="form-control border-0" required="required"  placeholder="Your Email" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" name="mobile_no"class="form-control border-0" required="required" placeholder="Your Mobile" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <select class="form-select border-0" name="service" style="height: 55px;">
                                        <option selected>Select A Service </option>
                                        <option  value="1">Service 1</option>
                                        <option  value="2">Service 2</option>
                                        <option  value="3">Service 3</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <textarea name="note" class="form-control border-0" placeholder="Special Note"></textarea>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit" name="submit" > Submit </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Quote End -->




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
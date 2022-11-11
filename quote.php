<?php 
include("include/connaction.php");
include("header.php");

?>

    <?php

$result_quote=$connectiondb->query("SELECT *  FROM quote");

?>






    <!-- Page Header Start -->
    <div class="container-fluid page-header3 py-5 mb-5">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Free Quote</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                   
                    <li class="breadcrumb-item text-white active" aria-current="page">Free Quote</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Quote Start -->
    <div class="container-fluid bg-light overflow-hidden my-5 px-lg-0">
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
       
    <?php include('footer.php');?>  

   
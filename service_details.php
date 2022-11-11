<?php 
include("include/connaction.php");
include("header.php");
?>

    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="section-title text-center">
                <!-- <h1 class="display-5 mb-5">Our Services</h1> -->
            </div>
            <div class="container py-5">

            <?php

              $id=$_GET['id'];
              $result_service=$connectiondb->query("SELECT *  FROM service WHERE id='$id' ");
              while ($ccc = mysqli_fetch_assoc($result_service)) {

            ?>

                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-8 col text-center mb-4">
                        <h1 class="text-primary font-weight-normal text-uppercase mb-3"><?php echo $ccc['title']; ?></h1>
                       
                    </div>
                </div>
             
        <div class="service">

            <img class="service" src="admin/service_img/<?= $ccc['image']; ?>" alt="" width="100%" height="400px">
          
            <p class="mt-50"><?php echo $ccc['bio']; ?></p>
            </div>
       
       <?php } ?>
       </div>
             
             
             <?php    

$connection= mysqli_connect("localhost","root","","project1");


if (isset($_POST['submit']))
{
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];



$sql="INSERT INTO `feedback` (`name`,`email`,`phone`,`message`) VALUES ('$name','$email','$phone','$message')"; 

$query_run = mysqli_query($connection,$sql); 



}




?>
             <div class="bg-light p-5">
                    <h3 class="mb-4 section-title">Inquiry Now</h3>
                    <form action="service_details.php" method="POST">
                        <div class="form-group">
                            <label for="name">Name *</label>
                            <input type="text" name="name" class="form-control" id="name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email *</label>
                            <input type="email" name="email" class="form-control" id="email">
                        </div>
                        <div class="form-group">
                            <label for="Phone">Phone *</label>
                            <input type="phone" name="phone" class="form-control" id="email">
                        </div>
                           <div class="form-group">
                            <label for="message">Message *</label>
                            <textarea id="message" name="message" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="form-group mb-0">
                            <input type="submit" name="submit" value="Inquiry Submit" class="btn btn-primary px-3">
                        </div>
                    </form>
                </div>
         
         
         
            </div>
        </div>
    </div>
    <!-- Service End -->
 
  
    <?php include('footer.php');?>
   

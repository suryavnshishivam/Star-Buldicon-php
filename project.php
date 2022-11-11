<?php 

include("include/connaction.php");
include("header.php");

?>



  
<?php
$result_project_list=$connectiondb->query("SELECT *  FROM project_list");
$result_project_post=$connectiondb->query("SELECT *  FROM project_post");

?>






    <!-- Page Header Start -->
    <div class="container-fluid page-header2 py-5 mb-5">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Project</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                 
                    <li class="breadcrumb-item text-white active" aria-current="page">Project</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


  

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
                        <li class="mx-2 " data-filter=".list<?php echo $ttt['link']; ?>"><?php echo $ttt['list'];  ?></li>
                        <?php }  ?>
                    </ul>
                   </div>
                </div>
       
            <div class="row g-4 portfolio-container">
            <?php
                    while ($vvv = mysqli_fetch_assoc($result_project_post)) {
                    ?> 

                <div class="col-lg-4 col-md-6 portfolio-item all list<?php echo $vvv['link']; ?> wow fadeInUp" data-wow-delay="0.1s">
                
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
      
 
    <?php include('footer.php');?>
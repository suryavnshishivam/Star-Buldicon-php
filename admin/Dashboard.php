<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>

  <div class="ml-5">
   <h1 class="m-0 font-weight-bold text-primary"> Dashboard
     </h1>
     </div>

  <!-- Content Row -->
  <div class="row">

    <!-- Admin (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
       <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><h6><a href="register_admin.php">Total Registered Admin</a></h6></div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">

                  <?php
                    require 'dbconfig.php';

                  $query="SELECT id FROM admin ORDER BY id";
                  $query_run=mysqli_query($connectiondb,$query);

                  $row = mysqli_num_rows($query_run);
                  echo '<h6>Total Admin:'.$row.'</h6>';
                  
                  ?>




              </div>
            </div>
            <div class="col-auto">
            
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Features (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><h6><a href="Features_list.php">Total Features</a></h6></div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"></div>

              <?php
                   require 'dbconfig.php';

                  $query="SELECT id FROM features_list ORDER BY id";
                 $query_run=mysqli_query($connectiondb,$query);

                  $row = mysqli_num_rows($query_run);
                  echo '<h6>Total Features:'.$row.'</h6>';
                  
                  ?>
            </div>
            <div class="col-auto">
            
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Banner  Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1"><h6><a href="banner.php">Total Banner</a></h6></div>
              <?php
                   require 'dbconfig.php';

                  $query="SELECT id FROM banner ORDER BY id";
                 $query_run=mysqli_query($connectiondb,$query);

                  $row = mysqli_num_rows($query_run);
                  echo '<h6>Total Banner:'.$row.'</h6>';
                  
                  ?>
              
            </div>
            <div class="col-auto">
            
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- service  Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"><h6><a href="service.php">Total Service</a></h6></div>
              
              <?php
                   require 'dbconfig.php';

                  $query="SELECT id FROM service ORDER BY id";
                 $query_run=mysqli_query($connectiondb,$query);

                  $row = mysqli_num_rows($query_run);
                  echo '<h6>Total Service:'.$row.'</h6>';
                  
                  ?>
            </div>
            <div class="col-auto">
           
            </div>
          </div>
        </div>
      </div>
    </div>
 

  
    <!-- post (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1"><h6><a href="project_post_seen.php">Total project_post</a></h6></div>
              <?php
                   require 'dbconfig.php';

                  $query="SELECT id FROM project_post ORDER BY id";
                 $query_run=mysqli_query($connectiondb,$query);

                  $row = mysqli_num_rows($query_run);
                  echo '<h6>Total project_post:'.$row.'</h6>';
                  
                  ?>
              
            </div>
            <div class="col-auto">
           
            </div>
          </div>
        </div>
      </div>
    </div>

 
  

    <!-- contact Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><h6><a href="contact_seen.php">Total contact</a></h6></div>
              
              <?php
                   require 'dbconfig.php';

                  $query="SELECT id FROM contact ORDER BY id";
                 $query_run=mysqli_query($connectiondb,$query);

                  $row = mysqli_num_rows($query_run);
                  echo '<h6>Total contact:'.$row.'</h6>';
                  
                  ?>
            </div>
            <div class="col-auto">
        
            </div>
          </div>
        </div>
      </div>
    </div>
  
 
  
  
    <!-- project_list Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><h6><a href="project_list.php">Total Project List</a></h6></div>
              
              <?php
                   require 'dbconfig.php';

                  $query="SELECT id FROM project_list ORDER BY id";
                 $query_run=mysqli_query($connectiondb,$query);

                  $row = mysqli_num_rows($query_run);
                  echo '<h6>Total project_list:'.$row.'</h6>';
                  
                  ?>
            </div>
            <div class="col-auto">
      
            </div>
          </div>
        </div>
      </div>
    </div>
  
 
  
      <!-- quote_report Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1"><h6><a href="quote_report.php">Total quote_report</a></h6> </div>
              
              <?php
                   require 'dbconfig.php';

                  $query="SELECT id FROM quote_report ORDER BY id";
                 $query_run=mysqli_query($connectiondb,$query);

                  $row = mysqli_num_rows($query_run);
                  echo '<h6>Total quote_report:'.$row.'</h6>';
                  
                  ?>
            </div>
            <div class="col-auto">
       
            </div>
          </div>
        </div>
      </div>
    </div>
  
 
  
  
   <!-- testimonial Card Example -->
   <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"><h6><a href="Testimonial.php">Total testimonial </a></h6></div>
              
              <?php
                   require 'dbconfig.php';

                  $query="SELECT id FROM testimonial ORDER BY id";
                 $query_run=mysqli_query($connectiondb,$query);

                  $row = mysqli_num_rows($query_run);
                  echo '<h6>Total testimonial:'.$row.'</h6>';
                  
                  ?>
            </div>
            <div class="col-auto">
           
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 

  <?php
include('includes/scripts.php');
include('includes/footer.php');
?>

  







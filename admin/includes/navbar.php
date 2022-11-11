
<?php require('security.php');

$result_header_img=$connectiondb->query("SELECT *  FROM header_nav");
?>


<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

<div>
<?php
      while ($qqq = mysqli_fetch_assoc($result_header_img)) {
               ?> 
 <a class="collapse-item " href="Dashboard.php"><img src="header_img/<?= $qqq['image']; ?>" alt="" height="120px" width="224px">
<?php }?>
</div>



<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">

 <span>TOP Area</span>
</a>
<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
 <div class="bg-warning py-2 collapse-inner rounded">
  <a class="collapse-item" href="register_admin.php"> Resister Admin</a>
  <hr>
  <a class="collapse-item " href="Dashboard.php">Dashboard</a>
  <hr>
  <a class="collapse-item" href="header.php">Manage Header Top </a>
  <a class="collapse-item" href="header_setting.php">Manage Header Pages </a>
  <a class="collapse-item" href="header_nav.php">Manage Header Logo  </a>
  <hr>
  <a class="collapse-item" href="banner.php">Add Banner</a>
  <hr>
  <a class="collapse-item" href="Features_list.php">Manage Features List</a>


  
 </div>
</div>
</li>




<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">

 <span>MAIN Area</span>
</a>
<div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
 <div class="bg-warning py-2 collapse-inner rounded">
  
   
  <a class="collapse-item" href="aboutus.php">Manage About</a>
  <a class="collapse-item" href="about_count.php">Manage About Count</a>
  <hr>
  <a class="collapse-item" href="service.php">Manage Services</a>
  <hr>
  <a class="collapse-item" href="features_support.php"> Manage Features Support</a>
  <a class="collapse-item" href="Features_two.php">Manage Features Section</a>
  <hr>
  <a class="collapse-item" href="Testimonial.php">Manage Testimonial </a>
 

 </div>
</div>
</li>


<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">

 <span>BOTTAM Area</span>
</a>
<div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
 <div class="bg-warning py-2 collapse-inner rounded">
 
   <a class="collapse-item" href="project_list.php">Add Project List</a>
   <a class="collapse-item" href="project_post.php">Project Post</a>
   <a class="collapse-item" href="project_post_seen.php"> Manage Project </a>
<hr>
   <a class="collapse-item" href="quote.php"> Manage Quote</a>
   <a class="collapse-item" href="quote_report.php"> Total Quote Report </a>
   <hr>
   <a class="collapse-item" href="contact.php"> Manage Contact Section</a>
   <a class="collapse-item" href="contact_seen.php"> Total Contact </a>
   <a class="collapse-item" href="address_footer.php"> Footer Email</a>
   <a class="collapse-item" href="add_meta_tag.php"> Meta Tags</a>
   

 </div>
</div>
</li>

<hr>
<hr>
<hr>
<hr>
<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
<button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->

 <!-- Content Wrapper -->
 <div id="content-wrapper" class="d-flex flex-column">

  

     <!-- Topbar -->
     <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

       <!-- Sidebar Toggle (Topbar) -->
       <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
         <i class="fa fa-bars"></i>
       </button>

      

       <!-- Topbar Navbar -->
       <ul class="navbar-nav ml-auto">

        
         

        
        
         <!-- Nav Item - User Information -->
         <li class="nav-item dropdown no-arrow">
           <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             <span class="mr-2 d-none d-lg-inline text-gray-600 small">
           
             
          <?php echo $_SESSION['username'];?>
               
             </span>
             <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
           </a>
           <!-- Dropdown - User Information -->
           <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
             <a class="dropdown-item" href="#">
               <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
               Profile
             </a>
             <a class="dropdown-item" href="#">
               <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
               Settings
             </a>
             <div class="dropdown-divider"></div>
             <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
               
               <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
               Logout
             </a>
           </div>
         </li>

       </ul>

     </nav>
     <!-- End of Topbar -->


<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
 <i class="fas fa-angle-up"></i>
</a>


<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="modal-dialog" role="document">
   <div class="modal-content">
     <div class="modal-header">
       <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
       <button class="close" type="button" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">×</span>
       </button>
     </div>
     <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
     <div class="modal-footer">
       <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

       <form action="logout.php" method="POST"> 
       
         <button type="submit" name="logout_btn" class="btn btn-primary">Logout</button>

       </form>


     </div>
   </div>
 </div>
</div>
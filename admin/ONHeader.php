<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php 

if (isset($_GET["id"])){

    $id = $_GET["id"];
    
    
    $sql ="UPDATE tbl_menu SET visibility_status ='1'  WHERE id='$id'";
    $Execute= $connectiondb->query($sql);
     
    
  if($Execute)
  {
   
 
      $_SESSION['status'] = "Header OFF ";
      $_SESSION['status_code'] = "success";
      header('location:header_setting.php');
  }
  else 
  {
      $_SESSION['status'] = "Header OFF  ";
      $_SESSION['status_code'] = "error";
      header('location:header_setting.php');
  }
 
}
?>


<?php 
   include("includes/footer.php");
   ?>    
</div>
<!-- End Footerbar -->
</div>
<!-- End Rightbar -->
</div>
</body>
</html>	
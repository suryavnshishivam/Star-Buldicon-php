<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php

if(isset($_POST['update_btn']))
{
  $id=$_GET['id'];
  $page_name=$_POST['page_name'];
  $page_link=$_POST['page_link'];

  $visibility_status=$_POST['visibility_status'];
  $position_order=$_POST['position_order'];

 
 
 $query = "UPDATE `tbl_menu` SET `page_name` = '$page_name', `page_link` = '$page_link',
 `visibility_status` = '$visibility_status', `position_order` = '$position_order' WHERE `id` = '$id'";  
$query_run=mysqli_query($connectiondb,$query);  

  if($query_run)
  {
   
  
      $_SESSION['status'] = "Header updated";
      $_SESSION['status_code'] = "success";
      $_SESSION['status_code'] = "success";
      header('Location: header_setting.php');
  }
  else 
  {
      $_SESSION['status'] = "Header Not updated";
      $_SESSION['status_code'] = "error";
      $_SESSION['status_code'] = "success";
      header('Location: header_setting.php');
  }
 }
 
?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"> Edit header_setting
           
    </h6>
  </div>

   <div class="card-body">

   <?php    
 

 $id= $_GET["id"];
 $query="SELECT * FROM tbl_menu WHERE id='{$id}'";
 $query_run=mysqli_query($connectiondb, $query);

 foreach ($query_run as $row )
 {
 
     ?>
                 <form action="edit_header_setting.php?id=<?php echo $row['id']; ?>" method="post" enctype="multipart/form-data">
					
								
					<div class="form-group row">
                    <label class="col-sm-3 col-form-label">Page Name :-</label>
                    <div class="col-sm-9">
                      <input type="text" name="page_name" id="page_name"  class="form-control" value="<?php echo $row['page_name']; ?>">
                    </div>
                  </div>    
				  				                   
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Page Link :-</label>
                    <div class="col-sm-9">
                      <input type="text" name="page_link" id="page_link"  class="form-control" value="<?php echo $row['page_link']; ?>">
                    </div>
                  </div>    		
				  					
				  
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Page Visibility Status :-</label>
                    <div class="col-sm-9">
                      <input type="radio" id="enable" name="visibility_status" value="0" <?php if(isset($_GET['id'])){if($row['visibility_status']=='0'){ echo "checked";}}else{ echo "checked";}?> /> <label for="enable"> Enable</label>  
                      <input type="radio" id="disable" name="visibility_status" value="1" <?php if(isset($_GET['id'])){if($row['visibility_status']=='1'){ echo "checked";}}?> /> <label for="disable"> Disable</label>  
					   <br>  <br> 
                    </div>
                  </div>  
                  <div class="form-group row row">
                                        <div class="col-sm-10">
                    <button type="submit" name="update_btn" class="btn btn-primary"><i class="feather icon-send mr-2"></i>Update</button>
                                        </div>
                                    </div>
				  
                                </form>
                <?php }?>

                <?php
include('includes/scripts.php');
//include('includes/footer.php');
?>
<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>


<?php
	
  if (isset($_POST['submit']) )
{
    
    $page_name=$_POST['page_name'];
    $page_link=$_POST['page_link'];
 
    $visibility_status=$_POST['visibility_status'];
    $position_order=$_POST['position_order'];

    $page_link= str_replace("#","/'",$page_link);
   
    $sql="INSERT INTO `tbl_menu` (`page_name`,`page_link`,`visibility_status`,`position_order`)
    VALUES ('$page_name','$page_link','$visibility_status','$position_order')";
    
     $query_run = mysqli_query($connectiondb,$sql); 

    if($query_run)
    {
     

        $_SESSION['status'] = "header_setting  Added";
        $_SESSION['status_code'] = "success";
         header('Location:header_setting.php');
    }
    else 
    {
        $_SESSION['status'] = "header_setting Not Added";
        $_SESSION['status_code'] = "error";
        header('Location:header_setting.php');
    }
}

?>


<div class="breadcrumbbar">
   <div class="row align-items-center">
      <div class="col-md-8 col-lg-8">
         <h2 class="page-title"><?php if(isset($_GET['edit_id'])){?>Edit<?php }else{?>Add<?php }?> Menu</h2>
      </div>
   </div>
</div>
                
            <!-- End Breadcrumbbar -->
		<div class="contentbar">
                <!-- Start row -->
                <div class="row">
	 <!-- Start col -->
                    <div class="col-lg-12">
                        <div class="card m-b-30">
                            
                        <div class="card-body">
                                 <form action="add_menu1.php" method="post" enctype="multipart/form-data">
					
								
					<div class="form-group row">
                    <label class="col-sm-3 col-form-label">Page Name :-</label>
                    <div class="col-sm-9">
                      <input type="text" name="page_name" id="page_name" class="form-control" required>
                    </div>
                  </div>    
				  				                   
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Page Link :-</label>
                    <div class="col-sm-9">
                      <input type="text" name="page_link" id="page_link"  class="form-control">
                    </div>
                  </div>    		
				  			                   
               		
				  
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Page Visibility Status :-</label>
                    <div class="col-sm-9">
                      <input type="radio" id="enable" name="visibility_status" value="0" > <label for="enable"> Enable</label>  
                      <input type="radio" id="disable" name="visibility_status" value="1" > <label for="disable"> Disable</label>  
					   <br>  <br> 
                    </div>
                  </div>  
                  <div class="form-group row row">
                                        <div class="col-sm-10">
                                            <button type="submit" name="submit" class="btn btn-primary"><i class="feather icon-send mr-2"></i>Submit</button>
                                        </div>
                                    </div>
				  
                                </form>
                            </div>
                        </div>
                    </div> 
                    <!-- End col -->
				</div>
				</div>


<?php
include('includes/scripts.php');
//include('includes/footer.php');
?>
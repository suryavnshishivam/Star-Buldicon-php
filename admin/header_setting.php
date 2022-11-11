<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php

	
	$qry="SELECT * FROM tbl_menu where id=1";
	$result=mysqli_query($connectiondb,$qry);
	$settings_row=mysqli_fetch_assoc($result);


 ?>


	<!--SCRIPT FOR POSITION ORDER-->					  
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
			
<div class="breadcrumbbar">
   <div class="row align-items-center">
      <div class="col-md-8 col-lg-8">
      <h1 class="m-0 font-weight-bold text-primary"> Header Page Section</h1>
      </div>
	    <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
			<a href="add_menu1.php" >
			<button class="btn btn-primary"><i class="feather icon-plus mr-2"></i>Add Menu</button>	
			</a>
            </div>                        
        </div>
   </div>
</div>
    
	<div class="contentbar">
                <!-- Start row -->
                <div class="row">
	 <!-- Start col -->
	
            <div class="card-body">
               <div class="table-responsive">
			   		
                  <table id="default-datatable" class="display table table-striped table-bordered">
                     <thead>
								<tr>                  
								  <th>Id</th>
								  <th>Page Name</th>
								  <th>Page Link</th>	
						
								  <th>Visibility Status</th>				  
                        
                          <th>Action</th>
								</tr>
                     </thead>
                     <tbody class="row_position1">
                        <?php	

					
                  $query="SELECT * FROM  tbl_menu WHERE visibility_status='0' ORDER BY  id asc"; 
                           $result=mysqli_query($connectiondb,$query);
                           $count=mysqli_num_rows($result);
                           if($count==0)
                           {
                           ?>	
                        <tr>
                           <td style="text-align:center; padding:60px;" colspan="6">No Record Found !</td>
                        </tr>
                        <?php	
                           }
                           
                           
                           $i=0;
                           while($row=mysqli_fetch_array($result))
                           {					
                           ?>
                           <td><?php echo $row['id']; ?></td>
                          
								   <td><?php echo $row['page_name'];?></td>
							      <td><?php echo $row['page_link'];?></td>
								   
                           
                           <td>
                           <a href="ONHeader.php?id=<?php echo $row['id']; ?>"> <button  type="submit" name="ONHeader" class="btn btn-primary">OFF Header</button></a>
                           </td>
                        
                        
                           <td>
                              <a href="edit_header_setting.php?id=<?php echo $row['id'];?>" class="btn btn-dark"><i class="feather ion ion-md-create"></i>   Edit</a>
                              <a href="delete_header_setting.php?id=<?php echo $row['id'];?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this ?');"><i class="feather icon-trash-2 mr-2"></i> Delete</a>
                           </td>
                        </tr>
                        <?php
                           $i++;
                           }
                           ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
       
         <h1 class="m-0 font-weight-bold text-primary"> Header Page Section</h1>


         <div class="contentbar">
                <!-- Start row -->
                <div class="row">
	 <!-- Start col -->
	
            <div class="card-body">
               <div class="table-responsive">
			   		
                  <table id="default-datatable" class="display table table-striped table-bordered">
                     <thead>
								<tr>                  
								  <th>Id</th>
								  <th>Page Name</th>
								  <th>Page Link</th>	
								 
								  <th>Visibility Status</th>				  
                        
                          <th>Action</th>
								</tr>
                     </thead>
                     <tbody class="row_position1">
                        <?php	

                        $query="SELECT * FROM  tbl_menu WHERE visibility_status='1' ORDER BY  id asc"; 
                          
                           $result=mysqli_query($connectiondb,$query);
                           $count=mysqli_num_rows($result);
                           if($count==0)
                           {
                           ?>	
                        <tr>
                           <td style="text-align:center; padding:60px;" colspan="6">No Record Found !</td>
                        </tr>
                        <?php	
                           }
                           
                           
                           $i=0;
                           while($row=mysqli_fetch_array($result))
                           {					
                           ?>
                           <td><?php echo $row['id']; ?></td>
                          
								   <td><?php echo $row['page_name'];?></td>
							      <td><?php echo $row['page_link'];?></td>
								   	
                           
                           <td>
                           <a href="OFFHeader.php?id=<?php echo $row['id']; ?>"> <button  type="submit" name="OFFHeader" class="btn btn-warning">ON Header</button></a>
                           </td>
                           
                        
                        
                           <td>
                              <a href="edit_header_setting.php?id=<?php echo $row['id'];?>" class="btn btn-dark"><i class="feather ion ion-md-create"></i>   Edit</a>
                              <a href="delete_header_setting.php?id=<?php echo $row['id'];?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this ?');"><i class="feather icon-trash-2 mr-2"></i> Delete</a>
                           </td>
                        </tr>
                        <?php
                           $i++;
                           }
                           ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
<!-- End Contentbar -->
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>

<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h1 class="m-0 font-weight-bold text-primary"> About Section Count
     </h1>
  </div>
 <div class="card-body">

  <?php    
    


  if (isset($_POST['submit']))
{
    
    $HappyClient=$_POST['happy_client'];
    $ProjectDone=$_POST['project_done'];
   
   $sql="INSERT INTO `count` (`happy_client`,`project_done`) VALUES ('$HappyClient','$ProjectDone')"; 
    
     $query_run = mysqli_query($connectiondb,$sql); 

    if($query_run)
    {
     

        $_SESSION['status'] = "Project Count  Added";
        $_SESSION['status_code'] = "success";
         header('Location:about_count.php');
    }
    else 
    {
        $_SESSION['status'] = "Project Count Not Added";
        $_SESSION['status_code'] = "error";
        header('Location:about_count.php');
    }
}




?>



<div class="modal fade" id="image" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Count</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="about_count.php" method="POST" > 

        <div class="modal-body">

        <div class="form-group">
      
                    <input type="text" name="happy_client" class="form-control" placeholder="Enter happy_client total">
                    <input type="text" name="project_done" class="form-control" placeholder="Enter project_done total">
                    
                     
                </div>
            </div>
             <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
    </div>
  </div>
</div>

 <?php
?>  



<!-- DataTales Example -->
<!-- <div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"> Count
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#image">
           Count
            </button>
    </h6>
  </div> -->

  
  <?php
        if(isset($_SESSION['success'])&& $_SESSION['success']!='')
        {
          echo '<h2 class="bg-primary text-white">'.$_SESSION['success'].'</h2>';
          unset($_SESSION['success']);
        }
        if(isset($_SESSION['status'])&& $_SESSION['status']!='')
        {
          echo '<h2 class="bg-danger text-white">'.$_SESSION['status'].'</h2>';
          unset($_SESSION['status']);
        }
    
?>




<div class="table-responsive">
<?php 
   
        
        $query="SELECT * FROM  count ";
        $query_run=mysqli_query($connectiondb,$query);

?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th>HappyClient</th>
            <th>ProjectDone</th>
            <th>Edit</th>
            <th>Delete</th>
         </tr>
        </thead>
        <tbody>
          <?php
         // if (mysqli_num_row($query_run)>0)
          {
            while ($row=mysqli_fetch_assoc($query_run))
            {
              ?>
     
          <tr>
            <td> <?php echo $row['id']; ?> </td>
            <td> <?php echo $row['happy_client']; ?> </td>
            <td> <?php echo $row['project_done']; ?> </td>
           

            <td>

                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                   <a href="edit_about_count.php?id=<?php echo $row['id']; ?>"> <button  type="submit" name="edit_project" class="btn btn-success"> EDIT</button></a>

            </td>
            

                <td>
                <input type="hidden" name="id" value="<?php echo $row ['id'];?>">
                <a href="delete_about_count.php?id=<?php echo $row['id']; ?>"> <button  class="btn btn-warning"> DELETE</button></a>
                </td>
               

           
          
          </tr>
          <?php
          }
          //else{
            //echo "No Record Found";
          }
     ?>
        
        </tbody>
      </table>

    </div>
  </div>
</div>

</div>

  </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->
<!-- edit form -->



<?php
include('includes/scripts.php');
//include('includes/footer.php');
?>
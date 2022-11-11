<?php
include('includes/header.php'); 
include('includes/navbar.php'); 

?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h1 class="m-0 font-weight-bold text-primary"> Features_List
     </h1>
  </div>
 <div class="card-body">

  <?php    
   


  if (isset($_POST['submit']))
{   $Image= $_FILES['img']['name'];
    $path="Featuries_img/".basename($_FILES['img']['name']);
    $Features_Id=$_POST['features_id'];
    $Features_Name=$_POST['features_name'];
   
 $sql="INSERT INTO `features_list` (`img`,`features_name`,`features_id`) VALUES ('$Image','$Features_Name','$Features_Id')"; 
    
    $query_run = mysqli_query($connectiondb,$sql); 

    if($query_run)
    {
      move_uploaded_file($_FILES['img']['tmp_name'],$path);

        $_SESSION['status'] = "Features List  Added";
        $_SESSION['status_code'] = "success";
        header('Location: Features_list.php');
    }
    else 
    {
        $_SESSION['status'] = "Features List Not Added";
        $_SESSION['status_code'] = "error";
        header('Location: Features_list.php');
    }
}




?>



<div class="modal fade" id="image" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Features List</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="Features_list.php" method="POST" enctype="multipart/form-data" > 

        <div class="modal-body">

        <div class="form-group">
        <input type="file" name="img" class="form-control p-1" required >
        <input type="text" name="features_id" class="form-control" placeholder="Enter features_id ">
         <input type="text" name="features_name" class="form-control" placeholder="Enter features Name">
                    
                     
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
<div class="card shadow mb-4">
  <div class="card-header py-3">
 
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#image">
              Add Feature list
            </button>
    </h6>
  </div>

  
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
    
        
        $query="SELECT * FROM  features_list ";
        $query_run=mysqli_query($connectiondb,$query);

?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th>Image</th>
            <th>Features ID</th>
            <th>Features List</th>
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
            <td>  <img src="Featuries_img/<?php echo $row["img"]; ?>"  witdh="100%" height="80px" alt=""> </td>
            <td> <?php echo $row['features_id']; ?> </td>
            <td> <?php echo $row['features_name']; ?> </td>

            <td>

                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                   <a href="edit_features_list.php?id=<?php echo $row['id']; ?>"> <button  type="submit" name="edit_features_list" class="btn btn-success"> EDIT</button></a>

            </td>
            

                <td>
                <input type="hidden" name="id" value="<?php echo $row ['id'];?>">
                <a href="delete_features_list.php?id=<?php echo $row['id']; ?>"> <button  class="btn btn-warning"> DELETE</button></a>
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
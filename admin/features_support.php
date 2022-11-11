<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>


<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h1 class="m-0 font-weight-bold text-primary"> Feature Support
     </h1>
  </div>

  <div class="card-body">
  <?php    
   


  if (isset($_POST['submit']))
{
    
    $img= $_FILES['image']['name']; 
    $path="Support1/".basename($_FILES['image']['name']);
    $Title=$_POST['title'];
    $Service=$_POST['service'];
  

   
  $sql="INSERT INTO `features_support` (`image`,`title`,`service`) VALUES ('$img','$Title','$Service')"; 
   $query_run = mysqli_query($connectiondb,$sql); 

    if($query_run)
            {
              move_uploaded_file($_FILES['image']['tmp_name'],$path);
              

                $_SESSION['status'] = " Feature Service Suuport Added";
                $_SESSION['status_code'] = "success";
                header("location:features_support.php");
            }
            else 
            {
                $_SESSION['status'] = " feature ervice Suuport  Not Added";
                $_SESSION['status_code'] = "error";
                header("location:features_support.php");
            }
        }


?>
        <div class="modal fade" id="image" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title" id="exampleModalLabel">Add features_support</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="features_support.php" method="POST" enctype="multipart/form-data"> 

        <div class="modal-body">

        <div class="form-group">       
        <input type="file" name="image" class="from-control p-1" required>
      
        <input type="text" name="title" class="form-control" placeholder="Enter Title ">
      
         <input type="text" name="service" class="form-control" placeholder="Enter Service">
        
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

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">
           <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#image">
            Add Features Support
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
 

        $query="SELECT * FROM  features_support ";
        $query_run=mysqli_query($connectiondb,$query);

?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th>Image </th>
       
            <th>Title </th>
          
            <th>Service </th>
        
            <th>Edit </th>
            <th>Delete </th>
          
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
            <td> <img src="Support1/<?php echo $row["image"]; ?>"  witdh="100%" height="80px" alt=""> </td>
     
            <td> <?php echo $row['title']; ?> </td>
      
            <td> <?php echo $row['service']; ?> </td>
           
          
            <td>

                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                   <a href="edit_feature_support.php?id=<?php echo $row['id']; ?>"> <button  type="submit" name="edit_features_list" class="btn btn-success"> EDIT</button></a>

            </td>
            

                <td>
                <input type="hidden" name="id" value="<?php echo $row ['id'];?>">
                <a href="delete_features_support.php?id=<?php echo $row['id']; ?>"> <button  class="btn btn-warning"> DELETE</button></a>
                </td>
               
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



<?php
include('includes/scripts.php');
//include('includes/footer.php');
?>
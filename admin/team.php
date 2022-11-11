<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>


<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"> Team
     </h6>
  </div>

  <div class="card-body">
  <?php    



  if (isset($_POST['submit']))
{

    $Image= $_FILES['image']['name'];
    $path="team_img/".basename($_FILES['image']['name']);
    $Name=$_POST['name'];
    $Designation = $_POST['designation'];
    
   
    $sql="INSERT INTO `team` (`image`,`name`,`designation`)VALUES ('$Image','$Name','$Designation')";
    
    $query_run = mysqli_query($connectiondb,$sql); 

    
    if($query_run)
    {
        
      move_uploaded_file($_FILES['image']['tmp_name'],$path);
        $_SESSION['status'] = "Team  Added";
        $_SESSION['status_code'] = "success";
        header("location: team.php");
    }
    else 
    {
        $_SESSION['status'] = "Team Not Added";
        $_SESSION['status_code'] = "error";
        header("location: team.php");
    }
}

?>
        

<div class="modal fade" id="image" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Team</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="team.php" method="POST"  enctype="multipart/form-data" > 

        <div class="modal-body">

        <div class="form-group">
      
                    <input type="file" name="image" class="form-control p-1" required >
                    <input type="text" name="name" class="form-control" placeholder="Enter Name">
                    <input type="text" name="designation" class="form-control" placeholder="Enter Designation">
                 
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
    <h6 class="m-0 font-weight-bold text-primary">
           <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#image">
            Add Team Member
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


        $query="SELECT * FROM  team ";
        $query_run=mysqli_query($connectiondb,$query);

?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th>Image</th>
            <th>Name </th>
            <th>Designation </th>
            <th>Edit </th>
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
            <td>  <img src="team_img/<?php echo $row["image"]; ?>"  witdh="100%" height="80px" alt=""> </td>
            <td> <?php echo $row['name']; ?> </td>
            <td> <?php echo $row['designation']; ?> </td>
            
            
            <td>
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                   <a href="edit_team.php?id=<?php echo $row['id']; ?>"> <button  type="submit" name="edit_team" class="btn btn-success"> EDIT</button></a>
            </td>
            <td>
            <input type="hidden" name="id" value="<?php echo $row ['id'];?>">
                <a href="delete_team.php?id=<?php echo $row['id']; ?>"> <button  class="btn btn-warning"> DELETE</button></a>
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



<?php
include('includes/scripts.php');
//include('includes/footer.php');
?>
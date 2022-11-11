<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php
if (isset($_POST['edit_team']))
{
    $id= $_GET['id'];
    $query="SELECT * FROM team WHERE id='$id'";
    $query_run=mysqli_query($connectiondb, $query);


}



if(isset($_POST['update_team_btn']))
{
  $id=$_GET['id'];
  $Image= $_FILES['image']['name'];
  $path="team_img/".basename($_FILES['image']['name']);
  $Name=$_POST['name'];
  $Designation = $_POST['designation'];

  if (!empty($_FILES["image"]["name"]))
  {
   $query = "UPDATE `team` SET `image` = '$Image', `name` = '$Name', `designation` = '$Designation' WHERE `id` = '$id'";  
  }
  else
  {
    $query = "UPDATE `team` SET `name` = '$Name', `designation` = '$Designation' WHERE `id` = '$id'";  
  }

  $query_run=mysqli_query($connectiondb,$query);  

  if($query_run)
  {
   
    move_uploaded_file($_FILES['image']['tmp_name'],$path);
      $_SESSION['status'] = "Team updated";
      $_SESSION['status_code'] = "success";
       header("location: team.php");
  }
  else 
  {
      $_SESSION['status'] = "Team Not updated";
      $_SESSION['status_code'] = "error";
      header("location: team.php");
  }
 }
 
?>


<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"> Edit Team
           
    </h6>
  </div>

   <div class="card-body">

  <?php    
  

    $id= $_GET['id'];
    $query="SELECT * FROM team WHERE id='{$id}'";
    $query_run=mysqli_query($connectiondb, $query);

    foreach ($query_run as $row )
    {
        ?>
        

            <form action="edit_team.php?id=<?php echo $row['id']; ?>" method="POST" enctype="multipart/form-data">
            
              
            <div class="form-group">
                <label > Edit Team </label>
            </div>

                <div class="form-group">

               
                <img src="team_img/<?php echo $row["image"]; ?>"  witdh="100%" height="100" alt="">
                <input type="file" name="image" class="form-control p-1">
                    <input type="text" name="name" class="form-control" value="<?php echo $row['name']; ?>" >
                    <input type="text" name="designation" class="form-control" value="<?php echo $row['designation']; ?>" >
                   
                    </div>
                 <a href="team.php" class="btn btn-danger" > Cancel</a>
                <button  type="submit"  name="update_team_btn" class="btn btn-primary" > Updated  </button>

                </form>
            <?php
    }    


?>     

  </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->



<?php
include('includes/scripts.php');
//include('includes/footer.php');
?>
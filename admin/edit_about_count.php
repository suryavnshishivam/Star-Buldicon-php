<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php
if(isset($_POST['update_btn']))
{
  $id=$_GET["id"];
  $HappyClient=$_POST['happy_client'];
  $ProjectDone=$_POST['project_done'];
  
  
  $query = "UPDATE `count` SET `happy_client` = '$HappyClient' , `project_done`='$ProjectDone' WHERE `id` = '$id'";  
  $query_run=mysqli_query($connectiondb,$query);  

  if($query_run)
  {
   
 
      $_SESSION['status'] = "Cout updated";
      $_SESSION['status_code'] = "success";
      header("location: about_count.php");
  }
  else 
  {
      $_SESSION['status'] = "Count Not updated";
      $_SESSION['status_code'] = "error";
      header("location: about_count.php");
  }
 }
 
?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h1 class="m-0 font-weight-bold text-primary"> Edit Count
           
    </h1>
  </div>

   <div class="card-body">

  <?php    


    $id= $_GET["id"];
    $query="SELECT * FROM count WHERE id='{$id}'";
    $query_run=mysqli_query($connectiondb, $query);

    foreach ($query_run as $row )
    {
    
        ?>

      <form action="edit_about_count.php?id=<?php echo $row['id']; ?>" method="POST">
            
              
            <div class="form-group">
                <label > Edit Count </label>
            </div>

                <div class="form-group">

                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    
                    <input type="text" name="happy_client" class="form-control" value="<?php echo $row['happy_client']; ?>" >
                    <input type="text" name="project_done" class="form-control" value="<?php echo $row['project_done']; ?>" >
                   
                    </div>
                 <a href="about_count.php" class="btn btn-danger" > Cancel</a>
                <button  type="submit"  name="update_btn" class="btn btn-primary" > Updated  </button>

                </form>

                <?php }?>

 <?php
include('includes/scripts.php');
//include('includes/footer.php');
?>
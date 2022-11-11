<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php
if(isset($_POST['update_project_list_btn']))
{
  $id=$_GET["id"];
  $List=$_POST['list'];
  $Link=$_POST['link'];
  


  $query = "UPDATE `project_list` SET `list` = '$List',`link` = '$Link' WHERE `id` = '$id'";  
 
  $query_run=mysqli_query($connectiondb,$query);  

  if($query_run)
  {
   
 
      $_SESSION['status'] = "project_list updated";
      $_SESSION['status_code'] = "success";
      header("location:project_list.php");
  }
  else 
  {
      $_SESSION['status'] = "project_list Not updated";
      $_SESSION['status_code'] = "error";
      header("location:project_list.php");
  }
 }
 
?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h1 class="m-0 font-weight-bold text-primary"> Edit project_list
           
    </h1>
  </div>

   <div class="card-body">

  <?php    


    $id= $_GET["id"];
    $query="SELECT * FROM project_list WHERE id='{$id}'";
    $query_run=mysqli_query($connectiondb, $query);

    foreach ($query_run as $row )
    {
    
        ?>

      <form action="edit_project_list.php?id=<?php echo $row['id']; ?>" method="POST" enctype="multipart/form-data">
            
              
            <div class="form-group">
                <label > Edit project_list</label>
            </div>

                <div class="form-group">

                
                
                    <input type="text" name="list" class="form-control" value="<?php echo $row['list']; ?>" >
                    <input type="text" name="link" class="form-control" value="<?php echo $row['link']; ?>" >
                   
                   
                    </div>
                 <a href="project_list.php" class="btn btn-danger" > Cancel</a>
                <button  type="submit"  name="update_project_list_btn" class="btn btn-primary" > Updated  </button>

                </form>

                <?php }?>

 <?php
include('includes/scripts.php');
//include('includes/footer.php');
?>
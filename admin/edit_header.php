<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php
if(isset($_POST['update_header_btn']))
{
  $id=$_GET["id"];
  $Address=$_POST['address'];
  $Time=$_POST['time'];
  $Mobile=$_POST['mobile'];

 
$query = "UPDATE `header` SET `address` = '$Address', `time` = '$Time',`mobile`='$Mobile' WHERE `id` = '$id'";  
$query_run=mysqli_query($connectiondb,$query);  

  if($query_run)
  {
   
  
      $_SESSION['status'] = "Header updated";
      $_SESSION['status_code'] = "success";
      $_SESSION['status_code'] = "success";
      header('Location: header.php');
  }
  else 
  {
      $_SESSION['status'] = "Header Not updated";
      $_SESSION['status_code'] = "error";
      $_SESSION['status_code'] = "success";
      header('Location: header.php');
  }
 }
 
?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h1 class="m-0 font-weight-bold text-primary"> Edit Header
           
    </h1>
  </div>

   <div class="card-body">

  <?php    


    $id= $_GET["id"];
    $query="SELECT * FROM header WHERE id='{$id}'";
    $query_run=mysqli_query($connectiondb, $query);

    foreach ($query_run as $row )
    {
    
        ?>

      <form action="edit_header.php?id=<?php echo $row['id']; ?>" method="POST" >
            
              
            <div class="form-group">
                <label > Edit features List </label>
            </div>

                <div class="form-group">

                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            
                <input type="text" name="address" class="form-control" value="<?php echo $row['address']; ?>" >
                <input type="text" name="time" class="form-control" value="<?php echo $row['time']; ?>" >
                <input type="text" name="mobile" class="form-control" value="<?php echo $row['mobile']; ?>" >  
                   
                    </div>
                 <a href="header.php" class="btn btn-danger" > Cancel</a>
                <button  type="submit"  name="update_header_btn" class="btn btn-primary" > Updated  </button>

                </form>

                <?php }?>

 <?php
include('includes/scripts.php');
//include('includes/footer.php');
?>
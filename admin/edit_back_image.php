<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php


if(isset($_POST['update_back_img']))
{
  $id=$_GET["id"];
  
  $Image= $_FILES['image']['name'];
  $path="back_img/".basename($_FILES['image']['name']);
  

   
      $query = "UPDATE `image_back` SET `image` = '$Image' WHERE `id` = '$id'";  
      
 
      $query_run=mysqli_query($connectiondb,$query);  

  if($query_run)
  {
   
    move_uploaded_file($_FILES['image']['tmp_name'],$path);
      $_SESSION['status'] = "image_back updated";
      $_SESSION['status_code'] = "success";
      $_SESSION['status_code'] = "success";
      header('Location: image_back.php');
  }
  else 
  {
      $_SESSION['status'] = "image_back Not updated";
      $_SESSION['status_code'] = "error";
      $_SESSION['status_code'] = "success";
      header('Location: image_back.php');
  }
 }
 
?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h1 class="m-0 font-weight-bold text-primary"> Edit image_back
           
    </h1>
  </div>

   <div class="card-body">

  <?php    


    $id= $_GET["id"];
    $query="SELECT * FROM image_back WHERE id='{$id}'";
    $query_run=mysqli_query($connectiondb, $query);

    foreach ($query_run as $row )
    {
    
        ?>

      <form action="edit_back_image.php?id=<?php echo $row['id']; ?>" method="POST" enctype="multipart/form-data">
            
              
            <div class="form-group">
                <label > Edit image_back </label>
            </div>

                <div class="form-group">

                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <img src="back_img/<?php echo $row["image"]; ?>"  witdh="100%" height="100" alt="">
                <input type="file" name="image" class="form-control p-1" required >
            
                   
                   
                    </div>
                 <a href="edit_footer.php" class="btn btn-danger" > Cancel</a>
                <button  type="submit"  name="update_back_img" class="btn btn-primary" > Updated  </button>

                </form>

                <?php }?>

 <?php
include('includes/scripts.php');
//include('includes/footer.php');
?>
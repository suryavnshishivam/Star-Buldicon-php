<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php

	
	//Edit
	if(isset($_POST['update_header_nav_btn']) )
	{
		$id=$_GET['id'];
    $Image= $_FILES['image']['name'];
    $path="header_img/".basename($_FILES['image']['name']);


    $query = "UPDATE `header_nav` SET  `image` = '$Image' WHERE `id` = '$id'"; 
        
  
      $query_run=mysqli_query($connectiondb,$query);  

      if($query_run)
      {
        move_uploaded_file($_FILES['image']['tmp_name'],$path);
          $_SESSION['status'] = "header_nav Nav updated";
          $_SESSION['status_code'] = "success";
          $_SESSION['status_code'] = "success";
          header('Location: header_nav.php');
      }
      else 
      {
          $_SESSION['status'] = "header_nav Not updated";
          $_SESSION['status_code'] = "error";
          $_SESSION['status_code'] = "success";
          header('Location: header_nav.php');
      }
     }
?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h1 class="m-0 font-weight-bold text-primary"> Edit Header Logo
           
    </h1>
  </div>

   <div class="card-body">

  <?php    
 

    $id= $_GET["id"];
    $query="SELECT * FROM header_nav WHERE id='{$id}'";
    $query_run=mysqli_query($connectiondb, $query);

    foreach ($query_run as $row )
    {
    
        ?>

      <form action="edit_header_nav.php?id=<?php echo $row['id']; ?>" method="POST" enctype="multipart/form-data">
            
              
            <div class="form-group">
                <label > Edit Header Nav </label>
            </div>

                <div class="form-group">

                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <img src="header_img/<?php echo $row["image"]; ?>"  witdh="100%" height="100" alt="">
                <input type="file" name="image" class="form-control p-1" required >
              
                   
                   
                    </div>
                 <a href="edit_header_nav.php" class="btn btn-danger" > Cancel</a>
                <button  type="submit"  name="update_header_nav_btn" class="btn btn-primary" > Updated  </button>

                </form>

                <?php }?>

 <?php
include('includes/scripts.php');
//include('includes/footer.php');
?>
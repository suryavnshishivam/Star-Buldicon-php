<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php

if(isset($_POST['update_features_list_btn']))
{
  $id=$_GET["id"];
  $Image= $_FILES['img']['name'];
  $path="Featuries_img/".basename($_FILES['img']['name']);
  $Features_Id=$_POST['features_id'];
  $Features_Name = $_POST['features_name'];

  if (!empty($_FILES["img"]["name"]))
  {
     $query = "UPDATE `features_list` SET `img`='$Image',`features_id` = '$Features_Id', `features_name` = '$Features_Name' WHERE `id` = '$id'";  
   
    }
    else{
      $query = "UPDATE `features_list` SET `features_id` = '$Features_Id', `features_name` = '$Features_Name' WHERE `id` = '$id'";  
   
    }
      $query_run=mysqli_query($connectiondb,$query);  

  if($query_run)
  {
   
    move_uploaded_file($_FILES['img']['tmp_name'],$path);
      $_SESSION['status'] = "Features updated";
      $_SESSION['status_code'] = "success";
      $_SESSION['status_code'] = "success";
      header('Location: Features_list.php');
  }
  else 
  {
      $_SESSION['status'] = "Features Not updated";
      $_SESSION['status_code'] = "error";
      $_SESSION['status_code'] = "success";
      header('Location: Features_list.php');
  }
 }
 
?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h1 class="m-0 font-weight-bold text-primary"> Edit Features List
           
    </h1>
  </div>

   <div class="card-body">

  <?php    


    $id= $_GET["id"];
    $query="SELECT * FROM features_list WHERE id='{$id}'";
    $query_run=mysqli_query($connectiondb, $query);

    foreach ($query_run as $row )
    {
    
        ?>

      <form action="edit_features_list.php?id=<?php echo $row['id']; ?>" method="POST" enctype="multipart/form-data">
            
              
            <div class="form-group">
                <label > Edit features List </label>
            </div>

                <div class="form-group">

                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <img src="Featuries_img/<?php echo $row["img"]; ?>"  witdh="100%" height="100" alt="">
                <input type="file" name="img" class="form-control p-1" >
                <input type="text" name="features_id" class="form-control" value="<?php echo $row['features_id']; ?>" >
                <input type="text" name="features_name" class="form-control" value="<?php echo $row['features_name']; ?>" >
                   
                   
                    </div>
                 <a href="Features_list.php" class="btn btn-danger" > Cancel</a>
                <button  type="submit"  name="update_features_list_btn" class="btn btn-primary" > Updated  </button>

                </form>

                <?php }?>

 <?php
include('includes/scripts.php');
//include('includes/footer.php');
?>
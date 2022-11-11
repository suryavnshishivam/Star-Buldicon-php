<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php
if(isset($_POST['update_features_btn']))
{
  $id=$_GET["id"];
  $img= $_FILES['image']['name']; 
  $path="Support1/".basename($_FILES['image']['name']);
  $Title=$_POST['title'];
  $Service=$_POST['service'];
   
 if (!empty($_FILES["image"]["name"]))
  {
   $query = "UPDATE `features_support` SET `image` = '$img', `title`='$Title',`service`='$Service' WHERE `id` = '$id'";  
  }
  else{
    $query = "UPDATE `features_support` SET `title`='$Title',`service`='$Service' WHERE `id` = '$id'"; 
  }
  $query_run=mysqli_query($connectiondb,$query);  

  if($query_run)
  {
   
    move_uploaded_file($_FILES['image']['tmp_name'],$path);
   
      $_SESSION['status'] = "Features support updated";
      $_SESSION['status_code'] = "success";
      header("location:features_support.php");
  }
  else 
  {
      $_SESSION['status'] = "Features support Not updated";
      $_SESSION['status_code'] = "error";
      header("location:features_support.php");
  }
 }
 
?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h1 class="m-0 font-weight-bold text-primary"> Edit Features Support
           
    </h1>
  </div>

   <div class="card-body">

  <?php    


    $id= $_GET["id"];
    $query="SELECT * FROM features_support WHERE id='{$id}'";
    $query_run=mysqli_query($connectiondb, $query);

    foreach ($query_run as $row )
    {
    
        ?>

      <form action="edit_feature_support.php?id=<?php echo $row['id']; ?>" method="POST" enctype="multipart/form-data">
            
              
            <div class="form-group">
                <label > Edit features two deatils </label>
            </div>

                <div class="form-group">

                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <img src="Support1/<?php echo $row["image"]; ?>"  witdh="100%" height="100" alt="">
                <input type="file" name="image" class="from-control p-1" >
              
                
                <input type="text" name="title" class="form-control" value="<?php echo $row['title']; ?>" >
               
                <input type="text" name="service" class="form-control" value="<?php echo $row['service']; ?>" >
              
                   
                   
                    </div>
                 <a href="features_support.php" class="btn btn-danger" > Cancel</a>
                <button  type="submit"  name="update_features_btn" class="btn btn-primary" > Updated  </button>

                </form>

                <?php }?>

 <?php
include('includes/scripts.php');
//include('includes/footer.php');
?>
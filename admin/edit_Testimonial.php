<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php

if (isset($_POST['edit_Testimonial']))
{
    $id= $_GET['id'];
    $query="SELECT * FROM testimonial WHERE id='{$id}'";
    $query_run=mysqli_query($connectiondb, $query);


}



if(isset($_POST['update_testimonial_btn']))
{
  $id=$_GET['id'];
  $Image= $_FILES['image']['name'];
  $path="Testimonial_img/".basename($_FILES['image']['name']);
  $Bio=$_POST['bio'];
  $Name = $_POST['name'];
  $Profession = $_POST['profession'];

  if (!empty($_FILES["image"]["name"]))
  {
   $query = "UPDATE `testimonial` SET `image` = '$Image', `bio` = '$Bio', `name` = '$Name',`profession`='$Profession' WHERE `id` = '$id'";  
  }
  else
  {
    $query = "UPDATE `testimonial` SET `bio` = '$Bio', `name` = '$Name',`profession`='$Profession' WHERE `id` = '$id'";  
  }

  $query_run=mysqli_query($connectiondb,$query);  

  if($query_run)
  {
   
    move_uploaded_file($_FILES['image']['tmp_name'],$path);
      $_SESSION['status'] = "Testimonial updated";
      $_SESSION['status_code'] = "success";
      header("location: Testimonial.php");
  }
  else 
  {
      $_SESSION['status'] = "Testimonial Not updated";
      $_SESSION['status_code'] = "error";
      header("location: Testimonial.php");
  }
 }
 
?>


<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h1 class="m-0 font-weight-bold text-primary"> Edit Testimonial
           
    </h1>
  </div>

   <div class="card-body">

  <?php    


    $id= $_GET['id'];
    $query="SELECT * FROM testimonial WHERE id='{$id}'";
    $query_run=mysqli_query($connectiondb, $query);

    foreach ($query_run as $row )
    {
        ?>
        

            <form action="edit_Testimonial.php?id=<?php echo $row['id']; ?>" method="POST" enctype="multipart/form-data">
            
              
            <div class="form-group">
                <label > Edit Service </label>
            </div>

                <div class="form-group">

              
                <img src="Testimonial_img/<?php echo $row["image"]; ?>"  witdh="100%" height="100" alt="">
                <input type="file" name="image" class="form-control p-1">
                    <input type="text" name="bio" class="form-control" value="<?php echo $row['bio']; ?>" >
                    <input type="text" name="name" class="form-control" value="<?php echo $row['name']; ?>" >
                    <input type="text" name="profession" class="form-control" value="<?php echo $row['profession']; ?>" >
                   
                    </div>
                 <a href="Testimonial.php" class="btn btn-danger" > Cancel</a>
                <button  type="submit"  name="update_testimonial_btn" class="btn btn-primary" > Updated  </button>

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
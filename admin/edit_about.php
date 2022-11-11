<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php

if(isset($_POST['update_about_btn']))
{

  $id = $_GET['id'];
  $Image= $_FILES['image']['name']; 
  $path="about_image/".basename($_FILES['image']['name']);
  $Title=$_POST['title'];
  $Heading = $_POST['heading'];
 

  
  if (!empty($_FILES["image"]["name"]))
  {
    $query = "UPDATE `about` SET `image` = '$Image', `title` = '$Title', `heading` = '$Heading' WHERE `id` = '$id' "; 
  }
else{
 
 $query = "UPDATE `about` SET `title` = '$Title', `heading` = '$Heading' WHERE `id` = '$id' "; 
}

 $query_run=mysqli_query($connectiondb,$query); 

 if($query_run)
 {
   move_uploaded_file($_FILES['image']['tmp_name'],$path);
   

     $_SESSION['status'] = "About Edit";
     $_SESSION['status_code'] = "success";
      header('Location:aboutus.php');
 }
 else 
 {
     $_SESSION['status'] = "About  Not Edit";
     $_SESSION['status_code'] = "error";
     header('Location:aboutus.php');
 }
}


?>


<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h1 class="m-0 font-weight-bold text-primary"> Edit About 
           
    </h1>
  </div>

   <div class="card-body">

  <?php    
  


    $id= $_GET["id"];
    $query="SELECT * FROM about WHERE id='{$id}'";
    $query_run=mysqli_query($connectiondb, $query);

    foreach ($query_run as $row )
    {
        ?>
        

            <form action="edit_about.php?id=<?php echo $row["id"];  ?>" method="POST" enctype="multipart/form-data">
            
              
            <div class="form-group">
                <label > Edit About Data</label>
            </div>

                <div class="form-group">

                <input type="hidden" name="id">
                    
                    <img src="about_image/<?php echo $row["image"]; ?>"  witdh="100%" height="100" alt="">
                    <input type="file" name="image" class="form-control p-1" >
                    <input type="text" name="title" class="form-control" value="<?php echo $row['title']; ?>" >
                    <input type="text" name="heading" class="form-control" value="<?php echo $row['heading']; ?>" >
                   
                </div>
           
           
           


            <a href="aboutus.php" class="btn btn-danger" > Cancel</a>
                <button  type="submit"  name="update_about_btn" class="btn btn-primary" > Updated  </button>

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
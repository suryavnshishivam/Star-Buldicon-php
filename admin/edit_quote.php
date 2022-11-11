<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php

if (isset($_POST['edit_quote']))
{
    $id= $_GET['id'];
    $query="SELECT * FROM quote WHERE id='$id'";
    $query_run=mysqli_query($connectiondb, $query);


}



if(isset($_POST['update_quote_btn']))
{

  $id = $_GET['id'];
  $Image= $_FILES['image']['name'];
  $path="quote_img/".basename($_FILES['image']['name']);
  $Title=$_POST['title'];
  $Bio = $_POST['bio'];
 

  
  if (!empty($_FILES["image"]["name"]))
  {
    $query = "UPDATE `quote` SET `image` = '$Image', `title` = '$Title', `bio` = '$Bio' WHERE `id` = '$id' "; 
  }
  else{
 
 $query = "UPDATE `quote` SET `title` = '$Title', `bio` = '$Bio' WHERE `id` = '$id' "; 
}

 $query_run=mysqli_query($connectiondb,$query); 

 if($query_run)
 {
   move_uploaded_file($_FILES['image']['tmp_name'],$path);
   

     $_SESSION['status'] = "Quote Edit";
     $_SESSION['status_code'] = "success";
      header('Location:quote.php');
 }
 else 
 {
     $_SESSION['status'] = "Quote  Not Edit";
     $_SESSION['status_code'] = "error";
     header('Location:quote.php');
 }
}


?>


<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h1 class="m-0 font-weight-bold text-primary"> Edit Quote 
           
    </h1>
  </div>

   <div class="card-body">

  <?php    
 

    $id= $_GET['id'];
    $query="SELECT * FROM quote WHERE id='{$id}'";
    $query_run=mysqli_query($connectiondb, $query);

    foreach ($query_run as $row )
    {
        ?>
        

            <form action="edit_quote.php?id=<?php echo $row["id"];  ?>" method="POST" enctype="multipart/form-data">
            
              
            <div class="form-group">
                <label > Edit Quote Data</label>
            </div>

                <div class="form-group">

                <input type="hidden" name="id">
                    
                    <img src="quote_img/<?php echo $row["image"]; ?>"  witdh="100%" height="100" alt="">
                    <input type="file" name="image" class="form-control p-1" >
                    <input type="text" name="title" class="form-control" value="<?php echo $row['title']; ?>" >
                    <input type="text" name="bio" class="form-control" value="<?php echo $row['bio']; ?>" >
                   
                </div>
           
           
           


            <a href="quote.php" class="btn btn-danger" > Cancel</a>
                <button  type="submit"  name="update_quote_btn" class="btn btn-primary" > Updated  </button>

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
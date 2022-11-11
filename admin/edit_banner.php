<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php

if (isset($_POST['edit_banner_btn']))
{
    $id= $_POST['edit_banner_id'];
    $query="SELECT * FROM banner WHERE id='$id'";
    $query_run=mysqli_query($connectiondb, $query);


}



if(isset($_POST['update_banner_btn']))
{
 $id = $_GET['id'];
 $image= $_FILES['image']['name'];
 $path="banner_img/".basename($_FILES['image']['name']);
 $Title=$_POST['title'];
 $Heading=$_POST['heading'];
 $Text=$_POST['text'];

 if(!empty($_FILES["image"]["name"]))
 {
  $query = "UPDATE `banner` SET `image`='$image',`title`='$Title',`heading`='$Heading', `text`='$Text' WHERE `banner`.`id` = '$id'"; 

 }
 else
  {
    $query = "UPDATE `banner` SET `title`='$Title',`heading`='$Heading', `text`='$Text' WHERE `banner`.`id` = '$id'"; 
 }

$query_run=mysqli_query($connectiondb,$query); 



 if ($query_run)
{
  move_uploaded_file($_FILES['image']['tmp_name'],$path);
        $_SESSION['success']="Your Banner is Updated";
        header("location: banner.php");
}else
{
    $_SESSION['status']="Your Banner is Not Updated";
    header("location: banner.php");
}

}


?>


<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h1 class="m-0 font-weight-bold text-primary"> Edit Banner 
           
    </h1>
  </div>

  <div class="card-body">
  <?php    
 
     $id= $_GET['id'];
    $query="SELECT * FROM banner WHERE id='{$id}'";
    $query_run=mysqli_query($connectiondb, $query);

    foreach ($query_run as $row )
    {
        ?>
        

            <form action="edit_banner.php?id=<?php echo $row['id']; ?>" method="POST" enctype="multipart/form-data">
           
            <div class="form-group">
                <label > Banner</label>
            </div>

                <div class="form-group">
                  <img src="banner_img/<?php echo $row["image"]; ?>"  witdh="100%" height="100" alt="">
                    <input type="file" name="image" class="from-control p-1">
                    <input type="text" name="title" class="form-control" placeholder="Enter Title" value="<?php echo $row['title']; ?>">
                    <input type="text" name="heading" class="form-control" placeholder="Enter Heading" value="<?php echo $row['heading']; ?>">
                    <input type="text" name="text" class="form-control" placeholder="Enter Text" value="<?php echo $row['heading']; ?>">
                </div>
           
           
           


            <a href="banner.php" class="btn btn-danger" > Cancel</a>
                <button  type="submit"  name="update_banner_btn" class="btn btn-primary" > Updated  </button>

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
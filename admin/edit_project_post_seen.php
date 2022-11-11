<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php
if(isset($_POST['update_project_post_seen_btn']))
{
  $id=$_GET["id"];
  $image= $_FILES['image']['name']; 
  $path="project_post/".basename($_FILES['image']['name']);
  $list=$_POST['list'];
  $bio=$_POST['bio'];
  $Link=$_POST['link'];
  

  if(!empty($_FILES["image"]["name"]))
  {
    $query = "UPDATE `project_post` SET `image` = '$image' , `list`='$list' ,`bio`='$bio',`link`='$Link' WHERE `id` = '$id'"; 
  }
  else
  {
   $query = "UPDATE `project_post` SET  `list`='$list' ,`bio`='$bio',`link`='$Link' WHERE `id` = '$id'";  
  }
   $query_run=mysqli_query($connectiondb,$query);  

  if($query_run)
  {
   
    move_uploaded_file($_FILES['image']['tmp_name'],$path);

      $_SESSION['status'] = "project_post image updated";
      $_SESSION['status_code'] = "success";
      header("location:project_post_seen.php");
  }
  else 
  {
      $_SESSION['status'] = "project_post  image Not updated";
      $_SESSION['status_code'] = "error";
      header("location:project_post_seen.php");
  }
 }
 
?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h1 class="m-0 font-weight-bold text-primary"> Edit project_post 
           
    </h1>
  </div>

   <div class="card-body">

  <?php    


    $id= $_GET["id"];
    $query="SELECT * FROM project_post WHERE id='{$id}'";
    $query_run=mysqli_query($connectiondb, $query);

    foreach ($query_run as $row )
    {
    
        ?>

      <form action="edit_project_post_seen.php?id=<?php echo $row['id']; ?>" method="POST" enctype="multipart/form-data">
            
              
            <div class="form-group">
                <label > Edit project_post  </label>
            </div>

                <div class="form-group">

              
                <img src="project_post/<?php echo $row["image"]; ?>"  witdh="100%" height="100" alt="">
                <input type="file" name="image" class="from-control p-1" > <br>
                <label for="projectlist"> <span class="FieldInfo"> Enter Bio </span> </label>
                <input type="text" name="bio" class="form-control" value="<?php echo $row['bio']; ?>" >
                <br>
                <label for="projectlist"> <span class="FieldInfo"> Enter Link </span> </label>
                <input type="text" name="link" class="form-control" value="<?php echo $row['link']; ?>" >
                
            <label for="projectlist"> <span class="FieldInfo"> Chose category </span> </label>
            <select class="form-control" id="projectlist" name="list">
            
</div>


<div class="table-responsive">

<?php 
//fetching all the project_post from project_post table


$sql="SELECT * FROM  project_post";
 $stmt=$connectiondb->query($sql);

 
     while ($DataRows=mysqli_fetch_assoc($stmt))
     {

  $id=$DataRows["id"];
  $list=$DataRows["list"];


 ?>

<option> <?php  echo $list; ?> </option>
        

     <?php } ?>

</select>
</div>

                 <a href="project_post.php" class="btn btn-danger" > Cancel</a>
                <button  type="submit"  name="update_project_post_seen_btn" class="btn btn-primary" > Updated  </button>

                </form>

                <?php }?>





 <?php
include('includes/scripts.php');
//include('includes/footer.php');
?>
<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h1 class="m-0 font-weight-bold text-primary"> Add Project Post
            
    </h1>
  </div>

<?php
if (isset($_POST["submit"]))
{

    $image= $_FILES['image']['name'];
    $path="project_post/".basename($_FILES['image']['name']);
    $list=$_POST['list'];
    $Link=$_POST['link'];
    $bio=$_POST['bio'];
  
    
    
    $sql="INSERT INTO `project_post` (`image`,`list`,`bio`,`link`) VALUES ('$image','$list','$bio','$Link')";
    $query_run = mysqli_query($connectiondb,$sql); 

    
    

            if($query_run)
            {
              move_uploaded_file($_FILES['image']['tmp_name'],$path);
                $_SESSION['status'] = "Post Added";
                $_SESSION['status_code'] = "success";
                header("location:project_post.php");
            }
            else 
            {
                $_SESSION['status'] = "Post Not Added";
                $_SESSION['status_code'] = "error";
                header("location:project_post.php");
            }
        }


?>


<form action="project_post.php" method="POST" enctype="multipart/form-data"> 

<div class="modal-body">

<div class="form-group">

            <input type="file" name="image" class="from-control p-1" required>
            <br>
            
            <input type="text" name="bio" class="from-control p-1" placeholder="Enter Bio">
            <label for="projectlist"> <span class="FieldInfo"> Chose Project List</span> </label>
            <input type="text" name="link" class="form-control" placeholder="Enter Project Link" >
            <select class="form-control" id="projectlist" name="list">
            
              
            
           
            
        </div>
    </div>
    
   
    </form>


  
    

    </div>
  </div>
</div>


<div class="container-fluid">



  <div class="card-body">
    
    <?php
        if(isset($_SESSION['success'])&& $_SESSION['success']!='')
        {
          echo '<h2 class="bg-primary text-white">'.$_SESSION['success'].'</h2>';
          unset($_SESSION['success']);
        }
        if(isset($_SESSION['status'])&& $_SESSION['status']!='')
        {
          echo '<h2 class="bg-danger text-white">'.$_SESSION['status'].'</h2>';
          unset($_SESSION['status']);
        }
    
?>

    <div class="table-responsive">

       <?php 
       //fetching all the project_list from project_post table
  

       $sql="SELECT * FROM  project_list";
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

<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" name="submit" class="btn btn-primary">Save</button>
    </div>




<?php
include('includes/scripts.php');
include('includes/footer.php');
?>



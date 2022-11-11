<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h1 class="m-0 font-weight-bold text-primary"> Services
     </h1>
  </div>

  <div class="card-body">

              

  <?php    
  


  if (isset($_POST['submit']))
{

    $Image= $_FILES['image']['name'];
    $path="service_img/".basename($_FILES['image']['name']);
    $Title=$_POST['title'];
    $Link=$_POST['link'];
    $Bio = $_POST['bio'];
    
   
    $Bio= str_replace("'","\'",$Bio);
    $sql="INSERT INTO `service` (`image`,`title`,`link`,`bio`)VALUES ('$Image','$Title','$Link','$Bio')";
    
    $query_run = mysqli_query($connectiondb,$sql); 

    
    
    if($query_run)
    {
        
      move_uploaded_file($_FILES['image']['tmp_name'],$path);
        $_SESSION['status'] = "Service  Added";
        $_SESSION['status_code'] = "success";
        header("location: service.php");
    }
    else 
    {
        $_SESSION['status'] = "Service Not Added";
        $_SESSION['status_code'] = "error";
        header("location: service.php");
    }
}

?>
        

        <div class="modal fade" id="image" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Services</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="service.php" method="POST"  enctype="multipart/form-data" > 

        <div class="modal-body">

        <div class="form-group">
      
                    <input type="file" name="image" class="form-control p-1" required >
                    <input type="text" name="title" class="form-control" placeholder="Enter Title">
                    <input type="text" name="link" class="form-control" placeholder="Enter link">
                    <input type="text" name="bio" class="form-control" placeholder="Enter Bio">
                 
         </div>
            </div>
             <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="submit" class="btn btn-primary">Save</button>
            </div>
            </form>


    </div>
  </div>
</div>


            <?php
        


?>     


<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">
           <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#image">
            Add Services
            </button>
    </h6>
  </div>

  
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

       
        
   
    $query="SELECT * FROM  service  ";
    $query_run=mysqli_query($connectiondb,$query);
       
?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th>Image</th>
            <th>Title </th>
            <th>Link</th>
            <th>Bio </th>
            <th>Edit </th>
            <th>Delete</th>
          
          
          </tr>
        </thead>
        <tbody>
         
        <?php 
        global $connectiondb;
        $sql =" SELECT * FROM service";
        $query_run = $connectiondb->query($sql);
        $Sr =0;
        while ($DataRows=$query_run->fetch_array())
        {
                $Id         =  $DataRows["id"];
                $Image   =  $DataRows["image"];
                $Title  =  $DataRows["title"];
                $Link  =  $DataRows["link"];
                $Bio   =  $DataRows["bio"];
                $Sr++;
 ?>             
     
          <tr>
          <td> 
                    <?php echo $Sr;?>
                
        </td>

        
        <td> <img src="service_img/<?php echo $Image; ?>" width="100px" height="100px"></td>
        
        <td>         <?php 
                        if (strlen($Title)>3){ $Title = substr($Title,0,100).'..';} 
                        echo  $Title; ?> 
        </td>
        <td>         <?php 
                        if (strlen($Link)>3){ $Title = substr($Link,0,100).'..';} 
                        echo  $Link; ?> 
        </td>

        <td>         <?php 
                        if (strlen($Bio)>11){ $Bio = substr($Bio,0,200).'..';} 
                        echo $Bio; ?> 
        </td>
        <td>
      
            <input type="hidden" name="id" value="<?php echo $DataRows['id']; ?>">
                   <a href="edit_service.php?id=<?php echo $DataRows['id']; ?>"> <button  type="submit" name="edit_service" class="btn btn-success"> EDIT</button></a>
            </td>
            <td>
            <input type="hidden" name="id" value="<?php echo $DataRows ['id'];?>">
                <a href="Delete_service.php?id=<?php echo $DataRows['id']; ?>"> <button  class="btn btn-warning"> DELETE</button></a>
            </td>
          
          </tr>
          <?php
          }
          //else{
            //echo "No Record Found";
          
     ?>
        
        </tbody>
      </table>

    </div>
  </div>
</div>

</div>

  </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->



<?php
include('includes/scripts.php');
//include('includes/footer.php');
?>
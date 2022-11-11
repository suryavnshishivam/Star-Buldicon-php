<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"> News Footer
     </h6>
  </div>
 <div class="card-body">

  <?php    



  if (isset($_POST['submit']))
{
    
    $Title=$_POST['title'];
    $Header=$_POST['header'];
   
   
   $sql="INSERT INTO `news_footer` (`title`,`header`) VALUES ('$Title','$Header')";
    
     $query_run = mysqli_query($connectiondb,$sql); 

    if($query_run)
    {
     

        $_SESSION['status'] = "News   Added";
        $_SESSION['status_code'] = "success";
         header('Location:news_footer.php');
    }
    else 
    {
        $_SESSION['status'] = "News Not Added";
        $_SESSION['status_code'] = "error";
        header('Location:news_footer.php');
    }
}




?>



<div class="modal fade" id="image" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">News</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="news_footer.php" method="POST" > 

        <div class="modal-body">

        <div class="form-group">
      
                    <input type="text" name="title" class="form-control" placeholder="Enter title">
                    <input type="text" name="header" class="form-control" placeholder="Enter header">
                    
                     
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
<!-- <div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"> Footer News
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#image">
            News
            </button>
    </h6>
  </div> -->

  
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
    $connectiondb = mysqli_connect("localhost","root","","project1");
        
        $query="SELECT * FROM  news_footer ";
        $query_run=mysqli_query($connectiondb,$query);

?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th>Title</th>
            <th>Header</th>
            <th>Edit</th>
            <th>Delete</th>
            
         </tr>
        </thead>
        <tbody>
          <?php
         // if (mysqli_num_row($query_run)>0)
          {
            while ($row=mysqli_fetch_assoc($query_run))
            {
              ?>
     
          <tr>
            <td> <?php echo $row['id']; ?> </td>
            <td> <?php echo $row['title']; ?> </td>
            <td> <?php echo $row['header']; ?> </td>
            
           

            <td>

                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                   <a href="edit_news_footer.php?id=<?php echo $row['id']; ?>"> <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button></a>

            </td>
          
            <td>

                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                   <a href="delete_news.php?id=<?php echo $row['id']; ?>"> <button  type="submit"  class="btn btn-primary"> Delete</button></a>

            </td>
          </tr>
          <?php
          }
          //else{
            //echo "No Record Found";
          }
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
<!-- edit form -->



<?php
include('includes/scripts.php');
//include('includes/footer.php');
?>
<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>


<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h1 class="m-0 font-weight-bold text-primary"> Header Head
     </h1>
  </div>
 <div class="card-body">

  <?php    
  


  if (isset($_POST['submit']))
{   
    $Address=$_POST['address'];
    $Time=$_POST['time'];
    $Mobile=$_POST['mobile'];
   
 $sql="INSERT INTO `header` (`address`,`time`,`mobile`) VALUES ('$Address','$Time','$Mobile')"; 
    
    $query_run = mysqli_query($connectiondb,$sql); 

    if($query_run)
    {
     

        $_SESSION['status'] = "Header Head Added";
        $_SESSION['status_code'] = "success";
        header('Location: header.php');
    }
    else 
    {
        $_SESSION['status'] = "Header Head Not Added";
        $_SESSION['status_code'] = "error";
        header('Location: header.php');
    }
}




?>



<div class="modal fade" id="image" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Header</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="header.php" method="POST"> 

        <div class="modal-body">

        <div class="form-group">
        <input type="text" name="address" class="form-control p-1" placeholder="enter address">
        <input type="text" name="time" class="form-control" placeholder="Enter time ">
         <input type="text" name="mobile" class="form-control" placeholder="Enter mobile n0 ">
                    
                     
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
    <h6 class="m-0 font-weight-bold text-primary"> Add Header
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#image">
              Add Header
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





<?php 
 
        
        $query="SELECT * FROM  header ";
        $query_run=mysqli_query($connectiondb,$query);

?>  
  <div class="contentbar">
                <!-- Start row -->
  <div class="row">
	 <!-- Start col -->
	
<div class="card-body">
<div class="table-responsive">
<table id="default-datatable" class="display table table-striped table-bordered">
        <thead>
          <tr>
            <th> ID </th>
            <th>Address</th>
            <th>Time ID</th>
            <th>Mobile</th>
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
            <td> <?php echo $row['address']; ?> </td>
            <td> <?php echo $row['time']; ?> </td>
            <td> <?php echo $row['mobile']; ?> </td>

            <td>

                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                   <a href="edit_header.php?id=<?php echo $row['id']; ?>"> <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button></a>

            </td>
            

                <td>
                <input type="hidden" name="id" value="<?php echo $row ['id'];?>">
                <a href="delete_delete.php?id=<?php echo $row['id']; ?>"> <button  class="btn btn-warning"> DELETE</button></a>
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
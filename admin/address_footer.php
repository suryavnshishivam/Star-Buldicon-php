<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h1 class="m-0 font-weight-bold text-primary"> Address Fotter
     </h1>
  </div>
 <div class="card-body">

  <?php    
 


  if (isset($_POST['submit']))
{
    
    // $Title=$_POST['title'];
    // $Address=$_POST['address'];
    // $Landline_no=$_POST['landline_no'];
    $Email=$_POST['email'];
   
   $sql="INSERT INTO `address_footer` (`title`,`address`,`landline_no`,`email`) VALUES ('$Title','$Address','$Landline_no','$Email')";
    
     $query_run = mysqli_query($connectiondb,$sql); 

    if($query_run)
    {
     

        $_SESSION['status'] = "Address  Added";
        $_SESSION['status_code'] = "success";
         header('Location:address_footer.php');
    }
    else 
    {
        $_SESSION['status'] = "Address Not Added";
        $_SESSION['status_code'] = "error";
        header('Location:address_footer.php');
    }
}




?>



<div class="modal fade" id="image" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Address</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="address_footer.php" method="POST" > 

        <div class="modal-body">

        <div class="form-group">
<!--       
                    <input type="text" name="title" class="form-control" placeholder="Enter Title">
                    <input type="text" text="solid" name="address" class="form-control" placeholder="Enter Address">
                    <input type="text" name="landline_no" class="form-control" placeholder="Enter Landline_no"> -->
                    <input type="text" name="email" class="form-control" placeholder="Enter Email">
                     
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
    <h6 class="m-0 font-weight-bold text-primary"> Footer Address
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#image">
            Address
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
   
        
        $query="SELECT * FROM  address_footer ";
        $query_run=mysqli_query($connectiondb,$query);

?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <!-- <th>Title</th>
            <th>Address</th>
            <th>Landline No</th> -->
            <th>Email</th>
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
            <!-- <td> <?php //echo $row['title']; ?> </td>
            <td> <?php //echo $row['address']; ?> </td>
            <td> <?php //echo $row['landline_no']; ?> </td> -->
            <td> <?php echo $row['email']; ?> </td>
           

            <td>

                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                   <a href="edit_address.php?id=<?php echo $row['id']; ?>"> <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button></a>

            </td>
            

                <td>
                <input type="hidden" name="id" value="<?php echo $row ['id'];?>">
                <a href="delete_address.php?id=<?php echo $row['id']; ?>"> <button  class="btn btn-warning"> DELETE</button></a>
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
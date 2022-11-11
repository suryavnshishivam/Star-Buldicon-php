<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php

if(isset($_POST['update_address']))
{
    $id=$_GET["id"];
    // $Title=$_POST['title'];
    // $Address=$_POST['address'];
    // $Landline_no=$_POST['landline_no'];
    $Email=$_POST['email'];
  
  
  $query = "UPDATE `address_footer` SET `title` = '$Title' , `address`='$Address',`landline_no`='$Landline_no',`email`='$Email' WHERE `id` = '$id'";  
  $query_run=mysqli_query($connectiondb,$query);  

  if($query_run)
  {
   
 
      $_SESSION['status'] = "Address updated";
      $_SESSION['status_code'] = "success";
      header("location: address_footer.php");
  }
  else 
  {
      $_SESSION['status'] = "Address Not updated";
      $_SESSION['status_code'] = "error";
      header("location: address_footer.php");
  }
 }
 
?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h1 class="m-0 font-weight-bold text-primary"> Edit address_footer
           
    </h1>
  </div>

   <div class="card-body">

  <?php    


    $id= $_GET["id"];
    $query="SELECT * FROM address_footer WHERE id='{$id}'";
    $query_run=mysqli_query($connectiondb, $query);

    foreach ($query_run as $row )
    {
    
        ?>

      <form action="edit_address.php?id=<?php echo $row['id']; ?>" method="POST">
            
              
            <div class="form-group">
                <label > Edit address_footer </label>
            </div>

                <div class="form-group">

                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    
                    <!-- <input type="text" name="title" class="form-control" value="<?php //echo $row['title']; ?>" >
                    <input type="text" name="address" class="form-control" value="<?php //echo $row['address']; ?>" >
                    <input type="text" name="landline_no" class="form-control" value="<?php // echo $row['landline_no']; ?>" > -->
                    <input type="text" name="email" class="form-control" value="<?php echo $row['email']; ?>" >
                   
                    </div>
                 <a href="address_footer.php" class="btn btn-danger" > Cancel</a>
                <button  type="submit"  name="update_address" class="btn btn-primary" > Updated  </button>

                </form>

                <?php }?>

 <?php
include('includes/scripts.php');
//include('includes/footer.php');
?>
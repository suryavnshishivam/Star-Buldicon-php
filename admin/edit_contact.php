<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php
if(isset($_POST['update_conatct']))
{
    $id=$_GET["id"];
    $Title=$_POST['title'];
    $Heading=$_POST['heading'];
 
  
  
  $query = "UPDATE `contact_footer` SET `title` = '$Title' , `heading`='$Heading' WHERE `id` = '$id'";  
  $query_run=mysqli_query($connectiondb,$query);  

  if($query_run)
  {
   
 
      $_SESSION['status'] = "contact updated";
      $_SESSION['status_code'] = "success";
      header("location: contact.php");
  }
  else 
  {
      $_SESSION['status'] = "contact Not updated";
      $_SESSION['status_code'] = "error";
      header("location: contact.php");
  }
 }
 
?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h1 class="m-0 font-weight-bold text-primary"> Edit contact
           
    </h1>
  </div>

   <div class="card-body">

  <?php    


    $id= $_GET["id"];
    $query="SELECT * FROM contact_footer WHERE id='{$id}'";
    $query_run=mysqli_query($connectiondb, $query);

    foreach ($query_run as $row )
    {
    
        ?>

      <form action="edit_contact.php?id=<?php echo $row['id']; ?>" method="POST">
            
              
            <div class="form-group">
                <label > Edit contact </label>
            </div>

                <div class="form-group">

                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    
                    <input type="text" name="title" class="form-control" value="<?php echo $row['title']; ?>" >
                    <input type="text" name="heading" class="form-control" value="<?php echo $row['heading']; ?>" >
              
                   
                    </div>
                 <a href="edit_contact.php" class="btn btn-danger" > Cancel</a>
                <button  type="submit"  name="update_conatct" class="btn btn-primary" > Updated  </button>

                </form>

                <?php }?>

 <?php
include('includes/scripts.php');
//include('includes/footer.php');
?>
<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php
 if(isset($_POST['update_admin_btn']))
 {
 $id = $_GET['id'];
 $username=$_POST['username'];
 $email=$_POST['email'];
 $password=$_POST['password'];
 
 
  $query = "UPDATE admin SET username='$username', email='$email', password='$password' WHERE id='$id' "; 
  
  $query_run=mysqli_query($connectiondb,$query);

if ($query_run)
{
        $_SESSION['success']="Admin is Updated";
        header("location: register_admin.php");
}else
{
    $_SESSION['status']="Admin Not Updated";
    header("location: register_admin.php");

}
}

?>


<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h1 class="m-0 font-weight-bold text-primary"> Edit Admin Profile 
           
    </h1>
  </div>

  <div class="card-body">
    
  <?php    
  
 
    $id= $_GET['id'];
    $query="SELECT * FROM admin WHERE id='{$id}'";
    $query_run=mysqli_query($connectiondb, $query);

    foreach ($query_run as $row )
    {
        ?>

            <form action="edit_admin.php?id=<?php echo $row['id']; ?>" method="POST">
               
            <div class="form-group">
                <label> Username </label>
                <input type="text" name="username" value="<?php echo $row['username'] ?>" class="form-control" placeholder="Enter your Username">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="<?php echo $row['email'] ?>" class="form-control" placeholder="Enter your Email">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" value="<?php echo $row['password'] ?>" class="form-control" placeholder="Enter your Password">
            </div>
           



            <a href="register_admin.php" class="btn btn-danger" > Cancel</a>
                <button  type="submit"  name="update_admin_btn" class="btn btn-primary" > Updated  </button>

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
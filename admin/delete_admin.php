<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php 



    $id = $_GET["id"];

    $query="DELETE  FROM admin WHERE id='$id'"; 
    $query_run=mysqli_query($connectiondb,$query); 

    if ($query_run)
    {
      $_SESSION['status']="Your admin is Deleted";
      header('Location: register_admin.php');
    }else
    {
        $_SESSION['status']="Your admin is Not Deleted";
        header('Location: register_admin.php');
    }


?>


<?php
include('includes/scripts.php');
//include('includes/footer.php');
?>

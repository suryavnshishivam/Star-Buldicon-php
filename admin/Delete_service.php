<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php 



    $id = $_GET["id"];

    $query="DELETE  FROM service WHERE id='$id'"; 
    $query_run=mysqli_query($connectiondb,$query); 

    if ($query_run)
    {
      $_SESSION['status']="Your service is Deleted";
      header('Location: service.php');
    }else
    {
        $_SESSION['status']="Your service is Not Deleted";
        header('Location: service.php');
    }


?>


<?php
include('includes/scripts.php');
//include('includes/footer.php');
?>

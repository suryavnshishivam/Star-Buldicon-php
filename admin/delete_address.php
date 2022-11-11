<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php 

 

    $id = $_GET["id"];

    $query="DELETE  FROM address_footer WHERE id='$id'"; 
    $query_run=mysqli_query($connectiondb,$query); 

    if ($query_run)
    {
      $_SESSION['status']="Your address_footer is Deleted";
      header('Location: address_footer.php');
    }else
    {
        $_SESSION['status']="Your address_footer is Not Deleted";
        header('Location: address_footer.php');
    }


?>


<?php
include('includes/scripts.php');
//include('includes/footer.php');
?>

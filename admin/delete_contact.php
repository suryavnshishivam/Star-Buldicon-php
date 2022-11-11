<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php 


    $id = $_GET["id"];

    $query="DELETE  FROM contact_footer WHERE id='$id'"; 
    $query_run=mysqli_query($connectiondb,$query); 

    if ($query_run)
    {
      $_SESSION['status']="Your contact_footer is Deleted";
      header('Location: contact_footer.php');
    }else
    {
        $_SESSION['status']="Your contact_footer Not Deleted";
        header('Location: contact_footer.php');
    }


?>


<?php
include('includes/scripts.php');
//include('includes/footer.php');
?>

<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php 



    $id = $_GET["id"];

    $query="DELETE  FROM features_support WHERE id='$id'"; 
    $query_run=mysqli_query($connectiondb,$query); 

    if ($query_run)
    {
      $_SESSION['status']="Your features_support is Deleted";
        header("location: features_support.php");
    }else
    {
        $_SESSION['status']="Your features_support is Not Deleted";
        header("location: features_support.php");
    }


?>


<?php
include('includes/scripts.php');
//include('includes/footer.php');
?>

<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>

<?php 



    $id = $_GET["id"];

    $query="DELETE  FROM features_two WHERE id='$id'"; 
    $query_run=mysqli_query($connectiondb,$query); 

    if ($query_run)
    {
      $_SESSION['status']="Your features_two is Deleted";
        header("location: Features_two.php");
    }else
    {
        $_SESSION['status']="Your features_two is Not Deleted";
        header("location: Features_two.php");
    }


?>


<?php
include('includes/scripts.php');
//include('includes/footer.php');
?>

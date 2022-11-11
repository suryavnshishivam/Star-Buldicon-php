<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php 



    $id = $_GET["id"];

    $query="DELETE  FROM features_list WHERE id='$id'"; 
    $query_run=mysqli_query($connectiondb,$query); 

    if ($query_run)
    {
      $_SESSION['status']="Your features_list is Deleted";
      header('Location: Features_list.php');
    }else
    {
        $_SESSION['status']="Your features_list is Not Deleted";
        header('Location: Features_list.php');
    }


?>


<?php
include('includes/scripts.php');
//include('includes/footer.php');
?>

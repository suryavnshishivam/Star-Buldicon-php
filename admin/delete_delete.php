<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php 



    $id = $_GET["id"];

    $query="DELETE  FROM header WHERE id='$id'"; 
    $query_run=mysqli_query($connectiondb,$query); 

    if ($query_run)
    {
      $_SESSION['status']="Your header is Deleted";
      header('Location: header.php');
    }else
    {
        $_SESSION['status']="Your header is Not Deleted";
        header('Location: header.php');
    }


?>


<?php
include('includes/scripts.php');
//include('includes/footer.php');
?>

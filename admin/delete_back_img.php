<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php 

 

    $id = $_GET["id"];

    $query="DELETE  FROM image_back WHERE id='$id'"; 
    $query_run=mysqli_query($connectiondb,$query); 

    if ($query_run)
    {
      $_SESSION['status']="Your image_back is Deleted";
      header('Location: image_back.php');
    }else
    {
        $_SESSION['status']="Your image_back is Not Deleted";
        header('Location: image_back.php');
    }


?>


<?php
include('includes/scripts.php');
//include('includes/footer.php');
?>

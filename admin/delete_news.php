<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php 



    $id = $_GET["id"];

    $query="DELETE  FROM news_footer WHERE id='$id'"; 
    $query_run=mysqli_query($connectiondb,$query); 

    if ($query_run)
    {
      $_SESSION['status']="Your news_footer is Deleted";
      header('Location: news_footer.php');
    }else
    {
        $_SESSION['status']="Your news_footer Not Deleted";
        header('Location: news_footer.php');
    }


?>


<?php
include('includes/scripts.php');
//include('includes/footer.php');
?>

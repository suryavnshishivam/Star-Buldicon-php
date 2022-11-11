<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php 



    $id = $_GET["id"];

    $query="DELETE  FROM count WHERE id='$id'"; 
    $query_run=mysqli_query($connectiondb,$query); 

    if ($query_run)
    {
      $_SESSION['status']="Your count is Deleted";
        header("location: about_cout.php");
    }else
    {
        $_SESSION['status']="Your count is Not Deleted";
        header("location: about_cout.php");
    }


?>


<?php
include('includes/scripts.php');
//include('includes/footer.php');
?>

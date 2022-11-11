<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php 



    $id = $_GET["id"];

    $query="DELETE  FROM team WHERE id='$id'"; 
    $query_run=mysqli_query($connectiondb,$query); 

    if ($query_run)
    {
      $_SESSION['status']="Your team is Deleted";
      header('Location: team.php');
    }else
    {
        $_SESSION['status']="Your team is Not Deleted";
        header('Location: team.php');
    }


?>


<?php
include('includes/scripts.php');
//include('includes/footer.php');
?>

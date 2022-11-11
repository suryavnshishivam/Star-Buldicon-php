<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php 


    $id = $_GET["id"];

    $query="DELETE  FROM banner WHERE id='$id'"; 
    $query_run=mysqli_query($connectiondb,$query); 

  
        if ($query_run)
        {
          $_SESSION['status']="Your Banner is Deleted";
          header("location: banner.php");
        }else
        {
            $_SESSION['status']="Your Banner is Not Deleted";
            header("location: banner.php");
        }
    

?>


<?php
include('includes/scripts.php');
//include('includes/footer.php');
?>

<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php 



    $id = $_GET["id"];

    $query="DELETE  FROM tbl_menu WHERE id='$id'"; 
    $query_run=mysqli_query($connectiondb,$query); 

    if ($query_run)
    {
      $_SESSION['status']="Your tbl_menu is Deleted";
      header('Location: header_setting.php');
    }else
    {
        $_SESSION['status']="Your tbl_menu is Not Deleted";
        header('Location: header_setting.php');
    }


?>


<?php
include('includes/scripts.php');
//include('includes/footer.php');
?>

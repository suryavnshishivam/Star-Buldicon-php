<?php
 session_start();
 ob_start();
 $connectiondb=mysqli_connect("localhost","root","","project1");

if($connectiondb)
{
 //echo "Database Connected";
}
else
{
    header("Location: dbconfig.php");
}

if(!$_SESSION['username'])
{
    header('Location: login.php');
}

?>
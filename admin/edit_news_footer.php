<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php
if(isset($_POST['update_news']))
{
    $id=$_GET["id"];
    $Title=$_POST['title'];
    $Header=$_POST['header'];
 
  
  
  $query = "UPDATE `news_footer` SET `title` = '$Title' , `header`='$Header' WHERE `id` = '$id'";  
  $query_run=mysqli_query($connectiondb,$query);  

  if($query_run)
  {
   
 
      $_SESSION['status'] = "News updated";
      $_SESSION['status_code'] = "success";
      header("location: news_footer.php");
  }
  else 
  {
      $_SESSION['status'] = "News Not updated";
      $_SESSION['status_code'] = "error";
      header("location: news_footer.php");
  }
 }
 
?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"> Edit news_footer
           
    </h6>
  </div>

   <div class="card-body">

  <?php    


    $id= $_GET["id"];
    $query="SELECT * FROM news_footer WHERE id='{$id}'";
    $query_run=mysqli_query($connectiondb, $query);

    foreach ($query_run as $row )
    {
    
        ?>

      <form action="edit_news_footer.php?id=<?php echo $row['id']; ?>" method="POST">
            
              
            <div class="form-group">
                <label > Edit news_footer </label>
            </div>

                <div class="form-group">

                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    
                    <input type="text" name="title" class="form-control" value="<?php echo $row['title']; ?>" >
                    <input type="text" name="header" class="form-control" value="<?php echo $row['header']; ?>" >
              
                   
                    </div>
                 <a href="edit_news_footer.php" class="btn btn-danger" > Cancel</a>
                <button  type="submit"  name="update_news" class="btn btn-primary" > Updated  </button>

                </form>

                <?php }?>

 <?php
include('includes/scripts.php');
//include('includes/footer.php');
?>
<?php
session_start();
define('SITEURL','http://localhost/cafena/');
    define('LOCALHOST','localhost');
    define('DB_USERNAME','root');
    define('DB_PASSWORD','');
    define('DB_NAME','food');


   $conn=mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error($db));
   $db_select = mysqli_select_db($conn,DB_NAME) or die(mysqli_error($db));


?>
<?php 
  if(!isset($_SESSION['user']))
  {
     $_SESSION['no-login']="<div style='color:red'>Please login to access admin panel</div>";
     header('location:'.SITEURL.'admin/login.php');
  }


?>
<?php 

   //1. get the id of admin to be deleted
   $id=$_GET['id'];
   //2. sql query to delete admin
   $sql="DELETE FROM tbl_admin WHERE id=$id";
   $res = mysqli_query($conn,$sql);
   if($res==TRUE)
   {
       //echo "admin deleted";
       $_SESSION['delete']="<div style='color:blue;'>Admin deleted successfully</div>";
       header('location:'.SITEURL.'admin/manage-admin.php');
   }
   else
   {
       //echo "not deleted";
       $_SESSION['delete']="<div style='color:red;'>failed to delete admin</div>";
       header('location:'.SITEURL.'admin/manage-admin.php');
   }

?>
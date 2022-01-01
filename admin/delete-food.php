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
  if(isset($_GET['id']) && isset($_GET['image_name']))
  {
        $id=$_GET['id'];
        $image_name=$_GET['image_name'];
        if($image_name!="")
        {
            $path="../images/food/".$image_name;
            $remove=unlink($path);
            if($remove==false)
            {
                $_SESSION['upload']="<div style='color:red;'>failed to remove image file.</div>";
                header('location:'.SITEURL.'admin/manage-food.php');
                die();
            }
        }

        $sql="DELETE FROM tbl_beverages WHERE id=$id";
        $res=mysqli_query($conn,$sql);
        if($res==true)
        {
            $_SESSION['delete']="<div style='color:blue;'>food deleted successfully</div>";
            header('location:'.SITEURL.'admin/manage-food.php');
        }
        else
        {
            $_SESSION['delete']="<div style='color:red;'>failed to delete</div>";
            header('location:'.SITEURL.'admin/manage-food.php');
        }
        
  }
  else
  {
    $_SESSION['unauthorize']="<div style='color:red;'>unauthorized access.</div>";
    header('localhost:'.SITEURL.'admin/manage-food.php');

  }


?>
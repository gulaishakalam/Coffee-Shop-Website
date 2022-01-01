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
<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAFENA</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../css/admin.css">
    </head>
    <style>
       *{margin: 0; padding: 0;}
        body{background: #ecf1f4; font-family: sans-serif;background-image: linear-gradient(45deg,#328f8a,#08ac4b);}
        
      
        
        .form-wrap{ width: 320px; background: #3e3d3d; padding: 40px 20px; box-sizing: border-box; position: fixed; left: 50%; top: 50%; transform: translate(-50%, -50%);}
        h1{text-align: center; color: #fff; font-weight: normal; margin-bottom: 20px;}
        
        input{width: 100%; background: none; border: 1px solid #fff; border-radius: 3px; padding: 6px 15px; box-sizing: border-box; margin-bottom: 20px; font-size: 16px; color: #fff;}
        
        input[type="submit"]{ background: #bac675; border: 0; cursor: pointer; color: #3e3d3d;}
        input[type="submit"]:hover{ background: #a4b15c; transition: .6s;}
        
        ::placeholder{color: #fff;}
   </style>
    

    <body>
      <div class="menu text-center">
          <div class="wrapper">
              <ul>
                  <li><a href="index.php">Home</a></li>
                  <li><a href="manage-admin.php">Admin</a></li>
                  
                  <li><a href="manage-food.php">Food</a></li>
                  <li><a href="manage-order.php">Order</a></li>
                  <li><a href="logout.php">Logout</a></li>
              </ul>
          </div>
      </div>
      <br><br><br>
      <div>
    <div class="wrapper">
    <h1 style="color:#3e3d3d">Change Password</h1>
    <br><br><br>

    <?php 
       if(isset($_GET['id']))
       {
           $id=$_GET['id'];
       }
    
    ?>
    <div class="form-wrap">
        
        <form action="" method="POST">
        
            <h1>Admin</h1>
            <input type="password" name="current_password" placeholder="Current Password">
            <input type="password" name="new_password" placeholder="New Password">
            
            <input type="password" name="confirm_password" placeholder="Confirm Password">
            <input type="hidden" name="id" value="<?php echo $id;?>">
            
            <input type="submit" name="submit" value="Change Password">
        
        </form>
    
    </div>
</div>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php 
  if(isset($_POST['submit']))
  {
      $id=$_POST['id'];
      $current_password=md5($_POST['current_password']);
      $new_password=md5($_POST['new_password']);
      $confirm_password=md5($_POST['confirm_password']);
      $sql="SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";
      $res=mysqli_query($conn,$sql);
      if($res==TRUE)
      {
          $count=mysqli_num_rows($res);
          if($count==1)
          {
              if($new_password==$confirm_password)
              {
                  $sql2="UPDATE tbl_admin SET
                  password='$new_password'
                  WHERE id=$id
                  ";
                  $res2=mysqli_query($conn,$sql2);
                  if($res2==TRUE)
                  {
                    $_SESSION['change-pwd']="<div style='color:blue'>password updated</div>";
                    header('location:'.SITEURL.'admin/manage-admin.php');
                 
                  }
                  else
                  {
                    $_SESSION['change-pwd']="<div style='color:red'>password is not updated</div>";
                    header('location:'.SITEURL.'admin/manage-admin.php');
                 
                  }
              }
              else
              {
                $_SESSION['not-match']="<div style='color:red'>password did not match</div>";
                header('location:'.SITEURL.'admin/manage-admin.php');
              }

          }
          else
          {
              $_SESSION['user_not_found']="<div style='color:red'>User not found</div>";
              header('location:'.SITEURL.'admin/manage-admin.php');
          }
      }
  }

?>




<br><br><br>

<?php include('partials/footer.php'); ?>
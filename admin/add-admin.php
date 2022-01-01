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
        body{background: #ecf1f4; font-family: sans-serif; background-image: linear-gradient(45deg,#328f8a,#08ac4b);}
      
        
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
      </div><br><br><br>
<div>
    <div class="wrapper">
    <h1 style="color: #3e3d3d">Add Admin</h1>
    <br><br>
    <?php
              if(isset($_SESSION['add']))
              {
                  echo $_SESSION['add'];
                  unset($_SESSION['add']);
              }
             
              ?>
    <div class="form-wrap">
        
        <form action="" method="POST">
        
            <h1>Admin</h1>
            <input type="text" name="full_name" placeholder="Name">
            <input type="text" name="username" placeholder="Username">
            
            <input type="password" name="password" placeholder="Password">
            
            <input type="submit" name="submit" value="Add Admin">
        
        </form>
    
    </div>
</div>
</div><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>





<?php include('partials/footer.php'); ?>
<?php
if(isset($_POST['submit']))
{
   $full_name=$_POST['full_name'];
   $username=$_POST['username'];
   $password=md5($_POST['password']);
   $sql="INSERT INTO tbl_admin SET
   full_name='$full_name',
   user_name='$username',
   password='$password'
   ";
   
   $res= mysqli_query($conn ,$sql) or die(mysqli_error($db));
   if($res==TRUE)
   {
       $_SESSION['add']="<div style='color:blue;'>Admin Added successfully</div>";
       header("location:".SITEURL.'admin/manage-admin.php');
   }
   else
   {
    $_SESSION['add']="<div style='color:red;'>Admin Added unsuccessfully</div>";
    header("location:".SITEURL.'admin/add-admin.php');
   }

}


?>

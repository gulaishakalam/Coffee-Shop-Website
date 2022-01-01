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

<?php include('partials/login-check.php'); ?>

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
       body{
    background-image: linear-gradient(45deg,#328f8a,#08ac4b);
}
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

<?php 
  if(!isset($_SESSION['user']))
  {
     $_SESSION['no-login']="<div style='color:red'>Please login to access admin panel</div>";
     header('location:'.SITEURL.'admin/login.php');
  }


?>
<br><br><br>
       <div>
           <div class="wrapper">
               <h1>DASHBOARD</h1>
               <br><br><br><br>
               <?php 
            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
            
            ?>
            <br><br>
            <div class="col-4 text-center">
                   <?php
                    $sql1="SELECT * FROM tbl_admin";
                    $res1=mysqli_query($conn,$sql1);
                    $count1=mysqli_num_rows($res1);
                   
                   ?>
                   <h1><?php echo $count1; ?></h1><br>
                   ADMIN
               </div>
               <div class="col-4 text-center">
                   <?php
                    $sql="SELECT * FROM tbl_beverages";
                    $res=mysqli_query($conn,$sql);
                    $count=mysqli_num_rows($res);
                   
                   ?>
                   <h1><?php echo $count; ?></h1><br>
                   Coffee
               </div>
               <div class="col-4 text-center">
               <?php
                    $sql2="SELECT * FROM tbl_order";
                    $res2=mysqli_query($conn,$sql2);
                    $count2=mysqli_num_rows($res2);
                   
                   ?>
                   <h1><?php echo $count2; ?></h1><br>
                   TOTAL ORDERS
               </div>
               <div class="col-4 text-center">
                   <?php 
                   $sql3="SELECT SUM(total) AS TOTAL FROM tbl_order WHERE status='Delivered'";
                   $res3=mysqli_query($conn,$sql3);
                    $row=mysqli_fetch_assoc($res3);
                    $total_revenue=$row['TOTAL'];

                   ?>
                   <h1>Rs. <?php echo $total_revenue; ?></h1><br>
                   REVENUE GENERATED
               </div>
               
         
      
               <div class="clear-fix"></div>
           </div>
       </div>
       <br><br><br><br><br><br><br><br><br>
       <br><br><br><br><br><br>
<?php include('partials/footer.php'); ?>
      
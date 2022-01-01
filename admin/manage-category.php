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
       table{
           width: 100%
        }
        table tr th{
            border-bottom: 1px solid black;
            padding: 1%;
            text-align: left;
        } 
        table tr td{
            padding: 1%;

        }
        .btn-pry{
            background-color: #0984e3;
            padding: 1%;
            color:antiquewhite;
            text-decoration: none;
            font-weight: bold;
        }
        .btn-pry:hover{
            background-color: #74b9ff;
        }
        .btn-sec{
            background-color: #00b894;
            padding: 1%;
            color:antiquewhite;
            text-decoration: none;
            font-weight: bold;
        }
        .btn-sec:hover{
            background-color: #55efc4;
        }
        .btn-dan{
            background-color: #d63031;
            padding: 1%;
            color:antiquewhite;
            text-decoration: none;
            font-weight: bold;
        }
        .btn-dan:hover{
            background-color: #ff7675;
        }

   </style>

    <body>
      <div class="menu text-center">
          <div class="wrapper">
              <ul>
                  <li><a href="index.php">Home</a></li>
                  <li><a href="manage-admin.php">Admin</a></li>
                  <li><a href="manage-category.php">Category</a></li>
                  <li><a href="manage-food.php">Food</a></li>
                  <li><a href="manage-order.php">Order</a></li>
                  <li><a href="logout.php">Logout</a></li>
              </ul>
          </div>
      </div>
<div class="main-content">
    <div class="wrapper">
    <h1>Manage Category</h1>
    <br><br><br>
               <a href="#" class="btn-pry">Add Category</a>
               <br><br><br>


              
              <table>
                   <tr>
                       <th>Sno</th>
                       <th>full name</th>
                       <th>Username</th>
                       <th>Actions</th>
                       
                   </tr>
                   <tr>
                       <td>1</td>
                       <td>Gulaisha kalam</td>
                       <td>Gulaishakalam</td>
                       <td>
                            <a href="#" class="btn-sec">Update Admin</a>
                            <a href="#" class="btn-dan">Delete Admin</a>

                           
                       </td>
                   </tr>
                   <tr>
                       <td>1</td>
                       <td>Gulaisha kalam</td>
                       <td>Gulaishakalam</td>
                       <td>
                       <a href="#" class="btn-sec">Update Admin</a>
                            <a href="#" class="btn-dan">Delete Admin</a>
                           
                       </td>
                   </tr>
                   <tr>
                       <td>1</td>
                       <td>Gulaisha kalam</td>
                       <td>Gulaishakalam</td>
                       <td>
                       <a href="#" class="btn-sec">Update Admin</a>
                            <a href="#" class="btn-dan">Delete Admin</a>
                           
                       </td>
                   </tr>
               </table>
</div>
</div>
<?php include('partials/footer.php'); ?>
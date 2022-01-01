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
   <style>body{
       background-image: linear-gradient(45deg,#328f8a,#08ac4b);
   }
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
                  <li><a href="manage-food.php">Food</a></li>
                  
                  <li><a href="manage-order.php">Order</a></li>
                  <li><a href="logout.php">Logout</a></li>
              </ul>
          </div>
      </div>
<div>
    <div class="wrapper">
    <h1>Manage Food</h1>
    <br><br><br>
               <a href="<?php echo SITEURL; ?>admin/add-food.php" class="btn-pry">Add Coffee</a>
               <br><br><br>

               <?php 
               if(isset($_SESSION['add']))
               {
                   echo $_SESSION['add'];
                   unset($_SESSION['add']);
               }
               if(isset($_SESSION['delete']))
               {
                   echo $_SESSION['delete'];
                   unset($_SESSION['delete']);
               }
               if(isset($_SESSION['upload']))
               {
                   echo $_SESSION['upload'];
                   unset($_SESSION['upload']);
               }
               if(isset($_SESSION['unauthorize']))
               {
                   echo $_SESSION['unauthorize'];
                   unset($_SESSION['unauthorize']);
               }
               if(isset($_SESSION['update']))
               {
                   echo $_SESSION['update'];
                   unset($_SESSION['update']);
               }
               ?>
              
              <table>
                   <tr>
                       <th>Sno</th>
                       <th>Title</th>
                       <th>Price</th>
                       <th>Image</th>
                       
                       <th>Actions</th>
                       
                   </tr>
                   <?php
                     $sql="SELECT * FROM tbl_beverages";
                     $res=mysqli_query($conn,$sql);
                     $count=mysqli_num_rows($res);

                     $sn=1;
                     if($count>0)
                     {
                        while($row=mysqli_fetch_assoc($res))
                        {
                            $id=$row['id'];
                            $title=$row['title'];
                            $price=$row['price'];
                            $image_name=$row['image_name'];
                           
                            ?>
                                    <tr>
                                    <td><?php echo $sn++; ?></td>
                                    <td><?php echo $title; ?></td>
                                    <td><?php echo $price; ?></td>
                                    <td><?php 
                                          if($image_name=="")
                                          {
                                              echo "<div style='color:red;'>Image not added</div>";
                                          }
                                          else
                                          {
                                              ?>
                                              <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name;?>"width="100px">
                                              <?php
                                          }
                                    
                                    
                                    ?>
                                    </td>
                                    
                                    <td>
                                            <a href="<?php echo SITEURL; ?>admin/update-food.php?id=<?php echo $id; ?>" class="btn-sec">Update Coffee</a>
                                            <a href="<?php echo SITEURL; ?>admin/delete-food.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-dan">Delete Coffee</a>

                                        
                                    </td>
                                    </tr>
                            <?php 
                        }

                     }
                     else
                     {
                            echo "<tr><td colspan='7' style='color:red;'>Food not added yet.</td></tr>";
                     }
                   
                   
                   ?>
                  
              
               </table>
</div>
</div>
<?php include('partials/footer.php'); ?>
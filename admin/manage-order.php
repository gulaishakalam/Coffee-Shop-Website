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
       body{
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
    <h1>Manage Order</h1>
    
               
               <br><br><br>
               <?php 
                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }
               
               ?>
               <br><br>


              
              <table>
                   <tr>
                       <th>S.N</th>
                       <th>  Food</th>
                       <th>Price</th>
                       <th>Qty</th>
                       <th>Total</th>
                       <th>Order Date</th>
                       <th>Status</th>
                       <th>CustomerName</th>
                       <th>Contact</th>
                       <th>Email</th>
                       <th>Address</th>
                       <th>Actions</th>                       
                   </tr>
                   <?php
                   
                    $sql="SELECT * FROM tbl_order";
                    $res=mysqli_query($conn,$sql);
                    $count=mysqli_num_rows($res);
                    $sn=1;
                    if($count>0)
                    {
                        while($row=mysqli_fetch_assoc($res))
                        {
                            $id=$row['id'];
                            $food=$row['food'];
                            $price=$row['price'];
                            $qty=$row['qty'];
                            $total=$row['total'];
                            $order_date=$row['order_date'];
                            $status=$row['status'];
                            $customer_name=$row['customer_name'];
                            $customer_contact=$row['customer_contact'];
                            $customer_email=$row['customer_email'];
                            $customer_address=$row['customer_address'];
                            ?>

                                 <tr>
                                <td><?php echo $sn++; ?>. </td>
                                <td><?php echo $food; ?></td>
                                <td><?php echo $price; ?></td>
                                <td><?php echo $qty; ?></td>
                                <td><?php echo $total; ?></td>
                                <td><?php echo $order_date; ?></td>
                                <td>
                                   <?php echo $status; ?>
                                </td>
                                
                                <td><?php echo $customer_name; ?></td>
                                <td><?php echo $customer_contact; ?></td>
                                <td><?php echo $customer_email; ?></td>
                                <td><?php echo $customer_address; ?></td>
                                <td>
                                <a href="<?php echo SITEURL; ?>admin/update-order.php?id=<?php echo $id; ?>" class="btn-sec">UpdateOrder</a>
                                </td>
                                </tr>

                            <?php 
                        }
                    }
                    else
                    {
                        echo "<tr><td>Orders not Available</td></tr>";
                    }
                   
                   
                   ?>
           
               </table>
</div>
</div>
<br><br><br><br>
<?php include('partials/footer.php'); ?>
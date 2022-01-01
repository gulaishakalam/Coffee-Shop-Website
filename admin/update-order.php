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
      
        
        .form-wrap{ width: 320px; background: #3e3d3d; padding: 40px 20px; box-sizing: border-box; position: relative; left: 50%; top: 50%; transform: translate(-50%, -50%);}
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
                  <li><a href="manage-category.php">Category</a></li>
                  <li><a href="manage-food.php">Food</a></li>
                  <li><a href="manage-order.php">Order</a></li>
                  <li><a href="logout.php">Logout</a></li>
              </ul>
          </div>
      </div>
      <br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br>
<div>
    <div class="wrapper">
        <h1>Update Order</h1>
        <br><br>

        <?php
          if(isset($_GET['id']))
          {
            $id=$_GET['id'];
            $sql="SELECT * FROM tbl_order where id=$id";
            $res=mysqli_query($conn,$sql);
            $count=mysqli_num_rows($res);
            if($count==1)
            {
                $row=mysqli_fetch_assoc($res);
                $food=$row['food'];
                $price=$row['price'];
                $qty=$row['qty'];
                $status=$row['status'];
                $customer_name=$row['customer_name'];
                $customer_contact=$row['customer_contact'];
                $customer_email=$row['customer_email'];
                $customer_address=$row['customer_address'];
            }
            else
            {
                header('location:'.SITEURL.'admin/manage-order.php');

            }
          }
          else
          {
              header('location:'.SITEURL.'admin/manage-order.php');
          }
        
        ?>


        <div class="form-wrap">
        
        <form action="" method="POST">
            <h3 style="text-align: center; color:chartreuse;">Update Order</h3>
            <br>
        
            <h4 style="color: #ecf1f4;">Food name:
            <b style="color: #ecf1f4;"><?php echo $food; ?></b><h4>
                <br>
                <h4 style="color: #ecf1f4;">Price :
            <b style="color: #ecf1f4;"> Rs. <?php echo $price; ?></b><h4>
                <br>
                <h4 style="color: #ecf1f4;">Quantity: </h4>
            <input type="number" name="qty" value="<?php echo $qty; ?>">
            <br>
            <h4 style="color:white;">Status</h4><br>
            <select name="status">
                <option <?php if($status=="Ordered"){echo "selected";} ?>value="Ordered">Ordered</option>
                <option <?php if($status=="On Delivery"){echo "selected";} ?>value="On Delivery">On Delivery</option>
                <option <?php if($status=="Delivered"){echo "selected";} ?>value="Delivered">Delivered</option>
                <option <?php if($status=="Cancelled"){echo "selected";} ?>value="Cancelled">Cancelled</option>
            </select>
            <br><br>
            <h4 style="color: #ecf1f4;">Customer Name: </h4>
            <input type="text" name="customer_name" value="<?php echo $customer_name; ?>">
        
            <h4 style="color: #ecf1f4;">Customer Contact: </h4>
            <input type="text" name="customer_contact" value="<?php echo $customer_contact; ?>">
            <h4 style="color: #ecf1f4;">Customer Email: </h4>
            <input type="text" name="customer_email" value="<?php echo $customer_email; ?>">
            <h4 style="color: #ecf1f4;">Customer Address: </h4>
            <textarea type="text" name="customer_address" cols="30" rows="5"><?php echo $customer_address; ?></textarea>
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <input type="hidden" name="price" value="<?php echo $price;?>">
            <br><br>
            <input type="submit" name="submit" value="Update Order">
        
        </form>
        <?php 
         if(isset($_POST['submit']))
         {
             $id=$_POST['id'];
             $price=$_POST['price'];
            $qty=$_POST['qty'];
            $total= $price * $qty;
            $status=$_POST['status'];
            $customer_name=$_POST['customer_name'];
            $customer_contact=$_POST['customer_contact'];
            $customer_email=$_POST['customer_email'];
            $customer_address=$_POST['customer_address'];

            $sql2="UPDATE tbl_order SET
                   qty=$qty,
                   total=$total,
                   status='$status',
                   customer_name='$customer_name',
                   customer_contact='$customer_contact',
                   customer_email='$customer_email',
                   customer_address='$customer_address'
                   WHERE id=$id
            ";
            $res2=mysqli_query($conn,$sql2);
            if($res2==TRUE)
            {
                $_SESSION['update']="<div style='color:blue;'>Order Updated successfully</div>";
                header('location:'.SITEURL.'admin/manage-order.php');
            }
            else
            {
                $_SESSION['update']="<div style='color:red;'>Order Updattion Failed</div>";
                header('location:'.SITEURL.'admin/manage-order.php');
            }
        }
        
        
        ?>
        </div>
    </div>
</div>

<?php include('partials/footer.php'); ?>
<?php
   session_start();

    define('SITEURL','http://localhost/cafena/');
    define('LOCALHOST','localhost');
    define('DB_USERNAME','root');
    define('DB_PASSWORD','');
    define('DB_NAME','food');


   $conn=mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error($db));
   $db_select = mysqli_select_db($conn,DB_NAME) or die(mysqli_error($db));

   if(isset($_POST['submit']))
   {
       $food=$_POST['food'];
       $price=$_POST['price'];
       $qty=$_POST['qty'];
       $total=$price * $qty;
       $order_date=date("y-m-d h:i:sa");
       $status="ordered";
       $customer_name=$_POST['full-name'];
       $customer_contact=$_POST['contact'];
       $customer_email=$_POST['email'];
       $customer_address=$_POST['address'];

       $sql2="INSERT INTO tbl_order SET
       food='$food',
       price=$price,
       qty=$qty,
       total=$total,
       order_date='$order_date',
       status='$status',
       customer_name='$customer_name',
       customer_contact='$customer_contact',
       customer_email='$customer_email',
       customer_address='$customer_address'
       ";

       $res2=mysqli_query($conn,$sql2);
       if($res2==TRUE)
       {
           $_SESSION['order']="<div style='color:green; text-align:center; font-weight: bold; font-size: large;'>Food Ordered successfully</div>";
           header('location:'.SITEURL.'foods.php');
       }
       else
       {
           $_SESSION['order']="<div style='color:red; text-align:center; font-weight: bold; font-size: large;'>Failed to Order</div>";
           header('location:'.SITEURL.'foods.php');
       }

   }
  


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAFENA</title>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
</head>
<style>
/* 
    Author: Vijay Thapa;
    Theme: Restaurant Food Order;
    version: 1.0;
*/

/* CSS for All */
*{
    margin: 0 0;
    padding: 0 0;
    font-family: Arial, Helvetica, sans-serif;
}
.container{
    width: 80%;
    margin: 0 auto;
    padding: 1%;
}
.img-responsive{
    width: 100%;
}
.img-curve{
    border-radius: 15px;
}
body {
    background-color:#13131a;
}

.text-right{
    text-align: right;
}
.text-center{
    text-align: center;
}
.text-left{
    text-align: left;
}
.text-white{
    color: black;
}

.clearfix{
    clear: both;
    float: none;
}

a{
    color: #ff6b81;
    text-decoration: none;
}
a:hover{
    color: #ff4757;
}

.btn{
    padding: 1%;
    border: none;
    font-size: 1rem;
    border-radius: 5px;
}
.btn-primary{
    background-color: #d3ad7f;
    color: black;
    cursor: pointer;
}
.btn-primary:hover{
    color: white;
    background-color: #d3ad7f;;
}
h2{
    color: #2f3542;
    font-size: 2rem;
    margin-bottom: 2%;
}
h3{
    font-size: 1.5rem;
}
.float-container{
    position: relative;
}
.float-text{
    position: absolute;
    bottom: 50px;
    left: 40%;
}
fieldset{
    border: 1px solid white;
    margin: 5%;
    padding: 3%;
    border-radius: 5px;
}


/* CSSS for navbar section */

.logo{
    width: 10%;
    float: left;
}
.menu{
    line-height: 60px;
}
.menu ul{
    list-style-type: none;
}

.menu ul li{
    display: inline;
    padding: 1%;
    font-weight: bold;
}


/* CSS for Food SEarch Section */

.food-search{
    background-image: url(../images/bg.jpg);
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    padding: 7% 0;
}

.food-search input[type="search"]{
    width: 50%;
    padding: 1%;
    font-size: 1rem;
    border: none;
    border-radius: 5px;
}


/* CSS for Categories */
.categories{
    padding: 4% 0;
}

.box-3{
    width: 28%;
    float: left;
    margin: 2%;
}


/* CSS for Food Menu */
.food-menu{
    background-color: #ececec;
    padding: 4% 0;
}
.food-menu-box{
    width: 43%;
    margin: 1%;
    padding: 2%;
    float: left;
    background-color: white;
    border-radius: 15px;
}

.food-menu-img{
    width: 20%;
    float: left;
}

.food-menu-desc{
    width: 70%;
    float: left;
    margin-left: 8%;
}

.food-price{
    font-size: 1.2rem;
    margin: 2% 0;
}
.food-detail{
    font-size: 1rem;
    color: #747d8c;
}


/* CSS for Social */
.social ul{
    list-style-type: none;
}
.social ul li{
    display: inline;
    padding: 1%;
}

/* for Order Section */
.order{
    width: 50%;
    margin: 0 auto;
}
.input-responsive{
    width: 96%;
    padding: 1%;
    margin-bottom: 3%;
    border: none;
    border-radius: 5px;
    font-size: 1rem;
}
.order-label{
    margin-bottom: 1%; 
    font-weight: bold;
}



/* CSS for Mobile Size or Smaller Screen */

@media only screen and (max-width:768px){
    .logo{
        width: 80%;
        float: none;
        margin: 1% auto;
    }

    .menu ul{
        text-align: center;
    }

    .food-search input[type="search"]{
        width: 90%;
        padding: 2%;
        margin-bottom: 3%;
    }

    .btn{
        width: 91%;
        padding: 2%;
    }

    .food-search{
        padding: 10% 0;
    }

    .categories{
        padding: 20% 0;
    }
    h2{
        margin-bottom: 10%;
    }
    .box-3{
        width: 100%;
        margin: 4% auto;
    }

    .food-menu{
        padding: 20% 0;
    }

    .food-menu-box{
        width: 90%;
        padding: 5%;
        margin-bottom: 5%;
    }
    .social{
        padding: 5% 0;
    }
    .order{
        width: 100%;
    }
}
</style>
<body>
  <header class="header">

    <a href="#" class="logo">
        <img src="images/logo.png" alt="">
    </a>

    <nav class="navbar">
        <a href="<?php echo SITEURL; ?>index.php">home</a>
        <a href="<?php echo SITEURL; ?>foods.php">menu</a>
       
    </nav>

</header>
<?php 
  if(isset($_GET['food_id']))
  {
    $food_id=$_GET['food_id'];
    $sql="SELECT * FROM tbl_beverages WHERE id=$food_id";
    $res=mysqli_query($conn,$sql);
    $count=mysqli_num_rows($res);
    if($count==1)
    {
        $row=mysqli_fetch_assoc($res);
        $title=$row['title'];
        $price=$row['price'];
        $image_name=$row['image_name'];
    }
    else
    {
        header('location:'.SITEURL);
    }
  }
  else
  {
      header('location:'.SITEURL);
  }
  ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center" style="color:white">Fill this form to confirm your order.</h2>

            <form action="" method="POST" class="order">
                <fieldset>
                    <legend style="color:white">Selected Food</legend>

                    <div class="food-menu-img">
                        <?php 
                        
                          if($image_name=="")
                          {
                                echo "<div style='color:red;'>Image not available</div>";
                          }
                          else
                          {
                                ?>
                                    <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="CAFENA" class="img-responsive img-curve">
                                <?php

                          }
                        
                        ?>
                        
                    </div>
    
                    <div class="food-menu-desc">
                        <h3 style="color:white"><?php echo $title; ?></h3>
                        <input type="hidden" name="food" value="<?php echo $title; ?>">
                        <p class="food-price"style="color:white"><?php echo $price; ?></p>
                        <input type="hidden" name="price" value="<?php echo $price; ?>">

                        <div class="order-label" style="color:white">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend style="color:white">Delivery Details</legend>
                    <div class="order-label" style="color:white">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. Nidhi Hegde" class="input-responsive" required>

                    <div class="order-label"style="color:white">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

                    <div class="order-label"style="color:white">Email</div>
                    <input type="email" name="email" placeholder="E.g. abcd@gmail.com" class="input-responsive" required>

                    <div class="order-label"style="color:white">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

           

        </div>
        
    </section>
    <!-- fOOD sEARCH Section Ends Here -->


  
    <section class="footers">

    <div class="share">
        <a href="#" class="fab fa-facebook-f"></a>
        <a href="#" class="fab fa-twitter"></a>
        <a href="#" class="fab fa-instagram"></a>
        <a href="#" class="fab fa-linkedin"></a>
        <a href="#" class="fab fa-pinterest"></a>
    </div>

  

    <div class="credit">Designed by <span>Gulaisha & Daniel</span> | all rights reserved</div>

</section>

</body>
</html>
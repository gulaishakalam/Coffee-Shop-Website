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
    color: white;
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
    background-image: url("https://www.nescafe.com/gb/sites/default/files/coffee-strength-flavour-guide-header-desktop.jpg");
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
        
       
    </nav>
    

</header>

<!-- header section ends -->

 <section class="food-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
   
    <?php 
      if(isset($_SESSION['order']))
      {
          echo $_SESSION['order'];
          unset($_SESSION['order']);
      }
    
    
    ?>

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">BEVERAGES</h2>
           
            <?php 
              $sql="SELECT * FROM tbl_beverages ";
              $res=mysqli_query($conn,$sql);
              $count=mysqli_num_rows($res);
              
              if($count>0)
              {
                while($row=mysqli_fetch_assoc($res))
                {
                    $id=$row['id'];
                    $title=$row['title'];
                    $price=$row['price'];
                    $description=$row['description'];
                    $image_name=$row['image_name'];
                    ?>
                    <div class="food-menu-box">
                <div class="food-menu-img">
                    <?php
                        if($image_name=="")
                        {
                            echo "<div style='color:red;'>Image not available</div>";
                        }
                        else
                        {
                            ?>

                            <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name;?>"  alt="">
                            <?php
                        }
                    ?>
                    
                </div>

                <div class="food-menu-desc">
                    <h4><?php echo $title; ?></h4>
                    
                    <p class="food-detail">
                        <?php echo $description; ?>
                    </p>
                    <p class="food-price">Rs. <?php echo $price; ?></p>
                    <br>

                    <a href="<?php echo SITEURL;  ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                </div>
            </div>


                    <?php
                        
                }
              }
              else{
                  echo " <div style='color:red;'>Food not available.</div>";
              }
            
            ?>
            
            


            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->


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
    <!-- footer Section Ends Here -->

</body>
</html>
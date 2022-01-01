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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAFENA</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" > -->

</head>
<body>
    
<!-- header section starts  -->

<header class="header">

    <a href="#" class="logo">
        <img src="images/logo.png" alt="">
    </a>

    <nav class="navbar">
        <a href="<?php echo SITEURL; ?>index.php">home</a>
        
     
      
    </nav>

    
    

</header>
<!-- contact section starts  -->

<section class="contact" id="contact us">

    <h1 class="heading"> <span>contact</span> us </h1>

    <div class="row">

       <form action="" method="POST">
            <h3>Review</h3>
            <div class="inputBox">
                <span class="fas fa-user"></span>
                <input type="text" name="full_name" placeholder="name" >
            </div>
            <div class="inputBox">
                <span class="fas fa-envelope"></span>
                <input type="email" name="email" placeholder="email">
            </div>
            <div class="inputBox">
            
                <span class="fas fa-envelope-open-text"></span>
                <input type="text" name="review" placeholder="Review about the coffee">
            </div>
            <input type="submit" name="submit" value="contact now" class="btn">
        </form>

    </div>

</section>

<!-- contact section ends -->



<!-- footer section starts  -->

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

<!-- footer section ends -->





</body>
</html>
<?php
if(isset($_POST['submit']))
{
   $full_name=$_POST['full_name'];
   $email=$_POST['email'];
   $review=$_POST['review'];
   $sql="INSERT INTO tbl_review SET
   full_name='$full_name',
   email='$email',
   review='$review'
   ";
   
   $res= mysqli_query($conn ,$sql) or die(mysqli_error($db));
   if($res==TRUE)
   {
       $_SESSION['add']="<div style='color:green;'>Review Added successfully</div>";
       header("location:".SITEURL.'index.php');
   }
   else
   {
    $_SESSION['add']="<div style='color:red;'>Review Added unsuccessfully</div>";
    header("location:".SITEURL.'index.php');
   }

}


?>
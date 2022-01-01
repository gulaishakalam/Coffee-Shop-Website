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
      
        
        .form-wrap{ width: 320px; 
            background: #3e3d3d; 
            padding: 40px 20px; box-sizing: border-box; position: relative; left: 50%; top: 50%; transform: translate(-50%, -50%);}
        h1{text-align: center; color: #fff; font-weight: normal; margin-bottom: 20px;}
        
        input {width: 100%; background: none; 
            border: 1px solid #fff; border-radius: 3px; 
            padding: 6px 15px; box-sizing: border-box; margin-bottom: 20px; font-size: 16px; color: #fff;}
        
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
    <h1 style="color: #3e3d3d">Add Food</h1>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <?php
       if(isset($_SESSION['upload']))
       {
           echo $_SESSION['upload'];
           unset($_SESSION['upload']);
       }
    ?>
    <div class="form-wrap">
        
        <form action="" method="POST" enctype="multipart/form-data">
        
           <div style="color: #ecf1f4;"> Title :</div><br>
             <input type="text" name="title" placeholder="Title of the food">
             <div style="color: #ecf1f4;"> Description :</div><br>
            <textarea name="description" cols="30" rows="5" placeholder="Description of the food"></textarea>
            <br><br><br>
            <div style="color: #ecf1f4;"> Price :</div><br>
            
            <input type="decimal" name="price" placeholder="enter the price">
            <div style="color: #ecf1f4;"> Select image :</div><br>
            <input type="file" name="image">
           
            <input type="submit" name="submit" value="Add Food">
        
        </form>
          <?php 
          if(isset($_POST['submit']))
          {
              $title=$_POST['title'];
              $description=$_POST['description'];
              $price=$_POST['price'];
              
              if(isset($_FILES['image']['name']))
              {

                $image_name=$_FILES['image']['name'];
                if($image_name!="")
                {
                    $t=explode('.',$image_name);
                    $ext=end($t);
                    $image_name="food-name".rand(0000,9999).".".$ext;
                    $src=$_FILES['image']['tmp_name'];
                    $des="../images/food/".$image_name;
                    $upload=move_uploaded_file($src,$des);
                    if($upload==false)
                    {
                        $_SESSION['upload']="<div class='error'>failed to upload image.</div>";
                        header('location:'.SITEURL.'admin/add-food.php');
                        die();
                    }
                }
              }
              else
              {
                  $image_name="";
              }
              $sql="INSERT INTO tbl_beverages SET
                     title='$title',
                     description='$description',
                     price=$price,
                     image_name='$image_name'
                     
                     ";
                     $res=mysqli_query($conn,$sql);
                     if($res==true)
                     {
                            $_SESSION['add']="<div style='color:blue;'>Food added successfully.</div>";
                            header('location:'.SITEURL.'admin/manage-food.php');
                     }
                     else
                     {
                        $_SESSION['add']="<div style='color:red;'>Failed to add food.</div>";
                        header('location:'.SITEURL.'admin/manage-food.php');
                     }
         }
          
          ?>
    </div>
    </div>
</div>




<?php include('partials/footer.php'); ?>
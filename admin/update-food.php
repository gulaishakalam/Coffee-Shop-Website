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
      
        
        .form-wrap{ width: 320px; background: #3e3d3d; position: relative; padding: 40px 20px; box-sizing: border-box;  left: 50%; top: 50%; transform: translate(-50%, -50%);}
        h1{text-align: center; color: #fff; font-weight: normal; margin-bottom: 20px;}
        
        input {width: 100%; background: none; border: 1px solid #fff; border-radius: 3px; padding: 6px 15px; box-sizing: border-box; margin-bottom: 20px; font-size: 16px; color: #fff;}
        
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
      <?php
       if(isset($_GET['id']))
       {
            $id=$_GET['id'];
            $sql="SELECT * FROM tbl_beverages WHERE id=$id";
            $res=mysqli_query($conn,$sql);
            $row=mysqli_fetch_assoc($res);
            $title=$row['title'];
            $description=$row['description'];
            $price=$row['price'];
            $current_image=$row['image_name'];
           
       }
       else
       {
           header('location:'.SITEURL.'admin/manage-food.php');
       }
      ?>

      <div>
    <div class="wrapper">
    <h1 style="color: #3e3d3d">Update Food</h1>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    
    <div class="form-wrap">
    
        
        <form action="" method="POST" enctype="multipart/form-data">
        <h3 style="text-align: center; color:chartreuse;">Update Food</h3>
            <br>
        
           <div style="color: #ecf1f4;"> Title :</div><br>
             <input type="text" name="title" placeholder="Title of the food" value="<?php echo $title; ?>">
             <div style="color: #ecf1f4;"> Description :</div><br>
            <textarea name="description" cols="30" rows="5" placeholder="Description of the food"><?php echo $description; ?></textarea>
            <br><br><br>
            <div style="color: #ecf1f4;"> Price :</div><br>
            
            <input type="decimal" name="price" placeholder="enter the price" value="<?php echo $price; ?>">
            <div>
            <div style="color: #ecf1f4;"> current image :</div><br>
           <?php
             if($current_image=="")
             {
                echo "<div style='color:red;'>image not available.</div>";
             }
             else
             {
                ?>
                <img src="<?php echo SITEURL; ?>images/food/<?php echo $current_image; ?>" alt="<?php echo $title; ?>">
                <?php
             }
           
           ?>
            </div>
            <div style="color: #ecf1f4;"> select new image :</div><br>
            <input type="file" name="image">
            
             <div>
                 <input type="hidden" name="id" value="<?php echo $id; ?>">
                 <input type="hidden" name="current_image"  value="<?php echo $current_image; ?>">

            <input type="submit" name="submit" value="Update coffee">
             </div>
        </form>
        <?php
         if(isset($_POST['submit']))
         {
             $id=$_POST['id'];
            $title=$_POST['title'];
              $description=$_POST['description'];
              $price=$_POST['price'];
              $current_image=$_POST['current_image'];
          
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
                        header('location:'.SITEURL.'admin/manage-food.php');
                        die();
                    }
                    if($current_image!="")
                    {
                        $remove_path="../images/food/".$current_image;
                        $remove=unlink($remove_path);
                        if($remove==false)
                            {
                                $_SESSION['upload']="<div style='color:red;'>failed to remove current image file.</div>";
                                header('location:'.SITEURL.'admin/manage-food.php');
                                die();
                            }
                    }
                }
                else
                {
                    $image_name=$current_image;
                }
              }
              else
              {
                  $image_name=$current_image;
              }
              $sql="UPDATE tbl_beverages SET
                     title='$title',
                     description='$description',
                     price=$price,
                     image_name='$image_name'
                     
                     WHERE id=$id
                     ";
                     $res=mysqli_query($conn,$sql);
                     if($res==true)
                     {
                            $_SESSION['update']="<div style='color:blue;'>Food updated successfully.</div>";
                            header('location:'.SITEURL.'admin/manage-food.php');
                     }
                     else
                     {
                        $_SESSION['update']="<div style='color:red;'>Failed to update food.</div>";
                        header('location:'.SITEURL.'admin/manage-food.php');
                     }
         }
        
        
        ?>


        </div>
    </div>
</div>

<?php include('partials/footer.php'); ?>
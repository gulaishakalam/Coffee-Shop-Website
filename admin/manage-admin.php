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
      <br><br><br>
       <div>
           <div class="wrapper">
               <h1>Manage Admin</h1>
               <br><br>
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
              if(isset($_SESSION['update']))
              {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
              }
              if(isset($_SESSION['user_not_found']))
              {
                echo $_SESSION['user_not_found'];
                unset($_SESSION['user_not_found']);
              }
              if(isset($_SESSION['not-match']))
              {
                echo $_SESSION['not-match'];
                unset($_SESSION['not-match']);
              }
              if(isset($_SESSION['change-pwd']))
              {
                echo $_SESSION['change-pwd'];
                unset($_SESSION['change-pwd']);
              }
             
              ?>
              <br><br><br>
               <a href="add-admin.php" class="btn-pry">Add Admin</a>
               <br><br><br>
            

              
              <table>
                   <tr>
                       <th>Sno</th>
                       <th>full name</th>
                       <th>Username</th>
                       <th>Actions</th>
                       
                   </tr>
                   <?php
                    $sql="SELECT * FROM tbl_admin";
                    $res=mysqli_query($conn,$sql);
                    if($res==TRUE)
                    {
                        $count=mysqli_num_rows($res);
                        $sno=1;
                        if($count>0)
                        {
                            while($rows=mysqli_fetch_assoc($res))
                            {
                                $id=$rows['id'];
                                $full_name=$rows['full_name'];
                                $username=$rows['user_name'];
                                ?>

                    <tr>
                       <td><?php echo $sno++ ;?></td>
                       <td><?php echo $full_name;?></td>
                       <td>
                           <?php echo $username;?>
                       </td>
                       <td> 
                            <a href="<?php echo SITEURL; ?>admin/update-password.php ?id=<?php echo $id ;?>" class="btn-pry">Change password</a>
                            <a href="<?php echo SITEURL; ?>admin/update-admin.php ?id=<?php echo $id ;?>" class="btn-sec">Update Admin</a>
                            <a href="<?php echo SITEURL; ?>admin/delete-admin.php ?id=<?php echo $id ;?>" class="btn-dan">Delete Admin</a>

                           
                       </td>
                   </tr>
                                <?php 

                            }
                        }
                        else
                        {

                        }
                    }
                   
                   
                   ?>
                  
               </table>

              </div> 
               
         
      
               <div class="clear-fix"></div>
           </div>
       </div>
       <br><br><br><br><br><br><br><br><br><br>
       <?php include('partials/footer.php'); ?>
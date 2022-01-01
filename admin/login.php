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

<html>
    <head>
        <title>Login</title>
        
    <!-- custom css file link  -->
    <link rel="stylesheet" href="../css/admin.css">
        
    </head>
    <style>
        @import url(https://fonts.googleapis.com/css?family=Roboto:300);
header .header{
  background-color: #fff;
  height: 45px;
}
header a img{
  width: 134px;
margin-top: 4px;
}
.login-page {
  width: 360px;
  padding: 8% 0 0;
  margin: auto;
}
.login-page .form .login{
  margin-top: -31px;
margin-bottom: 26px;
}
.form {
  position: relative;
  z-index: 1;
  background: #d3ad7f;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: wheat;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.loginbtn {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background-color: black;
  background-image: linear-gradient(45deg,#328f8a,#08ac4b);
  width: 100%;
  border: 0;
  padding: 15px;
  color: black;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}
.form .message a {
  color: #4CAF50;
  text-decoration: none;
}

.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}

body {
  background-color: #328f8a;
  background-image: linear-gradient(45deg,#328f8a,#08ac4b);
  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}
    </style>
    <body>
        <br><br><br><br><br>
    <div class="login-page">
      <div class="form">
        <div class="login">
          <div class="login-header">
            <h3>LOGIN</h3>
            <br>
            <p>Please enter your credentials to login.</p>
            
          </div>
          
        </div>
        <?php 
            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
            if(isset($_SESSION['no-login']))
            {
                echo $_SESSION['no-login'];
                unset($_SESSION['no-login']);
            }
            
            ?>
            <br>
        <form class="login-form" method="POST">
          <input type="text" name="username" placeholder="username">
          <input type="password" name="password" placeholder="password">
          <input type="submit" name="submit" value="login" class="loginbtn">
          
          
        </form>
      </div>
    </div>
    <br><br><br><br><br>
   

    </body>
</html>
<?php 

if(isset($_POST['submit']))
{
     $username=$_POST['username'];
     $password=md5($_POST['password']);
     $sql="SELECT * FROM tbl_admin WHERE user_name='$username' AND password='$password'";
     $res=mysqli_query($conn,$sql);

     $count=mysqli_num_rows($res);
     if($count==1)
     {
            $_SESSION['login']="<div style='color:green'>Login Successful.</div>";
            $_SESSION['user']=$username;
            header('location:'.SITEURL.'admin/');
     }
     else
     {
        $_SESSION['login']="<div style='color:red'>username or password did not match</div>";
        header('location:'.SITEURL.'admin/login.php');
     }
}


?>
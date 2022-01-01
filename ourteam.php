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
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About Us</title>
    <link rel="stylesheet" href="css/about_style.css" />
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon" />
  </head>
  <body>
    <section>
      <div class="heading">
        <a href="index.html">
          <div class="web_logo container-flex">
            <div class="logo_image">
              <img src="images/logo.png" alt="" />
            </div>
            <div class="logo_text">
              <h1>CAFENA</h1>
            </div>
          </div>
        </a>
      </div>

      <div class="site_info">
        <div class="info_head">
          <h1>A website for people to order coffee and much more..</h1>
        </div>
        <div class="info_sub">
          <h2>
            This website provides the list of coffees available and varieties of coffees from all over the World.
          </h2>
        </div>
      </div>

      <div class="dev_text">
        <h3>More about the Devs</h3>
      </div>

      <div class="dev_det container-flex">
        <div class="dev-photo">
          <img src="images/Gulaisha2.png" alt="profile photo 1" />
        </div>
        <div class="dev_info">
          <h1>Gulaisha Kalam</h1>
          <h1>4NM19CS088</h1>
          <h1>Section B</h1>
        </div>
      </div>

      <div class="dev_det container-flex">
        <div class="dev_info">
          <h1>Daniel Aarons</h1>
          <h1>4NM19CS049</h1>
          <h1>Section A</h1>
        </div>
        <div class="dev-photo">
          <img src="images/daniel-imresizer.png" alt="profile photo 2" />
        </div>
      </div>

      <div class="go_back">
        <a href="<?php echo SITEURL; ?>index.php" class="nav_back">
          <div class="nav_back_info">
            <div class="nav_back_text">
              <h3>Go back</h3>
            </div>
          </div>
        </a>
      </div>

      <footer>
        <p class="footer_text">Copyright &copy; CAFENA 2021</p>
      </footer>
    </section>
  </body>
</html>

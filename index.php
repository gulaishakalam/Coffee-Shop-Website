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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CAFENA</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>

    <link href="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css" rel="stylesheet">
    
    <script src="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
     header{
    position: sticky;
    top: 0;
    z-index:1;
    background-color: #001524;
    opacity:0.9;
   
}
header .navbar{
    display:flex;
    justify-content:space-evenly;
    align-items: center;
    height: 15vh;
    max-width:100%;
   
}
.navs ul{
    display:flex;
    justify-content:space-evenly;
    padding:1rem;
    margin: -2rem;
    height: 0vh;

}
div .navs{
    display:block;
    margin-bottom: 70px;
   position: relative;
   left:12rem;
}
.navs ul li{
    margin: 2.5rem 1rem;
    list-style-type:none;
    
}
div .list1{
    height:14.5vh;
}
div .list1:hover  {
    background-color: #d3ad7f;
    color:black;
    
}
div .navs ul li a:hover{
     color:black;
}
div .navs ul li a{
    font-weight: bold;
    color:white;
  
    font-size: 13px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}


        </style>

</head>

<body style="overflow-x:hidden;">

    

    <header>
          <div class="navbar">
            <div class="heading">
            <a class="navbar-brand " href="#overrideBootstrap" style="position:relative;right:160px;">
                <img src="./logo.jpg" >
                <span style="color:white;font-weight:bold;">CAFENA</span>
            </a>
            </div>
          
            
            <div class="navs">
               
              </label>
              <ul>
                <div class="list1"><li><a href="index.php">HOME</a></li></div>
               <div class="list1"><li><a  href="#aboutTitle">ABOUT</a></li></div>
                <div class="list1"><li><a href="foods.php">MENU</a></li></div>
                <div class="list1"><li><a href="ourteam.php">OUR TEAM</a></li></div>
                <div class="list1"><li><a href="review.php">REVIEW</a></li></div>
                <div class="list1"><li><a href="#locationTitle">LOCATIONS</a></li></div>
              </ul>
            </div>
            </div>
</header>

    <content>

        <div id="slides" class="carousel slide" data-ride="carousel">
           
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="media/slide1.jpg">
                    <div class="carousel-caption" id="caption1">
                        <h1 class="display-2">Fresh</h1>
                        <h3>Premium hand-brewed coffee</h3>
                        <a href="foods.php"><button type="button" class="btn btn-outline-light btn-lg">GET YOURSELF</button></a>
                        
                    </div>
                </div>
                
            </div>
        </div>


        <div class="container-fluid padding" id="threeIcons">
            <div class="row text-center padding maxWidth">
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <i class="fas fa-coffee" id="faStyle"></i>
                    <h3>Fresh Coffee</h3>
                    <p>Freshly brewed using premium ROAST coffee beans.</p>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <i class="fas fa-tag" id="faStyle"></i>
                    <h3>Cash On Delivery</h3>
                    <p>We provide Cash on delivery on all Coffees for online Orders.</p>
                </div>
                <div class="col-sm-12 col-md-4">
                    <i class="fas fa-wifi" id="faStyle"></i>
                    <h3>Free WiFi</h3>
                    <p>Enjoy high-speed internet while drinking the best coffee in town.</p>
                </div>
            </div>
        </div>

        
        <div id="about">
            <div class="container-fluid padding" id="aboutTitle">
                <div class="row welcome text-center">
                    <div class="col-12">
                        <h1 class="display-4" style="text-decoration:underline;">About CAFENA</h1>
                    </div>
                </div>
            </div>
            <div class="container-fluid padding" id="aboutGrid">
                <div class="row text-center padding">
                    <div class="col-xs-12 col-md-6 order-md-1 col-md-offset-4">
                        <img src="media/about1.jpg">
                    </div>
                    <div class="col-xs-12 col-md-6 order-md-2 col-md-offset-4" >
                        <h3 id="ra-md" style="font-weight:bold;text-decoration:underline;">Our Story</h3>
                        <p style="font-weight:bold;">CAFENA was founded in 1988 by coffee ethusiast, Jack Roast. He set out with the goal of providing the best coffee experience and set up the first shop in Lansoe, PA. The shop quickly became known as the city's coffee spot and led to the rise of other locations.</p>
                    </div>
                    <div class="col-sm-12 col-md-6 order-md-4 col-md-offset-4" >
                        <img src="media/about2.jpg">
                    </div>
                    <div class="col-sm-12 col-md-6 order-md-3 col-md-offset-4" >
                        <h3 id="la-md" style="font-weight:bold; text-decoration:underline;">The CAFENA Mission</h3>
                        <p style="font-weight:bold;">At CAFENA, we strive to provide the best and most premium coffee experience. We accomplish this by using fresh ingredients and hand crafting all of our signature coffee roasts.</p>
                    </div>
                    <div class="col-sm-12 col-md-6 order-md-5 col-md-offset-4" >
                        <img src="media/about3.jpg">
                    </div>
                    <div class="col-sm-12 col-md-6 order-md-6 col-md-offset-4">
                        <h3 id="ra-md" style="font-weight:bold;text-decoration:underline;">Coffee Experts</h3>
                        <p style="font-weight:bold;">All of our baristas go through extensive training in hand brewing and crafting our signature coffee roasts, with the goal that every customer receives a premium coffee experience.</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="container-fluid padding" id="locationTitle" name="locationTitle">
            <div class="row welcome text-center">
                <div class="col-12">
                    <h1 class="display-4" style="text-decoration:#d3ad7f underline;">Our Locations</h1>
                </div>
            </div>
        </div>

        <div class="container-fluid padding" id="locations" style="padding-bottom :60px;">
            <div class="row padding justify-content-center maxWidth">
                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
                    <div class="card" >
                        <div class="row no-gutters">
                          <div class="col-lg-6">
                            <img src="media/location1.jpg" class="card-img" alt="...">
                          </div>
                          <div class="col-lg-6">
                            <div class="card-body">
                              <h5 class="card-title">Mangalore, KA</h5>
                              <p class="card-text">Nanthoor<br>06010</p>
                              <p class="card-text">Hours<br>Mon-Fri: 9am-5pm<br>Sat: 10am-4pm<br>Sun: closed</p>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
                    <div class="card" >
                        <div class="row no-gutters">
                          <div class="col-lg-6">
                            <img src="media/location2.png" class="card-img" alt="...">
                          </div>
                          <div class="col-lg-6">
                            <div class="card-body">
                              <h5 class="card-title">Chennai, TN</h5>
                              <p class="card-text">Otteri<br>22078</p>
                              <p class="card-text">Hours<br>Mon-Fri: 9am-5pm<br>Sat: 10am-4pm<br>Sun: closed</p>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
                    <div class="card" >
                        <div class="row no-gutters">
                          <div class="col-lg-6">
                            <img src="media/location3.jpg" class="card-img" alt="...">
                          </div>
                          <div class="col-lg-6">
                            <div class="card-body">
                              <h5 class="card-title">Mumbai, MH</h5>
                              <p class="card-text">Dadar<br>22015</p>
                              <p class="card-text">Hours<br>Mon-Fri: 9am-5pm<br>Sat: 10am-4pm<br>Sun: closed</p>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
                    <div class="card">
                        <div class="row no-gutters">
                          <div class="col-lg-6">
                            <img src="media/location4.jpg" class="card-img" alt="...">
                          </div>
                          <div class="col-lg-6">
                            <div class="card-body">
                              <h5 class="card-title">Kolkata, WB</h5>
                              <p class="card-text">Lotus.<br>19050</p>
                              <p class="card-text">Hours<br>Mon-Fri: 9am-5pm<br>Sat: 10am-4pm<br>Sun: closed</p>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>


      
            
    </content>

    <footer>
        <div class="container-fluid padding maxWidth">
            <div class="row text-center">
                <div class="col-md-4">
                    <h1>CAFENA</h1>
                    <hr class="light">
                    <p>974-557-2705</p>
                    <p>coffee@cafena.com</p>
                    <p>100 Bean Drive</p>
                    <p> KA, 33297</p>
                </div>
                <div class="col-md-4">
                    <h5>Our Hours</h5>
                    <hr class="light">
                    <p>Monday-Friday: 9am - 5pm</p>
                    <p>Saturday: 10am - 4pm</p>
                    <p>Sunday: closed</p>
                </div>
                <div class="col-md-4">
                    <h5>Our Locations</h5>
                    <hr class="light">
                    <p>54 Mangalore, KA 06010</p>
                    <p>524 Chennai, TN 34761</p>
                    <p>80 Mumbai, MH 22015</p>
                    <p>17 Kolkatta, WB 19050</p>
                </div>
                <div class="col-12">
                    <hr class="light">
                    <h6>&copy; 2020 CAFENA</h6>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>
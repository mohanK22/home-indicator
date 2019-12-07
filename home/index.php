<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<!-- Head -->

<head>
  <title>Home Indicator</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">

  <!-- Default-JavaScript-File -->
  <script type="text/javascript" src="../js/jquery-2.1.4.min.js"></script>
  <script type="text/javascript" src="../js/bootstrap.js"></script>
  <!-- //Default-JavaScript-File -->

  <!-- for banner -->
  <link rel="stylesheet" href="../styles/mainStyles.css" />
  <!-- for banner -->

  <!-- default css files -->
  <link rel="stylesheet" href="../styles/bootstrap.css" type="text/css" media="all">
  <link rel="stylesheet" href="../styles/indexstyle.css" type="text/css" media="all">

  <link rel="stylesheet" href="../styles/font-awesome.min.css" />
  <!-- default css files -->

  <!--web font-->
  <link
    href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
    rel="stylesheet">

  <link href="//fonts.googleapis.com/css?family=Hind:300,400,500,600,700&amp;subset=devanagari,latin-ext"
    rel="stylesheet">
  <!--//web font-->

  <!-- scrolling script -->
  <script type="text/javascript">
    jQuery(document).ready(function ($) {
      $(".scroll").click(function (event) {
        event.preventDefault();
        $('html,body').animate({
          scrollTop: $(this.hash).offset().top
        }, 1000);
      });
    });
  </script>
  <!-- //scrolling script -->

  <style type="text/css">
    body {
      font-family: Arail, sans-serif;
    }

    /* Formatting search box */
    .search-box {
      width: 300px;
      position: relative;
      display: inline-block;
      font-size: 14px;
    }

    .search-box input[type="text"] {
      height: 32px;
      padding: 5px 10px;
      border: 1px solid #CCCCCC;
      font-size: 14px;
    }

    .result {
      position: absolute;
      z-index: 999;
      top: 100%;
      left: 0;
    }

    .search-box input[type="text"],
    .result {
      width: 100%;
      box-sizing: border-box;
    }

    /* Formatting result items */
    .result p {
      margin: 0;
      padding: 7px 10px;
      border: 1px solid #CCCCCC;
      border-top: none;
      cursor: pointer;
    }

    .result p:hover {
      background: #f2f2f2;
    }
  </style>

  <script type="text/javascript">
    $(document).ready(function () {
      $('.search-box input[type="text"]').on("keyup input", function () {
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if (inputVal.length) {
          $.get("search.php", {
            term: inputVal
          }).done(function (data) {
            // Display the returned data in browser
            resultDropdown.html(data);
          });
        } else {
          resultDropdown.empty();
        }
      });

      // Set search input value on click of result item
      $(document).on("click", ".result p", function () {
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
      });
    });
  </script>

</head>

<!-- Body -->

<body>

  <!-- banner -->
  <div class="banner" id="home">
    <nav class="navbar navbar-default">

      <div class="navbar-header navbar-left">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
          data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <h1><a class="navbar-brand" href="index.php"><span>Home</span> Indicator</a></h1>
        <i class="fa fa-home" aria-hidden="true"></i>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
        <nav class="link-effect-2" id="link-effect-2">
          <ul class="nav navbar-nav">
            <li><a href="#search" class="scroll"><span data-hover="Search">Search</span></a></li>
            <li><a href="#about" class="scroll"><span data-hover="About Us">About Us</span></a></li>
            <li><a href="#contactus" class="scroll"><span data-hover="Contact Us">Contact Us</span></a></li>
            <li><a href="login.php"><span data-hover="Login">Login</span></a></li>
            <li><a href="registration.php"><span data-hover="Registration">Registration</span></a></li>
          </ul>
        </nav>
      </div>

    </nav>
  </div>
  <!-- //banner -->

  <!-- slider -->
  <div id="exampleSlider">
    <div>
      <!-- <h2>Whatever good things we build <span>end up building us</span></h2> -->
    </div>
    <div>
      <!-- <h2>Whatever good things we build <span>end up building us</span></h2> -->
    </div>
    <div>
      <!-- <h2>Whatever good things we build <span>end up building us</span></h2> -->
    </div>
    <div>
      <!-- <h2>Whatever good things we build <span>end up building us</span></h2> -->
    </div>
    <div>
      <!-- <h2>Whatever good things we build <span>end up building us</span></h2> -->
    </div>
  </div>
  <!-- //slider -->


  <section id="search" class="section section-light" style="background-color: #E5E4E2;">

    <div class="row">

      <div id="searchcontent" class="card container" style="width: 95rem; border-radius: 25px;">
        <div class="card-body">

          <h2 id="" class="card-title text-center" style="font-size: 45px;">Search Property</h2>
          <h5 class="card-subtitle mb-2 text-muted text-center" style="margin-top: 10px;">Find your wish Rental
            Property.</h5>
          <hr>

          <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">

            <div class="row">


              <div class="form-group search-box" style="width: 45%; height: 25%;">
                <input id="locdata" name="locdata" type="text" class="form-control" autocomplete="off"
                  placeholder="Search for Location or Place..." />
                <div class="result"></div>
              </div>

              <!-- 
              <div class="form-group col-sm-4">

                <select class="form-control" aria-describedby="locations-addon">
                   <option>Location</option>
                   <option>Mumbai</option>
                   <option>Thane</option>
                   <option>Pune</option>
                   <option>Raigad</option>
                </select>   

              </div>                      

              <div  class="form-group col-sm-4">  

                <select class="form-control">
                   <option>Flat Type</option>
                   <option>1 RK</option>
                   <option>1 BHK</option>
                   <option>2 BHK</option>
                </select>             
                      
              </div>

              <div class="form-group col-sm-4">

                <select class="form-control">
                   <option>Rent</option>
                </select>             
                      
              </div>  
-->

            </div>



            <div id="btnsearch" class="row">
              <center>
                <div class="form-group">
                  <button class="btn btn-primary btn-lg" id="searchloc" name="searchloc" type="submit">Search</button>
                </div>
              </center>
            </div>

          </form>

        </div>
      </div>
    </div>

  </section>


  <?php

      if(isset($_POST['searchloc'])){

        $location_name = $_POST['locdata'];

        $_SESSION['location'] = htmlentities($location_name);

        $test = $_SESSION['location'];

        echo "<script type='text/javascript'>window.top.location='http://localhost/home-indicator/home/searched.php';</script>";
        //header('Location: http://localhost/phpsandbox/home-indicator/home/searched.php');  
      }

    ?>


  <section id="about" style="margin-top: 50px; margin-bottom: 50px; background-color: #E5E4E2;">

    <div class="container">

      <h2 class="card-title text-center" style="font-size: 45px; margin-top: 30px;">About Us</h2>
      <hr>

      <div id="about" class="banner-bottom-image-w3text">
        <div class="col-sm-12">

          <h4 class="card-subtitle mb-2 text-muted text-center" style="margin-top: 20px; margin-bottom: 5px;">
            Who We Are
          </h4>

          <div class="container">
            <hr>
          </div>

          <p style="font-size: 18px;">
            Home Indicator is an internet portal dedicated to meet every aspect of the consumers needs in the real
            estate industry. It is a forum where buyers and tenant can exchange information, quickly, effectively and
            inexpensively.
          </p>

          <br>

          <p style="font-size: 18px;">
            Our aim is to empower every person in the country to independently connect with buyers and sellers online.
            Want to sell property to buy a home for your family? We’re here for you. Whatever job you’ve got, we promise
            to get it done.
          </p>

        </div>
        <div class="clearfix"> </div>
      </div>

    </div>

  </section>



  <!-- Count -->

  <!--
  
<div class="count-agileits" id="stats">
  <h3 class="heading"><span>Our fun facts</span></h3>
    <div class="container">
          <div class="count-grids">
          <div class="count-bgcolor-w3ls">
            <div class="col-md-3 count-grid">
              <div class="count hvr-bounce-to-bottom">
                <div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max='210' data-delay='.5' data-increment="1">210</div>
                  <span></span>
                  <h5>Professional agents</h5>
              </div>
            </div>
            <div class="col-md-3 count-grid">
              <div class="count hvr-bounce-to-bottom">
                <div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max='700' data-delay='.5' data-increment="1">700</div>
                  <span></span>
                  <h5>Property for sale</h5>
              </div>
            </div>
            <div class="col-md-3 count-grid">
              <div class="count hvr-bounce-to-bottom">
                <div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max='40' data-delay='.5' data-increment="1">40</div>
                  <span></span>
                  <h5>Property locations </h5>
              </div>
            </div>
            <div class="col-md-3 count-grid">
              <div class="count hvr-bounce-to-bottom">
                <div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max='490' data-delay='.5' data-increment="1">490</div>
                  <h5>Rental Apartments</h5>
                </div>
            </div>
            <div class="clearfix"></div>
            </div>
          </div>
  </div>
</div>

  -->

  <!-- //Count -->


  <!-- footer -->

  <div class="agile-footer" id="contactus">
    <div class="container">

      <div class="aglie-info-logo">
        <h2><a href="index.php">Home Indicator</a></h2>
      </div>

      <ul class="aglieits-nav">
        <li><a href="#search">Search </a><i>|</i></li>
        <li><a href="#about">About Us</a><i>|</i></li>
        <li><a href="login.php">Login</a><i>|</i></li>
        <li><a href="registration.php">Registration</a><i>|</i></li>
      </ul>

      <div class="w3layouts_mail_grid">

        <div class="col-md-3 w3layouts_mail_grid_left">

          <div class="w3layouts_mail_grid_left1">
            <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
          </div>

          <div class="w3layouts_mail_grid_left2">
            <h3>Mail Us</h3>
            <a href="mailto:info@example.com">info@example.com</a>
          </div>

        </div>

        <div class="col-md-3 w3layouts_mail_grid_left">

          <div class="w3layouts_mail_grid_left1">
            <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
          </div>

          <div class="w3layouts_mail_grid_left2">
            <h3>Address</h3>
            <p>PO Box 8568954 Thane, India</p>
          </div>

        </div>

        <div class="col-md-3 w3layouts_mail_grid_left">
          <div class="w3layouts_mail_grid_left1">
            <span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>
          </div>

          <div class="w3layouts_mail_grid_left2">
            <h3>Phone</h3>
            <p>+(91) 18025 14950</p>
          </div>

        </div>

        <div class="col-md-3 w3layouts_mail_grid_left">

          <div class="w3layouts_mail_grid_left1">
            <span class="glyphicon glyphicon-print" aria-hidden="true"></span>
          </div>

          <div class="w3layouts_mail_grid_left2">
            <h3>Fax</h3>
            <p>+(91) 18025 14950</p>
          </div>

        </div>

        <div class="clearfix"> </div>

      </div>

      <div class="copy-right">
        <p>© 2017 Home Indicator</p>
      </div>

    </div>
  </div>

  <!-- //footer -->


  <script type="text/javascript" src="../js/numscroller-1.0.js"></script>
  <!-- numscroller js file -->


  <!-- banner slider js files -->
  <script src="../js/mainScript.js"></script>
  <script src="../js/rgbSlide.min.js"></script>
  <!-- // banner slider js files -->

  <!-- Here stars scrolling -->
  <script src="../js/SmoothScroll.min.js"></script>
  <script type="text/javascript" src="../js/move-top.js"></script>
  <script type="text/javascript" src="../js/easing.js"></script>
  <!-- here stars scrolling icon -->

  <script type="text/javascript">
    $(document).ready(function () {
      /*
        var defaults = {
        containerID: 'toTop', // fading element id
        containerHoverID: 'toTopHover', // fading element hover id
        scrollSpeed: 1200,
        easingType: 'linear' 
        };
      */

      $().UItoTop({
        easingType: 'easeOutQuart'
      });

    });
  </script>
  <!-- //here ends scrolling icon -->
  <!-- Here ends scrolling -->

</body>

</html>
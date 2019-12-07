<?php
echo "<style> body { background-image: url('../imgs/login-reg-background.jpg'); background-repeat: round;
    background-size: cover; }</style>";
	require_once '../inc/bootstrap-header.php'
?>

<?php 
  require('../inc/config/MySQLConnection.php');
?>

<?php
  if(!isset($_GET["id"])){
    header("Location : http://localhost/phpsandbox/home-indicator/home/index.php");
  }

  /*
  session_start();

  $contact_owner = "";

  $_SESSION["contact_owner"] = $contact_owner;

  if($contact_owner == "" ){
      $contact_owner = "false";
      $_SESSION["contact_owner"] = $contact_owner;
  }*/

?>

<?php

  $owner_name = "";

  $sql = "SELECT * FROM properties WHERE property_id = " . $_GET["id"];
  $result = $conn->query($sql);

  if($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
      # code...
      $owner_name = $row['posted_by'];
?>
  <br>

    <div style="margin-left: 22px;">
        <form method="post">
          <button id="back" name="back" class="btn btn-secondary text-center"><i class="fa fa-angle-left" aria-hidden="true"></i> BACK</button>
        </form>
        
        <?php

          if(isset($_POST['back'])){
            header('Location: http://localhost/phpsandbox/home-indicator/home/');
          }

        ?>


    </div>

    <br>

<div class="row">
	<div class="container col-sm-11">

    <div class="card" style="width: 100%">
      <div class="card-body">
        <h3 class="card-title text-muted"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;Prop. ID : <?php echo $row['property_id']; ?>, Property Title : <?php echo $row['property_title']; ?></h3>
        <h6 class="card-text text-muted"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;Property Address : <?php echo $row['property_addr']; ?></h6>
      </div>
    </div>

    <br>
		
		<!-- Card, Carousel -->
		<div class="card" style="width: 100%;">

			<!-- Carousel goes here -->
  			<!-- 
  				<img class="card-img-top" src="..." alt="Card image cap"> 
  			-->

        <!-- 
  			
  			<div id="carouselRooms" class="carousel slide" data-ride="carousel">
  				
  				<ol class="carousel-indicators">
  					<li data-target="#carouselRooms" data-slide-to="0" class="active"></li>
  					<li data-target="#carouselRooms" data-slide-to="1"></li>
  					<li data-target="#carouselRooms" data-slide-to="2"></li>
  					<li data-target="#carouselRooms" data-slide-to="3"></li>
  				</ol>

  				<div class="carousel-inner">

  					<div class="carousel-item active">
  						<img src="../imgs/House-Key.jpg" class="d-block w-100" alt="First Slide" style="width: 360px; height: 640px;">
  					</div>

  					<div class="carousel-item">
  						<img src="../imgs/kitchen-stove-sink-kitchen-counter-349749.jpeg" class="d-block w-100" alt="Second Slide" style="width: 360px; height: 640px;">
  					</div>

  					<div class="carousel-item">
  						<img src="../imgs/pexels-photo-271816.jpeg" class="d-block w-100" alt="Third Slide" style="width: 360px; height: 640px;">
  					</div>  

  					<div class="carousel-item">
  						<img src="../imgs/pexels-photo-271632.jpeg" class="d-block w-100" alt="Fourth Slide" style="width: 360px; height: 640px;">
  					</div>  										  					
  				</div>

  				<a class="carousel-control-prev" href="#carouselRooms" role="button" data-slide="prev">
  					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
  					<span class="sr-only">Previous</span>
  				</a>

  				<a class="carousel-control-next" href="#carouselRooms" role="button" data-slide="next">
  					<span class="carousel-control-next-icon" aria-hidden="true"></span>
  					<span class="sr-only">Next</span>
  				</a>

  			</div> -->  			

 			  <div class="card-body">
    			
          <div class="container row">

            <div class="col-sm-3">

              <h5 class="card-title"><i class="fa fa-inr" aria-hidden="true"></i>&nbsp;<?php echo $row['property_price']; ?></h5>
              <p class="card-text text-muted">
                Price
              </p>

            </div>

            <div class="col-sm-3">

              <h5 class="card-title"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;<?php echo $row['property_area'] ?> Sq.ft.</h5>
              <p class="card-text text-muted">
                Build-Area
              </p>

            </div>

            <div class="col-sm-3">
              
              <h5 class="card-title"><i class="fa fa-bed" aria-hidden="true"></i>&nbsp;<?php echo $row['property_block']; ?></h5>
              <p class="card-text text-muted">
                Bedroom
              </p>

            </div>

            <div class="col-sm-3">

              <h5 class="card-title"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;<?php echo $row['property_available_from']; ?></h5>
              <p class="card-text text-muted">
                Available From
              </p>

            </div>                       

          </div>

  			</div>
		</div>

    <br>
    
    <div class="card" style="width: 100%;">
      <div class="card-body">
        <h5 class="card-title"><i class="fa fa-info-circle" aria-hidden="true"></i>&nbsp;About Property</h5>
        <p class="card-text">
          <?php
            echo $row['property_info'];
          ?>
        </p>
      </div>
    </div>

<?php
      }
  }

?>      
<!--
    <br>
-->
    <!-- Multiple Images min-0 max-7 -->
    <!--  Use Card Dek  -->
    <!-- <div class="card">
      <div class="card" style="width: 100%">
        <div class="card-body">
          <h5 class="card-title"><i class="fa fa-picture-o" aria-hidden="true"></i>&nbsp;Photos</h5>
          <div>
            <!-- Image -->
             <!--  <img src="../imgs/House-Key.jpg" class="img-thumbnail" style="height: 200px; width: 400px;">
              <img src="../imgs/pexels-photo-262464.jpeg" class="img-thumbnail" style="height: 200px; width: 400px;">
              <img src="../imgs/pexels-photo-534151.jpeg" class="img-thumbnail" style="height: 200px; width: 400px;">
              <img src="../imgs/pexels-photo-271816.jpeg" class="img-thumbnail" style="height: 200px; width: 400px;">
              <img src="../imgs/kitchen-stove-sink-kitchen-counter-349749.jpeg" class="img-thumbnail" style="height: 200px; width: 400px;">            
          </div>
        </div>
      </div>
    </div> -->

    
    
    <br>
    <!-- Amenties -->
    <?php

        $lift = "";
        $gym = "";
        $swimming_pool = "";
        $play_area = "";
        $car_parking = "";
        $fire_safety = "";
        $security_surveillance = "";
        $electricity_backup = "";
        $library = "";    
/*
    $sql = "SELECT * FROM amenities WHERE property_id = " . $_GET["id"];
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $lift = $row['lift'];
        $gym = $row['gym'];
        $swimming_pool = $row['swimming_pool'];
        $play_area = $row['play_area'];
        $car_parking = $row['car_parking'];
        $fire_safety = $row['fire_safety'];
        $security_surveillance = $row['security_surveillance'];
        $electricity_backup = $row['electricity_backup'];
        $library = $row['library'];         
    }
  }
*/
    ?>
    <div class="card" style="width: 100%">
      <div class="card-body">
        <h5 class="card-title"><i class="fa fa-map" aria-hidden="true"></i>&nbsp;Map : Explore Neighbourhood</h5>
          
          <div class="row">

            <div class="col-sm-4">
              <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2665.5097990754552!2d72.83525053834366!3d19.12519131772012!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c9d873a2d211%3A0xfe44c020c940078b!2sAzad+Nagar!5e0!3m2!1sen!2sin!4v1509375306789" width="600" height="350" frameborder="0" style="border:0" allowfullscreen></iframe> -->
            </div>

            <div class="col-sm-4">

              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="amenities-tab" data-toggle="tab" href="#amenities" role="tab" aria-controls="amenities" aria-selected="true">Amenities</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="nearbye-tab" data-toggle="tab" href="#nearbye" role="tab" aria-controls="nearbye" aria-selected="false">Near By</a>
                </li>
              </ul>

              <div class="tab-content">
                
                <div class="tab-pane fade show active container row" id="amenities" role="tabpanel" aria-labelledby="amenities-tab">

                    <div class="col-sm-12 list-group" style="margin-top: 10px;">
                      <h6 class="text-muted list-group-item list-group-item-action">Lift</h6>
                      <h6 class="text-muted list-group-item list-group-item-action">Gym</h6>
                      <h6 class="text-muted list-group-item list-group-item-action">Swimming Pool</h6>
                      <h6 class="text-muted list-group-item list-group-item-action">Play Area</h6>
                      <h6 class="text-muted list-group-item list-group-item-action">Car Parking</h6> 
                      <h6 class="text-muted list-group-item list-group-item-action">Fire Safety</h6>
                      <h6 class="text-muted list-group-item list-group-item-action">Rain water Harvesting</h6>
                      <h6 class="text-muted list-group-item list-group-item-action">24x7 Security Surveillance</h6> 
                      <h6 class="text-muted list-group-item list-group-item-action">24x7 Backup Electricity</h6> 
                      <h6 class="text-muted list-group-item list-group-item-action">Library</h6>
                    </div>

                </div>

                <div class="tab-pane fade" id="nearbye" role="tabpanel" aria-labelledby="nearbye-tab">

                    <div class="col-sm-12 list-group" style="margin-top: 10px;">
                      <h6 class="text-muted list-group-item list-group-item-action">Schools</h6>
                      <h6 class="text-muted list-group-item list-group-item-action">Hospitals</h6>
                      <h6 class="text-muted list-group-item list-group-item-action">Banks and ATM</h6>
                      <h6 class="text-muted list-group-item list-group-item-action">Super-Market</h6>
                      <h6 class="text-muted list-group-item list-group-item-action">Gym</h6> 
                      <h6 class="text-muted list-group-item list-group-item-action">Railway Station</h6>
                      <h6 class="text-muted list-group-item list-group-item-action">Library</h6>
                      <h6 class="text-muted list-group-item list-group-item-action">Mall</h6>
                      <h6 class="text-muted list-group-item list-group-item-action">Theater</h6>
                      <h6 class="text-muted list-group-item list-group-item-action">Airport</h6>
                    </div>

                </div>

              </div>

            </div>

          </div>

        <div>

        </div>

      </div>
    </div>

    <br>

    <?php

      $sql = "SELECT * FROM owner WHERE email_id = '" . $owner_name ."'";
      $result = $conn->query($sql);

      if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){

      
    ?>

      <center>
        <div class="card">
          <div class="card-body">
              <h6 class="card-text card-title">
                Posted By,
              </h6>
              <h3 class="card-title" style="margin-bottom: 0">
                <i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;Owner Name : <?php echo $row['first_name'] . " " . $row['last_name'] ?>
                <i class="fa fa-certificate" aria-hidden="true" style="color: gold;"></i>
              </h3>
              <small class="text-muted" style="margin-bottom: 1px;">Broker/Owner</small>
              <h5 class="">
                <i class="fa fa-phone" aria-hidden="true"></i>&nbsp;+91-
                <?php
                  $mob_len = strlen($row['mob_no']);
                  $mob_no = $row['mob_no'];

                        for ($i=0; $i < $mob_len ; $i++) { 
                          # code...
                           echo $mob_no[$i];
                        }


                  /*
                  if($_SESSION["contact_owner"] == "true" ){

                        for ($i=0; $i < $mob_len ; $i++) { 
                          # code...
                           echo $mob_no[$i];
                        }

                  }
                  else{ */
                        /*for ($i=0; $i < $mob_len ; $i++) { 
                          # code...
                          
                          if($i > 3 && $i< ($mob_len - 1) )
                          {
                            echo "*";
                          }
                          else
                          {
                           echo $mob_no[$i]; 
                          }
                          

                        } */
                    //  }

                ?>
              </h5>
              <h5 class="">
                <i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;
                <?php

                  $emailid_len = strlen($row['email_id']);
                  $emailid = $row['email_id'];

                        for ($i=0; $i < $mob_len ; $i++) { 
                          # code...
                           echo $emailid[$i];
                     }


                  /*
                  if($_SESSION["contact_owner"] == "true" ){

                        for ($i=0; $i < $mob_len ; $i++) { 
                          # code...
                           echo $emailid[$i];
                        }

                  }
                  else{ */
                    /*
                        for ($i=0; $i < $emailid_len ; $i++) { 
                          
                          if($i > 1 && $i < ($emailid_len - 5) ){
                            echo "*";
                          }
                          else{
                            echo $emailid[$i];
                          }

                        }
                        */
                    //}

                ?>

              </h5>

              <?php
                  }

                }     

              ?>              

              <br>
              <!-- 
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#shareDataForm" style="width: 30%;">Contact Broker/Owner</button> -->

              <div class="modal fade" id="shareDataForm" tabindex="-1" role="dialog" aria-labelledby="shareDataForm" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    
                    <div class="modal-header">
                      <h5 class="modal-title text-muted" id="shareDataForm">Share your details to view Owner's number</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    
                    <!-- ../app_code/sharedata.php -->
                    <div class="modal-body">
                      <form method="post" class="container">

                        <div class="row form-group">
                          <label for="name" class="col-form-label">Name</label>
                          <input type="text" class="form-control" id="name" name="name" placeholder="Full Name">
                        </div>

                        <div class="row form-group">
                          <label for="emailid" class="col-form-label">Email-ID</label>
                          <input type="email" class="form-control" id="emailid" name="emailid" placeholder="Email-ID">
                        </div>

                        <div class="row form-group">
                          <label for="mobno" class="col-form-label">Mobile No.</label>
                          <input type="text" class="form-control" id="mobno" name="mobno" placeholder="Mobile No.">
                        </div>

                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" name="contactshare" id="contactshare" class="btn btn-primary">Share</button>
                        </div>

                      </form>
                    </div>

                  </div>
                </div>
              </div>


          </div>

        </div>
      </center>        

  	</div>
  </div>


<script type="text/javascript">
	$(document).ready(){
		$('.carousel').carousel();
	}
</script>

<?php
	require_once '../inc/bootstrap-footer.php'
?>
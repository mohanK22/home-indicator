<?php
  session_start();
?>

<?php
  require_once '../inc/config/MySQLConnection.php'
?> 

<?php
  echo "<style> body { background-image: url('../imgs/login-reg-background.jpg'); background-repeat: round;
    background-size: cover; }</style>";
  require_once '../inc/bootstrap-header.php'
?>

<?php

  $property_id;

  if (isset($_POST['postproperty'])) {

    //echo "posting";

    if(isset(($_SESSION['EmailID']))){

      //echo "finding poster name";

      $emailid = $_SESSION['EmailID'];

      $p_title = $_POST['propertytitle'];
      $p_addr = $_POST['address'];
      $p_price = $_POST['price'];
      $p_area = $_POST['area'];
      $p_block = $_POST['block'];
      $p_available = $_POST['availabledate'];
      $p_info = $_POST['info'];
      $p_owner = $emailid;

      $sql = "INSERT INTO `properties`(`property_title`, `property_addr`, `property_price`, `property_area`, `property_block`, `property_available_from`, `property_info`, `posted_by`) VALUES ('" . $p_title . "','" . $p_addr . "','" . $p_price . "','" . $p_area . "','" . $p_block . "','" . $p_available . "','" . $p_info . "','" . $p_owner . "')";


        if($conn->query($sql) === TRUE ){
          $property_id = $conn->insert_id;
          //echo $property_id;
        }

       /* if ( === TRUE) {
            echo "<script>alert('New record created successfully')</script>";
        } else {
            echo "<script>alert('Error: " . $sql . "')</script>" . $conn->error;
        } */

        /*
        $sql = "SELECT property_id FROM properties WHERE property_addr = '" . $p_addr . "'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

          while ($row = $result->fetch_assoc()) {
            # code...
            $property_id = $row['property_id'];
          }

        } */

        $lift = "";
        $gym = "";
        $swimming_pool = "";
        $play_area = "";
        $car_parking = "";
        $fire_safety = "";
        $security_surveillance = "";
        $electricity_backup = "";
        $library = "";


        //$amenities = $_POST['amenities'];
        if(isset($_POST['amenities']))
        {

          foreach ($_POST['amenities'] as $selected) {

            //echo $selected;
            # code...
            switch ($selected) {
              case 'Lift': $lift = "YES";                
                break;
              case 'Gym': $gym = "YES";                
                break;
              case 'Swimming Pool': $swimming_pool = "YES";
                break;
              case 'Play Area': $play_area = "YES";                
                break;
              case 'Car Parking': $car_parking = "YES";                
                break;
              case 'Fire Safety': $fire_safety = "YES";                
                break;
              case '24x7 Security Surveillance': $security_surveillance = "YES";                
                break;
              case '24x7 Electricity Backup': $electricity_backup = "YES";               
                break;
              case 'Library': $library = "YES";                
                break;
              default:
                break;
            }

          }

        }

        $sql1 = "INSERT INTO `amenties` (`property_id`, `lift`, `gym`, `swimming_pool`, `play_area`, `car_parking`, `fire_safety`, `security_surveillance`, `electricity_backup`, `library`) VALUES (" . $property_id . ",'" . $lift . "','" . $gym . "','" . $swimming_pool . "','" . $play_area . "','" . $car_parking . "','" . $fire_safety . "','" . $security_surveillance . "','" . $electricity_backup . "','" . $library . "')";

        $conn->query($sql1);

        $schools = "";
        $hospitals = "";
        $bank_atm = "";
        $super_market = "";
        $railway_station = "";
        $mall = "";
        $theater = "";
        $airport = "";

        //$nearbyv = $_POST['nearbies'];

        if (isset($_POST['nearbies'])) {

            foreach ($_POST['nearbies'] as $selected) {
              //echo $selected;
                switch ($selected) {
                  case 'Schools': $schools = "YES";
                    break;
                  case 'Hospitals': $hospitals = "YES";
                    break;
                  case 'Banks and ATM': $bank_atm = "YES";
                    break;
                  case 'Super-Market': $super_market = "YES";
                    break;
                  case 'Railway Station': $railway_station = "YES";
                    break;
                  case 'Mall': $mall = "YES";
                    break;                    
                  case 'Theater': $theater = "YES";
                    break;
                  case 'Airport': $airport = "YES";
                    break;
                  default:
                    break;
                }
            }
          }

            $sql2  = "INSERT INTO near_by (property_id, schools, hospitals, bank_atm, super_market, railway_station, mall, airport) VALUES (" . $property_id . ",'" . $schools . "','" . $hospitals . "','" . $bank_atm . "','" . $super_market . "','" . $railway_station . "','" . $mall . "','" . $airport . "')"; 

             $conn->query($sql2);   
             echo "<script>alert('ALL Record Inserted Successfully')</script>";    

        /*
        if($conn->multi_query($sql1) === TRUE){
          echo "<script>alert('ALL Record Inserted Successfully')</script>";
        }
        else{
          echo "<script>alert('Error : " . $sql1 . "')</script>";
        } */


    }

  }

?>
  
  <br>
       <div class="" style="margin-left: 22px;">
          <form method="post" >
            <button id="back" name="back" class="btn btn-secondary text-center"><i class="fa fa-angle-left" aria-hidden="true"></i> BACK</button>
          </form>
          
          <?php

            if(isset($_POST['back'])){
              header('Location: http://localhost/phpsandbox/home-indicator/account/owner.php');
            }

          ?>

      </div> 

 <br> 

  <div class="row">

    <div class="container col-sm-11">

      <div class="card text-center">
        <div class="card-body">
          <h4 class="card-title">Post your Property</h4>
          <p class="card-text text-muted">Please fill out this form to Post your Property on Rent.</p>
        </div>
      </div>

      <br>

      <form method="post" action="<?php echo ($_SERVER["PHP_SELF"]);?>">
        
        <div class="card">
          <div class="card-body">

           <div class="form-group row">
             <h3 class="card-title col-sm-3"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;Property Title</h3>

              <div class="input-group col-sm-9">
                <span id="propertytitle-addon" class="input-group-addon">
                  <i class="fa fa-home" aria-hidden="true"></i>
                </span>
                <input id="propertytitle" type="text" class="form-control" placeholder="Property Title" name="propertytitle" aria-describedby="propertytitle-addon" required>
                <div class="invalid-feedback">
                  Please enter Property Title
                </div>
              </div>
            </div> 



            <div class="form-group row">

              <h6 class="card-text col-sm-3"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;Property Address</h6>

              <div class="input-group col-sm-9">
                <span id="address-addon" class="input-group-addon">
                  <i class="fa fa-map-marker" aria-hidden="true" style="font-size: 25px;"></i>
                </span>
                 <textarea id="address" type="text" class="form-control" placeholder="Property Address" name="address" aria-describedby="address-addon" required rows="3"></textarea>
                <div class="invalid-feedback">
                  Please enter Property Address
                </div>
              </div>
            </div> 

          </div>
        </div> 

        <br>

        <div class="card">  

            <div class="card-body">
              
              <div class="container row">

                  <div class="col-sm-3">

                    <div class="form-group row">

                      <div class="input-group">
                        
                        <h5 class="card-title" style="margin-top: 7px;"><i class="fa fa-inr" aria-hidden="true"></i>&nbsp;</h5>                        

                        <select name="price" class="custom-select">

                          <option selected>Select Price</option>

                          <?php
                            for ($i=5000; $i <= 30000 ; $i=$i+500) {
                          ?>
                          
                          <option value="<?php echo $i ?>">
                            <?php
                              echo $i . " /month";
                            ?>
                            <i class="fa fa-inr" aria-hidden="true"></i>
                          </option>                    
        
                          <?php    
                              # code...
                            }
                          ?>
                        </select>                  
                        
                        <div class="invalid-feedback">
                          Please enter Property Price
                        </div>
                      </div>
                    </div> 
                
                  <p class="card-text text-muted">
                    Price
                  </p>

                </div>

                <div class="col-sm-3">

                   <div class="form-group row">                
                      
                      <div class="input-group">
                        <h5 class="card-title" style="margin-top: 7px;"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;</h5>
                        <select name="area" class="custom-select">

                          <option selected>Select Area (In Sq.ft)</option>

                          <?php
                            for ($i=50; $i <= 5000 ; $i=$i+10) {
                          ?>
                          
                          <option value="<?php echo $i ?>">
                            <?php
                              echo $i;
                            ?>
                             Sq.ft
                          </option>                    
                           
                          <?php    
                              # code...
                            }
                          ?>
                        </select> 
                       
                        <div class="invalid-feedback">
                          Please enter Property Build-up Area
                        </div>
                      </div>
                    </div> 

                  <p class="card-text text-muted">
                    Build-Area
                  </p>

                </div>

                <div class="col-sm-3">

                    <div class="form-group row">
            
                      <div class="input-group">
                        <h5 class="card-title" style="margin-top: 7px;"><i class="fa fa-bed" aria-hidden="true"></i>&nbsp;</h5>
                          <select name="block" class="custom-select">
                            <option selected>Select Block Type</option>
                            <option value="One RK">One RK</option>
                            <option value="One BHK">One BHK</option>
                            <option value="Two BHK">Two BHK</option>
                            <option value="Three BHK">Three BHK</option>
                            <option value="Four BHK">Four BHK</option>
                          </select>

                        <div class="invalid-feedback">
                          Please enter Property Block Type
                        </div>
                      </div>

                     </div>

                    <p class="card-text text-muted">
                      Bedroom
                    </p>

                </div>

                <div class="col-sm-3">

                    <div class="form-group row">
                      <div class="input-group">
                        <h5 class="card-title" style="margin-top: 7px;"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;</h5>
                        <input name="availabledate" type="date" id="availabledate" />
                      </div>
                    </div>
      
                      <p class="card-text text-muted">
                        Available From
                      </p>

                </div> 

              </div>

            </div>
        </div>        

        <br>

        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><i class="fa fa-info-circle" aria-hidden="true"></i>&nbsp;About Property</h5>
            
            <div class="form-group">
              <div class="input-group">

                <textarea id="info" name="info" type="text" class="form-control" placeholder="Property Information" name="info" required rows="3"></textarea>
                <div class="invalid-feedback">
                    Please enter Property Info
                </div>   

              </div>
            </div>       
         
          </div>
        </div>

        <br>  

       <!-- <div class="card">
            <div class="card-body">

                <script type="text/javascript" src="../js/upload.js"></script> 

                <h5 class="card-title"><i class="fa fa-picture-o" aria-hidden="true"></i>&nbsp;Photos</h5>
                <input type="file" name="upload_images[]" id="image_file" multiple >
                <div class="file_uploading hidden">
                </div>
              <div id="uploaded_images_preview"></div>


            </div>
        </div> -->

        <br>
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><i class="fa fa-map" aria-hidden="true"></i>&nbsp;Map : Explore Neighbourhood</h5>
              
              <div class="row">

                <!-- <div class="col-sm-7">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2665.5097990754552!2d72.83525053834366!3d19.12519131772012!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c9d873a2d211%3A0xfe44c020c940078b!2sAzad+Nagar!5e0!3m2!1sen!2sin!4v1509375306789" width="600" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div> -->

                <div class="col-sm-4"></div>

                <div class="col-sm-7">

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

                          <div class="form-check text-muted list-group-item list-group-item-action">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" name="amenities[]" value="Lift">
                              <h6>Lift</h6>
                            </label>
                          </div>

                          <div class="form-check text-muted list-group-item list-group-item-action">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" name="amenities[]" value="Gym">
                              <h6>Gym</h6>
                            </label>
                          </div>

                          <div class="form-check text-muted list-group-item list-group-item-action">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" name="amenities[]" value="Swimming Pool">
                              <h6>Swimming Pool</h6>
                            </label>
                          </div>

                          <div class="form-check text-muted list-group-item list-group-item-action">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" name="amenities[]" value="Play Area">
                              <h6>Play Area</h6>
                            </label>
                          </div>

                          <div class="form-check text-muted list-group-item list-group-item-action">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" name="amenities[]" value="Car Parking">
                              <h6>Car Parking</h6>
                            </label>
                          </div>

                          <div class="form-check text-muted list-group-item list-group-item-action">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" name="amenities[]" value="Fire Safety">
                              <h6>Fire Safety</h6>
                            </label>
                          </div>

                          <div class="form-check text-muted list-group-item list-group-item-action">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" name="amenities[]" value="24x7 Security Surveillance">
                              <h6>24x7 Security Surveillance</h6>
                            </label>
                          </div>

                          <div class="form-check text-muted list-group-item list-group-item-action">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" name="amenities[]" value="24x7 Backup Electricity">
                              <h6>24x7 Backup Electricity</h6>
                            </label>
                          </div>

                          <div class="form-check text-muted list-group-item list-group-item-action">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" name="amenities[]" value="Library">
                              <h6>Library</h6>
                            </label>
                          </div>

                        </div>

                    </div>

                    <div class="tab-pane fade" id="nearbye" role="tabpanel" aria-labelledby="nearbye-tab">

                        <div class="col-sm-12 list-group" style="margin-top: 10px;">


                          <div class="form-check text-muted list-group-item list-group-item-action">
                            <label class="form-check-label">
                              <input class="form-check-input" name="nearbies[]" type="checkbox" value="Schools">
                              <h6>Schools</h6>
                            </label>
                          </div>

                          <div class="form-check text-muted list-group-item list-group-item-action">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" name="nearbies[]" value="Hospitals">
                              <h6>Hospitals</h6>
                            </label>
                          </div>

                          <div class="form-check text-muted list-group-item list-group-item-action">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" name="nearbies[]" value="Banks and ATM">
                              <h6>Banks and ATM</h6>
                            </label>
                          </div>

                          <div class="form-check text-muted list-group-item list-group-item-action">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" name="nearbies[]" value="Super-Market">
                              <h6>Super-Market</h6>
                            </label>
                          </div>

                          <div class="form-check text-muted list-group-item list-group-item-action">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" name="nearbies[]" value="Railway Station">
                              <h6>Railway Station</h6>
                            </label>
                          </div>

                          <div class="form-check text-muted list-group-item list-group-item-action">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" name="nearbies[]" value="Mall">
                              <h6>Mall</h6>
                            </label>
                          </div>

                          <div class="form-check text-muted list-group-item list-group-item-action">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" name="nearbies[]" value="Theater">
                              <h6>Theater</h6>
                            </label>
                          </div>

                          <div class="form-check text-muted list-group-item list-group-item-action">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" name="nearbies[]" value="Airport">
                              <h6>Airport</h6>
                            </label>
                          </div>

                        </div>

                    </div>

                  </div>

                </div>

              </div>

          </div>
        </div>

        <br>

        <div class="card text-center">
          <div class="card-body">
            <input type="submit" type="submit" name="postproperty" id="postproperty" class="btn btn-primary" style="width: 100%;" value="Post Property">
          </div>
        </div>

    </form>          
      
    </div>
  </div>

<?php
  require_once '../inc/bootstrap-footer.php'
?>
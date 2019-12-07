<?php
	require_once '../inc/bootstrap-header.php'
?>

<?php 
	require('../inc/config/MySQLConnection.php');
?>

<?php
	$location_name = "";
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

<center>
	
	<!-- <div style="width: 42rem">
		<form class="container">
			
			<div class="input-group row">
				<input type="text" class="form-control" placeholder="Search for Location OR Place..." aria-label="Search for Location OR Place...">
				<span class="input-group-btn">
					<button class="btn btn-secondary" type="button">Search</button>
				</span>
			</div>

		</form>
	</div> -->

</center>

<div class="container">
	<hr>
</div>

<center>
	<div class="container">
		<small>Searched for Location or Place : 
			<?php  

				session_start();

				if(isset($_SESSION['location'])){

					$location_name = $_SESSION['location'];
					echo "<b>" . $location_name . "</b>";
				}

			?>	
		</small>
		<br>
		<small class="text-muted">Search Result</small>
	</div>
</center>

<br>
<br>

<div class="container">

	<div class="row">

		<div class="col-sm-12" style="">
			<div class="">
				<!-- 
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
					</p> 
				-->

				<div class="row">
					<?php

						$sql = "SELECT * FROM properties WHERE property_addr LIKE '%" . $location_name . "%'";
						$result = $conn->query($sql);

						if($result->num_rows > 0)
						{

						while ($row = $result->fetch_assoc()){ 
							
					?>

				<div class="card rounded" style="width: 15rem; margin: 15px;">
					<img class="card-img-top" src="../imgs/default.jpeg" alt="Card image cap" style="width: 252px; height: 180px">
	  				<div class="card-body">
	    				<h4 class="card-title"><?php echo $row["property_block"] ?> &nbsp; <?php echo $row["property_area"] ?> in sq/ft </h4>
	    				<p class="card-text card-subtitle mb-2 text-muted"><?php echo $row["property_addr"] ?></p>
	    				 <!-- <p class="card-text mb-2 text-muted">Location (east/west/north/south)</p> -->
	    				<p class="card-text mb-2 text-muted"><i class="fa fa-inr" aria-hidden="true">&nbsp;<?php echo $row["property_price"] ?></i></p>
	    				<!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
	    				<center><a href= <?php echo 'property.php?id=' . $row['property_id'] ?> class="btn btn-light">Show More Details</a></center>
	  				</div>
				</div>

				<?php
						}
					}
				?>
				</div>

			</div>	
		</div>

	</div>
	
</div>

<?php
	require_once '../inc/bootstrap-footer.php'
?>
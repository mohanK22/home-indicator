<?php
	session_start();
	$emailid;
	if(isset($_SESSION['EmailID'])){
		$emailid = $_SESSION['EmailID'];
	}
?>

<?php
  require_once '../inc/config/MySQLConnection.php'
?> 

<?php
  echo "<style> body { background-image: url('../imgs/login-reg-background.jpg'); background-repeat: no-repeat;background-size: cover; }</style>";
  require_once '../inc/bootstrap-header.php'
?>

	<?php

		$sql = "SELECT property_id, property_title, property_price FROM properties WHERE posted_by = '" . $emailid . "'" ;
		$result = $conn->query($sql);

	?>

	<br>

	<div class="container" style="margin-left: 390px;">
		
		<div class="justify-content-end">
				<form method="post">
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
		
			<div class="card" style="">
			  <div class="card-body">
			    <h4 class="card-title text-center">My Posted Property</h4>
			    <h6 class="card-subtitle text-muted"></h6>
			    <hr>

					<div class="container">
						
						<table class="table table-hover">

						  	<thead class="thead-light">
							    <tr>
							      <th scope="col">#</th>
							      <th scope="col">ID</th>
							      <th scope="col">Title</th>
							      <th scope="col">Price</th>
							      <!-- <th scope="col">View</th>
							      <th scope="col">Update</th>
							      <th scope="col">Delete</th> -->
							    </tr>
							 </thead>

							  <tbody>			

								<?php
									$i = 1;	
									if ($result->num_rows > 0) {
									    // output data of each row
									    while($row = $result->fetch_assoc()) {
									        echo "<tr><th>" . $i. "</th><td>" . $row["property_id"] . "</td><td>" . $row["property_title"]. "</td><td>" . $row["property_price"]. "</td></tr>";// . $row["email_id"]. "</td></tr>";
									        $i++;
									    }
									} else {
									    echo "0 results";
									}
									$conn->close();
								?>	

							 </tbody>			

						</table>	

					</div>


			  </div>
			</div>

		</div>
	</div>	

<?php
  require_once '../inc/bootstrap-footer.php'
?>
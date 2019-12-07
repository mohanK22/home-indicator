<?php
	session_start();

	$emailid = $passwd = "";
?>

<?php
  require_once '../inc/config/MySQLConnection.php'
?> 

<?php
	echo "<style> body { background-image: url('../imgs/login-reg-background.jpg'); background-repeat: no-repeat;background-size: cover; }</style>";
  require_once '../inc/bootstrap-header.php'
?>
  
<?php 
	
	if(isset($_SESSION['EmailID']) && isset($_SESSION['Passwd']) ) 
	{

		$emailid = $_SESSION['EmailID'];
		$passwd = $_SESSION['Passwd'];
	}
	else
	{
		echo "<script>alert('Session Not Found')</script>";
		session_destroy();
		header('Location: http://localhost/phpsandbox/home-indicator/home/login.php');
	}
	
 ?>

 	<br>
 	<br>
 	<br>

	<div class="container">
		<div class="row justify-content-end">

			<form method="post">

				<div class="col">

					<button id="logout" name="logout" class="btn btn-danger text-center "><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</button>			

				</div>		
			</form>			

		</div>

	</div>	


<div class="container">

	<br>

		<?php

			if(isset($_POST['logout'])){

				if(isset($_SESSION)){
					session_destroy();
				}

				header('Location: http://localhost/phpsandbox/home-indicator/home/index.php');
			}

		?>

		<?php
			
			$sql = "SELECT * FROM owner WHERE email_id = '" . $emailid . "' AND passwd = '" . $passwd . "'" ;

			$result = $conn->query($sql);

			if($result->num_rows > 0){
				while ($row = $result->fetch_assoc()) {

		?>	

	<div class="row">
	
		<div class="card" style="width: 30rem;">
		  <div class="card-body">
		    <h4 class="card-title text-center">Owner's Profile</h4>
		    <h6 class="card-subtitle mb-2 text-muted"></h6>
		    <hr>

			<table class="table table-hover">
			  <tbody>
			    <tr>
			      <th scope="row">Name </th>
			      <td><?php echo $row["first_name"] . " " . $row["last_name"]; ?></td>
			    </tr>
			    <tr>
			      <th scope="row">Email-ID </th>
			      <td><?php echo $row["email_id"]; ?></td>
			    </tr>
			    <tr>
			      <th scope="row">Mobile No. </th>
			      <td colspan="2"><?php echo $row["mob_no"]; ?></td>
			    </tr>
			    <tr>
			      <th scope="row">Password </th>
			      <td colspan="2">
			      	<?php  

			      		$length = strlen($passwd);
			      		$i;
			      		for ($i=1; $i <= $length ; $i++) { 
			      			echo "*";
			      		}

			      	?>	
			      </td>
			    </tr>			    
			  </tbody>
			</table>

			<hr>


			<form class="container" method="post">
					
				<div class="form-group row">
						
					<div class="col-sm-4">
						<!-- <button id="insert" name="insert" class="btn btn-primary">Update Info</button> -->

						<!-- <?php

							//if(isset($_POST['insert'])){
								//header('Location: http://localhost/phpsandbox/wt/8_insert.php');
							//}


						?> -->

					</div>


					<div class="col-sm-6">
						<button id="delete" name="delete" class="btn btn-danger">DELETE ACCOUNT PERMANENT</button>
					</div>					

				</div>

			</form>


		 	</div>
		</div>

		<div class="card" style="width: 30rem; margin-left: 55px;">
		  <div class="card-body">
		    <h4 class="card-title text-center"><i class="fa fa-external-link-square" aria-hidden="true"></i>&nbsp;Short Links</h4>
		    <h6 class="card-subtitle mb-2 text-muted"></h6>

			<ul class="list-group">
			  <li class="list-group-item btn-light"><h3><a href="addproperty.php" class="btn" style="text-decoration: none;"><i class="fa fa-paper-plane" aria-hidden="true"></i>&nbsp;&nbsp;Post Property</a></h3></li>
			  <li class="list-group-item btn-light"><h3><a href="mypostedproperty.php" class="btn" style="text-decoration: none;"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;&nbsp;My Posted Property</a></h3></li>

			  <!-- <li class="list-group-item btn-light">Morbi leo risus</li>
			  <li class="list-group-item btn-light">Porta ac consectetur ac</li>
			  <li class="list-group-item btn-light">Vestibulum at eros</li> -->
			</ul>

		  </div>
		</div>	

	</div>

	<?php } } ?>
</div>	

<?php
	if(isset($_POST['delete'])){

		$sql = "DELETE FROM owner WHERE email_id = '" . $emailid . "'" ;

		if ($conn->query($sql) === TRUE) {
			session_destroy();
		    header('Location: http://localhost/phpsandbox/home-indicator/home/');
		} else {
		    echo "<script>alert('Error while deleting account. ERROR -> " . $conn->error . "')</script>";
		}		
									
		
	}	
?>

<?php
  require_once '../inc/bootstrap-footer.php'
?>
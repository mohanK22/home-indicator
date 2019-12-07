<?php
	session_start();
?>

<?php 
	require('../inc/config/MySQLConnection.php');
?>

<?php
	
	if(isset($_POST['btnlogin']))
	{
		$status = "";

		if ($_SERVER["REQUEST_METHOD"] == "POST") 
		{
			$emailId = ($_POST["emailid"]);
			$passwd = ($_POST["passwd"]);

			$selectquery = "select * from owner where email_id = '" . $emailId . "' and passwd = '" . $passwd . "';";	

			$result = mysqli_query($conn ,$selectquery);
			$data = mysqli_fetch_all($result ,MYSQLI_ASSOC);
			
			if($result->num_rows > 0)
			{
				$status = "SUCCESS";
				//echo $status;
			}

			if($status == "SUCCESS")
			{

				$_SESSION['EmailID'] = htmlentities($emailId);
				$_SESSION['Passwd'] = htmlentities($passwd);

				//print_r($_SESSION);

				header('Location: http://localhost/phpsandbox/home-indicator/account/owner.php');

			}
			elseif ($status == "FAIL") 
			{
				echo "<script>alert('Email-ID or Password is wrong..')</script>";
				session_destroy();
			}

			mysqli_free_result($result);
			mysqli_close($conn);


		}

		else{
			echo "<script>alert('Email-ID or Password is wrong..')</script>";
			session_destroy();;
		}

	}

	function test_input($data)
	{
	 	$data = trim($data);
	  	$data = stripslashes($data);
	  	$data = htmlspecialchars($data);
	 	return $data;		
	}

?>


<?php
	
	echo "<link rel='stylesheet' href='../styles/indexstyle.css' type='text/css' media='all'>";

	require_once '../inc/bootstrap-header.php';
	echo "<style type='text/css'> body { background-image: url('../imgs/login-reg-background.jpg'); background-repeat: no-repeat;background-size: cover; }</style>";
?>

<br>
<br>

      <div class="">
        <h1 style="margin-left: 35rem; font-size: 28px;"><a class="navbar-brand" href="index.php"><span>Home</span> Indicator</a></h1>
      </div>

<br>
<br>


	<center>
		<div class="card" style="width: 40rem;">
			<div class="card-body">

				<?php

					if(isset($_SESSION['RegStatus']))
					{
						$regStatus = $_SESSION['RegStatus'];
						if($regStatus == "SUCCESS")
						{
				?>

					<div class="alert alert-success" role="alert">
		  				You are registered and can log in
					</div>

				<?php	
						}
					}
				?>

				<h4 class="card-title">Login</h4>
				<h6  class="card-subtitle mb-2 text-muted">Please fill in your credentials to log in</h6>
				<hr>

				<!-- Login Form -->
				<form class="container" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

					<div class="form-group row">
						<label for="emailid" class="col-sm-2 col-form-label">Email-ID</label>
						<div class="input-group col-sm-10">
							<span id="email-addon" class="input-group-addon">
								<i class="fa fa-envelope" aria-hidden="true"></i>
							</span>
							<input id="emailid" type="email" class="form-control" placeholder="email-id" name="emailid" aria-describedby="email-addon" required>
							<div class="invalid-feedback">
								Please enter Email-ID
							</div>
						</div>
					</div>

					<div class="form-group row">
						<label for="passwd" class="col-sm-2 col-form-label">Password</label>
						<div class="input-group col-sm-10">
							<span id="passwd-addon" class="input-group-addon" style="width: 2.5rem">
								<i class="fa fa-lock" aria-hidden="true" style="font-size: 25px"></i>
							</span>
							<input id="passwd" type="password" class="form-control" placeholder="password" name="passwd" aria-describedby="passwd-addon" required>
							<div class="invalid-feedback">
								Please enter Password
							</div>	
						</div>
					</div>

					<div class="form-group row">
						<div class="col-sm-12">
							<button class="btn btn-primary btn-block" name="btnlogin" type="submit" style="width: 25rem">Login</button>
						</div>	
					</div>	
					
					<div class="text-muted">
						<small><a>Forgot Password?</a></small>
					</div>				

				</form>

				<hr>

				<div class="text-muted">
					<small>Not Registered? <a href="registration.php" style="text-decoration: none">Create Account</a></small>
				</div>

			</div>
		</div>
	</center>


<?php
	require_once '../inc/bootstrap-footer.php'
?>
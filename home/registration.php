<?php 
	require_once '../inc/config/MySQLConnection.php';
?>

<?php
	
	$fname = $lname = $emailId = $mobNo =$passwd = $confirmPasswd = "";
	$status = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{
		$fname = test_input($_POST["firstname"]);
		$lname = test_input($_POST["lastname"]);
		$emailId = test_input($_POST["emailid"]);
		$mobNo = test_input($_POST["mobno"]);
		$passwd = test_input($_POST["passwd"]);
		$confirmPasswd = test_input($_POST["confirmpasswd"]);

		$status = checkPasswd($passwd,$confirmPasswd);

		if($status == "SUCCESS")
		{

			$insertquery = "insert  into owner(first_name, last_name, email_id, mob_no, passwd) values ('" . $fname . "','". $lname . "','". $emailId . "','". $mobNo . "','". $passwd . "')";

			if(mysqli_query($conn ,$insertquery))
			{
				session_start();

				$_SESSION['RegStatus'] = $status;

				//header('Location: verifyemailid.php');

				header('Location: http://localhost/phpsandbox/home-indicator/home/login.php');
			}
			else
			{
				echo "ERROR : " . mysqli_error($conn);
			}
			
		}
		elseif ($status == "FAIL") 
		{
			echo "<script>alert('Passwd Not Matching...')</script>";
		}
	}

	function test_input($data)
	{
 		$data = trim($data);
  		$data = stripslashes($data);
  		$data = htmlspecialchars($data);
  		return $data;		
	}

	function checkPasswd($passwd1, $confirmpasswd1)
	{
		$res = strcmp($passwd1, $confirmpasswd1);
		if($res == 0)
		{
			return "SUCCESS";
		}
		else 
		{
			return "FAIL";
		}
	}

?>


<?php
	
	echo "<link rel='stylesheet' href='../styles/indexstyle.css' type='text/css' media='all'>";

	require_once '../inc/bootstrap-header.php';
	echo "<style type='text/css'> body { background-image: url('../imgs/login-reg-background.jpg'); background-repeat: no-repeat;background-size: cover; }</style>";

?>

<br>

      <div class="">
        <h1 style="margin-left: 35rem; font-size: 28px;"><a class="navbar-brand" href="index.php"><span>Home</span> Indicator</a></h1>
      </div>

<center>
	<div class="card" style="width: 45rem; margin-top: 2rem;">
		<div class="card-body">

			<h4 class="card-title">Create an Account</h4>
			<h6  class="card-subtitle mb-2 text-muted">Please fill out this form to register with us</h6>
			<hr>

			<form class="container" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				
				<div class="form-group row">
					<label for="firstname" class="col-sm-3 col-form-label">First Name</label>
					<div class="input-group col-sm-3">
						<span id="firstname-addon" class="input-group-addon">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
						<input id="firstname" type="text" name="firstname" class="form-control" placeholder="First Name" aria-describedby="firstname-addon" required>
						<div class="invalid-feedback">
							Please enter First Name
						</div>
					</div>

					<label for="lastname" class="col-sm-2 col-form-label">Last Name</label>
					<div class="input-group col-sm-4">
						<span id="lastname-addon" class="input-group-addon">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
						<input id="lastname" type="text" name="lastname" class="form-control" placeholder="Last Name" aria-describedby="lastname-addon" required>
						<div class="invalid-feedback">
							Please enter Last Name
						</div>						
					</div>
				</div>	

				<div class="form-group row">
					<label for="emailid" class="col-sm-3 col-form-label">Email-ID</label>
					<div class="input-group col-sm-9">
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
					<label for="mobno" class="col-sm-3 col-form-label">Mobile No.</label>
					<div class="input-group col-sm-9">
						<span id="mobno-addon" class="input-group-addon">
							<i class="fa fa-phone" aria-hidden="true"></i>
						</span>
						<input id="mobno" type="" class="form-control" placeholder="Mobile No." name="mobno" aria-describedby="mobno-addon" required>
						<div class="invalid-feedback">
							Please enter Mobile No.
						</div>
					</div>
				</div>

				<div class="form-group row">
					<label for="passwd" class="col-sm-3 col-form-label">Password</label>
					<div class="input-group col-sm-9">
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
					<label for="confirmpasswd" class="col-sm-3 col-form-label">Confirm Password</label>
					<div class="input-group col-sm-9">
						<span id="confirmpasswd-addon" class="input-group-addon" style="width: 2.5rem">
							<i class="fa fa-lock" aria-hidden="true" style="font-size: 25px"></i>
						</span>
						<input id="confirmpasswd" type="password" class="form-control" placeholder="Confirm Password" name="confirmpasswd" aria-describedby="confirmpasswd-addon" required>
						<div class="invalid-feedback">
							Please Confirm Password
						</div>	
					</div>
				</div>	

				<div class="form-group row">
					<div class="col-sm-12">
						<button class="btn btn-primary btn-block" type="submit" style="width: 25rem">Register</button> 
					</div>	
				</div>																

			</form>

			<hr>

			<div class="text-muted">
				<small>Have an account? <a href="login.php" style="text-decoration: none">Login</a></small>
			</div>

		</div>
	</div>

</center>

<?php
	require_once '../inc/bootstrap-footer.php'
?>
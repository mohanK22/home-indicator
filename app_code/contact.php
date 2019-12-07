<?php
	$status = "false";
	
	if(isset($_POST['btnSendContact']))
	{
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			# code...
			$name = test_input($_POST["name"]);
			$emailid = test_input($_POST["emailid"]);
			$mobno = test_input($_POST["mobno"]);
			$msg = test_input($_POST["msg"]);

			if (!empty($name) && !empty($emailid) && !empty($mobno) && !empty($msg)) {
				# code...
				$toEmail = "mohankadu22@gmail.com";
				$subject = "Contact Request From " . $name;
				$body = "<h2>Contact Request</h2><h4>Name : </h4><p>" .$name . "</p><h4>Email-ID : </h4><p>" . $emailid . "</p><h4>Mobile No. : </h4><p>" . $mobno . "</p><h4>Message : </h4><p>" . $msg . "</p>";
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-Type:text/html;charset=UTF-8" . "\r\n";

				//Additional Headers
				$headers .= "From : " . $name . "<" . $emailid . ">" . "\r\n";
				if (mail($toEmail, $subject, $msg)) {
				 	# code...
				 	echo "<script>alert('email sent...')</script>";
				 } 
				 else
				 {
				 	echo "<script>alert('sending email failed...')</script>";
				 	//header('Location: http://localhost/phpsandbox/home-indicator/home/index.php');
				 }


			}
			else{

			}
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


<!--
<?php
	//require_once '../inc/bootstrap-header.php'
?>

<?php
	// require_once '../inc/nav.php'
?>

<br>
<br>
<br>

<div class="row">

	<div class="card container" style="width: 95rem">
		<div class="card-body">

			<h4 class="card-title text-center">Contact Us</h4>
			<h6  class="card-subtitle mb-2 text-muted text-center">Please fill out this form to contact with us</h6>
			<hr>

			<form>
				<div class="float-left col-sm-6">
					<div class="form-group row">
						<label for="name" class="col-sm-3 col-form-label">Name</label>
						<div class="input-group col-sm-9">
							<span id="name-addon" class="input-group-addon">
								<i class="fa fa-user" aria-hidden="true"></i>
							</span>
							<input id="name" type="text" name="name" class="form-control" placeholder="Name" aria-describedby="name-addon" required>
							<div class="invalid-feedback">
								Please enter Name
							</div>
						</div>
					</div>	

					<div class="form-group row">
						<label for="emailid" class="col-sm-3 col-form-label">Email-ID</label>
						<div class="input-group col-sm-9">
							<span id="email-addon" class="input-group-addon" style="width: 2.25rem">
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
				</div>

				<div float-right col-sm-6>
					<div class="form-group row">
						<label for="msg" class="col-sm-3 col-form-label">Message</label>
						<div class="input-group col-sm-9">
							<span id="msg-addon" class="input-group-addon" style="width: 2.5rem">
								<i class="fa fa-comments-o" aria-hidden="true" style="font-size: 20px"></i>
							</span>
							<textarea rows="5" id="msg" class="form-control" placeholder="Message" name="msg" aria-describedby="msg-addon" required></textarea>
							<div class="invalid-feedback">
								Please type Message
							</div>	
						</div>
					</div>
					<button class="btn btn-primary btn-block float-right" type="submit" style="width: 23rem">Send</button> 	
				</div>																

			</form>

		</div>
	</div>
</div>

<?php
	//require_once '../inc/bootstrap-footer.php'
?>

-->
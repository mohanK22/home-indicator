<?php

	$conn = mysqli_connect('localhost','root','root@22','hidemo');

	if(mysqli_connect_errno())
	{
		echo "Failed to Connect MySQL Database.".mysqli_connect_errno() ;
	}

?>
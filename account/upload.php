<?php
	$servername = "localhost";
	$username = "root";
	$password = "#HI_root@22";
	$dbname = "hidemo";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
?>

<?php

	$i = $property_id;

	$uploaded_images = array();
	foreach($_FILES['upload_images']['name'] as $key=>$val){
	$upload_dir = "uploads/";
	$upload_file = $upload_dir.$_FILES['upload_images']['name'][$key];
	$filename = $_FILES['upload_images']['name'][$key];
	if(move_uploaded_file($_FILES['upload_images']['tmp_name'][$key],$upload_file)){
	$uploaded_images[] = $upload_file;
	$insert_sql = "INSERT INTO photos(property_id, photo_name)
	VALUES($i, '".$filename."')";
	mysqli_query($conn, $insert_sql) or die("database error: ". mysqli_error($conn));
	}
		$i++;
	}
?>

<div class="row">
	<div class="gallery">
		<?php
		echo $property_id;

		if(!empty($uploaded_images)){
		foreach($uploaded_images as $image){ ?>
		<img class="img-thumbnail images" src="<?php echo $image; ?>" alt="" style="height: 200px; width: 400px;">

		<?php }	}?>
	</div>
</div>
<?php

	require('functions.php');

	if($_FILES['fileToUpload']['error'] > 0) {
		header('Location: index-b.php');
		exit();
	}

		
	$formats = array('jpg', 'jpeg', 'png', 'gif', 'webp');
	$uploadOk = 1;

	$image = basename($_FILES["fileToUpload"]["name"]);
	$image_url = 'uploads/orig/'.$image;

	$title = sanitization($_POST['title']);
	$description = sanitization($_POST['description']);

    // !! $check == false when .webp (?)

	// 1. Check if file already exists
	if (file_exists($image_url)) {
	    $msg = "Sorry, file already exists.";
	    $uploadOk = 0;
	}

	// 2. Check if file extention is allowed
	$imageFileType = pathinfo($image_url,PATHINFO_EXTENSION);
	if(!in_array($imageFileType,$formats)) {
		$msg = "Sorry, only JPG, JPEG, PNG , GIF & WEBP files are allowed.";
		$uploadOk = 0;
	}

	// 3. Check if there is no errors
	if($uploadOk == 1) {
	    if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $image_url)) {
	        $msg = "Sorry, there was an error uploading your file.";
	    } else {
	    	index_file($image,$title,$description);
	    }
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Upload</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/css/foundation.min.css" integrity="sha256-itWEYdFWzZPBG78bJOOiQIn06QCgN/F0wMDcC4nOhxY=" crossorigin="anonymous" />
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="edition">
	<?php
		if(isset($msg)) {
		?>
			<div class="row message">
				<p class="text-center lead"><?= $msg ?></p>
			</div>
		<?php
		} else {
		?>
			<div class="row">
				<h1 class="text-center subheader">Image Edition</h1>
			</div>
			<div class="row">
				<div class="medium-6 columns">
					<div class="small-10 small-offset-1 medium-offset-2 columns">
						<img class="rounded" src="<?= $image_url; ?>" alt="">
					</div>
				</div>
				<div class="medium-6 columns">
					<div class="small-10 small-offset-1 columns">
						<form action="index-b.php" method="post">
							<p>Customize your image:</p>
							<fieldset>
							    <legend>Crop</legend>
							    <input type="radio" name="crop" value="1:1" id="crop1" required><label for="crop1">[1:1]</label>
							    <!--<input type="radio" name="crop" value="4:3" id="crop2"><label for="crop2">[4:3]</label>-->
							    <input type="radio" name="crop" value="none" id="crop3"><label for="crop3">none</label>
							</fieldset>
							<input type="hidden" name="img" value="<?= $image; ?>">
							<input type="submit" class="button float-right">
						</form>
					</div>
				</div>
				
			</div>
		<?php
		}
	?>
</body>
</html>

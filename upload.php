<?php
	/* 	

	PHP 5 Filesystem Functions (https://www.w3schools.com/php/php_ref_filesystem.asp)
		basename() - returns the filename from a path.
		pathinfo() - returns an array that contains information about a path
		move_uploaded_file(file,newloc) - moves an uploaded file to a new location
			.Changing File Owner (https://stackoverflow.com/questions/8103860/move-uploaded-file-gives-failed-to-open-stream-permission-denied-error-after)
			. (https://stackoverflow.com/questions/21357421/access-denied-php-move-uploaded-file-ubuntu-lamp-var-www)
			.chown (http://www.techradar.com/how-to/computing/apple/terminal-101-changing-file-owner-with-chown-1305681)
	Functions Gb et images
		getimagesize() - Retourne la taille d'une image

	WebP (https://developers.google.com/speed/webp/)

	*/

	//echo '<pre>'.print_r($_FILES, true).'</pre>';

	if(isset($_POST["submit"]) && $_FILES['fileToUpload']['error'] > 0) {
		header('Location: index.php');
		exit();
	}
		

	$target_dir = "uploads/";
	$target_image = basename($_FILES["fileToUpload"]["name"]);
	$target_file = $target_dir . $target_image;
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

	// Check if image file is a actual image or fake image
	//if(isset($_POST["submit"])) {
	    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	    //echo '<pre>'.print_r($check, true).'</pre>';
	    if($check !== false) {
	        //echo "File is an image - " . $check["mime"] . ".";
	        $uploadOk = 1;
	    } else {
	        echo "File is not an image.";
	        $uploadOk = 0;
	    }
	//}

	// Check if file already exists
	if (file_exists($target_file)) {
	    echo "Sorry, file already exists.";
	    $uploadOk = 0;
	}
	// Check file size
	// if ($_FILES["fileToUpload"]["size"] > 500000) {
	//     echo "Sorry, your file is too large.";
	//     $uploadOk = 0;
	// }

	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" && $imageFileType != "webp") {
	    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	    $uploadOk = 0;
	}

	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	    echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
		//echo '<br>'.$target_file;
	    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
	    ?>
			<!-- form comes here -->
	    <?php
	    } else {
	        echo "Sorry, there was an error uploading your file.";
	    }
	}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Upload</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/css/foundation-flex.min.css">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="row">
		<h1>Edition d'image</h1>
	</div>
	<div class="row align-middle">
		<div class="small-6 columns">
			<img src="<?= $target_file?>" alt="">
		</div>
		<div class="small-6 columns">
			<form action="index.php" method="post">
				<p>Customize your image</p>
				<fieldset class="large-6 columns">
				    <legend>Crop</legend>
				    <input type="radio" name="crop" value="1:1" id="crop1" required><label for="crop1">[1:1]</label>
				    <!--<input type="radio" name="crop" value="4:3" id="crop2"><label for="crop2">[4:3]</label>-->
				    <input type="radio" name="crop" value="none" id="crop3"><label for="crop3">none</label>
				</fieldset>
				<input type="hidden" name="img" value="<?= $target_image; ?>">
				<input type="submit" class="button" name="submit" value="Submit">
			</form>
		</div>
		
	</div>
	
</body>
</html>

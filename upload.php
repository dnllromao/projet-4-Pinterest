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

	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
	    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	    //echo '<pre>'.print_r($check, true).'</pre>';
	    if($check !== false) {
	        echo "File is an image - " . $check["mime"] . ".";
	        $uploadOk = 1;
	    } else {
	        echo "File is not an image.";
	        $uploadOk = 0;
	    }
	}

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
		echo '<br>'.$target_file;
	    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
	    } else {
	        echo "Sorry, there was an error uploading your file.";
	    }
	}

	/*require ('vendor/claviska/simpleimage/src/claviska/SimpleImage.php');


	var_dump(class_exists('\claviska\SimpleImage'));
	$img = new \claviska\SimpleImage('uploads/test.jpeg');
	var_dump($img);
	$img->border('black', 5) ;*/

	//echo '<img src="uploads/test.jpeg" alt="">';

	require 'vendor/claviska/simpleimage/src/claviska/SimpleImage.php';

	try {
	  // Create a new SimpleImage object
	  $image = new \claviska\SimpleImage('uploads/test.jpeg');
	  // Manipulate it
	  $image
	    ->crop(0,0,284,177)
	    ->toFile('uploads/test01.jpeg');                      // output to the screen
	} catch(Exception $err) {
	  // Handle errors
	  echo $err->getMessage();
	}
	
	//echo '<img src="uploads/test01.jpeg" alt="">';


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
	<div class="row large-up-12">
		<h1>Edition d'image</h1>
		<img src="<?php ?>" alt="">
		<form action="">
			<p>Customize your image</p>
			<fieldset class="large-6 columns">
			    <legend>Crop</legend>
			    <input type="radio" name="crop" value="Red" id="pokemonRed" required><label for="pokemonRed">Red</label>
			    <input type="radio" name="pokemon" value="Blue" id="pokemonBlue"><label for="pokemonBlue">Blue</label>
			    <input type="radio" name="pokemon" value="Yellow" id="pokemonYellow"><label for="pokemonYellow">Yellow</label>
			</fieldset>
			<input type="hidden" name="">
		</form>
	</div>
	
</body>
</html>

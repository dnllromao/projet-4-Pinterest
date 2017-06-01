<?php 
	//echo '<pre>'.print_r($_POST,true).'</pre>';

	if(isset($_POST["submit"]) && !empty($_POST['crop']) && !empty($_POST['img'])) {
	
		require 'vendor/claviska/simpleimage/src/claviska/SimpleImage.php';

		$imgSize = getimagesize('uploads/'.$_POST['img']);
		//echo '<pre>'.print_r($imgSize, true).'</pre>';

		// I could use getwidth form simpleimage
		$crop = [
			'x1' => 0,
			'x2' => $imgSize[0],
			'y1' => 0,
			'y2' => $imgSize[1]
		];

		switch ($_POST['crop']) {
			case '1:1':
				$gap = ($imgSize[0] - $imgSize[1]) / 2;
				//echo $gap;
				$crop['x1'] = $gap;
				$crop['x2'] = $imgSize[0] - $gap;
				break;
			case '4:3':
				# code...
				break;
			default:

				break;
		}

		
		try {
		  // Create a new SimpleImage object
		  $image = new \claviska\SimpleImage('uploads/'.$_POST['img']);
		  // Manipulate it
		  $image
		    ->crop($crop['x1'],$crop['y1'],$crop['x2'],$crop['y2'])
		    ->toFile('uploads/'.$_POST['img']);                      // output to the screen
		} catch(Exception $err) {
		  // Handle errors
		  echo $err->getMessage();
		}

		// var_dump($image->getHeight());
		// var_dump('hey'.$imgSize[1]);

		try {
		  // Create a new SimpleImage object
		  $image = new \claviska\SimpleImage('uploads/'.$_POST['img']);
		  // Manipulate it
		  $image
		    ->bestFit(300, $imgSize[1])
		    ->toFile('thumbs/'.$_POST['img']);                      // output to the screen
		} catch(Exception $err) {
		  // Handle errors
		  echo $err->getMessage();
		}

		// var_dump($image->getHeight());
		// var_dump('hey'.$imgSize[1]);
	
	}
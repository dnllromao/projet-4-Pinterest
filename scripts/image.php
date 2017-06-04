<?php

	if(!empty($_POST['crop']) && !empty($_POST['img'])) {
	
		require 'lib/SimpleImage.php';
		require('functions.php');

		$crop = sanitization($_POST['crop']);
		$file = sanitization($_POST['img']);

		function get_crop ($image,$choix) {
			$width = $image->getwidth();
			$height = $image->getHeight();

			$crop = [
				'x1' => 0,
				'x2' => $width,
				'y1' => 0,
				'y2' => $height
			];

			switch ($choix) {
				case '1:1':
					$gap = ($width - $height) / 2;
					$crop['x1'] = $gap;
					$crop['x2'] = $width - $gap;
					break;
				case '4:3':
					# code...
					break;
				default:

					break;
			}

			return $crop;
		}

		

		// 2. Create thumbnail
		try {
		  // Create a new SimpleImage object
		  $image = new \claviska\SimpleImage('uploads/orig/'.$file);
		  $crop = get_crop($image,$crop);
		  // Manipulate it
		  $image
		  	->crop($crop['x1'],$crop['y1'],$crop['x2'],$crop['y2'])
		    ->bestFit(300, $image->getHeight())
		    ->toFile('uploads/thumbs/'.$file);       
		} catch(Exception $err) {
		  // Handle errors
		  echo $err->getMessage();
		}
	
	}
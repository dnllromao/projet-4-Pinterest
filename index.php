<?php
	require('scripts/image.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pinterest</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/css/foundation.min.css" integrity="sha256-itWEYdFWzZPBG78bJOOiQIn06QCgN/F0wMDcC4nOhxY=" crossorigin="anonymous" />
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
	<header class="row">
		<div class="columns under-header">
			<form action="upload.php" method="post" enctype="multipart/form-data">
				<p>Select image to upload:</p>
				<div class="row">
					<div class="medium-4 large-3 columns">
						<label>Title:
				        	<input type="text" name="title">
				      	</label>
					</div>
					<div class="medium-8 large-9 columns">
						<label>
						  Description:
						  <textarea name="description"></textarea>
						</label>
					</div>
				</div>
				
				<div class="input-group">
				  <input class="input-group-field" type="text" id="file-name">
				  <div class="input-group-button">
				    <label for="exampleFileUpload" class="button" class="columns">Upload File</label>
				    <input type="file" name="fileToUpload" id="exampleFileUpload" accept=".gif,.jpg,.jpeg,.png,.webp" class="show-for-sr">
				  </div>
				</div>
				<input type="submit" class="button">
			</form>
		</div>
	</header>

	<main class="row grid">
		<?php

			if(file_exists('db.xml')) {
				$xml = simplexml_load_file('db.xml');
				$images = $xml->image;
			}else {
				$images = array_slice(scandir('uploads/orig/'),2);
			}
			
			foreach ($images as $key => $img) {

			?>	
				<div class="grid-item">
					<div class="card">
					  <a data-open="modal" data-img="uploads/orig/<?= (is_object($img))?$img->file:$img; ?>"><img src="uploads/thumbs/<?= (is_object($img))?$img->file:$img; ?>" alt=""></a>
					  <div class="card-section">
					    <h4><?php if(is_object($img)) echo $img->title; ?></h4>
					    <p><?php if(is_object($img) ) echo $img->description; ?></p>
					  </div>
					</div>
				</div>
			<?php	
			}
		?>
	</main>
	<!-- modal -->
	<div class="reveal" id="modal" data-reveal>
	  <img src="" alt="">
	  <button class="close-button" data-close aria-label="Close modal" type="button">
	    <span aria-hidden="true">&times;</span>
	  </button>
	</div>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/js/foundation.min.js" integrity="sha256-Nd2xznOkrE9HkrAMi4xWy/hXkQraXioBg9iYsBrcFrs=" crossorigin="anonymous"></script>
	<script src="lib/isotope.pkgd.js"></script>
	<script src="assets/js/script.js"></script>
</body>
</html>

<?php
	require('image.php'); 

	$target_dir = "uploads/";
	$imgs = array_slice(scandir($target_dir),2);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pinterest</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/css/foundation.min.css" integrity="sha256-itWEYdFWzZPBG78bJOOiQIn06QCgN/F0wMDcC4nOhxY=" crossorigin="anonymous" />
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<header class="row">
		<div class="columns">
			<form action="upload.php" method="post" enctype="multipart/form-data">
				<p>Select image to upload:</p>
				<div class="row">
					<div class="medium-6 columns">
						<label>Title:
				        	<input type="text" name="title">
				      	</label>
					</div>
					<div class="medium-6 columns">
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
				<input type="submit" class="button" name="submit" value="Submit">
			</form>
		</div>
	</header>

	<main class="row grid">
		<?php
			$target_dir = "thumbs/";
			$imgs = array_slice(scandir($target_dir),2);

			foreach ($imgs as $key => $img) {
			?>	
				<div class="grid-item">
					<div class="card">
					  <a data-open="modal" data-img="uploads/<?= $img?>"><img src="<?= $target_dir.$img?>" alt=""></a>
					  <div class="card-section">
					    <h4>This is a card</h4>
					    <p>It has an easy to override visual style, and is appropriately subdued.</p>
					  </div>
					</div>
				</div>
			<?php	
			}

			

			//$uploads = new SimpleXMLElment()

			/*$xml = new DOMDocument();
			$xml->load("db.xml");
			
			$x = $xml->getElementsByTagName('image');
			echo '<pre>'.print_r($x, true).'</pre>';
			foreach ($x as $value) {
				echo '<pre>'.print_r($value, true).'</pre>';*/
				// foreach ($value->childNodes as $key ) {
				// 	echo '<pre>'.print_r($key->nodeValue, true).'</pre>';
				// }
			//}

			
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
	<script src="js/vendor/foundation.js"></script>
	
	<script src="isotope.pkgd.js"></script>
	<script src="script.js"></script>
</body>
</html>

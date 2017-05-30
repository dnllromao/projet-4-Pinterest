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
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/css/foundation.min.css" integrity="sha256-itWEYdFWzZPBG78bJOOiQIn06QCgN/F0wMDcC4nOhxY=" crossorigin="anonymous" /> -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/css/foundation-flex.min.css">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<header class="row">
		<div class="columns">
			<form action="upload.php" method="post" enctype="multipart/form-data">
				<div class="columns">
					<p>Select image to upload:</p>
					<div class="row">
						<label for="exampleFileUpload" class="button" class="columns">Upload File</label>
						<input type="file" name="fileToUpload" id="exampleFileUpload" accept=".gif,.jpg,.jpeg,.png,.webp" class="columns">
					</div>
				</div>
				<div class="columns">
					<input type="submit" class="button" name="submit" value="Submit">
				</div>
			</form>
		</div>
		
	</header>
	
	<!-- This was the grid layout before isotope
	<main class="row">
	<?php
		
		foreach ($imgs as $key => $img) {
		?>
			
				<div class="card">
				  <img src="<?= $target_dir.$img?>" alt="">
				  <div class="card-section">
				    <h4>This is a card.</h4>
				    <p>It has an easy to override visual style, and is appropriately subdued.</p>
				  </div>
				</div>
			

		<?php	
		}
	?>
	</main>
	-->
	<main class="row grid">
		<?php
			$target_dir = "uploads/";
			$imgs = array_slice(scandir($target_dir),2);
			//echo '<pre>'.print_r($imgs, true).'</pre>';
			foreach ($imgs as $key => $img) {
			?>
				<div class="grid-item">
					<div class="card">
					  <img src="<?= $target_dir.$img?>" alt="">
					  <div class="card-section">
					    <h4>This is a card.</h4>
					    <p>It has an easy to override visual style, and is appropriately subdued.</p>
					  </div>
					</div>
				</div>
			<?php	
			}
		?>
	</main>
	<script src="isotope.pkgd.js"></script>
	<script src="script.js"></script>
</body>
</html>

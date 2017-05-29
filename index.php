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
	<form action="upload.php" method="post" enctype="multipart/form-data">
		<div class="row">
			Select image to upload:
			<input type="file" name="fileToUpload" id="fileToUpload" accept=".gif,.jpg,.jpeg,.png,.webp">
			<!-- <label for="exampleFileUpload" class="button">Upload File</label>
			<input type="file" name="fileToUpload" id="exampleFileUpload" class="show-for-sr"> -->
		</div>
		<div class="row">
			<!-- <input type="submit" value="Upload Image" name="submit"> -->
			<input type="submit" class="button" name="submit" value="Submit">
		</div>
	</form>

	<main class="row">
		<!-- <div class="wrapper"> -->
	<?php
		$target_dir = "uploads/";
		$imgs = array_slice(scandir($target_dir),2);
		//echo '<pre>'.print_r($imgs, true).'</pre>';
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
		<!-- </div> -->
	</main>
</body>
</html>

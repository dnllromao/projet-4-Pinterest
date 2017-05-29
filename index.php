<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pinterest</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/foundation/6.2.4/foundation.min.css">
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

	<div class="row">
	<?php
		$target_dir = "uploads/";
		$imgs = array_slice(scandir($target_dir),2);
		echo '<pre>'.print_r($imgs, true).'</pre>';
		foreach ($imgs as $key => $img) {
		?>
			<div class="large-3 columns">
				<img src="<?= $target_dir.$img?>" alt="">
			</div>
		<?php	
		}
	?>
		
	</div>
</body>
</html>

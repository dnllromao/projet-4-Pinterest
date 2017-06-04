<?php 

	function sanitization ($data) {

		$data = trim($data);
	    $data = strip_tags($data);  
		$data = stripslashes($data); 
		$data = htmlspecialchars($data); 

		return (!empty($data))?$data:'';
	}

	function index_file ($fl,$ttl,$txt) {

		if (!file_exists('db.xml')) 
			return; 

		$dom = new DOMDocument();
		$dom->load('db.xml');

		$image = $dom->createElement('image');
		$file = $dom->createElement('file', $fl);
		$title = $dom->createElement('title', $ttl);
		$description = $dom->createElement('description', $txt);
		$image->appendChild($file);
		$image->appendChild($title);
		$image->appendChild($description);
		$dom->childNodes[0]->appendChild($image);
		$dom->save('db.xml');
	}


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


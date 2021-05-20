<?php
require("functions.php");
								
if(isset($_POST['add-post'])) {
	unset($_POST['add-post']);
	$id = insert('test_post', $_POST);

	
 	echo "<pre>", print_r($_FILES['images']['name']), "</pre>";
 	
 	$title = $_POST['title'];
 	$desc = $_POST['description'];

 	$imagesName = time() . "_" . $_FILES['images']['name'];

 	$target = 'images/' . $imagesName;
 	$msg = "";

 	if(move_uploaded_file($_FILES['images']['tmp_name'], $target)) {
 		$insert = "INSERT INTO images (images, title, description) VALUES ('$imagesName', '$title', '$desc')";
 		$msg = 'Image has uploaded';
 		
 			if(mysqli_query($conn, $insert)){
 				$msg = 'Image has uploaded TO THE DATABASE';
 				
 			}else {
				$msg = 'Image has failed to upload DATABASE ERROR';
 				
 			}
 	} else {
 		$msg='Could not upload';
 		
 	}

	echo "<script>window.location = 'Homepage.php'</script>";
}


?>

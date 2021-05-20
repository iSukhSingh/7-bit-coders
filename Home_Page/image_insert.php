
<link rel="stylesheet" href="css/Homepage_style.css">
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Image Preview and Upload PHP</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" />
  <link rel="stylesheet" href="main.css">
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-4 offset-md-4 form-div">
        <a href="profiles.php">View all profiles</a>
        <form action="image_insert.php" method="post" enctype="multipart/form-data">
         <input type="file" name="file">
         <input type="submit" name="submit" value="Upload">
        </form>
        <?php
	require_once 'credentials.php';
	require_once 'functions.php';
	$query = $conn->query("SELECT name FROM image ORDER BY date DESC");

	if($query->num_rows >0) {
		while ($row = $query->fetch_assoc()) {
			$imageURL = 'images/' . $row["name"];
			?>
		<img height='320 px' width='auto' src='<?=$imageURL;?>'/>
		<?php

		}
	}
		?>

      </div>
    </div>
  </div>
</body>
</html>



<?php
	
	$statusMsg = '';

	$backlink = '<a href="Homepage.php"/>Goback</a>';
	$targetDir = 'images/';
	$fileName = basename($_FILES["file"]["name"]);
	$targetFilePath = $targetDir . $fileName;
	$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

	if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])) {
		$allowTypes = array('jpg','png','jpeg','gif','pdf');
		if(!file_exists($targetFilePath)) {
			if(in_array($fileType, $allowTypes)) {
				if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
					$insert = $conn->query("INSERT into image(name, date) VALUES ('". $fileName ."', NOW())");
					if($insert) {
						$statusMsg = "The file<b>" . $fileName ."</b> had been uploaded" .$backlink;
						echo "<script>window.location = 'image_insert.php'</script>";
					}else{
						$statusMsg = "File upload failed" . $backlink;
					}
				} else {
					$statusMsg = "Sorry there was an error" . $backlink;
				}
			}
		}
	}
?>
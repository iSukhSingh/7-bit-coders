<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

<style type="text/css">
header .navbar-nav{
	float: left;
	border: ;
	margin: 0px;
	padding: 0px;
	list-style: none;
}
</style>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>uChat Homepage</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/album/">
    <!-- Bootstrap core CSS -->
	<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/Homepage_style.css">
</head>

<body>
	<div class= "wrapper">
	<header>
		<!--navbar navbar-expand-lg navbar-dark bg-dark shadow-sm-->
		<nav class="navbar navbar-expand-lg  shadow-sm">
  			<div class="container-fluid">
      			<a href="Homepage.php" class="navbar-brand d-flex align-items-center">
        		<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chat-dots" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        		<path fill-rule="evenodd" d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z"/>
        		<path d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
        		</svg>
        		uChat
      			</a>

    			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      			<span class="navbar-toggler-icon"></span>
    			</button>
    			<div class="collapse navbar-collapse" id="navbarNavDropdown">
      				<ul class="navbar-nav ml-auto">
      				<!--
						<li class="nav-item">
						<form class="navbar-form navbar-left" role="search">
						<div class="form-group">
						<input type="text" class="form-control" placeholder="Search">
						</div>
						<button type="submit" class="btn btn-default">
						<span class="glyphicon glyphicon-search"></span>
						</button>
						</form></li>
					-->
        			<li class="nav-item">
          			<a class="nav-link active" aria-current="page" href="Homepage.php">Home</a>
        			</li>
        			<li class="nav-item">
          			<a class="nav-link" href="create.php">Post</a>
        			</li>
        			<li class="nav-item dropdown">
          			<a class="nav-link active dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          			<i class="bi bi-person-circle"></i>
            		UserName
          			</a>
          			<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            		<li><a class="dropdown-item" href="#">Dashboard</a></li>
            		<li><a class="dropdown-item" href="#">Logout</a></li>
          			</ul>
        			</li>
      				</ul>
    			</div>
  			</div>
		</nav>
	</header>

<?php
	require_once 'credentials.php';
	include ('functions.php');
$images = getimage('images');
	
?>
<!-- Posting Stuff -->
<div class='content clearfix'>
	<div class="main-content">
		<h6 class="popular-title">Posts</h6>

		<?php foreach ($images as $image): ?>
		<div class="post">
			<div class="post-wrapper">
				<div class="picture">
					<img src="images/<?php echo $image[2]; ?>"  alt="" class="post-image" height='320 px' width='auto'/>
				</div>
				<div class ="post-preview">
					<h4><a href="post.php?id=<?php echo $image[0];?>"><?php echo $image[3]; ?></a></h4>
					<i class="bi bi-person-circle"> UserName</i>
					<br>
					<?php
					$date = strtotime($image[4]);
					$des = ($image[5]); 
					?>
					<i class="date"> <?php echo date("F j Y", $date); ?> </i>
					<p class="preview-text">
					<?php echo substr($des, 0,190); ?>
					</p>
					<a href="post.php?id=<?php echo $image[0];?>" class="btn read-more">Read More</a>
				</div>
			</div>
		</div>
		<?php endforeach;?>
    </div><!--END OF MAIN CONTENT-->
		<div class="sidebar">
			<!--
			<div class="search">
				<h2 class="search-title">SEARCH</h2>
				<form action="index.html" method="post">
					<input type="text" name="search-term" class="text-input" placeholder="Search">
				</form>
			</div>	
    		-->
    		<div class="suggestions">
    			<small class="suggestions-title">Suggestions For You</small>
    			<div class="group_suggest"><a href="#">Community Near You #1</a></div>
    			<div class="group_suggest"><a href="#">Community Near You #2</a></div>
    			<div class="group_suggest"><a href="#">Community Near You #3</a></div>
    			<div class="group_suggest"><a href="#">Community Near You #4</a></div>
    		</div>
		</div><!--END OF SIDEBAR-->
</div><!--END OF CONTENT-->
</div> <!--END OF WRAPPER-->


 <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</body>
</html>
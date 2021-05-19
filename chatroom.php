<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Chat Room</title>
	<link rel="stylesheet" href="style.css" type="text/css" />

<style>
	body{
		font-family: verdana;
		background-color: #efeff5;
	}
	h2{
	   text-align: center;
	   color: gray;
	} 

	.home_btn {
		font-size: 25px;
	color: lightblue;
	}
	/* unvisited link */
a:link {
  color: #80ccff;
}

/* visited link */
a:visited {
  color: #80ccff;
}

/* mouse over link */
a:hover {
  color: #80ccff;
}

/* selected link */
a:active {
  color: #80ccff;
} 
#frame{
	position: relative;
	left: 300px;
	height:600px;
	width:800px;

}
	</style>


</head>
<body>
<div class="home_btn">
<a href="https://uchatcsu.herokuapp.com/" style="text-decoration: none;"> uChat </a>
</div>

<h2>Welcome to the Chat Room</h2>
<iframe src="messages.php" id="frame" title="This page displays the users' messages">
</iframe>



</body>
</html>

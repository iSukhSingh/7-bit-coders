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
        font-family: arial;
        background-color: lightblue;
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
<h2>Welcome to the Chat Room</h2>

<iframe src="messages.php" id="frame" title="This page displays the users' messages">
</iframe>



</body>
</html>
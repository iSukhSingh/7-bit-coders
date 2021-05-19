<?php 
require_once "db.php";

$status = "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $chat_username = $_POST['chat_username'];
    $chat_msg = $_POST['chat_msg'];

    if(empty($chat_username) || empty($chat_msg)){
        $status = "One or more of the fields are empty.";
        echo $status;
    } 
    else if(strlen($chat_username) >= 10 || !preg_match("/^[a-zA-Z-'\s]+$/", 
        $chat_username)) {
        $status = "Please enter a valid name";
        echo $status;
    }

    else{
        // storing data into database 
        $sql = 'INSERT INTO chat (chat_username, chat_msg) 
            VALUES (:chat_username, :chat_msg)';

        $stmt = $db->prepare($sql); 

        $stmt->execute(['chat_username' => $chat_username, 
            'chat_msg' => $chat_msg]);

        $status = "Message sent";

        //fetching data from database

        $query = "SELECT chat_username, chat_msg, chat_date FROM chat";
        $data = $db->query($query);  


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Chat Room </title>
    <link rel="stylesheet" href="style.css" type="text/css" />

    <script
src="https://code.jquery.com/jquery-3.6.0.min.js"
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
crossorigin="anonymous"></script>

<style>
*{
    box-sizing: border-box;
    padding: 0px;
    margin: 0px;
    font-family: verdana;  

}

body{
  background-color: pink;
}

#wrapper{
    margin:10px auto;
    width: 1000px;
    text-align: center;

}

#history{

    min-height:600px;
    width: 600px;
    margin:10px auto;
    padding: 10px;
    text-align:left;

    }

    #chatbox{
        position: relative;
        top:450px;
        right:200px;
        padding: 10px;
    }
  </style>


  </head>


<body>


<div id="wrapper">
<div id="history">

<?php
        foreach($data as $row)
        {
            echo '<p>'.$row["chat_username"]. ': <b>' 
                .$row["chat_msg"]. '</b> </br> <i>'.$row["chat_date"]. 
                '</i> </p> </br>';
        }

        //close connection
        $data = null;
        $db = null; 
    }
}

?>

<div id="chatbox">
    <form action="" method="POST">
    <br>
    <input type="text" id="chat_username" name="chat_username" placeholder="First name" autocomplete="off" autofocus>
    <br><br>

    <input type="text" id="chat_msg" name="chat_msg" placeholder="Enter message" autocomplete="off">
    <input type="submit" value="Send">

    </form>
</div> 

</div>

</div>

<script>


</script>

</body>
</html>





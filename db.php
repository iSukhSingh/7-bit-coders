
<?php
$host = "localhost";
$name = "f20group7";
$username = "f20group7";
$password = "bjmst2020";

try{
    $db = new PDO("mysql:dbhost=$host;dbname=$name", "$username", "$password");
echo "";
}catch(PDOException $e){
    $error_msg = $e->getMessage();
    echo $error_msg;
    exit();
}
?>

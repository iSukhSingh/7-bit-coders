<?php
// database for posts
$conn = mysqli_connect('localhost', 'f20group7', 'bjmst2020', 'f20group7');
if (!$conn) {
	die("Connection failed: ".mysqli_connect_error());
}

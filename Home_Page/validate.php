<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["title"])) {
    $titleErr = "Missing: Title";
  } else {
    $title = test_input($_POST["title"]);
  }

  if (empty($_POST["description"])) {
    $descErr = "Missing: Description";
  } else {
    $desc = test_input($_POST["desc"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<?php
require("credentials.php");

function insert($table, $data)
{
	global $conn;
	
	$sql = "INSERT INTO $table SET";

	$i = 0;
	foreach($data as $key => $value) {
		if ($i === 0) {
			$sql = $sql . " $key=?";
		} else {
			$sql = $sql . ", $key=?";
		}
		$i++;
	}

	$stmt = $conn->prepare($sql);
	$values = $conn->real_escape_string(array_values($data));
	$types = str_repeat('s', count($values));
	$stmt->bind_param($types, ...$values );
	$stmt->execute();
	//$stmt->bind_result($row);
	$id = $stmt->insert_id;
	
	return $id;

}



function update($table)
{
	global $conn;

	$sql = "UPDATE $table SET";

	$sql = $sql . " WHERE id=?";
	$data["id"] = $id;
	$stmt = $conn->prepare($sql);
	$values = $conn->real_escape_string(array_values($data));
	$stmt->execute();
	return $stmt->affected_rows;

}

function selectall($table)
{
	global $conn;
	$sql = "SELECT * FROM $table";
	
		$result = mysqli_query($conn, $sql) or die("Bad Query: $sql");
		while($row = mysqli_fetch_all($result)) {
	
			return $row;
		}

}

//$sql = $conn->query("SELECT * FROM images ORDER BY date ASC");
function getimage($table)
{
	global $conn;
	$sql = "SELECT * FROM $table ORDER BY id DESC";

		$result = mysqli_query($conn, $sql) or die("Bad Query: $sql");
		while($row = mysqli_fetch_all($result)) {
	
			return $row;
		}
}

//$sql = "SELECT * FROM course_roster where roster_id = $id";
function selectpost($table)
{
	$id = $_GET[id];
	global $conn;
	$sql = "SELECT * FROM $table where id = $id";
	$result = mysqli_query($conn, $sql) or die("Bad Query: $sql");
	
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$stmt->bind_result($row);
		$row = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
		return $row;
	
}


function delete($table, $id)
{
	global $conn;

	$sql = "DELETE FROM $table";


	$sql = $sql . " WHERE id=?";
	$data["id"] = $id;
	$stmt = $conn->prepare($sql);
	$values = $conn->real_escape_string(array_values($data));
	$types = str_repeat('s', count($values));
	$stmt->bind_param($types, ...$values );
	$stmt->execute();
	return $stmt->affected_rows;

}





?>


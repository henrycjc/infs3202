<?php
function createComment($place_id, $comment) {
    $host = "au-cdbr-azure-southeast-a.cloudapp.net";
    $user = "b3ffc7053961fb";
    $pass = "57815c3b";
    $port = 3306;
    $db = "henrychladil_sql";
    $mysqli = new mysqli($host, $user, $pass, $db, 3306);
    if ($mysqli->connect_errno) {
        echo "<h1>Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error . "</h1>";
        die();
    }
    $result = $mysqli->query("INSERT INTO comments (place_id, comment)
    				VALUES ('".$place_id."', '".$comment."')");
	$mysqli->close();
	return $result;
}
createComment($_POST['place_id'], $_POST['comment']);

function getComments($place_id) {
	$host = "au-cdbr-azure-southeast-a.cloudapp.net";
    $user = "b3ffc7053961fb";
    $pass = "57815c3b";
    $port = 3306;
    $db = "henrychladil_sql";
    $mysqli = new mysqli($host, $user, $pass, $db, 3306);
    if ($mysqli->connect_errno) {
        echo "<h1>Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error . "</h1>";
        die();
    }
    $rawData = $mysqli->query("SELECT * FROM comments WHERE place_id LIKE '".$place_id."'");
    $objData = array();
    for($i = 0; $i < $rawData->num_rows; $i++) {
        $objData[] = $rawData->fetch_assoc();
    }
    $mysqli->close();
    return $objData;
}

$comments = getComments($_POST['place_id']);

if (count($comments) < 1) {
	echo "No comments yet.";
} else {
	foreach ($comments as $comment) {
		echo "<i>".$comment['comment']."</i><br><hr>";
	}	
}
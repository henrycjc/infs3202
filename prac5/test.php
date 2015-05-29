<?php
function getComments($place_id) {
    $mysqli = new mysqli("localhost", "henry", "asdfasdf", "myres");
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

var_dump(getComments('ChIJOwdovxxakWsRi68jOxlLglU'));

$comments = getComments('ChIJOwdovxxakWsRi68jOxlLglU');
foreach ($comments as $comment) {
        echo "<i>".$comment['comment']."</i><br>";
}   
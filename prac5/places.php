<?php 

$rawData = $_POST['places'];

$jsonData = json_decode($rawData, true);


var_dump($jsonData);
<?php

/*
function fetchData() {
    $mysqli = new mysqli("localhost", "henry", "asdfasdf", "myres");
    if ($mysqli->connect_errno) {
        echo "<h1>Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error . "</h1>";
        die();
    }
    $rawData = $mysqli->query("SELECT * FROM `data`");
    $objData = array();
    for($i = 0; $i < $rawData->num_rows; $i++) {
        $objData[] = $rawData->fetch_assoc();
    }
    return $objData;
}
function findAverageLat() {
    $data = fetchData();
    $latArr = array();
    $longArr = array();
    foreach($data as $restaurant) {
        $latArr[] = $restaurant['latitude'];
    }
    return (array_sum($latArr) / count($latArr));
}
function findAverageLong() {
    $data = fetchData();
    $longArr = array();
    foreach($data as $restaurant) {
        $longArr[] = $restaurant['longitude'];
    }
    return (array_sum($longArr) / count($longArr));
} */
?>
<!doctype html>
<!-- INFS3202 Practical 5 Solution by Henry Chladil (UQ 42934673) -->
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="A restaurant finder app to help you find a nice place to eat in Indooroopilly or Taringa, Brisbane, Queensland, Australia.">
        <meta name="keywords" content="Restaurant Finder, Restaurant, Find, Eat, Eat Out, Brisbane, Indooroopilly, Taringa, Food, Thai Food, Italian Food, Tapas, Mexican Food, Japanese Food, Laksa Hut, Dos Amigos, Royal Sri Thai Restaurant, Harajuku Gyoza">
        <title>Restaurant Finder</title>
        <link rel="stylesheet" href="css/main.css">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
        <script src="js/jquery-2.1.3.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfCH7xjYSb_f6bzVgvuntHX-Fo7cITBgk&libraries=places"></script>
        <script src="js/main.js"></script>
        <script>
        function updateEverything() {
            var searchRequest = {
                    location: map.center,
                    name: $("#searchterm").val(),
                    rankBy: google.maps.places.RankBy.DISTANCE,
                    types: ['food']
                };
                service = new google.maps.places.PlacesService(map);
                clearOverlays();
                service.nearbySearch(searchRequest, callback);
        }

        $(document).ready(function() {
            $("#searchbtn").click(function() {
                updateEverything();
            });
        });
        </script>
    </head>
    <body>
        <div id="container">
            <div id="header">
                <div id="brand">
                    <span class="brand-name">Restaurant Finder</span> 
                </div>
                <div id="loginandsearch">
                    <div class="search">
                            <input type="text" class="search-term" name="searchterm" id="searchterm">
                            <button class="login-button" name="searchbtn" id="searchbtn">Search</button>
                    </div>
                </div>
            </div>
            <div id="content">
                <div id="location">
                    <h2>Location</h2>
                    <div id="map-canvas">
                    </div>
                </div>
                <div id="restaurants">
                    <h2>Restaurants</h2>
                        <div id="resData"></div>
                </div>
            </div>
        </div> 
    </body>
</html>
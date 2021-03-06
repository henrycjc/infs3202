<?php
//echo "<pre>";
//var_dump($_POST);
//echo "</pre>";
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

function findAverageLatSearch() {
    $data = getSearchData($_POST['searchterm']);
    $latArr = array();
    foreach($data as $restaurant) {
        $latArr[] = $restaurant['latitude'];
    }
    if (count($latArr) <= 0) {
        return 0;
    } else {
        return (array_sum($latArr) / count($latArr));
    }
}
    
function findAverageLongSearch() {
    $data = getSearchData($_POST['searchterm']);
    $longArr = array();
    foreach($data as $restaurant) {
        $longArr[] = $restaurant['longitude'];
    }
    if (count($longArr) <= 0) {
        return 0;
    } else {
        return (array_sum($longArr) / count($longArr));
    }
    
}

function getSearchData($term) {
    $mysqli = new mysqli("localhost", "henry", "asdfasdf", "myres");
    if ($mysqli->connect_errno) {
        echo "<h1>Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error . "</h1>";
        die();
    }

    $rawData = $mysqli->query("SELECT * 
                                FROM data 
                                WHERE name LIKE '%".$term."%' 
                                OR location LIKE '%".$term."%' 
                                OR contact LIKE '%".$term."%'");
    $objData = array();
    for($i = 0; $i < $rawData->num_rows; $i++) {
        $objData[] = $rawData->fetch_assoc();
    }
    return $objData;
}

?>
<!doctype html>
<!-- INFS3202 Practical 4 Solution by Henry Chladil (UQ 42934673) -->
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="A restaurant finder app to help you find a nice place to eat in Indooroopilly or Taringa, Brisbane, Queensland, Australia.">
        <meta name="keywords" content="Restaurant Finder, Restaurant, Find, Eat, Eat Out, Brisbane, Indooroopilly, Taringa, Food, Thai Food, Italian Food, Tapas, Mexican Food, Japanese Food, Laksa Hut, Dos Amigos, Royal Sri Thai Restaurant, Harajuku Gyoza">
        <title>Restaurant Finder</title>
        <link rel="stylesheet" href="css/main.css">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
        <script src="js/jquery-2.1.3.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfCH7xjYSb_f6bzVgvuntHX-Fo7cITBgk"></script>
        <script src="js/main.js"></script>
        <script>
            <?php 
                if(isset($_POST['searchterm'])) {
                    if ($_POST['searchterm'] != "") {
                       $data = getSearchData($_POST['searchterm']);
                        if (count($data) <= 0) {
                                echo "function initialize() {";
                                echo "var mapOptions = {
                                    center: { lat: -27.470691, lng: 153.022815},
                                    zoom: 12
                                    };";
                                    echo "var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);";
                                echo "}";
                                echo "google.maps.event.addDomListener(window, 'load', initialize);";
                        } else {
                            $i = 0;
                            $letters = array_combine(range(1,26), range('A', 'Z'));
                            echo "function initialize() {";
                            echo "var mapOptions = {
                                    center: { lat: ".findAverageLatSearch().", lng: ".findAverageLongSearch()."},
                                    zoom: 12
                                    };";
                            foreach($data as $restaurant) {
                                echo "var res".$i." = new google.maps.LatLng(".$restaurant['latitude'].", ".$restaurant['longitude'].");
                                var marker".$i." = new google.maps.Marker({
                                            position: res".$i.",
                                            icon: '../img/maps/Marker".$letters[$restaurant['id']+1].".png',
                                            title:'".$restaurant['name']."'
                                        });
                                var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);";
                                $i++;
                            }
                            $i = 0;
                            foreach($data as $restaurant) {
                                echo "marker".$i.".setMap(map);";
                                $i++;
                            }
                            echo "}"; // close intialize
                            echo "google.maps.event.addDomListener(window, 'load', initialize);"; 
                        }
                    } else {
                        echo "function initialize() {";
                        echo "var mapOptions = {
                            center: { lat: -27.470691, lng: 153.022815},
                            zoom: 12
                            };";
                            echo "var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);}";
                        echo "google.maps.event.addDomListener(window, 'load', initialize);";
                    }
                } else {
                    echo "function initialize() {";
                    echo "var mapOptions = {
                        center: { lat: -27.470691, lng: 153.022815},
                        zoom: 12
                        };";
                        echo "var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);";
                    echo "}";
                    echo "google.maps.event.addDomListener(window, 'load', initialize);";
                }
        ?>
    
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
                        <form class="searchform" id="searchform" action="search.php" method="post">
                            <input type="text" class="search-term" name="searchterm" id="searchterm">
                            <button class="login-button" name="searchbtn" id="searchbtn">Search</button>
                            
                        </form>
                    </div>
                    <div class="login">
                        <form class="navbar-login" id="login" action="admin.php">
                            <button class="login-button">Login</button>
                        </form>
                    </div>
                </div>
            </div>
            <div id="content">
                <div id="location">
                    <h2>Location</h2>
                    <div id="map-canvas">
                    </div>
                    <div id="searchformdiv">
                        <h2>Advanced Search</h2>
                        <table>
                        <form id="searchform" name="searchform" action="search.php" method="post">
                            <tr><td>Name:</td><td><input type='text' name='searchterm'></td></tr>
                            <tr><td>Address:</td><td><input type='text'  name='searchtermaddress'></td></tr>
                            <tr><td>Phone:</td><td><input type='text' name='searchtermphone'></td></tr>
                            <tr><td></td><td><button>Search</button></td></tr>
                        </form>
                        </table>
                    </div>
                </div>
                <div id="restaurants">
                    <h2>Restaurants</h2>
                    <table>
                    <?php 
                        if(isset($_POST['searchterm'])) {
                            if ($_POST['searchterm'] != "") {
                                $data = getSearchData($_POST['searchterm']);
                                if (count($data) <= 0) {
                                    echo "<h2>Sorry, no results matching your search were found.</h2>";
                                    echo "<script>";
                                    echo "function initialize() {";
                                    echo "var mapOptions = {
                                        center: { lat: -27.470691, lng: 153.022815},
                                        zoom: 12
                                        };";
                                        echo "var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);";
                                    echo "}";
                                    echo "google.maps.event.addDomListener(window, 'load', initialize);";
                                    echo "</script>";  
                                } else {
                                    foreach($data as $restaurant) {
                                    echo "<tr>";
                                        echo "<td>";
                                            echo "<ul class='res'>";
                                                echo "<li>" . $restaurant['name'];
                                                    echo "<ul class='nobullet'>";
                                                        echo "<li>".$restaurant['location']."</li>";
                                                        echo "<li>".$restaurant['contact']."</li>";
                                                        echo "<li>"."<button class=\"butt\">More Info</button>"."</li>";
                                                    echo "</ul>";
                                                echo "</li>";
                                            echo "</ul>";
                                        echo "</td>";
                                        /* Images */
                                        echo "<td>";
                                            echo "<img src=\"".explode("#", $restaurant['url'])[0]."\"/ width=\"200\"> ";
                                        echo "</td>";
                                    echo "</tr>";
                                    }
                                }
                                
                            } else {
                                echo "<h2>Sorry, no results matching your search were found.</h2>";
                                echo "<script>";
                                echo "function initialize() {";
                                echo "var mapOptions = {
                                    center: { lat: -27.470691, lng: 153.022815},
                                    zoom: 12
                                    };";
                                    echo "var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);";
                                echo "}";
                                echo "google.maps.event.addDomListener(window, 'load', initialize);";
                                echo "</script>";  
                            }
                        } else {
                            echo "<h2>Sorry, no results matching your search were found.</h2>";
                            echo "<script>";
                            echo "function initialize() {";
                            echo "var mapOptions = {
                                center: { lat: -27.470691, lng: 153.022815},
                                zoom: 12
                                };";
                                echo "var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);";
                            echo "}";
                            echo "google.maps.event.addDomListener(window, 'load', initialize);";
                            echo "</script>";       
                        }
                    
                    ?>
                    </table>
                </div>
            </div>
        </div> 
    </body>
</html>
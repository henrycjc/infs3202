<?php
function getTotalVisitors() {
    $host = "au-cdbr-azure-southeast-a.cloudapp.net";
    $user = "b3ffc7053961fb";
    $pass = "57815c3b";
    $port = 3306;
    $db = "henrychladil_sql";
    $mysqli = new mysqli($host, $user, $pass, $db, $port);
    if ($mysqli->connect_errno) {
        echo "<h1>Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error . "</h1>";
        die();
    }
    $rawData = $mysqli->query("SELECT COUNT(*) as total FROM visitors");
    $objData = array();
    for($i = 0; $i < $rawData->num_rows; $i++) {
        $objData[] = $rawData->fetch_assoc();
    }
    return $objData['total'];
}

function addVisitor() {

    $host = "au-cdbr-azure-southeast-a.cloudapp.net";
    $user = "b3ffc7053961fb";
    $pass = "57815c3b";
    $port = 3306;
    $db = "henrychladil_sql";
    $mysqli = new mysqli("au-cdbr-azure-southeast-a.cloudapp.net", "b3ffc7053961fb", "visitor", "57815c3b", "3306");
    if ($mysqli->connect_errno) {
        echo "<h1>Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error . "</h1>";
        die();
    }
    $result = $mysqli->query("INSERT INTO visitor (ipaddr)
                    VALUES ('".$_SERVER['REMOTE_ADDR']."') ");
    return $result;
}

addVisitor();
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
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>
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
            // Refresh every 2 seconds
            setInterval(function() {
                location.reload();
            }, 2000);
            <?php
                echo "$('#count').text('".getTotalVisitors()."');";
            ?>
            


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
                    <div id="counter">Total number of visits: <span id="count">5</span></div>
                    <div id="notice">Auto refresh every 2 seconds</div>
                    <br>
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
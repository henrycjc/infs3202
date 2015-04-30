<!doctype html>
<!-- INFS3202 Practical 2 Solution by Henry Chladil (UQ 42934673) -->
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="A restaurant finder app to help you find a nice place to eat in Indooroopilly or Taringa, Brisbane, Queensland, Australia.">
        <meta name="keywords" content="Restaurant Finder, Restaurant, Find, Eat, Eat Out, Brisbane, Indooroopilly, Taringa, Food, Thai Food, Italian Food, Tapas, Mexican Food, Japanese Food, Laksa Hut, Dos Amigos, Royal Sri Thai Restaurant, Harajuku Gyoza">
        <title>Restaurant Finder</title>
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="vendor/lightbox/css/lightbox.css">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
        <script src="js/jquery-2.1.3.min.js"></script>
        <script src="vendor/lightbox/js/lightbox.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfCH7xjYSb_f6bzVgvuntHX-Fo7cITBgk"></script>
        <script src="js/restaurants.js"></script>
        <script>
            addMap("Amigos");
        </script>
    </head>
    <body>
        <div id="container">
            <div id="header">

                <h1>Dos Amigos</h1> 
            </div>
            <a class="goback" href="index.php">Go back?</a>
            <div id="content">
                <div id="location">
                    <h2>Location</h2>
                    <div id="map-canvas">
                    </div>
                </div>
                <div id="restaurants">
                    <h2>Info</h2>
                        <div class="info">
                            <h3>Address</h3>
                                <p>185 Moggill Road, Taringa QLD</p>
                            <h3>Phone</h3>
                                <p>(07) 3870 8092</p>
                            <h3>Opening Hours</h3>
                                <p>
                                Monday: Closed<br>
                                Tuesday-Sunday: 10am - 9:30pm</p>
                            <h3>Menu </h3>
                                <p>Click images to view larger.</p>
                                <a href="../img/pracs/res/menus/amigos1.jpg" target="_blank">
                                    <img alt="Menu" src="img/res/menus/amigos1.jpg" width="250">
                                </a>
                        </div>

                </div>
            </div>
        </div> 
    </body>
</html>

<?php
    session_start();
?>
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
        <script src="js/main.js"></script>
    </head>
    <body>
        <div id="container">
            <div id="header">
                <div id="brand">
                    <span class="brand">Restaurant Finder</span>
                
                <div class="spacer">
                <form class="navbar-login" id="login" action="login.php">
                    <button>Login</button>
                </form>
              </div>
            </nav>
            <div id="content">
                <div id="location">
                    <h2>Location</h2>
                    <div id="map-canvas">
                    </div>
                </div>
                <div id="restaurants">
                    <h2>Restaurants</h2>
                    <table>
                        <tr>
                            <td>
                                <ul class="res">
                                    <li><img alt="Royal Sri Thai REstaurant" src="../img/pracs/maps/MarkerA.png">Royal Sri Thai Restaurant
                                        <ul class="nobullet">
                                            <li>1/620 Moggill Road, Chapel Hill QLD</li>
                                            <li>(07) 3878 1566</li>
                                            <li><form action="thai.php"><button class="butt">More Info</button></form></li>
                                        </ul>
                                    </li>
                                </ul>
                            </td>
                            <td>
                                <a href="../img/pracs/res/thai1.jpg" data-lightbox="thai" data-title="Royal Sri Thai">
                                <img alt="Royal Sri Thai" src="../img/pracs/res/thai1.jpg" width="200"></a>
                                <a href="../img/pracs/res/thai2.jpg" data-lightbox="thai" data-title="Royal Sri Thai"></a>
                                <a href="../img/pracs/res/thai3.jpg" data-lightbox="thai" data-title="Royal Sri Thai"></a>
                                <a href="../img/pracs/res/thai4.jpg" data-lightbox="thai" data-title="Royal Sri Thai"></a>
                                <a href="../img/pracs/res/thai5.jpg" data-lightbox="thai" data-title="Royal Sri Thai"></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <ul class="res">
                                    <li><img alt="Laksa Hut" src="../img/pracs/maps/MarkerB.png">Laksa Hut
                                        <ul class="nobullet"><li>27 Station Road, Indooroopilly QLD</li>
                                            <li>(07) 3720 2289</li>
                                            <li><form action="laksa.php"><button class="butt">More Info</button></form></li>
                                            </ul>
                                    </li>
                                </ul>
                            <td>
                                <a href="../img/pracs/res/laksa1.jpg" data-lightbox="laksa" data-title="Laksa Hut">
                                <img alt="Laksa Hut" src="../img/pracs/res/laksa1.jpg" width="200"></a>
                                <a href="../img/pracs/res/laksa2.jpg" data-lightbox="laksa" data-title="Laksa Hut"></a>
                                <a href="../img/pracs/res/laksa3.jpg" data-lightbox="laksa" data-title="Laksa Hut"></a>
                                <a href="../img/pracs/res/laksa4.jpg" data-lightbox="laksa" data-title="Laksa Hut"></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <ul class="res">
                                    <li><img alt="Dos Amigos" src="../img/pracs/maps/MarkerC.png">Dos Amigos
                                        <ul class="nobullet">
                                            <li>185 Moggill Road, Taringa QLD</li>
                                            <li>(07) 3870 8092</li>
                                            <li><form action="amigos.php"><button class="butt">More Info</button></form></li>                                        </ul>
                                    </li>
                                </ul>
                            </td>
                            <td>
                                <a href="../img/pracs/res/amigos1.jpg" data-lightbox="amigos" data-title="Dos Amigos">
                                <img alt="Dos Amigos" src="../img/pracs/res/amigos1.jpg" width="200"></a>
                                <a href="../img/pracs/res/amigos2.jpg" data-lightbox="amigos" data-title="Dos Amigos"></a>
                                <a href="../img/pracs/res/amigos3.jpg" data-lightbox="amigos" data-title="Dos Amigos"></a>
                                <a href="../img/pracs/res/amigos4.jpg" data-lightbox="amigos" data-title="Dos Amigos"></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <ul class="res">
                                    <li><img alt="Harajuku Gyoza" src="../img/pracs/maps/MarkerD.png">Harajuku Gyoza
                                        <ul class="nobullet">
                                            <li>69 Station Road, Indooroopilly QLD</li>
                                            <li>(07) 3378 4863</li>
                                            <li><form action="harajuku.php"><button class="butt">More Info</button></form></li>
                                        </ul>
                                    </li>
                                </ul>
                            </td>
                            <td>
                                <a href="../img/pracs/res/hara1.jpg" data-lightbox="hara" data-title="Harajuku Gyoza">
                                <img alt="Harajuku Gyoza" src="../img/pracs/res/hara1.jpg" width="200"></a>
                                <a href="../img/pracs/res/hara2.jpg" data-lightbox="hara" data-title="Harajuku Gyoza"></a>
                                <a href="../img/pracs/res/hara3.jpg" data-lightbox="hara" data-title="Harajuku Gyoza"></a>
                                <a href="../img/pracs/res/hara4.jpg" data-lightbox="hara" data-title="Harajuku Gyoza"></a>
                                <a href="../img/pracs/res/hara5.jpg" data-lightbox="hara" data-title="Harajuku Gyoza"></a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div> 
    </body>
</html>

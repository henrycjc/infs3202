<?php
session_start();
function login($username, $password, $timeout) {
    $users = array(array("infs", "3202"));
    foreach($users as $user) {
        if (!(strcasecmp($username, $user[0]))) {
            if (!(strcmp($password, $user[1]))) {
                    session_start();
                    $_SESSION['auth'] = 1;
                    $_SESSION['timeout'] = time() + intval($timeout);
                    $_SESSION['user'] = $username;
                    header("Location: index.php");
            }
        }
    }
    echo "<h2 style='color: red'>Incorrect username / password</h2>";
}
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
        <style>
            html, body {
                background: white;
            }
        </style>
        <script>
            $(document).ready({
                $("#clear-form-btn").click(function() {
                    $("#username").text("");
                    $("#password").text("");
                });
            });
        </script>
    </head>
    <body>
        <div id="container">
            <?php include('header.php');?>
            <div id="content">
                <div id="login-page">
                    <?php 
                        if (isset($_POST['login-form-btn'])) {
                            login($_POST['username'], $_POST['password'], $_POST['timeout']);
                        }
                    ?>
                    <?php if (isset($_SESSION['auth'])) { header("Location: index.php");} else { echo "<h2>Not a member? Join now!</h2>";} ?>
                    <form id="login-form" action="login.php" method="post">
                        <input id="username" name="username" type="text" placeholder="Email/Username"><br>
                        <input id="password" name="password" type="password" placeholder="Password">
                        <p><a style="color: red;" href="#">Forgot my password?</a></p>
                        <p>Stay logged in for: <select name="timeout">
                                                            <option value="10">10 Seconds</option>
                                                            <option value="86400">1 Day</option>
                                                            </select></p>
                        <button id="login-form-btn" name="login-form-btn" value="submit">Login</button> <button id="clear-form-btn">Clear</button>
                    </form>
                </div>
            </div>
        </div> 
    </body>
</html>

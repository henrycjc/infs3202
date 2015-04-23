<?php
include("log.php");
session_start();
logthis($_SESSION['user'], time(), "Logout by user");
session_unset();
session_destroy();

header("Location: login.php");

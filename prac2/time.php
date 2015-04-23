<?php
session_start();

if (isset($_SESSION['auth'])) {
	print intval($_SESSION['timeout']) - time();
} else {
	print "NOT_LOGGED_IN";
}

<?php

function logthis($user, $time, $reason) {

	/* UNIX SYSTEMS ONLY */
	$filename = "/var/www/htdocs/logs/log";

	$file = fopen($filename, "a+");
	if ($file == false) {
		die("FUCK");
	} else {
		$str = date("Y-m-d H:i", $time) . " " . strtoupper($user) . " " . $reason . PHP_EOL;
		fwrite($file, $str);
	}
}
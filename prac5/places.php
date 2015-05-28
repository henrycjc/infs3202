<?php 

$rawData = $_POST['places'];

$jsonData = json_decode($rawData, true);


foreach($jsonData as $res) {
	//$res['geometry']->location->"A"
	//$res->geometry->location->"F"
	$res['icon']
	$res['name']
	$res['opening_hours']['open_now']
	$res['place_id']
	$res['rating']
	echo "<tr>";
	    echo "<td>";
	    	echo "<ul class=\"res\">";
	    		echo "<li><img alt=\"".$res['name']."\" src=\"".$res['icon']."\">".$res['name'];
	                echo "<ul class=\"nobullet\">";
	                    echo "<li>Open Now: "if "</li>";
	                    echo "<li>(07) 3878 1566</li>";
	                    echo <li><form action="thai.html"><button class="butt">More Info</button></form></li>
	                echo "</ul>";
	            echo "</li>";
	        echo "</ul>";
	    echo "</td>";
	echo "</tr>";
}


var_dump($jsonData);
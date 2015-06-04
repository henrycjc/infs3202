<?php 
function getComments($place_id) {
	$host = "au-cdbr-azure-southeast-a.cloudapp.net";
    $user = "b3ffc7053961fb";
    $pass = "57815c3b";
    $port = 3306;
    $db = "henrychladil_sql";
    $mysqli = new mysqli($host, $user, $pass, $db, 3306);
    if ($mysqli->connect_errno) {
        echo "<h1>Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error . "</h1>";
        die();
    }
    $rawData = $mysqli->query("SELECT * FROM comments WHERE place_id LIKE '".$place_id."'");
    $objData = array();
    for($i = 0; $i < $rawData->num_rows; $i++) {
        $objData[] = $rawData->fetch_assoc();
    }
    $mysqli->close();
    return $objData;
}


$rawData = $_POST['places'];

$jsonData = json_decode($rawData, true);



echo "<table>";

$i = 0;
foreach($jsonData as $res) {
	if ($i > 4) {
		break;
	}
	if (!isset($res['opening_hours']['open_now'])) {
		$open = "Unknown";
	} else {
		if ($res['opening_hours']['open_now'] == "1") {
			$open = "Yes!";
		} else {
			$open = "No.";
		}
	}
	if (!isset($res['rating'])) {
		$rating = "Unknown";
	} else {
		$rating = $res['rating'];
	}
	echo "<tr>";
	    echo "<td>";
	    	echo "<ul class=\"res\">";
	    		echo "<li><img width=\"50px\" alt=\"".$res['name']."\" src=\"".$res['icon']."\">";
	                	echo "<li><strong>".$res['name']."</strong></li>";
	                    echo "<li>Open Now: ".$open."</li>";
	                    echo "<li>Rating: " . $rating. "</li>";
	                   // echo <li><form action="thai.html"><button class="butt">More Info</button></form></li>
	            echo "</li>";
	        echo "</ul>";
	    echo "</td>";
	    echo "<td>";
	    echo "<strong>Comments</strong><br>";
	    echo "<div id='comment".$res['place_id']."'>";
	    $comments = getComments($res['place_id']);
	    if (count($comments) < 1) {
	    	echo "No comments yet.";
	    } else {
	    	foreach ($comments as $comment) {
	    			echo "<i>".$comment['comment']."</i><br><hr>";
	    	}	
	    }
	    echo "</div>";
	    echo "Leave a comment: ";
	    echo "<input id='".$res['place_id']."' type=\"hidden\" value=\"".$res['place_id']."\">";
	    echo "<textarea id='commentText".$res['place_id']."' name='commentText'></textarea>";
	    echo "<br>";
	    echo "<button id='submitComment".$res['place_id']."' name=\"submitcomment\">Add Comment</button></td>"; 
	echo "</tr>";

	echo "<script>";
		echo "$('#submitComment".$res['place_id']."').click(function() {";
			echo "console.log($('#commentText".$res['place_id']."').val()); ";
			echo "console.log('".$res['place_id']."');";
			echo "$.ajax('comment.php', {
            	       data: { comment: $('#commentText".$res['place_id']."').val(),
                       place_id: '".$res['place_id']."'},
                       method: 'post'
                  }).done(function(data) {
                      $('#comment".$res['place_id']."').html(data);";
            echo "});";
        echo "});";
	echo "</script>";
	$i++;
}
echo "</table>";

//echo "<pre>";
//var_dump($jsonData);
//echo "</pre>";
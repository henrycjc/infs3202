<?php
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

function updateData($id, $name, $address, $phone, $images, $long, $lat, $desc) {
    $mysqli = new mysqli("localhost", "henry", "asdfasdf", "myres");
    if ($mysqli->connect_errno) {
        echo "<h1>Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error . "</h1>";
        die();
    }
    $upStr = "UPDATE `data`
                SET `name` = \"".$name."\",
                    `location` = \"".$address."\",
                    `contact` = \"".$phone."\",
                    `url` = \"".$images."\",
                    `latitude` = \"".$long."\",
                    `longitude` = \"".$lat."\",
                    `description` = \"".$desc."\"
                WHERE `id` LIKE ".$id.";";
    $response = $mysqli->query($upStr);
    if ($response != TRUE) {
        echo "<h1>MySQL Error: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error . "</h1>";
        die();
    }
}

function addRes($name, $address, $phone, $images, $long, $lat, $desc) {

    $mysqli = new mysqli("localhost", "henry", "asdfasdf", "myres");
    if ($mysqli->connect_errno) {
        echo "<h1>Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error . "</h1>";
        die();
    }
    $upStr = "INSERT INTO `data` (name, location, contact, url, latitude, longitude, description)
              VALUES ('".$name."',
                      '".$address."',
                      '".$phone."',
                      '".$images."',
                      '".$long."',
                      '".$lat."',
                      '".$desc."');";
    $response = $mysqli->query($upStr);
    if ($response != TRUE) {
        echo "<h1>MySQL Error: (" . $mysqli->errno . ") " . $mysqli->error . "</h1>";
        die();
    }
}

function delRes($id) {
    $mysqli = new mysqli("localhost", "henry", "asdfasdf", "myres");
    if ($mysqli->connect_errno) {
        echo "<h1>Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error . "</h1>";
        die();
    }
    $response = $mysqli->query("DELETE FROM data WHERE id = ".$id.";");
    if ($response != TRUE) {
        echo "<h1>MySQL Error: (" . $mysqli->errno . ") " . $mysqli->error . "</h1>";
        die();
    }

}


if (isset($_POST['updated'])) {
    updateData($_POST['updated'], 
            $_POST['name'],
            $_POST['address'], 
            $_POST['phone'], 
            $_POST['images'],  
            $_POST['latitude'], 
            $_POST['longitude'], 
            $_POST['desc']);
}

if (isset($_POST['added'])) {
    addRes($_POST['name'],
            $_POST['address'], 
            $_POST['phone'], 
            $_POST['images'],  
            $_POST['latitude'], 
            $_POST['longitude'], 
            $_POST['desc']);
}

if (isset($_POST['delitem'])) {
    delRes($_POST['delitem']);
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
        <link rel="stylesheet" href="css/jquery-ui.min.css">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
        <script src="js/jquery-2.1.3.min.js"></script>
        <script src="js/jquery-ui.min.js"></script>
        <script src="js/jquery.validate.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfCH7xjYSb_f6bzVgvuntHX-Fo7cITBgk"></script>
        
    </head>
    <body>
        <div id="container">
            <div id="header">
                <div id="brand">
                    <span class="brand-name">Restaurant Finder</span> 
                </div>
            </div>
            <div id="content">
                <div id="location">
                    <h2>Restaurants</h2>
                    <div class="restable">
                        <table border="1">
                        <?php
                            $data = fetchData();
                            $i = 0;
                            foreach($data as $restaurant) {
                                echo "<tr>";
                                    echo "<td>";
                                        echo $restaurant['name'];
                                    echo "</td>";
                                    echo "<td>";
                                        echo "<button id='edit".$i."' name='edit'".$i."'>Edit</button>";
                                    echo "</td>";
                                    echo "<td>";
                                        echo "<form id='delete".$i."' name='delete'".$i."' action='admin.php' method='post'><input type='hidden' name='delitem' value='".$restaurant['id']."'><button id='delete".$i."' name='delete".$i."'>Delete</button></form>";
                                    echo "</td>";
                                echo "</tr>";
                                $i++;
                            }
                        ?>
                        </table>
                            <button class="add-button" id="addresbtn" name="addresbtn">Add</button>
                    </div>
                </div>
                <div id="restaurants">
                    <h2>Control Panel</h2>
                    <div style="text-align: center;">
                        <form id="logoutform" name="logoutform" action="index.php" method="post">
                            <button id="logoutbtn" name="logoutbtn">Logout</button> 
                        </form>
                    </div>
                    <br>
                    <br>
                    <div style="text-align: center;">
                        <a href="index.php">Go back?</a>
                    </div>
                       <?php 
                         $data = fetchData();
                        $i = 0;
                        foreach($data as $restaurant) {
                            echo "<div title='".$restaurant['name']."' id='dialog".$i."'>";
                            echo "<form id='form".$i."' action='admin.php' method='post'>";
                                echo "<table style='data-table'>";
                                    echo "<input type='hidden' name='updated' id='updated' value='".$restaurant['id']."'>";
                                    echo "<tr><td>Name:</td><td><input type='text' id='name".$i."' name='name' value='".$restaurant['name']."'></td></tr>";
                                    echo "<tr><td>Address:</td><td><input type='text' id='address".$i."' name='address' value='".$restaurant['location']."'></td></tr>";
                                    echo "<tr><td>Phone:</td><td><input type='text' id='phone".$i."' name='phone' value='".$restaurant['contact']."'></td></tr>";
                                    echo "<tr><td>Images:</td><td><input type='text' id='images".$i."' name='images' value='".$restaurant['url']."'></td></tr>";
                                    echo "<tr><td></td><td style=\"font-size: 10px;\">Note, all images must be delimitered by a #.</td></tr>";
                                    echo "<tr><td>Longitude:</td><td><input type='text' id='long".$i."' name='longitude' value='".$restaurant['longitude']."'></td></tr>";
                                    echo "<tr><td>Latitude:</td><td><input type='text' id='lat".$i."' name='latitude' value='".$restaurant['latitude']."'></td></tr>";
                                    echo "<tr><td>Description</td></tr>";
                                    echo "<tr><td></td><td><textarea rows='10' cols='25' type='text' id='desc".$i."' name='desc'>".$restaurant['description']."</textarea></td></tr>";
                                    echo "<tr><td></td><td style='font-size: 10px;'>New lines are represented by #s.</td></tr>";
                                    echo "<tr><td><button id='form".$i."savebtn'>Save</button></td><td><button id='form".$i."clearbtn'>Clear</button></td>";
                                echo "</table>";
                            echo "</form>";
                            $i++;
                        }

                    ?>
                    <div title="Add New Restaurant" id="addresdialog">
                        <form id="addresform" action="admin.php" method="post">
                            <table style="text-align: right;">
                                <input type='hidden' name='added' id='added' value='1'>
                                <tr><td>Name:</td><td><input type="text" id="newname" name="name"></td></tr>
                                <tr><td>Address:</td><td><input type="text" id="newaddress" name="address"></td></tr>
                                <tr><td>Phone:</td><td><input type="text" id="newphone" name="phone"></td></tr>
                                <tr><td>Images:</td><td><input type="text" id="newimages" name="images"></td></tr>
                                <tr><td></td><td style="font-size: 10px;">Note, all images must be delimitered by a #.</td></tr>
                                <tr><td>Longitude:</td><td><input type='text' id='newlong' name='longitude'></td></tr>
                                <tr><td>Latitude:</td><td><input type='text' id='newlat' name='latitude'></td></tr>
                                <tr><td>Description</td></tr>
                                <tr><td></td><td><textarea rows="10" cols="25" type="text" id="newdesc" name="desc"></textarea></td></tr>
                                <tr><td></td><td style="font-size: 10px;">New lines are represented by #s.</td></tr>
                                <tr><td><button id="addressavebtn">Save</button></td><td><button id="addresclearbtn">Clear</button></td>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div> 
    </body>
    <script> 
        var options = { 
            autoOpen: false,
            height: 700,
            width: 500,
            show: {
                effect: "blind",
                duration: 1000
            },
            hide: {
                effect: "explode",
                duration: 1000
            }
        };
        <?php 

        echo "$(document).ready(function() {";
            $data = fetchData();
            $i = 0;
            foreach($data as $restaurant) {
                echo "$('#delete".$i."').click(function() {
                    if (confirm('Are you sure?')) {
                        return true;
                    } else {
                        return false;
                    }
                });";
                echo "$('#dialog".$i."').dialog(options);";
                echo "$('#edit".$i."').click(function() {
                          $('#dialog".$i."').dialog('open');
                        });
                $('#form".$i."').validate({
                    rules: {
                        name: {
                            required: true, 
                            minlength: 4
                        },
                        address: {
                            required: true, 
                            minlength: 4
                        },
                        phone: {
                            required: true,
                            minlength: 4
                        },
                        images: {
                            required: true, 
                            minlength: 4
                        },
                        latitude: {
                            required: true, 
                            minlength: 4
                        },
                        longitude: {
                            required: true, 
                            minlength: 4
                        },
                        desc: {
                            required: true,
                            minlength: 4
                        }
                    }
                    });";
                                
                $i++;
            }
        echo "});";?>

            $(document).ready(function() {
                $('#addresdialog').dialog(options);
                $("#addresbtn").click(function() {
                    $('#addresdialog').dialog('open');
                });
                $("#addresform").validate({
                    rules: {
                        name: {
                            required: true, 
                            minlength: 4
                        },
                        address: {
                            required: true, 
                            minlength: 4
                        },
                        phone: {
                            required: true,
                            minlength: 4
                        },
                        images: {
                            required: true, 
                            minlength: 4
                        },
                        latitude: {
                            required: true, 
                            minlength: 4
                        },
                        longitude: {
                            required: true, 
                            minlength: 4
                        },
                        desc: {
                            required: true,
                            minlength: 4
                        }
                    }
                    });
            });
        </script>
</html>
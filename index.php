<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>INFS3202 Praticals</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-responsive.min.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span2">
                  <ul class="nav nav-list">
                      <li class="nav-header">Pracs</li>
                      <li class="active"><a href="index.php">Home</a></li>
                      <?php 

                          $dir = array_diff(scandir("."), array("..", ".", ".git", "css", "js", "404.html", "img", ".DS_Store", "index.php", "web.config"));
                          foreach($dir as $item) {
                              echo "<li><a href='$item'>$item</a></li>";
                          }
                          ?>
                      </ul>
                </div>
              <div class="span10">
                <div class="row">
                  <div class="col-md-4">
                    <h1>Henry Chladil (4293467)</h1>
                      <br>
                      <ul>
                          <li>SSH Hostname: <a href="ssh://s4293467@infs3202-cnwfi.zones.eait.uq.edu.au">infs3202-cnwfi.zones.eait.uq.edu.au</a></li>
                          <li>Zones Hostname: <a href="infs3202-cnwfi.uqcloud.net">infs3202-cnwfi.uqcloud.net</a></li>
                      </ul>
                  </div> <!--
                  <div class="col-md-4">
                    <h2>Heading</h2>
                    <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                    <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
                 </div>
                  <div class="col-md-4">
                    <h2>Heading</h2>
                    <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                    <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
                  </div>
                        </div>
                      </div>-->
              </div> 

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>


<pre>
<?php

try {
	$conn = new PDO ("sqlsrv:server = tcp:infs3202henrychladil.database.windows.net,1433; Database = infs3202henrychladil", "henrychladil", "Gbhn4152bn%");
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	print("Error connecting to SQL Server.");
	die(print_r($e));
	}

$connectionInfo = array("UID" => "henrychladil@infs3202henrychladil", 
						"pwd" => "Gbhn4152bn%", 
						"Database" => "infs3202henrychladil", 
						"LoginTimeout" => 30, 
						"Encrypt" => 1, 
						"TrustServerCertificate" => 0);
$serverName = "tcp:infs3202henrychladil.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);



?>
</pre>
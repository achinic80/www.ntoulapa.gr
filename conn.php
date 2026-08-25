<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_NAME', 'ntoulap');
define('DB_PASSWORD', '');
$conn = new mysqli (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if (!$conn) {    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL."<br>";
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL."<br>";
    exit;
}


?>
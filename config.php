
<?php

session_start();

$server = "localhost";
$user = "root";
$pass = "";
$dbname = "bgt";

// Create connection
$conn = mysqli_connect($server, $user, $pass, $dbname);

define('ROOT_PATH', realpath(dirname(__FILE__)));
define('BASE_URL', 'http://newbiy.com');

// Check connection
// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
// }
// echo "Connected successfully";

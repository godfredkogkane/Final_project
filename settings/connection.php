<?php

// $servername = "localhost";
// $username = "root"; 
// $password = ""; 
// $database = "Food_ordering_system";

// // Create connection
// $conn = new mysqli($servername, $username, $password, $database);

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// Check if the constants are not defined before defining them
if (!defined('DB_HOST')) {
    define('DB_HOST', 'us-cluster-east-01.k8s.cleardb.net');
}

if (!defined('DB_USER')) {
    define('DB_USER', 'b2d9c5f04fa101');
}

if (!defined('DB_PASSWORD')) {
    define('DB_PASSWORD', '1616ec2a');
}

if (!defined('DB_NAME')) {
    define('DB_NAME', 'heroku_aada69987225e40');
}

// Establish a database connection
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>


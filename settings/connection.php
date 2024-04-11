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

define('DB_HOST', 'us-cluster-east-01.k8s.cleardb.net');
define('DB_USER', 'b2d9c5f04fa101');
define('DB_PASSWORD', '1616ec2a'); 
define('DB_NAME', 'heroku_aada69987225e40');


$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

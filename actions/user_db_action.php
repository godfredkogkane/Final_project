<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // If the user is not logged in, redirect to the login page
    header("Location: ../view/login.php");
    exit(); // Stop further execution
}

// Check if the necessary parameters are set
if (!isset($_GET['item_name']) || !isset($_GET['price'])) {
    // Redirect back to the home page if parameters are missing
    header("Location: ../view/home.php");
    exit(); // Stop further execution
}

// Include database connection file
include "../settings/connection.php";

// Retrieve item name and price from URL parameters
$item_name = $_GET['item_name'];
$price = $_GET['price'];

// Get the current date
$current_date = date('Y-m-d H:i:s');

// Prepare and execute SQL statement to insert the item into user's order history
$stmt = $conn->prepare("INSERT INTO OrderHistory (UserID, ItemName, Price, OrderDate) VALUES (?, ?, ?, ?)");
$stmt->bind_param("isds", $_SESSION['user_id'], $item_name, $price, $current_date);
$stmt->execute();

// Close statement
$stmt->close();

// Close connection
$conn->close();

// Redirect the user back to the user_db.php page
header("Location: ../view/user_db.php");
exit(); // Stop further execution
?>

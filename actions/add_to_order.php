<?php
// Start the session
session_start();

// Include database connection file
include "../settings/connection.php";

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // If the user is not logged in, redirect to the login page
    header("Location: ../view/login.php");
    exit(); // Stop further execution
}

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $itemName = $_POST["item_name"];
    $price = $_POST["price"];
    // You can generate the current date and time using PHP
    $orderDate = date("Y-m-d H:i:s"); // Example format: 2022-04-06 14:30:00

    // Prepare and execute SQL statement to insert the order into the OrderHistory table
    $stmt = $conn->prepare("INSERT INTO OrderHistory (UserID, ItemName, Price, OrderDate) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $_SESSION['user_id'], $itemName, $price, $orderDate);
    $stmt->execute();

    // Check if insertion was successful
    if ($stmt->affected_rows > 0) {
        // Redirect user to the dashboard
        header("Location: ../view/user_db.php");
        exit(); // Stop further execution
    } else {
        // Failed to add order
        echo "Failed to place order.";
    }

    // Close statement
    $stmt->close();
}

// Close database connection
mysqli_close($conn);
?>

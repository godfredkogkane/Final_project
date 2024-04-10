<?php
// Start the session
session_start();

// Include database connection file
include "../settings/connection.php";

// Check if item name is provided
if (isset($_GET['item_name'])) {
    // Fetch item name
    $item_name = $_GET['item_name'];

    // Prepare and execute SQL statement to delete the order
    $stmt = $conn->prepare("DELETE FROM OrderHistory WHERE UserID = ? AND ItemName = ?");
    $stmt->bind_param("is", $_SESSION['user_id'], $item_name);
    $stmt->execute();

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();

// Redirect to the user dashboard
header("Location: ../view/user_db.php");
exit(); // Stop further execution
?>

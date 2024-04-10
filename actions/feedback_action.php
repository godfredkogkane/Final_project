<?php
session_start();
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection file
    include "../settings/connection.php"; 

    // Prepare and bind parameters
    $stmt = $conn->prepare("INSERT INTO Feedback (UserID, Message, _Date) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $userId, $message, $date);

    // Set parameters and execute
    $userId = $_SESSION['user_id']; // Assuming 'user_id' is set in the session upon login
    $message = $_POST['message'];
    $date = $_POST['date'];
    $stmt->execute();

    // Close statement
    $stmt->close();

    // Close connection
    $conn->close();

    // Set success message in session
    $_SESSION['success_message'] = "Feedback successfully submitted. Thank you!";

    // Redirect back to the home page
    header("Location: ../view/home.php");
    exit();
}
?>

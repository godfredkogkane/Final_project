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
    $userId = $_SESSION['user_id'];
    $message = $_POST['message'];
    $date = $_POST['date'];
    $stmt->execute();

    // Close statement
    $stmt->close();

    // Close connection
    $conn->close();

   // Redirect to the feedback display page with a success parameter
    header("Location: ../view/feedback_display.php?success=true");
    exit();
}
?>

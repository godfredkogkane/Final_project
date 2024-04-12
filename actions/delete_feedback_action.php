<?php
// Start the session
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect if not logged in
    header("Location: ../view/login.php");
    exit();
}

// Include database connection file
include "../settings/connection.php";

// Initialize message variable
$message = "";

// Check if feedback_id is provided via POST
if (isset($_POST['feedback_id'])) {
    // Sanitize the input
    $feedback_id = $_POST['feedback_id'];

    // Prepare and execute SQL statement to delete feedback
    $stmt = $conn->prepare("DELETE FROM Feedback WHERE FeedbackID = ? AND UserID = ?");
    $stmt->bind_param("ii", $feedback_id, $_SESSION['user_id']);
    $stmt->execute();

    // Check if a row was affected (i.e., if deletion was successful)
    if ($stmt->affected_rows > 0) {
        $message = "Feedback deleted successfully.";
    } else {
        $message = "Failed to delete feedback.";
    }

    // Close statement
    $stmt->close();
}

// Set message in session variable
$_SESSION['delete_feedback_message'] = $message;

// Close connection
$conn->close();

// Redirect back to feedback display page
header("Location: ../view/feedback_display.php");
exit();
?>

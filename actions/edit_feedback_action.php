<?php
// Start the session
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect if not logged in
    header("Location: ../view/login.php");
    exit();
}

// Check if feedback_id is provided via POST
if (isset($_POST['feedback_id'])) {
    // Sanitize the input
    $feedback_id = $_POST['feedback_id'];

    // Redirect to edit page with feedback_id parameter
    header("Location: ../actions/edit_feedback.php?feedback_id=" . $feedback_id);
    exit();
} else {
    // Redirect back to feedback display page if feedback_id is not provided
    header("Location: ../view/feedback_display.php");
    exit();
}
?>

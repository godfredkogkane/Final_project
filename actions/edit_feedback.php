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

// Initialize variables
$feedback_id = "";
$message = "";

// Check if feedback_id is provided via GET
if (isset($_GET['feedback_id'])) {
    // Sanitize the input
    $feedback_id = $_GET['feedback_id'];

    // Retrieve feedback details from database
    $sql = "SELECT Message FROM Feedback WHERE FeedbackID = ? AND UserID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $feedback_id, $_SESSION['user_id']);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if feedback exists for the user
    if ($result->num_rows > 0) {
        // Fetch feedback message
        $row = $result->fetch_assoc();
        $message = $row['Message'];
    } else {
        // Feedback not found, redirect back to feedback display page
        header("Location: ../view/feedback_display.php");
        exit();
    }

    // Close statement
    $stmt->close();
} else {
    // Feedback ID not provided, redirect back to feedback display page
    header("Location: ../view/feedback_display.php");
    exit();
}

// Check if form is submitted for editing
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize the input
    $edited_message = $_POST['edited_message'];

    // Prepare and execute SQL statement to update feedback
    $stmt = $conn->prepare("UPDATE Feedback SET Message = ? WHERE FeedbackID = ?");
    $stmt->bind_param("si", $edited_message, $feedback_id);
    $stmt->execute();

    // Check if update was successful
    if ($stmt->affected_rows > 0) {
        // Feedback updated successfully, set success message
        $_SESSION['edit_feedback_message'] = "Feedback updated successfully.";
    } else {
        // Failed to update feedback, set error message
        $_SESSION['edit_feedback_message'] = "Failed to update feedback.";
    }

    // Close statement
    $stmt->close();

    // Close connection
    $conn->close();

    // Redirect back to feedback display page
    header("Location: ../view/feedback_display.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Feedback</title>
    <link rel="stylesheet" href="../css/edit_feedback.css">
</head>
<body>
    <header>
        <h1>Edit Feedback</h1>
    </header>

    <div class="container">
    <form action="../actions/edit_feedback_action.php" method="post">
            <label for="edited_message">Edit Message:</label><br>
            <textarea id="edited_message" name="edited_message" rows="4" cols="50"><?php echo $message; ?></textarea><br>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>

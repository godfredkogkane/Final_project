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
$edit_feedback_message = ""; // Variable to store feedback edit status message

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
        // Feedback not found, set error message
        $edit_feedback_message = "Feedback not found.";
    }

    // Close statement
    $stmt->close();
} else {
    // Feedback ID not provided, set error message
    $edit_feedback_message = "Feedback ID not provided.";
}

// Check if form is submitted for editing
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edited_message'])) {
    // Sanitize the input
    $edited_message = $_POST['edited_message'];

    // Prepare and execute SQL statement to update feedback
    $stmt = $conn->prepare("UPDATE Feedback SET Message = ? WHERE FeedbackID = ?");
    $stmt->bind_param("si", $edited_message, $feedback_id);
    $stmt->execute();

    // Check if update was successful
    if ($stmt->affected_rows > 0) {
        // Feedback updated successfully, set success message
        $edit_feedback_message = "Feedback updated successfully.";
    } else {
        // Failed to update feedback, set error message
        $edit_feedback_message = "Failed to update feedback.";
    }

    // Close statement
    $stmt->close();

    // Redirect back to feedback display page
    header("Location: ../view/feedback_display.php");
    exit();
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Feedback</title>
    <style>
        body {
            background-color: #64ce3a;
            color: white;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
        }
        button {
            background-color: royalblue;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color:blue;
        }
    </style>
</head>
<body>
    <header>
        <h1>Edit Feedback</h1>
    </header>

    <div class="container">
        <?php if (!empty($edit_feedback_message)) : ?>
            <p><?php echo $edit_feedback_message; ?></p>
        <?php endif; ?>

        <?php if (empty($edit_feedback_message)) : ?>
            <form action="../view/edit_feedback.php" method="post">
                <input type="hidden" name="feedback_id" value="<?php echo $feedback_id; ?>">
                <label for="edited_message">Edit Message:</label><br>
                <textarea id="edited_message" name="edited_message" rows="4" cols="50"><?php echo $message; ?></textarea><br>
                <button type="submit">Update</button>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>

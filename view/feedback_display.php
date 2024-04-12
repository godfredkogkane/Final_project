<?php
// Start the session
session_start();

// Include database connection file
include "../settings/connection.php";

// Check if the success parameter is present in the URL
$success = isset($_GET['success']) ? $_GET['success'] : false;

// Display success message if the feedback was successfully submitted
if ($success) {
    echo "<p style='color: red;'>Thank you for your feedback!</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Feedback</title>
    <link rel="stylesheet" href="../css/feedback_display.css"> 
</head>
<body>
    <header>
        <h1>All Feedback</h1>
    </header>

    <section>
        <?php
        // Initialize $result variable
        $result = null;

        // Retrieve feedback entries from the database along with the user's name and ID
        $sql = "SELECT Feedback.FeedbackID, Feedback.Message, Feedback._Date, Users.Firstname, Users.Lastname, Users.UserID FROM Feedback JOIN Users ON Feedback.UserID = Users.UserID ORDER BY Feedback._Date DESC";
        $result = $conn->query($sql);

        // Check for errors in SQL query execution
        if ($result === false) {
            echo "Error: " . mysqli_error($conn);
        } else {
            // Continue with fetching and displaying results
            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<div class='feedback'>";
                    echo "<p><strong>User: </strong>" . $row["Firstname"] . " " . $row["Lastname"] . "</p>";
                    echo "<p><strong>Message: </strong>" . $row["Message"] . "</p>";
                    echo "<p><strong>Date: </strong>" . $row["_Date"] . "</p>";
                    // Check if 'UserID' key exists in the $row array
                    if (isset($row['UserID'])) {
                        // Add edit and delete buttons only for logged-in users
                        if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $row['UserID']) {
                            echo "<form action='../view/edit_feedback_action.php' method='post'>";
                            echo "<input type='hidden' name='feedback_id' value='" . $row['FeedbackID'] . "'>"; // Updated here
                            echo "<button type='submit'>Edit</button>";
                            echo "</form>";
                            echo "<form action='../actions/delete_feedback_action.php' method='post'>";
                            echo "<input type='hidden' name='feedback_id' value='" . $row['FeedbackID'] . "'>"; // Updated here
                            echo "<button type='submit'>Delete</button>";
                            echo "</form>";
                        }
                    }
                    echo "</div>";
                }
            } else {
                echo "No feedback yet.";
            }
        }
        ?>
    </section>
    
    <button onclick="window.location.href='../view/home.php';">Back to Home</button>
</body>
</html>

<?php
if(isset($conn)) {
    $conn->close();
}
?>

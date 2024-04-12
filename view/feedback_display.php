<?php include "feedback_display_actions.php";
// Include database connection file
include "../settings/connection.php";

// Retrieve feedback entries from the database along with the user's name
$sql = "SELECT Feedback.Message, Feedback._Date, Users.Firstname, Users.Lastname FROM Feedback JOIN Users ON Feedback.UserID = Users.UserID ORDER BY Feedback._Date DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Feedback</title>
    <!-- <link rel="stylesheet" href="../css/feedback.css">  -->
</head>
<body>
    <header>
        <h1>All Feedback</h1>
    </header>

    <section>
        <h2>Feedback Received:</h2>
        <?php
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<div class='feedback'>";
                echo "<p><strong>User: </strong>" . $row["Firstname"] . " " . $row["Lastname"] . "</p>";
                echo "<p><strong>Message: </strong>" . $row["Message"] . "</p>";
                echo "<p><strong>Date: </strong>" . $row["_Date"] . "</p>";
                echo "</div>";
            }
        } else {
            echo "No feedback yet.";
        }
        ?>
    </section>
    
    <button onclick="window.location.href='../view/home.php';">Back to Home</button>
</body>
</html>

<?php
$conn->close();
?>

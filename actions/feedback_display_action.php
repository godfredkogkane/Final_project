<!-- <?php
// Include database connection file
include "../settings/connection.php";

// Retrieve feedback entries from the database along with the user's name
$sql = "SELECT Feedback.Message, Feedback._Date, Users.Firstname, Users.Lastname FROM Feedback JOIN Users ON Feedback.UserID = Users.UserID ORDER BY Feedback._Date DESC";
$result = $conn->query($sql);
?> -->

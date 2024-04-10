<?php
// Start the session
session_start();

// Include database connection file
include "../settings/connection.php";

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // If the user is not logged in, redirect to the login page
    header("Location: ../view/login.php");
    exit(); // Stop further execution
}

// Check if action parameter is set
if (isset($_GET['action']) && isset($_GET['item_name'])) {
    // Fetch action parameter
    $action = $_GET['action'];
    $item_name = $_GET['item_name'];

    // Perform action based on the provided action parameter
    if ($action === 'delete') {
        // Prepare and execute SQL statement to delete the order
        $stmt = $conn->prepare("DELETE FROM OrderHistory WHERE UserID = ? AND ItemName = ?");
        $stmt->bind_param("is", $_SESSION['user_id'], $item_name);
        $stmt->execute();

        // Close statement
        $stmt->close();
    }

    // Redirect back to the user dashboard page after handling the action
    header("Location: ../view/user_db.php");
    exit(); // Stop further execution
}
?>


<script>
function deleteOrder(itemName) {
    // Send AJAX request to delete_order.php
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            // Handle response
            if (xhr.status == 200) {
                // Reload the page
                location.reload();
            } else {
                // Error handling
                alert("Failed to delete order");
            }
        }
    };
    xhr.open("GET", "../actions/delete_order_action.php?item_name=" + encodeURIComponent(itemName), true);
    xhr.send();
}
</script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="../css/user_db.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />
    
</head>
<body>
    <div class="sidebar">
        <h2>My Dashboard</h2>
        <ul>
            <li><a href="../view/home.php"><i class="fas fa-home"></i> Home</a></li>
            <li><a href="../view/menu.php"><i class="fas fa-utensils"></i> Menu</a></li>
            <!-- <li><a href="orders.html"><i class="fas fa-clipboard-list"></i> Orders</a></li> -->
        </ul>
        <div class="logout">
            <a href="../view/logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>

        </div>
        <div class="feedback">
            <a href="../view/feedback.php"><i class="fas fa-sign-out-alt"></i> Feedback</a>
        </div>
    </div>

    <div class="content">
        <h2>Order History</h2>
        <table>
            <tr>
            <th>Item Name</th>
                <th>Price (GHS)</th>
                <th>Order Date</th>
                <th>Action</th>
            </tr>
            
            
            <?php

// Include database connection file
include "../settings/connection.php";

// Check if the user is logged in
if(isset($_SESSION['user_id'])) {

// Fetch order history for the current user
$userID = $_SESSION['user_id'];
$sql = "SELECT ItemName, Price, OrderDate FROM OrderHistory WHERE UserID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userID);
$stmt->execute();
$result = $stmt->get_result();

// Display order history
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['ItemName'] . "</td>";
    echo "<td>" . $row['Price'] . "</td>";
    echo "<td>" . $row['OrderDate'] . "</td>";
    echo "<td><a href='../actions/delete_order_action.php?action=delete&item_name=" . urlencode($row['ItemName']) . "'><i class='fas fa-trash-alt'></i></a></td>";
    echo "</tr>";
}

// Close statement and connection
$stmt->close();
}
$conn->close();

?>
        </table>
    </div>
</body>
</html>

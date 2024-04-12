<?php
// Include database connection file
include "../settings/connection.php"; // Replace "db_connect.php" with the actual file name for your database connection

// Function to register a new user
function registerUser($conn) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $password = $_POST["password"];

        // Hash the password for security
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // SQL query to insert user data into the database
        $sql = "INSERT INTO Users (Firstname, Lastname, Email, Phone, Pass_word) VALUES (?, ?, ?, ?, ?)";

        // Prepare the SQL statement
        $stmt = $conn->prepare($sql);

        // Bind parameters and execute the statement
        $stmt->bind_param("sssss", $fname, $lname, $email, $phone, $hashedPassword);
        $stmt->execute();

        // Check if the query was successful
        if ($stmt->affected_rows > 0) {
            // Registration successful
            // Redirect to the login page
            header("Location: ../view/login.php");
            exit(); // Stop further execution
        } else {
            // Registration failed
            echo "Error: Unable to register user.";
        }

        // Close statement and database connection
        $stmt->close();
        $conn->close();
    }
}

// Call the registerUser function
registerUser($conn);
?>

<?php
session_start(); // Start session to store user data

// Include database connection file
include_once "../settings/connection.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST["email"];
    $password = $_POST["password"];

    // SQL query to retrieve user data based on email
    $sql = "SELECT * FROM Users WHERE Email = ?";
    
    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);
    
    // Bind parameters and execute the statement
    $stmt->bind_param("s", $email);
    $stmt->execute();
    
    // Get the result
    $result = $stmt->get_result();

    // Check if the user exists
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // Verify the password
        if (password_verify($password, $row['Pass_word'])) {
            // Password is correct, set session variables
            $_SESSION['user_id'] = $row['UserID'];
            $_SESSION['email'] = $row['Email'];

            // Redirect to home page or any other page after successful login
            header("Location: ../view/home.php");
            exit();
        } else {
            // Incorrect password, set error message in session
            $_SESSION['error_msg'] = "Invalid email or password.";
            header("Location: ../view/login.php");
            exit();
        }
    } else {
        // User does not exist, set error message in session
        $_SESSION['error_msg'] = "User not registered.";
        header("Location: ../view/login.php");
        exit();
    }
    // Close statement and database connection
    $stmt->close();
    
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="../css/signUp.css">
</head>
<body>
    <div class="container">
        <div id="signup-form">
            <h2>Sign Up for BB TastyCorner</h2>
            <form id="signup-form" action="../actions/sign_up_action.php" method="POST">
                <input type="text" id="fname" name="fname" placeholder="First Name" pattern="[A-Za-z]+" required>
                <input type="text" id="lname" name="lname" placeholder="Last Name" pattern="[A-Za-z]+" required>
                <input type="email" id="email" name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"  required>
                <input type="tel" id="phone" name="phone" placeholder="Phone Number" pattern="[0-9]{10}" title="phone number must be 10 digits long"required>
                <input type="password" id="password" name="password" placeholder="Password" pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{6,}$" title="Password must contain at least one letter, one number, and one special character, and must be at least 6 characters long" required>
                <button type="submit" id="signup-btn">Sign Up</button>
            </form>
            
            <p>Already have an account? <a href="../view/login.php">Login</a></p>
        </div>
    </div>

    <!-- <script src="../js/signUp.js"></script> -->
</body>
</html>

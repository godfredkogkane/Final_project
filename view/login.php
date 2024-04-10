<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <div class="container">
        <div id="login-form">
            <h2 style="text-align: center;">Login</h2>
            <form id="login-form" action="../actions/login_action.php" method="POST">
                <input type="email" id="email" name="email" placeholder="Email" required>
                <input type="password" id="password" name="password" placeholder="Password" required>
                <button type="submit" id="login-btn">Login</button>
            </form>
            <p>Don't have an account? <a href="../view/signUp.php">Sign Up</a></p>
        </div>
    </div>

    <script src="login.js"></script>
</body>
</html>

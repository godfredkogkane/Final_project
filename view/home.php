<?php
// Start session (if not already started)
session_start();

// Check if success message is set
if (isset($_SESSION['success_message'])) {
    echo '<p style="color: red; text-align: center;">' . $_SESSION['success_message'] . '</p>';
    // Unset the session variable to prevent it from being displayed again
    unset($_SESSION['success_message']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="../css/home.css">
    
</head>
<body>
    <nav>
        <ul>
            <li><a href="../view/home.php">Home</a></li>
            <li><a href="../view/menu.php">Menu</a></li>
            <li class="dropdown">
                <a href="#" class="dropbtn">Food Categories</a>
                <div class="dropdown-content">
                    <a href="../view/local_dishes.php">Local dishes</a>
                    <a href="../view/snacks.php">Snacks</a>
                    <a href="../view/continental_dishes.php">Continental</a>
                </div>
                <li><a href="user_db.php">Dashboard</a></li>
                <!-- <li><a href="order.html">Order</a></li> -->
            </li>
            <li class="dropdown">
                <a href="#" class="dropbtn"> My account</a>
                <div class="dropdown-content">
                    <a href="../view/login.php">Login</a>
                    <a href="../view/signUp.php">Sign Up</a>
                    <a href="../view/logout.php">Logout</a>
                </div>
            </li>
            <li><a href="../view/feedback.php">Feedback</a></li>
        </ul>
    </nav>

    <header>
        <h1 style="color: #64ce3a;">Hi there! Welcome to BB TastyCorner</h1>
    </header>

    <section id="about">
        <h1 style="color: #64ce3a;">About Us</h1>
        <div class="food-images">
            <img src="../frontend_images/jollof.jpeg">
            <img src="../frontend_images/breakfast.jpeg">
            <img src="../frontend_images/fufu.jpeg">
            <img src="../continentalDishes_images/burger.jpeg">
            <img src="../frontend_images/milky.jpeg">
            <img src="../frontend_images/tea.jpeg">
        </div>
    </section>
    

    <section id="services">
        <h2 style="color: #64ce3a;">Our Services</h2>
        <ul>
            Fast and Reliable Service
            <br>
            <br>
            Quality is our top priority. We source the freshest ingredients to create delicious and nutritious meals for our customers.
            <br>
            <br>
            Order your favorite dishes from your comfort zone through our online ordering platform. Browse our extensive menu to place your order with just a few clicks.
        </ul>
    </section>

    <section id="contact">
        <h2 style="color: #64ce3a;">Contact Us</h2>
        <p style="text-align: center;">Email: BB TastyCorner@gmail.com</p>
        <p style="text-align: center;">Phone: +233-595429-679</p>
    </section>

    <footer>
        <p>&copy; 2024 BB TastyCorner. All rights reserved.</p>
    </footer>
</body>

<!-- <script>
    setTimeout(function() {
        document.getElementById('success-message').style.display = 'none';
    }, 5000); // Hide after 5 seconds (adjust as needed)
</script> -->

</html>

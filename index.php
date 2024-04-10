<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - BB TastyCorner</title>
    <!-- <link rel="stylesheet" href="welcome.css"> -->
    <style>        
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #fce4c3;
        color: #333;
    }
    
    header {
        background-color: #64ce3a;
        color: #fff;
        padding: 30px;
        text-align: center;
    }

    nav {
        text-align: center; 
    }

    nav ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        display: flex; 
        justify-content: left; 
    }

    nav ul li {
        margin-right: 20px;
    }

    nav ul li:last-child {
        margin-right: 0; 
    }

    nav ul li a {
        color: #fff;
        font-size: large;
        text-decoration: none;
        font-weight: bold;
        transition: color 0.3s ease;
    }

    nav ul li a:hover {
        color: white;
    }

    
    .main {
        padding: 20px;
        text-align: center;
    }
    
    .hero {
        text-align: center;
        padding: 50px 0;
        
    }
    
    .hero h1 {
        font-size: 2.5rem;
        margin-top: -20px;
    }
    
    .hero p {
        font-size: 1.2rem;
    }
    
    .btn {
        display: inline-block;
        padding: 10px 20px;
        background-color: green;
        
        color: #fff;
        text-decoration: none;
        border-radius: 4px;
        transition: background-color 0.3s ease;
    }
    
    .btn:hover {
        background-color: #1fad1f;
    }
    
    .features {
        text-align: center;
        padding: 50px 0;
    }
    
    .features h2 {
        font-size: 2rem;
        margin-top: -70px;
    }
    
    .feature {
        margin-top: 20px;
    }
    
    
    .feature img {
        max-width: 250px;
    }
    </style>
    
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="../view/signUp.php">Register</a></li>
                <li><a href="../view/login.php">Login</a></li>
                <!-- <li><a href="about.html">About Us</a></li>
                <li><a href="contact.html">Contact</a></li> -->
            </ul>
        </nav>
    </header>

    <main>
        <section class="hero">
            <h1 style="color: #64ce3a;">Welcome to BB TastyCorner</h1>
            <p>Order your favorite meals from the BigBen cafeteria with ease.</p>
            <a href="../view/home.php" class="btn">Go to Home</a>
        </section>

        <section class="features">
            <h2 style="color: #64ce3a;">Why Choose us?</h2>
            <div class="feature">
                <p>Convenient Ordering Process</p>
                <img src="../frontend_images/ordering.jpeg">
                
                
            </div>
            <div class="feature">
                <p>Extensive Menu Selection</p>
                <img src="../frontend_images/food.jpeg">
            </div>
        </section>

        <!-- <section class="about">
            <h2>About Us</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam eget elit a justo vestibulum varius.</p>
        </section> -->
    </main>

    <!-- <footer>
        <p>&copy; 2024 BB TastyCorner. All rights reserved.</p>
    </footer> -->

    <!-- <script src="script.js"></script> -->
</body>
</html>


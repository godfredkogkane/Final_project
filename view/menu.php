<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Page</title>
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />
</head>
<body>
    <nav>
        <ul> <li><a href="../view/menu.php">Menu</a></li>
            <li><a href="../view/home.php">Home</a></li>
            <li><a href="../view/user_db.php">Dashboard</a></li>
            <!-- <li><a href="order.html">Order</a></li> -->
            <li><a href="../view/snacks.php">Snacks</a></li>
            <li><a href="../view/local_dishes.php">Local dishes</a></li>
            <li><a href="../view/continental_dishes.php">Continental</a></li>
            <!-- <li class="search-bar">
                <input type="text" placeholder="Search menu">
                <button><i class="fas fa-search"></i></button>
            </li> -->
        </ul>
    </nav>

    <header>
        <h1>Explore Our Menu</h1>
    </header>

    <section id="food-categories">
        <div class="category">
        <a href="../view/snacks.php">
            <img src="../frontend_images/cookies.jpeg" alt="Snacks">
        </a>
            <h2>Snacks</h2>

        </div>
        <div class="category">
            <a href="../view/local_dishes.php">
            <img src="../frontend_images/fufu.jpeg" alt="Local dishes">            
        </a>
            <h2>Local Dishes</h2>
        </div>
        <div class="category">
            <a href="../view/continental_dishes.php">
                <img src="../frontend_images/milky.jpeg" alt="Continental Dishes">
            </a>
            <h2>Continental Dishes</h2>
        </div>
    </section>
</body>
</html>

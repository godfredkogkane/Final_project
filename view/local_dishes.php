<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Local Dishes Page</title>
    <link rel="stylesheet" href="../css/local_dishes.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />

</head>
<body>
    <nav>
        <ul>
            <li><a href="../view/home.php">Home</a></li>
            <li><a href="../view/snacks.php">Snacks</a></li>
            <li><a href="../view/local_dishes.php">Local dishes</a></li>
            <li><a href="../view/continental_dishes.php">Continental</a></li>
            <form action="../actions/search_local_action.php" method="GET">
                <input type="text" name="search_term" placeholder="Search dishes">
                <button><i class="fas fa-search"></i></button>
            </form>
        </ul>
    </nav>
    <h1>Our Local Dishes</h1>

    <div class="dish">
        <img src="../localDishes_images/waakye.jpeg" alt="waakye">
        <h2>Waakye</h2>
        <p>Price: GHS 25.00</p>
        <a href="../actions/user_db_action.php?item_name=Waakye&price=25.00"><button>Order</button></a>
    </div>

    <div class="dish">
        <img src="../localDishes_images/banku.jpg" alt="banku">
        <h2>Banku and okro</h2>
        <p>Price: GHS 35.00</p>
        <a href="../actions/user_db_action.php?item_name=Banku and okro&price=35.00"><button>Order</button></a>
    </div>

    <div class="dish">
        <img src="../localDishes_images/red red.jpeg">
        <h2>Red red</h2>
        <p>Price: GHS 25.00</p>
        <a href="../actions/user_db_action.php?item_name=Red red&price=25.00"><button>Order</button></a>
    </div>

    <div class="dish">
        <img src="../localDishes_images/kenkey.jpeg" alt="kenkey">
        <h2>Kenkey</h2>
        <p>Price: GHS 30.00</p>
        <a href="../actions/user_db_action.php?item_name=Kenkey&price=30.00"><button>Order</button></a>
    </div>

    <div class="dish">
        <img src="../localDishes_images/ampesi.jpg" alt="ampesi">
        <h2>Ampesi</h2>
        <p>Price: GHS 20.00</p>
        <a href="../actions/user_db_action.php?item_name=Ampesi&price=20.00"><button>Order</button></a>
    </div>

    <div class="dish">
        <img src="../localDishes_images/fufuo.jpeg">
        <h2>Fufu and light soup</h2>
        <p>Price: GHS 50.00</p>
        <a href="../actions/user_db_action.php?item_name=Fufu and light soup&price=50.00"><button>Order</button></a>
    </div>

</body>
</html>

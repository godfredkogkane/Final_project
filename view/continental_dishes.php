
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Continental Dishes Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/continental_dishes.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="../view/home.php">Home</a></li>
            <li><a href="../view/snacks.php">Snacks</a></li>
            <li><a href="../view/local_dishes.php">Local dishes</a></li>
            <li><a href="../view/continental_dishes.php">Continental</a></li>
            <form action="../actions/search_cont_action.php" method="GET">
                <input type="text" name="search_term" placeholder="Search dishes">
                <button><i class="fas fa-search"></i></button>
            </form>
        </ul>
    </nav>
    <h1>Our Continental Dishes</h1>

    <div class="dish">
        <img src="../continentalDishes_images/waffles.jpeg" alt="waffles">
        <h2>Waffles</h2>
        <p>Price: GHS 45.00</p>
        <a href="../actions/user_db_action.php?item_name=Waffles&price=45.00"><button>Order</button></a>
    </div>

    <div class="dish">
        <img src="../continentalDishes_images/fries.jpeg" alt="fries">
        <h2>French fries</h2>
        <p>Price: GHS 70</p>
        <a href="../actions/user_db_action.php?item_name=French fries&price=70.00"><button>Order</button></a>
    </div>

    <div class="dish">
        <img src="../continentalDishes_images/burger.jpeg" alt="buger">
        <h2>Hamburger</h2>
        <p>Price: GHS 55.00</p>
        <a href="../actions/user_db_action.php?item_name=Hamburger&price=55.00"><button>Order</button></a>
    </div>

    <div class="dish">
        <img src="../continentalDishes_images/noodles.jpeg" alt="noodles">
        <h2>Noodles</h2>
        <p>Price: GHS 35.00</p>
        <a href="../actions/user_db_action.php?item_name=Noodles&price=35.00"><button>Order</button></a>
    </div>

    <div class="dish">
        <img src="../continentalDishes_images/pizza.png" alt="pizza">
        <h2>Pizza</h2>
        <p>Price: GHS 45.00</p>
        <a href="../actions/user_db_action.php?item_name=Pizza&price=45.00"><button>Order</button></a>
    </div>

    <div class="dish">
        <img src="../continentalDishes_images/springrolls.jpg" alt="spring rolls">
        <h2>Spring rolls</h2>
        <p>Price: GHS 10.00</p>
        <a href="../actions/user_db_action.php?item_name=Spring rolls&price=10.00"><button>Order</button></a>
    </div>
</body>
</html>

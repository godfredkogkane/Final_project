<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Snacks Page</title>
    <link rel="stylesheet" href="../css/snacks.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />

</head>
<body>
    <nav>
        <ul>
            <li><a href="../view/home.php">Home</a></li>
            <li><a href="../view/snacks.php">Snacks</a></li>
            <li><a href="../view/local_dishes.php">Local dishes</a></li>
            <li><a href="../view/continental_dishes.php">Continental</a></li>
            <form action="../actions/search_snacks_action.php" method="GET">
            <!-- <li class="search-bar"></li>  -->
                <input type="text" name="search_term" placeholder="Search snacks">
                <button><i class="fas fa-search"></i></button>
            </form>
        </ul>
    </nav>
    <h1>Our Snacks</h1>

    <div class="snack">
        <img src="../snack_images/pie.jpeg" alt="Pie">
        <h2>Fresh Pie</h2>
        <p>Price: GHS 20.00</p>
    <a href="../actions/user_db_action.php?item_name=Fresh Pie&price=20.00"><button>Order</button></a>
    </div>

    <div class="snack">
        <img src="../snack_images/juice.jpeg" alt="Juice">
        <h2>Juice</h2>
        <p>Price: GHS 12.50</p>
        <a href="../actions/user_db_action.php?item_name=Juice&price=12.50"><button>Order</button></a>

    </div>

    <div class="snack">
        <img src="../snack_images/plantain.jpeg" alt="Chips">
        <h2>Plantain chips</h2>
        <p>Price: GHS 6.00</p>
        <a href="../actions/user_db_action.php?item_name=Plantain chips&price=6.00"><button>Order</button></a>
    </div>

    <div class="snack">
        <img src="../snack_images/yogurt.jpeg" alt="Yogurt">
        <h2>Yogurt</h2>
        <p>Price: GHS 30.00</p>
        <a href="../actions/user_db_action.php?item_name=Yogurt&price=30.00"><button>Order</button></a>
    </div>

    <div class="snack">
        <img src="../snack_images/coke.jpeg" alt="Yogurt">
        <h2>Coca-Cola</h2>
        <p>Price: GHS 11.00</p>
        <a href="../actions/user_db_action.php?item_name=Coca-Cola&price=11.00"><button>Order</button></a>
        
    </div>

    <div class="snack">
        <img src="../snack_images/water.jpeg" alt="Yogurt">
        <h2>Mineral Water</h2>
        <p>Price: GHS 15.00</p>
        <a href="../actions/user_db_action.php?item_name=Mineral Water&price=15.00"><button>Order</button></a>
    </div>
</body>
</html>

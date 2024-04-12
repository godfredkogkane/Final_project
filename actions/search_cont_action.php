<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Continental Dishes Search Results</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .continental {
            border-bottom: 1px solid #ccc;
            padding: 10px 0;
        }

        .continental img {
            display: block;
            margin: auto;
            width: 100px;
            margin-bottom: 10px;
        }

        .continental h2 {
            text-align: center;
            margin: 0;
            font-size: 18px;
            color: #333;
        }

        .continental p {
            text-align: center;
            margin: 5px 0;
            color: #777;
        }

        .continental button {
            display: block;
            margin: auto;
            padding: 8px 16px;
            background-color: #40ba30;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .continental button:hover {
            background-color: #3d3c3c;
        }
    </style>
</head>
<body>
<?php
// Include database connection file
include_once "../settings/connection.php"; 

if(isset($_GET['search_term']) && !empty($_GET['search_term'])){
    // Sanitize the search term to prevent SQL injection
    $searchTerm = mysqli_real_escape_string($conn, $_GET['search_term']);

    // SQL query to search for continental dishes matching the search term
    $continentalDishesQuery = "SELECT * FROM ContinentalDishes WHERE ContinentalDishName LIKE '%$searchTerm%'";
    
    $result = mysqli_query($conn, $continentalDishesQuery); // Execute the query

    // Display search results for continental dishes
    echo "<div class='container'>";
    echo "<h2>Search results for '$searchTerm' in continental dishes</h2>";
    
    // Check if any results were found
    if(mysqli_num_rows($result) > 0) {
        // Display the matching dishes
        while($row = mysqli_fetch_assoc($result)) {
            echo "<div class='continental'>";
            echo "<img src='../continentalDishes_images/{$row['Image']}' alt='{$row['ContinentalDishName']}'>";
            echo "<h2>{$row['ContinentalDishName']}</h2>";
            echo "<p>Price: GHS {$row['Price']}</p>";
            // Form for ordering continental dish directly from search results
            echo "<form action='../actions/add_to_order.php' method='POST'>";
            echo "<input type='hidden' name='item_name' value='{$row['ContinentalDishName']}'>";
            echo "<input type='hidden' name='price' value='{$row['Price']}'>";
            echo "<button type='submit'>Order</button>";
            echo "</form>";
            echo "</div>";
        }
    } else {
        // No matching dish found
        echo "Sorry, no continental dish matches your search. Please try again.";
    }

    echo "</div>"; // Close the container

    mysqli_close($conn);
}
?>
</body>
</html>

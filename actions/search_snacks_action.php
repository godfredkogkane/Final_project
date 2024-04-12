<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
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

        .snack {
            display: flex;
            align-items: center;
            border-bottom: 1px solid #ccc;
            padding: 10px 0;
        }

        .snack img {
            width: 100px;
            margin-right: 20px;
        }

        .snack h2 {
            margin: 0;
            font-size: 18px;
            color: #333;
        }

        .snack p {
            margin: 0;
            color: #777;
        }

        .snack button {
            padding: 8px 16px;
            background-color: #40ba30;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .snack button:hover {
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

    // SQL query to search for snacks matching the search term
    $snacksQuery = "SELECT * FROM Snacks WHERE SnackName LIKE '%$searchTerm%'";
    
    $snacksResult = mysqli_query($conn, $snacksQuery); // Execute the query

    // Display search results for snacks
    echo "<div class='container'>";
    echo "<h1>Search results for '$searchTerm' in Snacks</h1>";

    // Check if any results were found
    if(mysqli_num_rows($snacksResult) > 0) {
        // Display the matching snacks
        while($row = mysqli_fetch_assoc($snacksResult)) {
            echo "<div class='snack'>";
            echo "<img src='../snack_images/{$row['Image']}' alt='{$row['SnackName']}'>";
            echo "<div>";
            echo "<h3>{$row['SnackName']}</h3>";
            echo "<p>Price: GHS {$row['Price']}</p>";
            // Form for ordering snacks directly from search results
            echo "<form action='../actions/add_to_order.php' method='POST'>";
            echo "<input type='hidden' name='item_name' value='{$row['SnackName']}'>";
            echo "<input type='hidden' name='price' value='{$row['Price']}'>";
            echo "<button type='submit'>Order</button>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        // No matching snacks found
        echo "No snacks found matching your search.";
    }

    echo "</div>"; // Close the container
    mysqli_close($conn);
}
?>

</body>
</html>

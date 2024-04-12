<?php
include_once "../settings/connection.php"; 

if(isset($_GET['search_term']) && !empty($_GET['search_term'])){
    // Sanitize the search term to prevent SQL injection
    $searchTerm = mysqli_real_escape_string($conn, $_GET['search_term']);

    // SQL query to search for local dishes matching the search term
    $LocaldishQuery = "SELECT * FROM LocalDishes WHERE LocalDishName LIKE '%$searchTerm%'";
    
    $dishResult = mysqli_query($conn, $LocaldishQuery); // Execute the query

    // Display search results for local dish
    echo "<h2>Search results for '$searchTerm' in local dishes</h2>";
    
    // Check if any results were found
    if(mysqli_num_rows($dishResult) > 0) {
        // Display the matching dish results
        while($row = mysqli_fetch_assoc($dishResult)) {
            echo "<div class='localdish'>";
            echo "<img src='../localDishes_images/{$row['Image']}' alt='{$row['LocalDishName']}'>";
            echo "<h2>{$row['LocalDishName']}</h2>";
            echo "<p>Price: GHS {$row['Price']}</p>";
            // Form for ordering local dish directly from search results
            echo "<form action='../actions/add_to_order.php' method='POST'>";
            echo "<input type='hidden' name='item_name' value='{$row['LocalDishName']}'>";
            echo "<input type='hidden' name='price' value='{$row['Price']}'>";
            echo "<button type='submit'>Order</button></a>";
            echo "</form>";
            echo "</div>";
        }
    } else {
        // No matching dish found
        echo "No local dish found from your search.";
    }

    mysqli_close($conn);
    
}
?>
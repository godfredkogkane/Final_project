<?php
include "../settings/connection.php"; 
    // SQL query to search for continental dishes matching the search term
    if(isset($_GET['search_term']) && !empty($_GET['search_term'])){
        // Sanitize the search term to prevent SQL injection
        $searchTerm = mysqli_real_escape_string($conn, $_GET['search_term']);

        $continentalDishesQuery = "SELECT * FROM continentaldishes WHERE ContinentalDishName LIKE '%$searchTerm%'";// Execute the query
        $result = mysqli_query($conn, $continentalDishesQuery);
    
    // Display search results for contienetal dishes
        echo "<h2>Search results  for '$searchTerm' in continental dishes </h2>";

    // Check if any results were found
    if(mysqli_num_rows($result) > 0) {
        // Display the matching dish names
        while($row = mysqli_fetch_assoc($result)) {
            echo "<div class='continental'>";
            echo "<img src='../continentalDishes_images/{$row['Image']}' alt='{$row['ContinentalDishName']}'>";
            echo "<p>{$row['ContinentalDishName']}</p>";
            echo "<p>Price: GHS {$row['Price']}</p>";
            // Form for ordering local dish directly from search results
            echo "<form action='../actions/add_to_order.php' method='POST'>";
            echo "<input type='hidden' name='item_name' value='{$row['ContinentalDishName']}'>";
            echo "<input type='hidden' name='price' value='{$row['Price']}'>";
            echo "<button type='submit'>Order</button></a>";
            echo "</form>";
            echo "</div>";

        }
    } else {
        // No matching dish found
        echo "Sorry no continental dish matches your search. Try again";
    }

    mysqli_close($conn);
    
}

?>

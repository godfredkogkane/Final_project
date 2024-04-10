<?php
// Include database connection file
include "../settings/connection.php";

if(isset($_GET['search_term']) && !empty($_GET['search_term'])){
    // Sanitize the search term to prevent SQL injection
    $searchTerm = mysqli_real_escape_string($conn, $_GET['search_term']);

    // SQL query to search for snacks matching the search term
    $snacksQuery = "SELECT * FROM snacks WHERE SnackName LIKE '%$searchTerm%'";
    
    $snacksResult = mysqli_query($conn, $snacksQuery); // Execute the query

    // Display search results for snacks
    echo "<h2>Search results for '$searchTerm' in Snacks</h2>";

    // Check if any results were found
    if(mysqli_num_rows($snacksResult) > 0) {
        // Display the matching snacks
        while($row = mysqli_fetch_assoc($snacksResult)) {
            echo "<div class='snack'>";
            echo "<img src='../snack_images/{$row['Image']}' alt='{$row['SnackName']}'>";
            echo "<h2>{$row['SnackName']}</h2>";
            echo "<p>Price: GHS {$row['Price']}</p>";
            // Form for ordering snacks directly from search results
            echo "<form action='../actions/add_to_order.php' method='POST'>";
            echo "<input type='hidden' name='item_name' value='{$row['SnackName']}'>";
            echo "<input type='hidden' name='price' value='{$row['Price']}'>";
            echo "<button type='submit'>Order</button></a>";
            echo "</form>";
            echo "</div>";
        }
    } else {
        // No matching snacks found
        echo "No snacks found matching your search.";
    }

    mysqli_close($conn);
    
}
?>
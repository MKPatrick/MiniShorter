<?php
// Include the authentication file
require_once('auth.php');

// Enforce authentication
require_authentication();

// Rest of your PHP code goes here
?>


<?php

$mysqli = new mysqli("localhost","shortner","shortner","shortnerdb");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}



// SQL query to select everything from the table
$sql = "Select links.Target as name, Count(linkhistory.ID) as CNT FROM links LEFT JOIN linkhistory ON links.ID = linkhistory.LinkID GROUP by(links.Target);";

// Execute the query
$result = $mysqli->query($sql);

// Check if there are rows in the result
if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        // Display the second column as <p> tags
        echo "<p>" . $row['name'] . "</p>";
        
    }
} else {
    echo "No results found.";
}

// Close the database connection
$mysqli->close();

?>
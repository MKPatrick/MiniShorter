<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- The page supports only a dark color schemes -->
    <meta name="color-scheme" content="dark">

    <!-- Replace the Bootstrap CSS with the
         Bootstrap-Dark Variant CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-dark-5@1.1.3/dist/css/bootstrap-night.min.css" rel="stylesheet">

    <title>Dashboard</title>
  </head>
  <body>
  <div class="container text-center mt-2">


  <a  href="/shortner.php"type="button" class="text-center btn btn-primary mb-5">Create Link ➕</a>


<?php
// Include the authentication file
require_once('auth.php');
require_once('config.php');
require_once('numberletter.php');
// Enforce authentication
require_authentication();

// Rest of your PHP code goes here
?>


<?php

$mysqli = new mysqli($dbHost,$dbUser,$dbPW,$dbName);

// Check connection
if ($mysqli -> connect_errno) {
  
  exit();
}

// SQL query to select everything from the table
$sql = "Select links.ID,links.Target as name, Count(linkhistory.ID) as CNT FROM links LEFT JOIN linkhistory ON links.ID = linkhistory.LinkID GROUP by(links.Target) order by links.ID desc;";

// Execute the query
$result = $mysqli->query($sql);
 // Open the table
 echo "<table class='table'>";
 echo "<tr><th>ID</th><th>Target</th><th>ClickAmount</th><th>QR</th></tr>";
// Check if there are rows in the result
if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {

        echo "<tr>";
        echo "<td  class='text-truncate'><button id=\"". $row['ID'] . "\"". "onclick=\"CopyClip('" . numberToLetter($row['ID']) . "')\">" . $row['ID'] . "📤</button></td>";
        echo "<td class='text-truncate' style='max-width:250px'>" . $row['name'] . "</td>";
        echo "<td>" . "<a href='/stats.php?id=". $row['ID'] ."'>". $row['CNT']  . "</a>"  . "</td>";
        echo "<td>" . "<a href='/qrcode.php?i=".numberToLetter($row['ID']) ."'>". numberToLetter($row['ID'])  . "</a>"  . "</td>";
      
        echo "</tr>";
    }
} 

// Close the database connection
$mysqli->close();
  // Close the table
  echo "</table>";
?>


</div>
  </body>

<script>

function CopyClip(id) {

  var base_url = window.location.origin;
var link=base_url + "?i=" +id;
   // Copy the text inside the text field
  navigator.clipboard.writeText(link);

  // Alert the copied text
  alert("In clipboard copied!");
}
</script>
</html>


<?php
// Include the authentication file
require_once('auth.php');
require_once('config.php');

// Enforce authentication
require_authentication();

// Rest of your PHP code goes here
?>
<?php

echo ($_POST["target"]);

$mysqli = new mysqli($dbHost,$dbUser,$dbPW,$dbName);
// SQL query to select everything from the table
$sql = "Insert into links (Target) VALUES ('" . $_POST["target"] . "');";

// Check connection
if ($mysqli -> connect_errno) {
  
  exit();
}

$result = $mysqli->query($sql);

echo ("<p>Erfolgreich hinzugefügt</p>");
header("Location: /dashboard.php");
die();
?>

<?php

if(!isset($_GET['i'])) {
    die();
}
if( str_contains($_GET['i'], ";") || strlen($_GET['i'])>10  )
{
    die();
}
require_once('config.php');
require_once('numberletter.php');

$mysqli = new mysqli($dbHost,$dbUser,$dbPW,$dbName);
$id=letterToNumber($_GET['i']);
// SQL query to select everything from the table
$sql = "Select Target from links where ID=" . $id ;

// Check connection
if ($mysqli -> connect_errno) {
  
  exit();
}
echo($id);
$result = $mysqli->query($sql);
$target="";
if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
$target=$row["Target"];
    }
} 
$mysqli->close();

$sqInsert = "Insert into linkhistory (LinkID,IP) VALUES(".$id . ",'".$_SERVER['REMOTE_ADDR'] ."');"  ;
$mysqlinsert = new mysqli($dbHost,$dbUser,$dbPW,$dbName);
$result = $mysqlinsert->query($sqInsert);
header("Location: ". $target);

?>


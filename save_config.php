
<?php

$flagFile = 'config.php';

if (file_exists($flagFile)) {
    echo "Configuration has already been saved.";
    exit();
}
?>
<!DOCTYPE html>
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

    <title>Confign</title>
  </head>
<body class="text-center">

</div class="container">
    <h1>Configuration Page</h1>
    <form method="post" action="save_config.php">
        <label for="dbName">Database Name:</label>
        <input placeholder="Your MYSQL Database" type="text" id="dbName" name="dbName" required><br><br>
        
        <label for="dbUser">Database User:</label>
        <input placeholder="Your MYSQL User" type="text" id="dbUser" name="dbUser" required><br><br>
        
        <label for="dbPW">Database Password:</label>
        <input placeholder="Your MYSQL Password"  type="password" id="dbPW" name="dbPW" required><br><br>
        
        <label for="dbHost">Database Host:</label>
        <input placeholder="Your MYSQL Host/IP" type="text" id="dbHost" name="dbHost" required><br><br>

        <label for="SECRETALPHABETS">Secret Alphabet:</label>
        <input  value="HJ6sRv3QXZwL2bY4oqmAeT7NnU1KpW5Gt8fDz9yVcP0IuOxgF" type="text" id="SECRETALPHABETS" name="SECRETALPHABETS" required><br><br>
       
        <label for="valid_username">Username for Login:</label>
        <input placeholder="User Login Username" value="admin" type="text" id="valid_username" name="valid_username" required><br><br>
        
        <label for="valid_password">Password for login:</label>
        <input  placeholder="User Login Password"  type="password" id="valid_password" name="valid_password" required><br><br>

        <input type="submit" value="Save">
    </form>
</body>

<script>
var toMutate="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789";
var inputField=document.getElementById("SECRETALPHABETS");
var result=randomSwapCharacters(toMutate);
inputField.value=result;


function randomSwapCharacters(inputString) {
    
    const randomNumber = Math.floor(Math.random() * 9);
   
  // Convert the input string to an array of characters
  const charArray = inputString.split('');

  // Iterate through the characters and swap them randomly
  for (let i = 0; i < charArray.length-randomNumber; i++) {
    const randomIndex = Math.floor(Math.random() * charArray.length);
    
    // Swap the characters at the current and random indices
    const temp = charArray[i];
    charArray[i] = charArray[randomIndex];
    charArray[randomIndex] = temp;
  }

  // Convert the array of characters back to a string
  const resultString = charArray.join('');
  
  return resultString;
}






</script>

</html>




<?php



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $config = <<<EOD
<?php
\$dbName = "{$_POST['dbName']}";
\$dbUser = "{$_POST['dbUser']}";
\$dbPW = "{$_POST['dbPW']}";
\$dbHost = "{$_POST['dbHost']}";
\$SECRETALPHABETS = "{$_POST['SECRETALPHABETS']}";
\$valid_username = "{$_POST['valid_username']}";
\$valid_password = "{$_POST['valid_password']}";
?>
EOD;

    $configFile = 'config.php';

    if (file_put_contents($configFile, $config)) {
  
        header("Location: /dashboard.php");
    } else {
        echo "Error: Unable to save the configuration to $configFile.";
    }
} else {

}
?>
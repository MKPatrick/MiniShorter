<?php
// Include the authentication file
require_once('auth.php');
require_once('config.php');

// Enforce authentication
require_authentication();

// Rest of your PHP code goes here
?>
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

    <title>URL - Creation</title>
  </head>
  <body>


<div class="container text-center">
<a  href="/dashboard.php"type="button" class="text-center btn btn-primary mt-3">Dashboard 🐱‍👤</a>


  <div class="card">

  <div class="card-body">
    <h5 class="card-title mb-3">Create new URL-Shortend Link</h5>
   
    <form action="result.php" method="post">
    <label for="URL-Target">URL-Target</label>
    <input name="target" Required type="text" class="form-control" id="URL-Target"  placeholder="Enter Target URL">

  <button type="submit" class="btn btn-primary mt-3">Create URL</button>
    </form>


  </div>
</div>

</div>
 
  </body>

</html>

<style>
.card {
        margin: 0 auto; /* Added */
        float: none; /* Added */
        margin-top:150px;
        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
        margin-bottom: 10px; /* Added */
}



body {
            margin: 0;
            overflow: hidden;
            background-color: #000; /* Set the initial background color to dark */
            animation: colorChange 10s infinite alternate; /* Animation properties */
        }

        @keyframes colorChange {
            0% {
                background-color: #222; /* Start with a dark background */
            }
            100% {
                background-color: #333; /* End with a slightly lighter color */
            }
        }
    </style>
</style>
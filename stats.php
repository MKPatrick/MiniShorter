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
  <!-- Include Chart.js and date adapter library -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns"></script>

    <title>Stats</title>
  </head>
  <body>
  <div class="tablecontent container mt-3 text-center">
  


<?php
// Include the authentication file
require_once('auth.php');
require_once('config.php');

// Enforce authentication
require_authentication();

// Rest of your PHP code goes here
?>


<?php

$mysqli = new mysqli($dbHost,$dbUser,$dbPW,$dbName);

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}



// SQL query to select everything from the table
$sql = "Select IP,TimeStamp FROM linkhistory where linkID=" .  $_GET['id'] . " order by TimeStamp desc";

// Execute the query
$result = $mysqli->query($sql);
 // Open the table
 echo "<table class='table'>";
 echo "<tr><th>IP</th><th>TimeStamp</th></tr>";
 $allTimeStamps="[";
// Check if there are rows in the result
if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {

        echo "<tr>";
        echo "<td>" . $row['IP'] . "</td>";
 
        echo "<td>" . $row['TimeStamp'] . "</td>";
        $allTimeStamps=$allTimeStamps. "\"" . $row['TimeStamp']."\",";
        echo "</tr>";
    }
    
} 
$allTimeStamps=  $allTimeStamps."]";

// Close the database connection
$mysqli->close();
  // Close the table
  echo "</table>";
  echo "<script>var timestamps=".$allTimeStamps . "</script>"
?>


</div>

<ul class="nav justify-content-center">

  <li class="nav-item">
    <a onclick="RenderChart('day')" class="nav-link" href="#">Day</a>
  </li>
  <li class="nav-item">
    <a onclick="RenderChart('month')" class="nav-link" href="#">Month</a>
  </li>

</ul>

<canvas id="dateLineChart" width="400" height="200"></canvas>



<script>
  var myLineChart;
function RenderChart(type)
{

if(myLineChart!=null)
{
    myLineChart.destroy();
}
        // Process timestamps to count occurrences of each date (ignoring times)
        var dateCounts = {};
        timestamps.forEach(function (timestamp) {
            var date = timestamp.split(' ')[0]; // Extract the date part
            if (dateCounts[date]) {
                dateCounts[date]++;
            } else {
                dateCounts[date] = 1;
            }
        });

        var labels = Object.keys(dateCounts);
        var data = Object.values(dateCounts);

        // Create a line chart using Chart.js
        var ctx = document.getElementById('dateLineChart').getContext('2d');
        myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Clicks',
                    data: data,
                    fill: false,
                    borderColor: 'rgb(75, 192, 192)',
                    pointHitRadius: 10, // Adjust the point hit radius
                    tension: 0.1
                }]
            },
            options: {
                scales: {
                    x: {
                        type: 'time',
                        time: {
                            unit: type,
                            displayFormats: {
                                day: 'MM d' // Use 'd' for formatting days
                            }
                        }
                    },
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });


    }
        
    </script>

  </body>

<style>
.tablecontent
{
    height: 100%;
    max-height: 96%;//change here
    overflow: auto;
}
    </style>
  </html>


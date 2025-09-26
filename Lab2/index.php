<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<?php
$connect = mysqli_connect('localhost', 'root', '', 'csv_db 6');
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM colors";
$result = mysqli_query($connect, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($connect));
}

// Fetch all rows into an array
$colors = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Now foreach works
foreach ($colors as $color) {

    // print_r($colors);
    
    echo "<div style='background-color: " . $color['COL2'] . "; padding:20px; margin:10px; color:Black; font-size:20px; font-weight:600;'>" 
         . $color['COL1'] . " - " . $color['COL2'] . "</div>";
}
?>

    
</body>
</html>
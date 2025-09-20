<?php
// Function to fetch user data from the JSONPlaceholder API
function getUsers() {
    $url = "https://jsonplaceholder.typicode.com/users";
    $data = file_get_contents($url);
    return json_decode($data, true);
}

// Get the list of users
$users = getUsers();
?>

<!DOCTYPE html>
<html>
<head>
    <title>JSONPlaceholder Users</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            background: #f4f4f9; 
            color: #333; 
        }
        .user-card {
            background: white;
            border: 2px solid #ccc;
            border-radius: 10px;
            padding: 15px;
            margin: 15px auto;
            width: 400px;
            box-shadow: 2px 2px 8px rgba(0,0,0,0.2);
        }
        .user-card h2 { 
            margin: 0; 
            color: #2c3e50; 
        }
        .user-card p { 
            margin: 5px 0; 
        }
    </style>
</head>
<body>
    <h1>List of Users</h1>
    <?php
    for ($i = 0; $i < count($users); $i++) {
        $user = $users[$i];
        echo "<div class='user-card'>";
        echo "<h2>" . $user['name'] . "</h2>";
        echo "<p><strong>Email:</strong> " . $user['email'] . "</p>";
        echo "<p><strong>Address:</strong> " . $user['address']['street'] . ", " 
            . $user['address']['city'] . ", " . $user['address']['zipcode'] . "</p>";
        echo "</div>";
    }
    ?>
</body>
</html>

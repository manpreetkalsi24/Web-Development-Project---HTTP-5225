<?php include("db_connect.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Book</title>
  <link rel="stylesheet" href="style/style.css">
</head>
<body>
  <h1>Add a New Book</h1>
  <form method="POST" action="">
    <label>Title:</label>
    <input type="text" name="title" required>

    <label>Author ID (1-5):</label>
    <input type="number" name="author_id" min="1" max="5" required>

    <label>Genre:</label>
    <input type="text" name="genre">

    <label>Rating:</label>
    <input type="number" name="rating" step="0.1" min="0" max="5">

    <label>Publish Date:</label>
    <input type="date" name="publish_date">

    <label>Price:</label>
    <input type="number" name="price" step="0.01">

    <button type="submit" name="add">Add Book</button>
    <a href="index.php">Back</a>
  </form>

  <?php
  if (isset($_POST['add'])) {
    $title = $_POST['title'];
    $author_id = $_POST['author_id'];
    $genre = $_POST['genre'];
    $rating = $_POST['rating'];
    $publish_date = $_POST['publish_date'];
    $price = $_POST['price'];

    $sql = "INSERT INTO books (title, genre, rating, publish_date, price, author_id)
            VALUES ('$title', '$genre', '$rating', '$publish_date', '$price', '$author_id')";
    mysqli_query($conn, $sql);
    echo "<script>alert('Book added successfully!');window.location='index.php';</script>";
  }
  ?>
</body>
</html>

<?php
include("db_connect.php");

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM books WHERE id=$id";
  $result = mysqli_query($conn, $query);
  $book = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Update Book</title>
  <link rel="stylesheet" href="style/style.css">
</head>
<body>
  <h1>Update Book Info</h1>
  <form method="POST" action="">
    <input type="hidden" name="id" value="<?php echo $book['id']; ?>">

    <label>Title:</label>
    <input type="text" name="title" value="<?php echo $book['title']; ?>" required>

    <label>Genre:</label>
    <input type="text" name="genre" value="<?php echo $book['genre']; ?>">

    <label>Rating:</label>
    <input type="number" name="rating" step="0.1" value="<?php echo $book['rating']; ?>">

    <label>Publish Date:</label>
    <input type="date" name="publish_date" value="<?php echo $book['publish_date']; ?>">

    <label>Price:</label>
    <input type="number" name="price" step="0.01" value="<?php echo $book['price']; ?>">

    <button type="submit" name="update">Update</button>
    <a href="index.php">Cancel</a>
  </form>

  <?php
  if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $genre = $_POST['genre'];
    $rating = $_POST['rating'];
    $publish_date = $_POST['publish_date'];
    $price = $_POST['price'];

    $update = "UPDATE books SET 
               title='$title', genre='$genre', rating='$rating', 
               publish_date='$publish_date', price='$price' WHERE id=$id";
    mysqli_query($conn, $update);
    echo "<script>alert('Book updated successfully!');window.location='index.php';</script>";
  }
  ?>
</body>
</html>

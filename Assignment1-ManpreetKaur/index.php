<?php
include("db_connect.php");

// JOIN authors and books
$sql = "SELECT books.*, authors.name AS author_name, authors.country
        FROM books
        JOIN authors ON books.author_id = authors.id
        ORDER BY books.rating DESC";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Book Explorer</title>
  <link rel="stylesheet" href="style/style.css">
</head>
<body>
  <h1>Book Explorer</h1>
  <a href="add_book.php" class="add_btn">Add New Book</a>

  <table>
    <thead>
      <tr>
        <th>Title</th>
        <th>Author</th>
        <th>Country</th>
        <th>Genre</th>
        <th>Rating</th>
        <th>Publish Date</th>
        <th>Price ($)</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          // Highlights top-rated books
          $rowClass = ($row['rating'] >= 4.8) ? "top-rated" : "";
          $year = (int)substr($row['publish_date'], 0, 4);
          $era = ($year < 2000) ? "Classic" : "Modern";

          echo "<tr class='{$rowClass}'>";
          echo "<td>{$row['title']}</td>";
          echo "<td>{$row['author_name']}</td>";
          echo "<td>{$row['country']}</td>";
          echo "<td>{$row['genre']}</td>";
          echo "<td>{$row['rating']}</td>";
          echo "<td>{$row['publish_date']}<br><small>$era</small></td>";
          echo "<td>\${$row['price']}</td>";
          echo "<td>
                <a href='update_book.php?id={$row['id']}'>Edit</a> |
                <a href='index.php?delete={$row['id']}' onclick='return confirm(\"Are you sure you want to delete this book?\");'>Delete</a>
                </td>";
          echo "</tr>";
        }
      } else {
        echo "<tr><td colspan='8'>No books found.</td></tr>";
      }

      // DELETE FEATURE
      if (isset($_GET['delete'])) {
        $deleteId = $_GET['delete'];
        $delQuery = "DELETE FROM books WHERE id=$deleteId";
        mysqli_query($conn, $delQuery);
        echo "<script>alert('Book deleted successfully!');window.location='index.php';</script>";
      }
      ?>
    </tbody>
  </table>

  <footer>
    <p>© 2025 Book Explorer — Created by Manpreet Kaur</p>
  </footer>
</body>
</html>

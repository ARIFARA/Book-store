<?php
require_once('config.php');

$search = isset($_GET['search']) ? $_GET['search'] : '';

$sql = "SELECT * FROM books WHERE title LIKE '%$search%' OR author LIKE '%$search%'";
$result = mysqli_query($connexion, $sql);
?>

<!DOCTYPE html>
<html>
<head>
  <title>List of the books</title>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="container">
    <h1 class="mt-4 mb-4">eBook</h1>
    <a href="add_book.php" class="btn btn-primary mb-4">Add your book</a>
    <form action="index.php" method="get">
      <div class="input-group mb-3">
        <input type="text" class="form-control" name="search" placeholder="Research a book" aria-label="Research a book" aria-describedby="button-addon2">
        <div class="input-group-append">
          <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Research</button>
        </div>
      </div>
    </form>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Title</th>
          <th>Author</th>
          <th>Description</th>
          <th>Price</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['author']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['price']; ?> $</td>
            <td>
              <a href="edit_book.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-primary mr-1">Edit</a>
              <a href="delete_book.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete this book?')">Delete</a>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</body>
</html>
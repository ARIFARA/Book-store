<?php
require_once('config.php');

if (isset($_POST['submit'])) {
	$id = $_POST['id'];
	$title = $_POST['title'];
	$author = $_POST['author'];
	$description = $_POST['description'];
	$price = $_POST['price'];

	$sql = "UPDATE books SET title='$title', author='$author', description='$description', price='$price' WHERE id=$id";
	if (mysqli_query($connexion, $sql)) {
		header('Location: index.php');
		exit;
	} else {
		echo "Erreur: " . $sql . "<br>" . mysqli_error($connexion);
	}
}

$id = $_GET['id'];

$sql = "SELECT * FROM books WHERE id=$id";
$result = mysqli_query($connexion, $sql);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit a book</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<h1 class="mt-4 mb-4">Edit a book</h1>
		<form method="post">
			<div class="form-group">
				<label for="title">Title</label>
				<input type="text" class="form-control" id="title" name="title" value="<?php echo $row['title']; ?>" required>
			</div>
			<div class="form-group">
				<label for="author">Author</label>
				<input type="text" class="form-control" id="author" name="author" value="<?php echo $row['author']; ?>" required>
			</div>
			<div class="form-group">
				<label for="description">Description</label>
				<textarea class="form-control" id="description" name="description" rows="3" required><?php echo $row['description']; ?></textarea>
			</div>
			<div class="form-group">
				<label for="price">Price</label>
				<input type="number" class="form-control" id="price" name="price" value="<?php echo $row['price']; ?>" required>
			</div>
			<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
			<button type="submit" name="submit" class="btn btn-primary">Save</button>
		</form>
	</div>
</body>
</html>

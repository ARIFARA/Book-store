<?php
require_once('config.php');

if (isset($_POST['submit'])) {
	$title = $_POST['title'];
	$author = $_POST['author'];
	$description = $_POST['description'];
	$price = $_POST['price'];

	$sql = "INSERT INTO books (title, author, description, price) VALUES ('$title', '$author', '$description', '$price')";
	if (mysqli_query($connnexion, $sql)) {
		header('Location: index.php');
		exit;
	} else {
		echo "Erreur: " . $sql . "<br>" . mysqli_error($connexion);
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>eBook</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<h1 class="mt-4 mb-4">Add your book</h1>
		<form method="POST">
			<div class="form-group">
				<label for="title">Title:</label>
				<input type="text" class="form-control" id="title" name="title" required>
			</div>
			<div class="form-group">
				<label for="author">Author:</label>
				<input type="text" class="form-control" id="author" name="author" required>
			</div>
			<div class="form-group">
				<label for="description">Description:</label>
				<textarea class="form-control" id="description" name="description" rows="3" required></textarea>
			</div>
			<div class="form-group">
				<label for="price">Price:</label>
				<input type="number" class="form-control" id="price" name="price" min="0" step="0.01" required>
			</div>
			<button type="submit" class="btn btn-primary" name="submit">Add</button>
		</form>
	</div>
</body>
</html>

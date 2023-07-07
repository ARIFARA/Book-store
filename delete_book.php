<?php
require_once('config.php');

if (isset($_GET['id'])) {
	$id = $_GET['id'];

	$sql = "DELETE FROM books WHERE id = $id";
	if (mysqli_query($connexion, $sql)) {
		header('Location: index.php');
		exit;
	} else {
		echo "Erreur: " . $sql . "<br>" . mysqli_error($connexion);
	}
}
?>

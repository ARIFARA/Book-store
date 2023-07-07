<?php

// Configurations de la base de données
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'bookstore');

// Connexion à la base de données MySQL
$connexion = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Vérifier la connexion
if (!$connexion) {
    die("Échec de la connexion à la base de données: " . mysqli_connect_error());
}
?>
<?php

use App\Database\Database;

include '../config/bootstrap.php';

$pdo = Database::getConnection();

// check if user is logged in
session_start();
if (isset($_SESSION['user'])) {
    echo "Bienvenue, " . htmlspecialchars($_SESSION['user']["name"]) . "!";
} else {
    echo "Vous n'êtes pas connecté.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

  <a href="auth/login.php">Se connecter</a>
  <a href="auth/register.php">S'inscrire</a>
  <a href="auth/logout.php">Se déconnecter</a>
</body>
</html>
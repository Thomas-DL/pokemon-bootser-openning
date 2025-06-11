<?php

$basePath = dirname(__DIR__, 2);
require_once $basePath . '/config/bootstrap.php';

use App\Auth\RegisterUser;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = trim($_POST['name'] ?? '');
  $email = trim($_POST['email'] ?? '');
  $password = $_POST['password'] ?? '';

  if ($name && $email && $password) {
      $register = new RegisterUser();
      $success = $register->register($name, $email, $password);

      if ($success) {
          header('Location:login.php');
          exit;
      } else {
          $error = "L'utilisateur existe déjà ou une erreur est survenue.";
      }
  } else {
      $error = "Tous les champs sont requis.";
  }
}
?>

<form method="POST">
    <input type="text" name="name" placeholder="Nom" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Mot de passe" required><br>
    <button type="submit">S'inscrire</button>
</form>
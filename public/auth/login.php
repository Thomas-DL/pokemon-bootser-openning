<?php

$basePath = dirname(__DIR__, 2);
require_once $basePath . '/config/bootstrap.php';

use App\Auth\LoginUser;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($email && $password) {
        $login = new LoginUser();
        $user = $login->login($email, $password);

        if ($user) {
            header('Location: /dashboard.php');
            exit;
        } else {
            $error = "Identifiants incorrects.";
        }
    } else {
        $error = "Tous les champs sont requis.";
    }
}
?>

<form method="POST">
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Mot de passe" required><br>
    <button type="submit">Se connecter</button>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
</form>
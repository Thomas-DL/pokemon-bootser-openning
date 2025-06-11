<?php

namespace App\Auth;

class LogoutUser
{
    public static function logout(): void
    {
        session_start();
        // Unset all session variables
        $_SESSION = [];

        // Destroy the session
        session_destroy();

        // Optionally, redirect to a login page or home page
        header('Location: /index.php');
        exit;
    }
}
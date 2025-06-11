<?php

namespace App\Auth;

use App\Database\Database;

class LoginUser
{
    private \PDO $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function login(string $email, string $password): ?array
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(\PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['user'] = $user;
            return $user;
        }

        return null; // Return null if login fails
    }
}
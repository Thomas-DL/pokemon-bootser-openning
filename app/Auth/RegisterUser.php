<?php

namespace App\Auth;

use App\Database\Database;
use PDO;

class RegisterUser
{
    private PDO $db;
    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function register(string $name, string $email, string $password): bool
    {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        return $stmt->execute([$name, $email, $hash]);
    }
}
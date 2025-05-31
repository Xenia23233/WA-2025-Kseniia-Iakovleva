<?php

class User
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function existsByUsername($username)
    {
        $stmt = $this->db->prepare("SELECT user_id FROM users WHERE username = ?");
        $stmt->execute([$username]);
        return $stmt->fetch() !== false;
    }

    public function register($name = null, $username, $email, $password_hash)
    {
        $stmt = $this->db->prepare("
            INSERT INTO users (name, username, email, password_hash)
            VALUES (?, ?, ?, ?)
        ");
        return $stmt->execute([$name, $username, $email, $password_hash]);
    }

    public function findByUsername($username)
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getUsernameById($userId)
    {
        $stmt = $this->db->prepare("SELECT username FROM users WHERE user_id = ?");
        $stmt->execute([$userId]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $result['username'] : null;
    }

}
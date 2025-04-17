<?php

class User {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function create($username, $email, $name, $surname, $password_hash) {
        
        // Dvojtečka označuje pojmenovaný parametr => Místo přímých hodnot se používají placeholdery.
        // PDO je pak nahradí skutečnými hodnotami při volání metody execute().
        // Chrání proti SQL injekci (bezpečnější než přímé vložení hodnot).
        $sql = "INSERT INTO books (username, email, name, surname, password_hash) 
                VALUES (:username, :email, :name, :surname, :password_hash)";
        
        $stmt = $this->db->prepare($sql);
        
        return $stmt->execute([
            ':username' => $username,
            ':email' => $email ?: null,
            ':name' => $name ?: null,
            ':surname' => $surname ?: null,
            ':password_hash' => $password_hash,
        ]);
    }

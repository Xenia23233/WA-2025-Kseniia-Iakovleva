<?php

class Book {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function create($username, $email, $text) {
        
        // Dvojtečka označuje pojmenovaný parametr => Místo přímých hodnot se používají placeholdery.
        // PDO je pak nahradí skutečnými hodnotami při volání metody execute().
        // Chrání proti SQL injekci (bezpečnější než přímé vložení hodnot).
        $sql = "INSERT INTO comments (username, email, text) 
                VALUES (:username, :email, :text)";
        
        $stmt = $this->db->prepare($sql);
        
        return $stmt->execute([
            ':username' => $username,
            ':email' => $email,
            ':text' => $text,
        ]);
    }

    public function getAll() {
        $sql="SELECT * FROM comments ORDER BY created_at DESC";
        $stmt=$this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
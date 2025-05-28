<?php

class Comment {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function create($text) {
        
        // Dvojtečka označuje pojmenovaný parametr => Místo přímých hodnot se používají placeholdery.
        // PDO je pak nahradí skutečnými hodnotami při volání metody execute().
        // Chrání proti SQL injekci (bezpečnější než přímé vložení hodnot).
        $sql = "INSERT INTO comments (text) 
                VALUES (:text";
        
        $stmt = $this->db->prepare($sql);
        
        return $stmt->execute([
            ':text' => $text,
        ]);
    }

    public function getAll() {
        $sql = "SELECT * FROM comments";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
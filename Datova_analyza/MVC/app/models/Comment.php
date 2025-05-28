<?php

class Comment {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function create($text, $post_id) {
        
        // Dvojtečka označuje pojmenovaný parametr => Místo přímých hodnot se používají placeholdery.
        // PDO je pak nahradí skutečnými hodnotami při volání metody execute().
        // Chrání proti SQL injekci (bezpečnější než přímé vložení hodnot).
        $sql = "INSERT INTO comments (text, post_id) 
                VALUES (:text,:post_id)";
        
        $stmt = $this->db->prepare($sql);
        
        return $stmt->execute([
            ':text' => $text,
            ':post_id' => $post_id
        ]);
    }

    public function getAll() {
        $sql = "SELECT * FROM comments";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
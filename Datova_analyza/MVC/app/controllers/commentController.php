<?php
require_once '../models/Database.php';
require_once '../models/Comment.php';

class CommentController {
    private $db;
    private $commentModel;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->commentModel = new Comment($this->db);
    }

    public function createComment() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $text = htmlspecialchars($_POST['text']);

            if ($this->commentModel->create($text)) {
                 header("Location: ../views/post1.php");
                exit();
             } else {
                 echo "Chyba při ukládání knihy.";
            }
        }
    }
}

// Volání metody při odeslání formuláře
$controller = new CommentController();
$controller->createComment();
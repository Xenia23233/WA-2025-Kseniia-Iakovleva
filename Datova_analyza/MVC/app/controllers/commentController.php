<?php
session_start();

require_once '../models/Database.php';
require_once '../models/Comment.php';

class CommentController
{
    private $db;
    private $commentModel;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->commentModel = new Comment($this->db);
    }

    public function createComment()
    {
        $text = htmlspecialchars($_POST['text']);
        $post_id = htmlspecialchars($_POST['post_id']);

        if ($this->commentModel->create($text, $post_id)) {
            if ($post_id == 1) {header("Location: post1.php");}
            else header("Location: post2.php");
            exit();
        } else {
            echo "Chyba při ukládání knihy.";
        }
    }
}

// Volání metody při odeslání formuláře
$controller = new CommentController();
$controller->createComment();
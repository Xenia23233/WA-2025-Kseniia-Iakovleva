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
        // Kontrola, jestli je uživatel přihlášen
        if (!isset($_SESSION['login_user_id'])) {
            header("Location: index.php");
            exit();
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $text = htmlspecialchars($_POST['text']);
            $post_id = htmlspecialchars($_POST['post_id']);
            $login_user_id = $_SESSION['login_user_id'];

            if ($this->commentModel->create($text, $post_id, $login_user_id)) {
                if ($post_id == 1) {
                    header("Location: post1.php");
                } else {
                    header("Location: post2.php");
                }
                exit();
            } else {
                echo "Chyba při ukládání.";
            }
        }
    }

}

// Volání metody při odeslání formuláře
$controller = new CommentController();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $controller->createComment();
}
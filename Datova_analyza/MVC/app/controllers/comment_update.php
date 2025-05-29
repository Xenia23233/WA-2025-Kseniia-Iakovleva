<?php
require_once '../models/Database.php';
require_once '../models/Comment.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $comments_id = (int) $_POST['comments_id'];
    $text = htmlspecialchars($_POST['text']);

    $db = (new Database())->getConnection();
    $commentModel = new Comment($db);
    $comment = $commentModel->getById($comments_id);
    $post_id = $comment['post_id'];

    $success = $commentModel->update(
        $comments_id,
        $text
    );

    if ($success) {
        if ($post_id == 1) {
            header("Location: post1.php");
        } else {
            header("Location: post2.php");
        }
        exit();
    } else {
        echo "Chyba při aktualizaci.";
    }
} else {
    echo "Neplatný požadavek.";
}
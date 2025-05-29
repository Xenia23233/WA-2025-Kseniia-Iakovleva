<?php
require_once '../models/Database.php';
require_once '../models/Comment.php';

if (isset($_GET['comments_id'])) {
    $comments_id = (int) $_GET['comments_id'];

    $db = (new Database())->getConnection();
    $commentModel = new Comment($db);

    $comment = $commentModel->getById($comments_id);
    $post_id = $comment['post_id'];

    if ($commentModel->delete($comments_id)) {
        if ($post_id == 1) {
            header("Location: post1.php");
        } else {
            header("Location: post2.php");
        }
        exit();
    } else {
        echo "Chyba při mazání.";
    }
} else {
    echo "Neplatný požadavek.";
}
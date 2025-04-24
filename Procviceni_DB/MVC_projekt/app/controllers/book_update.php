<?php
    require_once '../models/Database.php';
    require_once '../models/Book.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = (int)$_POST['id'];
        $username = htmlspecialchars($_POST['username']);
        $email = htmlspecialchars($_POST['email']);
        $text = htmlspecialchars($_POST['text']);

        $db = (new Database())->getConnection();
        $bookModel = new Book($db);

        $success = $bookModel->update(
            $id,
            $username,
            $email,
            $text
        );

        if ($success) {
            header("Location: ../views/books/books_edit_delete.php");
            exit();
        } else {
            echo "Chyba při aktualizaci komentari.";
        }
    } else {
        echo "Neplatný požadavek.";
    }
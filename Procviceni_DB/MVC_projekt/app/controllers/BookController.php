<?php
require_once '../models/Database.php';
require_once '../models/Book.php';

class BookController {
    private $db;
    private $bookModel;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->bookModel = new Book($this->db);
    }

    public function createBook() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = htmlspecialchars($_POST['username']);
            $email = htmlspecialchars($_POST['email']);
            $text = htmlspecialchars($_POST['text']);

            // Uložení knihy do DB
            // if ($this->bookModel->create($title, $author, $category, $subcategory, $year, $price, $isbn, $description, $link, $imagePaths)) {
            //     header("Location: /public/books_list.php");
            //     exit();
            // } else {
            //     echo "Chyba při ukládání knihy.";
            // }

            // Uložení knihy do DB - dočasné řešení, než budeme mít výpis knih
            if ($this->bookModel->create($username, $email, $text)) {
                header("Location: ../controllers/books_list.php"); //presmerovani na book_list.php
                exit();
            } else {
                echo "Chyba při ukládání knihy.";
            }
        }
    }

    public function listBooks (){
        $books = $this->bookModel->getAll();
        include '../views/books/book_list.php';
    }
}

// Volání metody při odeslání formuláře
$controller = new BookController();
$controller->createBook();
<?php
require_once '../models/Database.php';
require_once '../models/User.php';

class RegistrController {
    private $db;
    private $registrModel;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->registrModel = new User($this->db);
    }

    public function createUser() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = htmlspecialchars($_POST['username']);
            $email = !empty($_POST['email']) ? htmlspecialchars($_POST['email']) : null;
            $name = !empty($_POST['name']) ? htmlspecialchars($_POST['name']) : null;
            $surname = !empty($_POST['surname']) ? htmlspecialchars($_POST['surname']) : null;
            $password_hash = intval($_POST['password_hash']);

            // Uložení knihy do DB - dočasné řešení, než budeme mít výpis knih
            if ($this->registrModel->create($username, $email, $name, $surname, $password_hash)) {
                header("Location: ../controllers/book_list.php");
                exit();
            } else {
                echo "Chyba při ukládání knihy.";
            }
        }
    }
}

// Volání metody při odeslání formuláře
$controller = new RegistrController();
$controller->createUser();
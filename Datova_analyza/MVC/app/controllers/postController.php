<?php
session_start();

require_once '../models/Database.php';
require_once '../models/Post.php';

class PostController {
    private $db;
    private $postsModel;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->postsModel = new Post($this->db);
    }

    public function listPost1 () {
        $posts = $this->postsModel->getAll();
        include '../views/post1.php';
    }

    public function listPost2 () {
        $posts = $this->postsModel->getAll();
        include '../views/post2.php';
    }
}

$controller = new PostController();
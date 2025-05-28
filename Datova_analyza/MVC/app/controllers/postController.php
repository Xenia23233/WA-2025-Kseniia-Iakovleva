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

    public function listPosts () {
        $posts = $this->postsModel->getAll();
        include '../views/post1.php';
    }
}

$controller = new PostController();
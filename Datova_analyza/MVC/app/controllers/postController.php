<?php
session_start();

require_once '../models/Database.php';
require_once '../models/Post.php';
require_once '../models/Comment.php';

class PostController
{
    private $db;
    private $postsModel;
    private $commentModel;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->postsModel = new Post($this->db);
        $this->commentModel = new Comment($this->db);
    }

    public function listPost1()
    {
        $comments = $this->commentModel->getAll();
        $posts = $this->postsModel->getAll();
        include '../views/post1.php';
    }

    public function listPost2()
    {
        $comments = $this->commentModel->getAll();
        $posts = $this->postsModel->getAll();
        include '../views/post2.php';
    }

    public function listPosts()
    {
        $posts = $this->postsModel->getAll();
        include '../views/index.php';
    }
}

$controller = new PostController();
<?php
/**
 * Created by PhpStorm.
 * User: nhat
 * Date: 12/19/17
 * Time: 7:17 PM
 */
namespace controller;

use \model\Blog;
use \model\BlogDB;
use \model\DBConnection;

class BlogController
{
    public $blogDB;

    public function __construct()
    {
        $connection = new DBConnection("mysql:host=localhost;dbname=Blog","root", "123456");
        $this->blogDB = new BlogDB($connection->connect());
    }

    public function index()
    {
        $blogs = $this->blogDB->getAll();
        include 'view/list.php';
    }

    public function add(){
        if($_SERVER['REQUEST_METHOD'] === 'GET'){
            include 'view/add.php';
        } else {
            $blog = new Blog($_POST['title'], $_POST['introduction'], $_POST['content'], $_POST['created']);
            $this->blogDB->create($blog);
            $message = 'Post created';
            include 'view/add.php';
        }
    }
}



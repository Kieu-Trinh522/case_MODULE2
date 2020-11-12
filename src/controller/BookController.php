<?php


namespace App\controller;


use App\model\BookModel;
use App\model\Books;
use App\model\CategoryModel;

class BookController
{
    protected $bookModel;
    protected $categoryModel;

    public function __construct()
    {
        $this->bookModel = new BookModel();
        $this->categoryModel = new CategoryModel();
    }

    public function appear()
    {
        $books=$this->bookModel->getBook();
        include_once 'src/view/listBOOK.php';
    }

    public function add()
    {
        if($_SERVER['REQUEST_METHOD']=="GET") {
            $categories = $this->categoryModel->getAll();

            include_once 'src/view/addBook.php';
        }else{
            $categoryId=$_REQUEST['categoryId'];
            $bookName=$_REQUEST['bookName'];
            $author=$_REQUEST['author'];
            $comment=$_REQUEST['comment'];
            $describe=$_REQUEST['describe'];
            $book=new Books($categoryId,$bookName,$author,$comment,$describe);
//            var_dump($book);
//            die();
            $this->bookModel->addBook($book);
            header('location:index.php?page=view-book');
        }
    }

    public function edit()
    {
        if($_SERVER['REQUEST_METHOD']=="GET") {
            $categories = $this->categoryModel->getAll();
            $id=$_REQUEST['id'];
            $book=$this->bookModel->getBookById($id);
            include_once 'src/view/editBook.php';

        }else{
            $id=$_REQUEST['id'];
            $category=$_REQUEST['categoryId'];
            $bookName=$_REQUEST['bookName'];
            $author=$_REQUEST['author'];
            $comment=$_REQUEST['comment'];
            $describe=$_REQUEST['describe'];
            $book=new Books($category,$bookName,$author,$comment,$describe);
            $this->bookModel->editBook($book,$id);
            header('location:index.php?page=view-book');
        }
    }

    public function delete()
    {
        $id=$_REQUEST['id'];
        $this->bookModel->deleteBook($id);
        header('location:index.php?page=view-book');
    }

    public function search()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST"){
            $search = "%".$_REQUEST['search']."%";
            $books = $this->bookModel->search($search);
            $categories = $this->categoryModel->getAll();
            include_once "src/view/listBOOK.php";
        }
    }
}
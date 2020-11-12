<?php


namespace App\controller;


use App\model\BookModel;
use App\model\OrderDetailModel;

class OrderDetailController
{
    protected $orderDetailModel;
    protected $bookModel;

    public function __construct()
    {
        $this->orderDetailModel=new OrderDetailModel();
        $this->bookModel = new BookModel();
    }

    public function show()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET'){
            $id = $_REQUEST['id'];
            $books = $this->bookModel->getBook();
            $orderDetails=$this->orderDetailModel->getAll($id);
            include_once 'src/view/listOrderdetail.php';
        } else {
            $id = $_REQUEST['id'];
            $book = $_REQUEST['book'];
            $this->orderDetailModel->add($id,$book);
            header('location:index.php?page=orderDetail&id='.$id);
        }
    }
}
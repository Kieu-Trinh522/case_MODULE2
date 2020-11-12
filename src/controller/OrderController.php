<?php


namespace App\controller;


use App\model\Order;
use App\model\OrderModel;
use App\model\StudentModel;

class OrderController
{
    protected $orderModel;
    protected $studentModel;

    public function __construct()
    {
        $this->orderModel = new OrderModel();
        $this->studentModel = new StudentModel();
    }

    public function show()
    {
        $orders = $this->orderModel->getAll();
        include_once "src/view/list.php";
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $students = $this->studentModel->getByStudent();
            include_once "src/view/add.php";
        } else {
            $studentId = $_REQUEST['studentId'];
            $borrowDate = $_REQUEST['borrowDate'];
            $return = $_REQUEST['returnDate'];
            $order = new Order($studentId, $borrowDate, $return);
            $this->orderModel->addOrder($order);
            header('location:index.php');

        }
    }

    public function delete()
    {
        $id=$_REQUEST['id'];
        $this->orderModel->deleteOrder($id);
        header('location:index.php');
    }

}
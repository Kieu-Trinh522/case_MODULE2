<?php


namespace App\model;


class OrderModel
{
    protected $database;
    public function __construct()
    {
        $db=new DBConnect();
        $this->database=$db->connect();
    }

    public function getAll()
    {
        $sql="SELECT students.student_name, orders.borrow_date,orders.return_date,orders.status,orders.id
FROM orders
INNER JOIN students
ON orders.student_id=students.id";
        $stmt=$this->database->query($sql);
        $data=$stmt->fetchAll();
        $array=[];
        foreach ($data as $item){
            $order=new Order($item['student_name'],$item['borrow_date'],$item['return_date']);
            $order->setId($item['id']);
            if (strtotime($item['return_date']) > strtotime(date('yy-m-d'))) {
                $order->setStatus($item['status']);
            } else {
                $order->setStatus('Quá hạn');
            }
            array_push($array,$order);
        }
        return $array;

    }

    public function addOrder($order)
    {
        $sql="INSERT INTO `orders`(`student_id`, `borrow_date`,`return_date` ) VALUES (:student_id,:borrow_date,:return_date)";
        $stmt=$this->database->prepare($sql);
        $stmt->bindParam(':student_id',$order->getStudent());
        $stmt->bindParam(':borrow_date',$order->getBorrowDate());
        $stmt->bindParam(':return_date',$order->getReturnDate());
        $stmt->execute();
    }

    public function deleteOrder($id)
    {
        $sql="DELETE FROM `orderdetails` WHERE order_id=:id;DELETE FROM orders WHERE id=:id";
        $stmt=$this->database->prepare($sql);
        $stmt->bindParam(':id',$id);
        $stmt->execute();
    }

}
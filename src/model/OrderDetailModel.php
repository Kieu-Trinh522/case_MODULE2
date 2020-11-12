<?php


namespace App\model;


class OrderDetailModel
{
    protected $database;

    public function __construct()
    {
        $db= new DBConnect();
        $this->database=$db->connect();
    }

    public function getAll($id)
    {
        $sql="SELECT books.book_name FROM orderdetails INNER JOIN books ON books.id = orderdetails.book_id WHERE orderdetails.order_id=:order_id";
        $stmt=$this->database->prepare($sql);
        $stmt->bindParam(':order_id',$id);
        $stmt->execute();
        $data=$stmt->fetchAll();
        $array=[];
        foreach ($data as $item){
            array_push($array,$item['book_name']);
        }
        return $array;
    }

    public function add($orderId,$bookId)
    {
        $sql = 'INSERT INTO `orderdetails`( `order_id`, book_id) VALUES (:order_id,:book_id)';
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':order_id',$orderId);
        $stmt->bindParam(':book_id',$bookId);
        $stmt->execute();
    }

}
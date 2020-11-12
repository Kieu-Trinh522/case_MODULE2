<?php


namespace App\model;


class CategoryModel
{
    protected $database;

    public function __construct()
    {
        $db=new DBConnect();
        $this->database=$db->connect();
    }

    public function getAll()
    {
        $sql="SELECT * FROM categorys";
        $stmt=$this->database->query($sql);
        $data=$stmt->fetchAll();
        $array=[];
        foreach ($data as $item){
            $category=new Category($item['name']);
            $category->setId($item['id']);
            array_push($array,$category);
        }
        return $array;
    }

    public function getIdByName($name)
    {
        $sql="SELECT * FROM categorys WHERE name=:name";
        $stmt=$this->database->prepare($sql);
        $stmt->bindParam(':name',$name);
        $stmt->execute();
        $data=$stmt->fetch();
        return $data['id'];
    }

//    public function getNameById($id)
//    {
//        $sql="SELECT * FROM categorys WHERE id=:id";
//        $stmt=$this->database->prepare($sql);
//        $stmt->bindParam(':id',$id);
//        $stmt->execute();
//        $data=$stmt->fetch();
//        return $data['name'];
//    }
}
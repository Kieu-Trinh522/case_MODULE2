<?php


namespace App\model;


class StudentModel
{
    protected $database;

    public function __construct()
    {
        $db = new DBConnect();
        $this->database = $db->connect();
    }

    public function getByStudent()
    {
        $sql = "SELECT * FROM students";
        $stmt = $this->database->query($sql);
        $data = $stmt->fetchAll();
        $array = [];
        foreach ($data as $item) {
            $student = new Student($item['student_name'], $item['class'], $item['mail'], $item['phone'], $item['gender'], $item['address']);
            $student->setId($item['id']);
            array_push($array, $student);
        }
        return $array;
    }

    public function addStudent($student)
    {
     $sql="INSERT INTO `students`(`student_name`, `class`, `mail`, `phone`, `gender`, `address`) VALUES (:student_name,:class,:mail,:phone,:gender,:address)";
     $stmt=$this->database->prepare($sql);
     $stmt->bindParam(':student_name',$student->getStudentName());
     $stmt->bindParam(':class',$student->getClass());
     $stmt->bindParam(':mail',$student->getMail());
     $stmt->bindParam(':phone',$student->getPhone());
     $stmt->bindParam(':gender',$student->getGender());
     $stmt->bindParam(':address',$student->getAddress());
     $stmt->execute();
    }

    public function getStudentById($id)
    {
        $sql="SELECT * FROM students";
        $stmt=$this->database->prepare($sql);
        $stmt->bindParam(':id',$id);
        $stmt->execute();
        $item=$stmt->fetch();
        $student=new Student($item['student_name'],$item['class'],$item['mail'],$item['phone'],$item['gender'],$item['address']);
        $student->setId($id);
        return $student;
    }

    public function editStudent($student,$_id)
    {
        $sql="UPDATE `students` SET `student_name`=:student_name,`class`=:class,`mail`=:mail,`phone`=:phone,`gender`=:gender,`address`=:address WHERE `id`=:id";
        $stmt=$this->database->prepare($sql);
        $stmt->bindParam(':student_name',$student->getStudentName());
        $stmt->bindParam(':class',$student->getClass());
        $stmt->bindParam(':mail',$student->getMail());
        $stmt->bindParam(':phone',$student->getPhone());
        $stmt->bindParam(':gender',$student->getGender());
        $stmt->bindParam(':address',$student->getAddress());
        $stmt->bindParam(':id',$_id);
        $stmt->execute();
    }

    public function deleteStudent($id)
    {
        $sql="DELETE FROM students WHERE id=:id";
        $stmt=$this->database->prepare($sql);
        $stmt->bindParam(':id',$id);
        $stmt->execute();
    }
}
<?php


namespace App\controller;


use App\model\Student;
use App\model\StudentModel;

class StudentController
{
    protected $studentModel;

    public function __construct()
    {
        $this->studentModel=new StudentModel();
    }

    public function display()
    {
        $students=$this->studentModel->getByStudent();
        include_once "src/view/listStudent.php";
    }

    public function add()
    {
            $studentName = $_REQUEST['studentName'];
            $class = $_REQUEST['class'];
            $mail = $_REQUEST['mail'];
            $phone = $_REQUEST['phone'];
            $gender = $_REQUEST['gender'];
            $address = $_REQUEST['address'];
            $student = new Student($studentName, $class, $mail, $phone, $gender, $address);
            $this->studentModel->addStudent($student);
            header('location:index.php?page=view-student');
    }

    public function edit()
    {
        if($_SERVER['REQUEST_METHOD']=="GET"){
            $id=$_REQUEST['id'];
            $student= $this->studentModel->getStudentById($id);
            include_once "src/view/editStudent.php";
        }else{
            $id=$_REQUEST['id'];
            $studentName = $_REQUEST['studentName'];
            $class = $_REQUEST['class'];
            $mail = $_REQUEST['mail'];
            $phone = $_REQUEST['phone'];
            $gender = $_REQUEST['gender'];
            $address = $_REQUEST['address'];
            $student = new Student($studentName, $class, $mail, $phone, $gender, $address);
//            var_dump($student);
//            die();
            ;
            $this->studentModel->editStudent($student,$id);
            header('location:index.php?page=view-student');
        }
    }

    public function delete()
    {
        $id=$_REQUEST['id'];
        $this->studentModel->deleteStudent($id);
        header('location:index.php?page=view-student');
    }
}
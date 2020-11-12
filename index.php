<?php
require __DIR__."/vendor/autoload.php";
$orderController=new \App\controller\OrderController();
$studentController=new \App\controller\StudentController();
$bookController=new \App\controller\BookController();
$orderDetailController=new \App\controller\OrderDetailController();
$page=isset($_REQUEST['page'])?$_REQUEST['page']:NULL;
switch ($page){
    case 'add':
        $orderController->add();
        break;
    case'addStudent':
        $studentController->add();
        break;
    case 'view-student':
        $studentController->display();
        break;
    case'editStudent':
        $studentController->edit();
        break;
    case'deleteStudent':
        $studentController->delete();
        break;
    case'view-book':
        $bookController->appear();
        break;
    case 'editBook':
        $bookController->edit();
        break;
    case 'addBook':
        $bookController->add();
        break;
    case 'deleteBook':
        $bookController->delete();
        break;
    case'orderDetail':
        $orderDetailController->show();
        break;
    case 'delete':
        $orderController->delete();
        break;
    case 'search':
        $bookController->search();
        break;
    default:
        $orderController->show();
}



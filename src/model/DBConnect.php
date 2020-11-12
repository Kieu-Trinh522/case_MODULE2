<?php


namespace App\model;

use PDO;
class DBConnect
{
    protected $dsn;
    protected $username;
    protected $password;

    public function __construct()
    {
        $this->dsn="mysql:host=localhost;dbname=library";
        $this->username="root";
        $this->password="123456@Abc";
    }

    public function connect()
    {
        return new PDO($this->dsn,$this->username,$this->password);
    }
}
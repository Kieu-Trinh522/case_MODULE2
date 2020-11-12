<?php


namespace App\model;


class OrderDetail
{
protected $id;
protected $orderId;
protected $bookId;

    /**
     * OrderDetail constructor.
     * @param $orderId
     * @param $bookId
     */
    public function __construct($orderId, $bookId)
    {
        $this->orderId = $orderId;
        $this->bookId = $bookId;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * @param mixed $orderId
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;
    }

    /**
     * @return mixed
     */
    public function getBookId()
    {
        return $this->bookId;
    }

    /**
     * @param mixed $bookId
     */
    public function setBookId($bookId)
    {
        $this->bookId = $bookId;
    }
}
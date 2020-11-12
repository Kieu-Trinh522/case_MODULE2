<?php


namespace App\model;


class Books
{
    protected $id;
    protected $categoryId;
    protected $bookName;
    protected $author;
    protected $comment;
    protected $describe;


    /**
     * Books constructor.
     * @param $categoryId
     * @param $bookName
     * @param $author
     * @param $comment
     * @param $describe

     */
    public function __construct($categoryId, $bookName, $author, $comment, $describe)
    {
        $this->categoryId = $categoryId;
        $this->bookName = $bookName;
        $this->author = $author;
        $this->comment = $comment;
        $this->describe = $describe;

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
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * @param mixed $categoryId
     */
    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;
    }

    /**
     * @return mixed
     */
    public function getBookName()
    {
        return $this->bookName;
    }

    /**
     * @param mixed $bookName
     */
    public function setBookName($bookName)
    {
        $this->bookName = $bookName;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param mixed $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    /**
     * @return mixed
     */
    public function getDescribe()
    {
        return $this->describe;
    }

    /**
     * @param mixed $describe
     */
    public function setDescribe($describe)
    {
        $this->describe = $describe;
    }
}
<?php


namespace App\model;


class BookModel
{
    protected $database;

    public function __construct()
    {
        $db = new DBConnect();
        $this->database = $db->connect();
    }

    public function getBook()
    {
        $sql = "SELECT books.id, books.book_name,books.author,books.comment,books.describe,categorys.name 
FROM `books`
INNER JOIN categorys
ON books.category_id = categorys.id
ORDER BY books.book_name";
        $stmt = $this->database->query($sql);
        $data = $stmt->fetchAll();
        $array = [];
        foreach ($data as $item) {
            $book = new Books($item['name'], $item['book_name'], $item['author'], $item['comment'], $item['describe']);
            $book->setId($item['id']);
            array_push($array, $book);
        }
        return $array;
    }

    public function addBook($book)
    {
        $sql = "INSERT INTO `books`(`category_id`, `book_name`, `author`, `comment`, `describe`) VALUES (:category_id,:book_name,:author,:comment,:describe)";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':category_id', $book->getCategoryId());
        $stmt->bindParam(':book_name', $book->getBookName());
        $stmt->bindParam(':author', $book->getAuthor());
        $stmt->bindParam(':comment', $book->getComment());
        $stmt->bindParam(':describe', $book->getDescribe());
        $stmt->execute();
    }

    public function getBookById($id)
    {
        $sql = "SELECT books.id, books.book_name,books.author,books.comment,books.describe,categorys.name 
FROM `books`
INNER JOIN categorys
ON books.category_id = categorys.id
WHERE books.id=:id";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $item = $stmt->fetch();
        $book = new Books($item['name'], $item['book_name'], $item['author'], $item['comment'], $item['describe']);
        $book->setId($id);

        return $book;
    }

    public function editBook($book, $id)
    {
        $sql = "UPDATE `books` SET `category_id`=:category_id,`book_name`=:book_name,`author`=:author,`comment`=:comment,`describe`=:describe WHERE `id`=:id";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':category_id', $book->getCategoryId());
        $stmt->bindParam(':book_name', $book->getBookName());
        $stmt->bindParam(':author', $book->getAuthor());
        $stmt->bindParam(':comment', $book->getComment());
        $stmt->bindParam(':describe', $book->getDescribe());
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function deleteBook($id)
    {
        $sql = "DELETE FROM books WHERE id=:id";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function search($key)
    {
        $sql = "SELECT books.id, books.book_name,books.author,books.comment,books.describe,categorys.name 
FROM `books`
INNER JOIN categorys
ON books.category_id = categorys.id
WHERE books.book_name LIKE :key
ORDER BY books.book_name
";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':key',$key);
        $stmt->execute();
        $data = $stmt->fetchAll();
        $array = [];
        foreach ($data as $item) {
            $book = new Books($item['name'], $item['book_name'], $item['author'], $item['comment'], $item['describe']);
            $book->setId($item['id']);
            array_push($array, $book);
        }
        return $array;
    }
}
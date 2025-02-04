<?php
require_once '../Database.php';

class Book
{
    private $conn;
    private $table = 'books';
    public $id;
    public $title;
    public $isbn;
    public $author;
    public $publisher;
    public $year_published;
    public $category;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function create()
    {
        $query = "INSERT INTO " . $this->table . " (title, isbn, author, publisher, year_published, category) VALUES (:title, :isbn, :author, :publisher, :year_published, :category)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':isbn', $this->isbn);
        $stmt->bindParam(':author', $this->author);
        $stmt->bindParam(':publisher', $this->publisher);
        $stmt->bindParam(':year_published', $this->year_published);
        $stmt->bindParam(':category', $this->category);
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function show()
    {
        $stmt = $this->conn->prepare("SELECT * FROM books");
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); 
    }

    public function update()
    {
        $query = "UPDATE " . $this->table . " SET title = :title, isbn = :isbn, author = :author, publisher = :publisher, year_published = :year_published, category = :category WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':isbn', $this->isbn);
        $stmt->bindParam(':author', $this->author);
        $stmt->bindParam(':publisher', $this->publisher);
        $stmt->bindParam(':year_published', $this->year_published);
        $stmt->bindParam(':category', $this->category);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function getBookId($id)
    {
        $query = "SELECT id, title, isbn, author, publisher, year_published, category FROM " . $this->table . " WHERE id = :id LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function delete()
    {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}

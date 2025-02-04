<?php
require_once '../Database.php';
require_once '../class/Book.php';
$database = new Database();
$db = $database->getConnection();
$book = new Book($db);
if (isset($_POST['action']) && $_POST['action'] == 'add_book') {
    $title = $_POST['title'];
    $isbn = $_POST['isbn'];
    $author = $_POST['author'];
    $publisher = $_POST['publisher'];
    $year_published = $_POST['year_published'];
    $category = $_POST['category'];
    $database = new Database();
    $db = $database->getConnection();
    $book = new Book($db);
    $book->title = $title;
    $book->isbn = $isbn;
    $book->author = $author;
    $book->publisher = $publisher;
    $book->year_published = $year_published;
    $book->category = $category;
    if ($book->create()) {
        echo "Book added successfully!";
    } else {
        echo "Failed to add book.";
    }
}

if (isset($_POST['action']) && $_POST['action'] == 'get_books') {
    $books = $book->show();
    echo json_encode($books);
}

if (isset($_POST['action']) && $_POST['action'] == 'get_book') {
    $book->id = $_POST['id'];
    $book_data = $book->getBookId($book->id);
    echo json_encode($book_data);
}

if (isset($_POST['action']) && $_POST['action'] == 'update_book') {
    $book->id = $_POST['id'];
    $book->title = $_POST['title'];
    $book->isbn = $_POST['isbn'];
    $book->author = $_POST['author'];
    $book->publisher = $_POST['publisher'];
    $book->year_published = $_POST['year_published'];
    $book->category = $_POST['category'];
    if ($book->update()) {
        echo "Book updated successfully!";
    } else {
        echo "Failed to update user.";
    }
}

if (isset($_POST['action']) && $_POST['action'] == 'delete_book') {
    $book->id = $_POST['id'];
    if ($book->delete()) {
        echo "Deleted successfully!";
    } else {
        echo "Failed to delete user.";
    }
}
?>

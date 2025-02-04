<?php
include_once('modalAdd.php');
include_once('modalEdit.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Catalog</title>
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-end mt-4">
            <button type="button" class="btn btn-success px-4 py-2" data-toggle="modal" data-target="#exampleModal">Add</button>
        </div>
        <table class="table table-bordered mx-auto mt-2" id="booksTable">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">ISBN</th>
                    <th scope="col">Author</th>
                    <th scope="col">Publisher</th>
                    <th scope="col">Year Published</th>
                    <th scope="col">Category</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>

    </div>
</body>
<script>
    $(document).ready(function() {
        getBooks();
    });

    function getBooks() {
        $.ajax({
            url: 'php/functions.php',
            type: 'POST',
            data: {
                action: 'get_books'
            },
            success: function(response) {
                var books = JSON.parse(response);
                var tableBody = $('#booksTable tbody');
                tableBody.empty();

                books.forEach(function(book) {
                    tableBody.append(
                        '<tr>' +
                        '<td>' + book.title + '</td>' +
                        '<td>' + book.isbn + '</td>' +
                        '<td>' + book.author + '</td>' +
                        '<td>' + book.publisher + '</td>' +
                        '<td>' + book.year_published + '</td>' +
                        '<td>' + book.category + '</td>' +
                        '<td><button data-id=' + book.id + ' type="button" data-toggle="modal" data-target="#editModal"  class="editButton btn mx-1 bg-secondary text-white">EDIT</button><button data-id=' + book.id + ' class="btn bg-secondary text-white deleteButton">DEL</button</td>' +
                        '</tr>'
                    );
                });
                $(".editButton").click(function() {
                    var id = $(this).data('id');
                    showEditModal(id);
                });

                $(".deleteButton").click(function() {
                    var id = $(this).data('id');
                    deleteBook(id);
                });
            }
        });

        function showEditModal(bookId) {
            $.ajax({
                url: 'php/functions.php',
                type: 'POST',
                data: {
                    action: 'get_book',
                    id: bookId
                },
                success: function(response) {
                    var book = JSON.parse(response);
                    $('#edit_id').val(book.id);
                    $('#edit_title').val(book.title);
                    $('#edit_isbn').val(book.isbn);
                    $('#edit_author').val(book.author);
                    $('#edit_publisher').val(book.publisher);
                    $('#edit_year_published').val(book.year_published);
                    $('#edit_category').val(book.category);
                }
            });
        

    }
    function deleteBook(bookId) {
    if (confirm("Are you sure you want to delete this book?")) {
            $.ajax({
                url: 'php/functions.php',
                type: 'POST',
                data: {
                    action: 'delete_book',
                    id: bookId
                },
                success: function(response) {
                    alert(response);
                    getBooks(); 
                }
            });
        }
    }
}
</script>

<script src="javascript/addBook.js"></script>
<script src="javascript/updateBook.js"></script>

</html>
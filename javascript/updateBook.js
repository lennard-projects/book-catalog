$(document).ready(function () {
    $("#editForm").submit(function (event) {
        event.preventDefault(); 
        $.ajax({
            url: "php/functions.php", 
            type: "POST",
            data: { action: 'update_book', 
                id: $("#edit_id").val(),
                title: $("#edit_title").val(),
                isbn: $("#edit_isbn").val(),
                author: $("#edit_author").val(),
                publisher: $("#edit_publisher").val(),
                year_published: $("#edit_year_published").val(),
                category: $("#edit_category").val() },
            success: function () {
                getBooks();
                $('#dismissModalButton').click();
                $("#edit_title").val('');
                $("#edit_isbn").val('');
                $("#edit_author").val('');
                $("#edit_publisher").val('');
                $("#edit_year_published").val('');
                $("#edit_category").val('');
                alert("Book updated successfully!");
            },
            error: function () {
                alert("Error. Please try again.");
            }
        });
    });
});
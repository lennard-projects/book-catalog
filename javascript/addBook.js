$(document).ready(function () {
    $("#addForm").submit(function (event) {
        event.preventDefault(); 
        $.ajax({
            url: "php/functions.php", 
            type: "POST",
            data: { action: 'add_book',
                title: $("#title").val(),
                isbn: $("#isbn").val(),
                author: $("#author").val(),
                publisher: $("#publisher").val(),
                year_published: $("#year_published").val(),
                category: $("#category").val() 
            },
            success: function () {
                alert("New book added successfully!");
                $("#title").val('');
                $("#isbn").val('');
                $("#author").val('');
                $("#publisher").val('');
                $("#year_published").val('');
                $("#category").val('');
                $('#addDismissModalButton').click();
                getBooks();
            },
            error: function () {
                alert("Error. Please try again.");
            }
        });
    });
});
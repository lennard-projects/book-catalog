<div class="modal" tabindex="-1" role="dialog" id="editModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit book</h5>
                <button type="button" class="close" data-dismiss="modal" id="dismissModalButton" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editForm">
                <div class="modal-body">
                    <label for="id">Id</label>
                    <input type="text" name="id" class="form-control" id="edit_id" disabled value="" />
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" id="edit_title" required />
                    <label for="isbn">ISBN</label>
                    <input type="text" name="isbn" class="form-control" id="edit_isbn" required />
                    <label for="author">Author</label>
                    <input type="text" name="author" class="form-control" id="edit_author" required />
                    <label for="publisher">Publisher</label>
                    <input type="text" name="publisher" class="form-control" id="edit_publisher" required />
                    <label for="yearPublished">Year Published</label>
                    <input type="text" name="yearPublished" class="form-control" id="edit_year_published" required />
                    <label for="category">Category</label>
                    <input type="text" name="category" class="form-control" id="edit_category" required />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update changes</button>
                </div>
        </div>
    </div>
</div>
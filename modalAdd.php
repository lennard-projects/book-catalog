<div class="modal" tabindex="-1" role="dialog" id="exampleModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Book</h5>
                <button type="button" class="close" data-dismiss="modal" id="addDismissModalButton" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addForm">
                <div class="modal-body">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" id="title" required />
                    <label for="isbn">ISBN</label>
                    <input type="text" name="isbn" class="form-control" id="isbn" required />
                    <label for="author">Author</label>
                    <input type="text" name="author" class="form-control" id="author" required />
                    <label for="publisher">Publisher</label>
                    <input type="text" name="publisher" class="form-control" id="publisher" required />
                    <label for="yearPublished">Year Published</label>
                    <input type="text" name="yearPublished" class="form-control" id="year_published" required />
                    <label for="category">Category</label>
                    <input type="text" name="category" class="form-control" id="category" required />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>

        </div>
    </div>
</div>
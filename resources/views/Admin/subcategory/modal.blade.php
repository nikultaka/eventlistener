<div class="modal fade" id="subcategoryModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="subcategoryModalLabel">Add New SubCategory</h4>
            </div>

            <div class="modal-body">
                <div class="alert alert-danger print-error-msg" style="display:none;">
                    <ul></ul>
                </div>
                <form onsubmit="return false" method="post" autocomplete="off" class="text-infom needs-validation"
                    novalidate name="SubCategoryform" id="SubCategoryform">
                    {{ csrf_field() }}
                    <input type="hidden" id="hscid" name="hscid">

                    <div class="form-group">
                        <label for="category">Category</label>
                        <select class="form-control" id="category" name="category">
                            <?php foreach ($categoryList as $category) { ?>
                                <option class="custom-select" value='{{$category["id"]}}'>{{$category['name']}}</option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="1">Active</option>
                            <option value="0">InActive</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="submitsubcategorybtn">Add</button>
            </div>
            </form>

        </div>
    </div>
</div>

<div class="modal fade" id="discoverModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="discoverModalLabel">Add New Discover</h4>
            </div>

            <div class="modal-body" style="overflow: auto;">
                <div class="alert alert-danger print-error-msg" style="display:none;">
                    <ul></ul>
                </div>
                <form onsubmit="return false" method="post" autocomplete="off" class="text-infom needs-validation"
                    novalidate name="Discoverform" id="Discoverform">
                    {{ csrf_field() }}
                    <input type="hidden" id="hdid" name="hdid" value="">
 
                    <div class="form-group col-md-12">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>

                    <div class="form-group col-md-12">
                        <label for="description">Description</label>
                        <textarea id="description" class="form-control" name="description" rows="3" cols="80"></textarea>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="submitdiscoverbtn">Add</button>
            </div>
            </form>
        </div>
    </div>
</div>

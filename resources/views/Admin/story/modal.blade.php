<div class="modal fade" id="storyModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="storyModalLabel">Add New Story</h4>
            </div>

            <div class="modal-body">
                <div class="alert alert-danger print-error-msg" style="display:none;">
                    <ul></ul>
                </div>
                <form onsubmit="return false" method="post" autocomplete="off" class="text-infom needs-validation" novalidate name="Storyform" id="Storyform" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" id="hsid" name="hsid" value="">
                    <div class="form-group">
                        <label for="username">User</label>
                        <select class="form-control" id="username" name="username">
                            <?php foreach ($userList as $user) { ?>
                                <option class="custom-select" value='{{$user["id"]}}'>{{$user['name']}}</option>
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
                <button type="submit" class="btn btn-primary" id="submitstorybtn">Add</button>
            </div>
            </form>
        </div>
    </div>
</div>
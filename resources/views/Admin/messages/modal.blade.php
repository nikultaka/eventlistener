<div class="modal fade" id="messagesModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="messagesModalLabel">Add New Messages</h4>
            </div>

            <div class="modal-body">
                <div class="alert alert-danger print-error-msg" style="display:none;">
                    <ul></ul>
                </div>
                <form onsubmit="return false" method="post" autocomplete="off" class="text-infom needs-validation" novalidate name="Messagesform" id="Messagesform" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" id="hmid" name="hmid">

                    <div class="form-group">
                        <label for="user_id">User Id</label>
                        <select class="form-control" id="user_id" name="user_id">
                            <?php foreach ($userList as $users) { ?>
                                <option class="custom-select" value='{{$users["id"]}}'>{{$users['name']}}</option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="parent_id">Parent Id</label>
                        <select class="form-control" id="parent_id" name="parent_id">
                            <option value="0" class="custom-select"> - - - - - - Select Parent Id - - - - - - </option>
                            <?php foreach ($parentList as $parent) { ?>
                                <option class="custom-select" value='{{$parent["id"]}}'>{{$parent['message_text']}}</option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="communitycategory_id">Community Category Id</label>
                        <select class="form-control" id="communitycategory_id" name="communitycategory_id">
                            <?php foreach ($communitycategoryList as $communitycategory) { ?>
                                <option class="custom-select" value='{{$communitycategory["id"]}}'>{{$communitycategory['name']}}</option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="message_type">Message Type</label>
                        <input type="text" class="form-control" id="message_type" name="message_type" required>
                    </div>

                    <div class="form-group">
                        <label for="message_text">Message Text</label>
                        <textarea id="message_text" class="form-control" name="message_text" rows="3" cols="80" required></textarea>
                    </div>

                    <div class="form-group col-md-12" style="border: 1px solid #ebebeb;  padding-top: 15px;">
                    <center><div class="form-group col-md-4">
                    <label for="is_read" style="font-size: 15px;">is Read ?</label>
                        <div class="form-check">
                            <input class="form-check-input is_read" type="radio" name="is_read" id="is_read1" value="1" >
                            <label class="form-check-label " for="is_read1">Yes</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input is_read" type="radio" name="is_read" id="is_read0" value="0" checked>
                            <label class="form-check-label" for="is_read0">NO</label>
                        </div>
                    </div></center>

                    <center><div class="form-group col-md-4">
                    <label for="is_verified" style="font-size: 15px;" >is Verified ?</label>
                        <div class="form-check">
                            <input class="form-check-input is_verified" type="radio" name="is_verified" id="is_verified1" value="1" >
                            <label class="form-check-label" for="is_verified1">Yes</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input is_verified" type="radio" name="is_verified" id="is_verified0" value="0" checked>
                            <label class="form-check-label" for="is_verified0">NO</label>
                        </div>
                    </div></center>

                    <center><div class="form-group col-md-4" >
                    <label for="is_follow" style="font-size: 15px;" >is Follow ?</label>
                        <div class="form-check">
                            <input class="form-check-input is_follow" type="radio" name="is_follow" id="is_follow1" value="1" >
                            <label class="form-check-label" for="is_follow1">Yes</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input is_follow" type="radio" name="is_follow" id="is_follow0" value="0" checked>
                            <label class="form-check-label" for="is_follow0">NO</label>
                        </div>
                    </div></center>
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
                <button type="submit" class="btn btn-primary" id="submitmessagesbtn">Add</button>
            </div>
            </form>
        </div>
    </div>
</div>
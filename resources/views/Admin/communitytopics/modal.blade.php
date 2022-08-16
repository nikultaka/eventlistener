<div class="modal fade" id="communitytopicsModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="communitytopicsModalLabel">Add Community Topic</h4>
            </div>
            <div class="modal-body" style="height: 200px;">
                <div class="alert alert-danger print-error-msg" style="display:none;">
                    <ul></ul>
                </div>
                <form onsubmit="return false" method="post" autocomplete="off" class="text-infom needs-validation" novalidate name="CommunityTopicsform" id="CommunityTopicsform">
                    {{ csrf_field() }}
                    <input type="hidden" id="hctid" name="hctid">
                    <div class="form-group  col-md-8">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group  col-md-4">
                        <label for="is_verify">Is Verify</label>
                        <select class="form-control" id="is_verify" name="is_verify">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>

                    <div class="form-group col-md-11" style="border: 1px solid #ebebeb; padding-top: 15px; margin-left: 25px;">
                        <div class="form-group col-md-6">
                            <label for="text_color" class="col-md-12">Text Color</label>
                            <input type="color" class="" id="text_color" name="text_color" value="#1CA887" style="width: 150px; height: 50px;">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="background_color" class="col-md-12">Background Color</label>
                            <input type="color" class="" id="background_color" name="background_color" value="#4A4E53" style="width: 150px; height: 50px;">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="submitcommunitytopicsbtn">Add</button>
            </div>
            </form>

        </div>
    </div>
</div>



<div class="modal fade" id="postandcomment">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="communitytopicsModalLabel">Post & Comment List</h4>
            </div>
            <div class="modal-body">
            <table class="table" id="postandcomment-table" >
                    <thead>
                        <!-- <th>Post Image</th> -->
                        <th>Post Message</th>
                        <th>Comments</th>
                    </thead>
                </table></br>
            <div id="divTable">
                <table class="table" id="comment-table" >
                    <thead>
                        <th>Comments</th>
                    </thead>
                </table></br></br>
            </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- <div class="modal fade" id="commentview">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="communitytopicsModalLabel">Comment List</h4>
            </div>
            <div class="modal-body">
            <table class="table" id="comment-table" >
                    <thead>
                        <th>Comment Message</th>
                    </thead>
                </table></br>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> -->
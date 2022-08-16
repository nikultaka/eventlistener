<div class="modal fade" id="snapsModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="snapsModalLabel">Add New Snaps</h4>
            </div>

            <div class="modal-body">
                <div class="alert alert-danger print-error-msg" style="display:none;">
                    <ul></ul>
                </div>
                <form onsubmit="return false" method="post" autocomplete="off" class="text-infom needs-validation" novalidate name="Snapsform" id="Snapsform" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" id="hssid" name="hssid" value="">
                    <input type="hidden" id="hstoryid" name="hstoryid" value="">
                    <input type="hidden" id="himageid" class="himageid" name="himageid" value="">
                    <input type="hidden" id="hvideoid" class="hvideoid" name="hvideoid" value="">

                    <div class="form-group"  style="font-size: 18px;">
                        <input type="radio" name="snapselect"  id="image" value="1" checked> IMAGE
                       <span style="color: #147197;"><b> / </b></span>
                        <input type="radio" name="snapselect" id="video" value="0"> VIDEO
                    </div>
                    
                    <div class="form-group snapsimage" id="image">
                        <label for="storyimage">Image</label>
                        <input type="file" class="form-control" id="storyimage" name="storyimage">
                        <img id="browseFileesimage" style="width: 100px; height: auto;" src="">
                    </div>

                    <div class="form-group snapsvideo" id="video" style="display:none; font-size: 18px;">
                        <label for="storyvideotype">Video Type: </label>
                        <input type="radio" name="storyvideotype" id="" value="1" checked> Internal
                        <input type="radio" name="storyvideotype" id="" value="0"> External
                    </div>

                    <div class="form-group videointernal" style="display:none;">
                        <label for="videodiv">Video File:</label>
                        <input type="file" class="form-control" id="browse_file" name="browse_file" value="video">
                        <img id="browseFilees" style="width: 100px; height: auto;" src="">
                    </div>

                    <div class="form-group videoexternal" style="display:none;">
                        <label for="embadedcode">Embaded Code:</label>
                        <textarea id="embadedcode" class="form-control embadedcodees" name="embadedcode" rows="5" cols="80"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" style="float: right;" id="submitsnapsbtn">Add</button>
                </form>
            </div>
            <span>----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</span>
            </br></br></br>

            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-sm" id="snapsTable">
                        <thead>
                            <tr>
                            <th>Media Type</th>
                            <th>Media</th>
                            <th style="min-width: 200px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Close</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="{{ asset('assets/admin/js/snaps.js') }}"></script>
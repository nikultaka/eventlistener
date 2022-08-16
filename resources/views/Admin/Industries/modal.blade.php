<style>
    #Industriesform .form-group label {
        font-weight: 700;
        color: black;
    }
</style>

<div class="modal fade" id="industriesModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="industriesModalLabel">Add New Company</h4>
            </div>

            <div class="modal-body" style="overflow-y:auto;">

                <form onsubmit="return false" method="post" autocomplete="off" class="text-infom needs-validation" novalidate name="Industriesform" id="Industriesform" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" id="hiid" name="hiid">
                    <input type="hidden" id="hiiid" name="hiiid">
                    <input type="hidden" id="hibiid" name="hibiid">

                    <div class="form-group col-sm-6">
                        <label for="username">Select User</label>
                        <select class="form-control" id="username" name="username">
                            <?php foreach ($userList as $user) { ?>
                                <option class="custom-select" value='{{$user["id"]}}'>{{$user['name']}}</option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="name">Company Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="logo">Logo</label>
                        <input type="file" class="form-control" id="logo" name="logo">
                        <img id="logoFilees" style="width: 100px; height: auto;" src="">
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="banner_image">Banner image</label>
                        <input type="file" class="form-control" id="banner_image" name="banner_image">
                        <img id="banner_imageFilees" style="width: 100px; height: auto;" src="">
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="website">Website</label>
                        <input type="url" class="form-control" id="website" name="website" required>
                    </div>

                    <div class="form-group col-sm-3">
                        <label for="progress_details">Progress Details</label>
                        <input type="text" class="form-control" id="progress_details" name="progress_details" required>
                    </div>

                    <div class="form-group col-sm-3">
                        <label for="total_hours">Total Hours</label>
                        <input type="text" class="form-control" id="total_hours" name="total_hours" required>
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="email">E-Mail Adress</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="form-group col-sm-4">
                        <label for="city">Headquarters City</label>
                        <input type="text" class="form-control" id="city" name="city" required>
                    </div>

                    <div class="form-group col-sm-4">
                        <label for="founddate">Company Founded In.</label>
                        <input type="date" class="form-control" id="founddate" name="founddate" required>
                    </div>

                    <div class="form-group col-sm-4">
                        <label for="mvp">Do You Have MVP In Market?</label>
                        <select class="form-control" id="mvp" name="mvp">
                            <option value="1">YES</option>
                            <option value="0">NO</option>
                        </select>
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="sector">Company Sector</label>
                        <input type="text" class="form-control" id="sector" name="sector" required>
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="cto">Company CTO</label>
                        <input type="text" class="form-control" id="cto" name="cto" required>
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="problemsolveing">What Is The Problem You Solving?</label>
                        <textarea id="problemsolveing" class="form-control" name="problemsolveing" rows="3" cols="80" required></textarea>
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="competitive_advantage">Competitive Advantage</label>
                        <textarea id="competitive_advantage" class="form-control" name="competitive_advantage" rows="3" cols="80" required></textarea>
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="description">Company Description</label>
                        <textarea id="description" class="form-control" name="description" rows="3" cols="80" required></textarea>
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="traction">Discribe Your Traction</label>
                        <textarea id="traction" class="form-control" name="traction" rows="3" cols="80" required></textarea>
                    </div>

                    <div class="form-group col-sm-3">
                        <label for="annual_revenue">Annual Revenue</label>
                        <input type="text" class="form-control" id="annual_revenue" name="annual_revenue" required>
                    </div>

                    <div class="form-group col-sm-3">
                        <label for="revenue">Revenue</label>
                        <input type="text" class="form-control" id="revenue" name="revenue" required>
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="socialmedia">Social Media Link</label>
                        <input type="text" class="form-control" id="socialmedia" name="socialmedia">
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="is_featured">Is Featured</label>
                        <select class="form-control" id="is_featured" name="is_featured">
                            <option value="1">YES</option>
                            <option value="0">NO</option>
                        </select>
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="1">Active</option>
                            <option value="0">InActive</option>
                        </select>
                    </div></br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="submitindustriesbtn">Add</button></br>
            </div>
            </form>
        </div>
    </div>
</div>
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
                    <div class="form-group col-md-6">
                        <label for="category">Category</label>
                        <select class="form-control" id="category" name="category">
                        <option  value="0" class="custom-select" > - - - - - - Select Category - - - - - - </option>
                            <?php foreach ($categoryList as $category) { ?>
                                <option class="custom-select" value='{{$category["id"]}}'>{{$category['name']}}</option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="subcategory">SubCategory</label>
                        <select   class="form-control" id="subcategory" name="subcategory">
                        <option value="0" class="custom-select"> - - - - - - Select SubCategory - - - - - - </option>                
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="is_featured">Is Featured</label>
                        <select class="form-control" id="is_featured" name="is_featured">
                            <option value="1">YES</option>
                            <option value="0">NO</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="is_blog">Is Blog</label>
                        <select class="form-control" id="is_blog" name="is_blog">
                            <option value="1">YES</option>
                            <option value="0">NO</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="type_of_card">Type Of Card</label>
                        <select class="form-control" id="type_of_card" name="type_of_card">
                            <option value="1">Primary</option>
                            <option value="0">Secondary</option>
                        </select>
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="1">Active</option>
                            <option value="0">InActive</option>
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
                <button type="submit" class="btn btn-primary" id="submitdiscoverbtn">Add</button>
            </div>
            </form>
        </div>
    </div>
</div>

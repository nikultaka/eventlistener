 <div class="modal fade" id="userModal">
     <div class="modal-dialog">
         <div class="modal-content">

             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title">Add New User</h4>
             </div>

             <div class="modal-body" style="overflow-y:auto;">
                 <div class="alert alert-danger print-error-msg" style="display:none;">
                     <ul></ul>
                 </div>
                 <form id="addNewUserForm" name="addNewUserForm" onsubmit="return false" autocomplete="off" method="post" enctype="multipart/form-data">
                     {{ csrf_field() }}
                     <input type="hidden" id="userHdnID" name="userHdnID" value="">
                     <input type="hidden" id="hidprofile_pic" name="hidprofile_pic" value="">

                     <div class="form-group col-md-6">
                         <label>First Name</label>
                         <input type="text" class="form-control" name="firstname" id="firstname" required>
                     </div>
                     <div class="form-group col-md-6">
                         <label>Last Name</label>
                         <input type="text" class="form-control" name="lastname" id="lastname" required>
                     </div>

                     <div class="form-group col-md-12">
                         <label>User Name</label>
                         <input type="text" class="form-control" name="username" id="username" required>
                     </div>

                     <div class="form-group col-md-12">
                         <label>Email</label>
                         <input type="text" class="form-control" name="email" id="email" required>
                     </div>

                     <div class="form-group col-md-12">
                         <label>Password</label>
                         <input type="password" class="form-control " name="password" id="password" required />
                     </div>

                     <div class="form-group col-md-6">
                         <label for="phone">Phone</label>
                         <input type="text" class="form-control " id="phone" name="phone" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required />
                     </div>

                     <div class="form-group col-md-6">
                         <label>Date Of Birth</label>
                         <input type="date" class="form-control" name="dob" id="dob">
                     </div>

                     <div class="form-group col-md-6">
                         <label>Networth</label>
                         <input type="text" class="form-control" name="networth" id="networth">
                     </div>

                     <div class="form-group col-md-6">
                         <label>Gross Income</label>
                         <input type="text" class="form-control" name="grossincome" id="grossincome">
                     </div>

                     <div class="form-group col-md-6">
                         <label>Profile pic</label>
                         <input type="file" class="form-control" name="profile_pic" id="profile_pic">
                     </div>

                     <div class="form-group col-md-6" style="    margin-bottom: 0px;">
                         <img id="profileimage" style="width: 100px; height: auto;" src="">
                     </div>

                     <div class="form-group col-md-12">
                         <label>Service Utilized</label>
                         <input type="text" class="form-control" name="service_utilized" id="service_utilized">
                     </div>

                     <div class="form-group col-md-6">
                         <div>
                             <label for="is_accredited_investor">is Accredited Investor ?</label>
                         </div>
                         <div>
                             <select class="form-control" id="is_accredited_investor" name="is_accredited_investor">
                                 <option value="1" selected>YES</option>
                                 <option value="0">No</option>
                             </select>
                         </div>
                     </div>
                     <div class="form-group col-md-6">
                         <div>
                             <label for="is_experience_in_financial_and_business">Is Experience In Financial And Business ?</label>
                         </div>
                         <div>
                             <select class="form-control" id="is_experience_in_financial_and_business" name="is_experience_in_financial_and_business">
                                 <option value="1" selected>YES</option>
                                 <option value="0">No</option>
                             </select>
                         </div>
                     </div>
                     <div class="form-group col-md-6">
                         <div>
                             <label for="is_accurate_and_complete_answers">Is Accurate And Complete Answers ?</label>
                         </div>
                         <div>
                             <select class="form-control" id="is_accurate_and_complete_answers" name="is_accurate_and_complete_answers">
                                 <option value="1" selected>YES</option>
                                 <option value="0">No</option>
                             </select>
                         </div>
                     </div>
                     <div class="form-group col-md-6">
                         <div>
                             <label for="is_seasoned_investor">Is Seasoned Investor ?</label>
                         </div>
                         <div>
                             <select class="form-control" id="is_seasoned_investor" name="is_seasoned_investor">
                                 <option value="1" selected>YES</option>
                                 <option value="0">No</option>
                             </select>
                         </div>
                     </div>
                     <div class="form-group col-md-6">
                         <div>
                             <label for="type">Type</label>
                         </div>
                         <div>
                             <select class="form-control" id="type" name="type">
                                 <option value="1" selected>INVESTER</option>
                                 <option value="2">INDUSTRIE</option>
                             </select>
                         </div>
                     </div>
                     <div class="form-group col-md-6">
                         <div>
                             <label for="status">Status :</label>
                         </div>
                         <div>
                             <select class="form-control" id="status" name="status">
                                 <option value="1" selected>ACTIVE</option>
                                 <option value="0">INACTIVE</option>
                             </select>
                         </div>
                     </div>
             </div>

             <div class="modal-footer">
                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                 <button type="submit" class="btn btn-primary" id="addUserBtn">Add</button>
             </div>
             </form>

         </div>
     </div>
 </div>





 <div class="modal fade" id="userviewModal">
     <div class="modal-dialog modal-lg">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title">User Info</h4>
             </div>
             <div class="modal-body" style="overflow-y:auto;" id="userviewstring">

             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
             </div>
         </div>
     </div>
 </div>
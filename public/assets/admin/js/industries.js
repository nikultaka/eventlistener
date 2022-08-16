$(document).ready(function () {

    readIndustriesData();
    $('#industriesModelBtn').click(function () {
        $('#industriesModal').modal('show');
        
    });

    $('#industriesModal').on('hidden.bs.modal', function () {
        $('#Industriesform')[0].reset();
        $('#submitindustriesbtn').html('Add');
        $('#hiid').val('');
        $('.print-error-msg').hide();
        $('#industriesModalLabel').html('Add Company');
        $('label[class="error"]').remove();
        $("#Industriesform").removeClass("was-validated");
        $('select').removeClass('error');
        $("#logoFilees").attr("src", "");
        $("#banner_imageFilees").attr("src", "");

    });

    // {
    //     required: function () {
    //         var id = $("#hiid").val();

    //         if (id!='') {
    //             return false;
    //         } else {
    //             return true;
    //         }
    //     },



    $('form[id="Industriesform"]').validate({

        rules: {
        username: 'required',
        name: 'required',
        //   logo: 'required',       
        progress_details: 'required',
        total_hours: 'required',
        },
        messages: {
          username: 'User is required',
          name: 'Industries Name is required',
          logo: 'Logo is required',
          progress_details: 'Progress Details is required',
          total_hours: 'Total Hours is required',

        },
        submitHandler: function(form) {
            // var formData = new FormData(form);
            var formData = new FormData($('#Industriesform')[0]);
            console.log(formData)
            showloader();
            $.ajax({
                type: 'POST',
                url: BASE_URL + '/' + ADMIN + '/industries/add',
                // method: "post",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (responce) {
                    var data = JSON.parse(responce);
                    if (data.status == 1) {
                        $('#hiid').val('');
                        $('#username').val('');
                        $('#name').val('');
                        $('#logo').val('');
                        $('#banner_image').val('');
                        $('#progress_details').val('');
                        $('#total_hours').val('');
                        $('#email').val('');
                        $('#website').val('');
                        $('#title').val('');
                        $('#city').val('');
                        $('#sector').val('');
                        $('#cto').val('');
                        $('#problemsolveing').val('');
                        $('#competitive_advantage').val('');
                        $('#traction').val('');
                        $('#description').val('');
                        $('#founddate').val('');
                        $('#annual_revenue').val('');
                        $('#revenue').val('');
                        $('#socialmedia').val('');
                        $('#industriesModal').modal('hide');
                        successMsg(data.msg);
                        readIndustriesData();
                        hideloader();
                    } else if (data.status == 0) {
                        printErrorMsg(data.error)
                        hideloader();
                    }
                    else {
                        errorMsg(data.msg);
                        hideloader();
                    }
                }
            });
        }
      });
});


function printErrorMsg(msg) {
    $(".print-error-msg").find("ul").html('');
    $(".print-error-msg").css('display', 'block');
    $.each(msg, function (key, value) {
        $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
    });
}

function readIndustriesData() {
    $('#industriesTable').DataTable({
        processing: true,
        "bDestroy": true,
        "bAutoWidth": false,
        serverSide: true,
        "ajax": {
            type: 'POST',
            url: BASE_URL + '/' + ADMIN + '/industries/datatable',
            data: {
                "_token": $("[name='_token']").val(),
            },

        },
        columns: [
            // { data: 'username', name: 'username' },
            { data: 'name', name: 'name' },
            // { data: 'logo', name: 'logo' },
            // { data: 'banner_image', name: 'banner_image' },
            { data: 'progress_details', name: 'progress_details' },
            { data: 'total_hours', name: 'total_hours' },
            { data: 'is_featured', name: 'is_featured' },
            { data: 'status', name: 'status' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
    });
}


function delete_industries(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            showloader();
            $.ajax({
                url: BASE_URL + '/' + ADMIN + '/industries/delete',
                type: 'POST',
                data: {
                    'id': id,
                    "_token": $("[name='_token']").val(),
                },
                success: function (response) {
                    var data = JSON.parse(response);
                    if (data.status == 1) {
                        successMsg(data.msg);
                        readIndustriesData();
                        hideloader();
                    } else {
                        errorMsg(data.msg);
                        hideloader();
                    }
                }
            });
        }
    });
}


function edit_industries(id) {
    showloader();
    $.ajax({
        url: BASE_URL + '/' + ADMIN + '/industries/edit',
        type: 'POST',
        data: {
            "_token": $("[name='_token']").val(),
            'id': id,
        },
        success: function (responce) {
            $('#hiid').val();
            var data = JSON.parse(responce);
            if (data.status == 1) {
                console.log(data)
                var result = data.user;
                var result2 = data.user2;
                hideloader();
                $('#industriesModal').modal('show');
                $('#submitindustriesbtn').html('Update');
                $('#industriesModalLabel').html('Update Company');
                $('#hiid').val(result.id);
                $('#hiiid').val(result.logo);
                $("#logoFilees").attr("src", $("#hiiid").val());
                $('#hibiid').val(result.banner_image);
                $("#banner_imageFilees").attr("src", $("#hibiid").val());
                $('#name').val(result.name);
                $('#username').val(result.user_id);
                $('#progress_details').val(result.progress_details);
                $('#total_hours').val(result.total_hours);

                $('#email').val(result2.email);
                $('#website').val(result2.website);
                $('#title').val(result2.title);
                $('#city').val(result2.city);
                $('#sector').val(result2.sector);
                $('#cto').val(result2.cto);
                $('#problemsolveing').val(result2.problemsolveing);
                $('#competitive_advantage').val(result2.competitive_advantage);
                $('#traction').val(result2.traction);
                $('#description').val(result2.description);
                $('#founddate').val(result2.founddate);
                $('#annual_revenue').val(result2.annual_revenue);
                $('#revenue').val(result2.revenue);
                $('#socialmedia').val(result2.socialmedia);
                $('select[name="mvp"]').val(result2.mvp).trigger("change");
                $('select[name="status"]').val(result2.status).trigger("change");

                $('select[name="is_featured"]').val(result.is_featured).trigger("change");
                $('select[name="status"]').val(result.status).trigger("change");
                
            }else{
                hideloader();
            }
        }
    });
}

$(document).ready(function () {
    
    readStoryData();
    $('#storyModelBtn').click(function () {
        $('#storyModal').modal('show');
    });


    $('#storyModal').on('hidden.bs.modal', function () {
        $('#Storyform')[0].reset();
        $('#submitstorybtn').html('Add');
        $('#hsid').val('');
        $('.print-error-msg').hide();
        $('#storyModalLabel').html('Add Story');
        $('label[class="error"]').remove();
        $("#Storyform").removeClass("was-validated");
        $('select').removeClass('error');
    });
    $('form[id="Storyform"]').validate({
        rules: {
            username: 'required',
            name: 'required',
        },
        messages: {
            username: 'User is required',
            name: 'Name is required',
        },
        submitHandler: function(form) {
            // var formData = new FormData(form);
            var formData = new FormData($('#Storyform')[0]);
            showloader();
            $.ajax({
                type: 'POST',
                url: BASE_URL + '/' + ADMIN + '/story/add',
                // method: "post",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (responce) {
                    var data = JSON.parse(responce);
                    if (data.status == 1) {
                        $('#hsid').val('');
                        $('#username').val('');
                        $('#name').val('');
                        $('#storyModal').modal('hide');
                        successMsg(data.msg);
                        readStoryData();
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

function readStoryData() {
    $('#storyTable').DataTable({
        processing: true,
        "bDestroy": true,
        "bAutoWidth": false,
        serverSide: true,
        "ajax": {
            type: 'POST',
            url: BASE_URL + '/' + ADMIN + '/story/datatable',
            data: {
                "_token": $("[name='_token']").val(),
            },

        },
        columns: [
            { data: 'username', name: 'username' },
            { data: 'name', name: 'name' },
            { data: 'status', name: 'status' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
    });
}

function delete_story(id) {
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
                url: BASE_URL + '/' + ADMIN + '/story/delete',
                type: 'POST',
                data: {
                    'id': id,
                    "_token": $("[name='_token']").val(),
                },
                success: function (response) {
                    var data = JSON.parse(response);
                    if (data.status == 1) {
                        successMsg(data.msg);
                        readStoryData();
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


function edit_story(id) {
    showloader();
    $.ajax({
        url: BASE_URL + '/' + ADMIN + '/story/edit',
        type: 'POST',
        data: {
            "_token": $("[name='_token']").val(),
            'id': id,
        },
        success: function (responce) {
            $('#hsid').val();
            var data = JSON.parse(responce);
            if (data.status == 1) {
                // console.log(data)
                var result = data.user;
                // console.log(result.user_id)
                // console.log(data.user)
                $('#storyModal').modal('show');
                $('#submitstorybtn').html('Update');
                $('#storyModalLabel').html('Update Story');
                $('#hsid').val(result.id);
                $('select[name="username"]').val(result.status).trigger("change");
                $('#name').val(result.name);
                $('#username').val(result.user_id);
                $('select[name="status"]').val(result.status).trigger("change");
                hideloader();
            }
        }
    });
}






$(document).ready(function () {
    readMessagesData();
    $('#messagesModelBtn').click(function () {
        $('#is_verified0').attr('checked',true)
        $('#is_read0').attr('checked',true)
        $('#is_follow0').attr('checked',true)
        $('#messagesModal').modal('show');
    });

    $('#messagesModal').on('hidden.bs.modal', function () {
        $('#Messagesform')[0].reset();
        $('#submitmessagesbtn').html('Add');
        $('#hmid').val('');
        $('.print-error-msg').hide();
        $('#messagesModalLabel').html('Add Messages');
        $('label[class="error"]').remove();
        $("#Messagesform").removeClass("was-validated");
        $('select').removeClass('error');
    });
    $('form[id="Messagesform"]').validate({
        rules: {
            message_type: 'required',
            message_text: 'required',
            is_read: 'required',
            is_verified: 'required',
            is_follow: 'required',

            
        },
        messages: {
            message_type: 'Messages Type is required',
            message_text: 'Messages Text is required',
            is_read: 'Is Read is required',
            is_verified: 'Is Verified is required',
            is_follow: 'Is Follow is required',

        },
        submitHandler: function(form) {
            showloader();
            $.ajax({
                type: 'POST',
                url: BASE_URL + '/' + ADMIN + '/messages/add',
                data: $('#Messagesform').serialize(),
                success: function (responce) {
                    var data = JSON.parse(responce);
                    if (data.status == 1) {
                        $('#hmid').val('');
                        $('#message_type').val('');
                        $('#message_text').val('');
                        $('#messagesModal').modal('hide');
                        successMsg(data.msg);
                        readMessagesData();
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

function readMessagesData() {
    $('#messagesTable').DataTable({
        processing: true,
        "bDestroy": true,
        "bAutoWidth": false,
        serverSide: true,
        "ajax": {
            type: 'POST',
            url: BASE_URL + '/' + ADMIN + '/messages/datatable',
            data: {
                "_token": $("[name='_token']").val(),
            },

        },
        columns: [
            { data: 'id', name: 'id' },
            // { data: 'parent_id', name: 'parent_id' },
            { data: 'username', name: 'user_id' },
            { data: 'communitycategory_name', name: 'community_category_id' },
            { data: 'message_type', name: 'message_type' },
            { data: 'message_text', name: 'message_text' },
            { data: 'is_read', name: 'is_read' },
            { data: 'is_verified', name: 'is_verified' },
            { data: 'is_follow', name: 'is_follow' },
            { data: 'status', name: 'status' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
    });
}


function delete_messages(id) {
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
                url: BASE_URL + '/' + ADMIN + '/messages/delete',
                type: 'POST',
                data: {
                    'id': id,
                    "_token": $("[name='_token']").val(),
                },
                success: function (response) {
                    var data = JSON.parse(response);
                    if (data.status == 1) {
                        successMsg(data.msg);
                        readMessagesData();
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


function edit_messages(id) {
    showloader();
    $.ajax({
        url: BASE_URL + '/' + ADMIN + '/messages/edit',
        type: 'POST',
        data: {
            "_token": $("[name='_token']").val(),
            'id': id,
        },
        success: function (responce) {
            $('#hmid').val();
            var data = JSON.parse(responce);
            if (data.status == 1) {
                var result = data.user;
                $('#messagesModal').modal('show');
                $('#submitmessagesbtn').html('Update');
                $('#messagesModalLabel').html('Update Messages');
                $('#hmid').val(result.id);
                $('select[name="parent_id"]').val(result.parent_id).trigger("change");
                $('select[name="user_id"]').val(result.user_id).trigger("change");
                $('select[name="community_category_id"]').val(result.community_category_id).trigger("change");
                $('#message_type').val(result.message_type);
                $('#message_text').val(result.message_text);
                if(result.is_read === 1){
                    $('#is_read1').attr('checked',true)
                    $('#is_read0').attr('checked',false)
                }else{
                    $('#is_read0').attr('checked',true)
                    $('#is_read1').attr('checked',false)
                }
                if(result.is_verified === 1){
                    $('#is_verified1').attr('checked',true)
                    $('#is_verified0').attr('checked',false)
                }else{
                    $('#is_verified0').attr('checked',true)
                    $('#is_verified1').attr('checked',false)
                }
                if(result.is_follow === 1){
                    $('#is_follow1').attr('checked',true)
                    $('#is_follow0').attr('checked',false)
                }else{
                    $('#is_follow0').attr('checked',true)
                    $('#is_follow1').attr('checked',false)
                }
                $('select[name="status"]').val(result.status).trigger("change");
                hideloader();
            }
        }
    });
}

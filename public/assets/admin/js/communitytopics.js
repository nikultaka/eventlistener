$(document).ready(function () {
    readCommunityTopicsData();
    $('#communitytopicsModelBtn').click(function () {
        $('#communitytopicsModal').modal('show');
    });

    $('#communitytopicsModal').on('hidden.bs.modal', function () {
        $('#CommunityTopicsform')[0].reset();
        $('#submitcommunitytopicsbtn').html('Add');
        $('#hctid').val('');
        $('.print-error-msg').hide();
        $('#communitytopicsModalLabel').html('Add CommunityTopics');
        $('label[class="error"]').remove();
        $("#CommunityTopicsform").removeClass("was-validated");
        $('select').removeClass('error');
    });
    $('form[id="CommunityTopicsform"]').validate({
        rules: {
          name: 'required',
        },
        messages: {
          name: 'Community Topic Name is required',
        },
        submitHandler: function(form) {
            showloader();
            $.ajax({
                type: 'POST',
                url: BASE_URL + '/' + ADMIN + '/communitytopics/add',
                data: $('#CommunityTopicsform').serialize(),
                success: function (responce) {
                    var data = JSON.parse(responce);
                    if (data.status == 1) {
                        $('#hctid').val('');
                        $('#name').val('');
                        $('#communitytopicsModal').modal('hide');
                        successMsg(data.msg);
                        readCommunityTopicsData();
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

function readCommunityTopicsData() {
    $('#communitytopicsTable').DataTable({
        processing: true,
        "bDestroy": true,
        "bAutoWidth": false,
        serverSide: true,
        "ajax": {
            type: 'POST',
            url: BASE_URL + '/' + ADMIN + '/communitytopics/datatable',
            data: {
                "_token": $("[name='_token']").val(),
            },
        },
        columns: [
            // { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'host', name: 'host' },
            { data: 'text_color', name: 'text_color' },
            { data: 'background_color', name: 'background_color' },
            { data: 'is_verify', name: 'is_verify' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
    });
}


function delete_communitytopics(id) {
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
                url: BASE_URL + '/' + ADMIN + '/communitytopics/delete',
                type: 'POST',
                data: {
                    'id': id,
                    "_token": $("[name='_token']").val(),
                },
                success: function (response) {
                    var data = JSON.parse(response);
                    if (data.status == 1) {
                        successMsg(data.msg);
                        readCommunityTopicsData();
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


function edit_communitytopics(id) {
    showloader();
    $.ajax({
        url: BASE_URL + '/' + ADMIN + '/communitytopics/edit',
        type: 'POST',
        data: {
            "_token": $("[name='_token']").val(),
            'id': id,
        },
        success: function (responce) {
            $('#hctid').val();
            var data = JSON.parse(responce);
            if (data.status == 1) {
                var result = data.user;
                $('#communitytopicsModal').modal('show');
                $('#submitcommunitytopicsbtn').html('Update');
                $('#communitytopicsModalLabel').html('Update Community Topics');
                $('#hctid').val(result.id);
                $('#name').val(result.name);
                $('#text_color').val(result.text_color);
                $('#background_color').val(result.background_color);
                $('select[name="is_verify"]').val(result.is_verify).trigger("change");
                hideloader();
            }
        }
    });
}


function Postandcommentlistmodel(id) {
    $('#postandcomment').modal('show');
    $('#divTable').hide();

    $('#postandcomment-table').DataTable({
        processing: true,
        "bDestroy": true,
        "bAutoWidth": false,
        serverSide: true,
        "ajax": {
            type: 'POST',
            url: BASE_URL + '/' + ADMIN + '/communitytopics/post',
            data: {
                "_token": $("[name='_token']").val(),
                'id': id,
            },
        },
        columns: [
            // { data: 'id', name: 'id' },
            // { data: 'post_image', name: 'post_image' },
            { data: 'post_message', name: 'post_message' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
    });
}

function commentlistmodel(postid , topicid) {
    // $('#commentview').modal('show');
    $('#divTable').show();

    $('#postandcomment').on('hidden.bs.modal', function () {
        $('#divTable').hide();
    });

    $('#comment-table').DataTable({
        processing: true,
        "bDestroy": true,
        "bAutoWidth": false,
        serverSide: true,
        "ajax": {
            type: 'POST',
            url: BASE_URL + '/' + ADMIN + '/communitytopics/comment',
            data: {
                "_token": $("[name='_token']").val(),
                'topicid': topicid,
                'postid': postid,
            },
        },
        columns: [
            // { data: 'id', name: 'id' },
            // { data: 'post_image', name: 'post_image' },
            { data: 'comment_message', name: 'comment_message' },
            // { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
    }); 
}

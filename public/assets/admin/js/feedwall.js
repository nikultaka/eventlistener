$(document).ready(function () {
    readFeedwallData();
    $('#feedwallModelBtn').click(function () {
        $('#feedwallModal').modal('show');
        
    });

    $('#feedwallModal').on('hidden.bs.modal', function () {
        $('#Feedwallform')[0].reset();
        $('#submitfeedwallbtn').html('Add');
        $('#hfwid').val('');
        $('.print-error-msg').hide();
        $('#feedwallModalLabel').html('Add Feedwall');
        $('label[class="error"]').remove();
        $("#Feedwallform").removeClass("was-validated");
        $('select').removeClass('error');
        $("#feedwallFilees").attr("src", "");

    });
    $('form[id="Feedwallform"]').validate({
        rules: {
          name: 'required',
        //   feedwallimage: 'required',
          category: 'required',
        },
        messages: {
          name: 'Feedwall Name is required',
          feedwallimage: 'Image is required',
          category: 'Category Name is required',
        },
        submitHandler: function(form) {
            // var formData = new FormData(form);
            var formData = new FormData($('#Feedwallform')[0]);
            console.log(formData)
            showloader();
            $.ajax({
                type: 'POST',
                url: BASE_URL + '/' + ADMIN + '/feedwall/add',
                // method: "post",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (responce) {
                    var data = JSON.parse(responce);
                    if (data.status == 1) {
                        $('#hfwid').val('');
                        $('#name').val('');
                        $('#category').val('');
                        $('#feedwallimage').val('');
                        $('#feedwallModal').modal('hide');
                        successMsg(data.msg);
                        readFeedwallData();
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

function readFeedwallData() {
    $('#feedwallTable').DataTable({
        processing: true,
        "bDestroy": true,
        "bAutoWidth": false,
        serverSide: true,
        "ajax": {
            type: 'POST',
            url: BASE_URL + '/' + ADMIN + '/feedwall/datatable',
            data: {
                "_token": $("[name='_token']").val(),
            },

        },
        columns: [
            // { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'category_name', name: 'category_name' },
            { data: 'image', name: 'image' },
            { data: 'status', name: 'status' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
    });
}


function delete_feedwall(id) {
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
                url: BASE_URL + '/' + ADMIN + '/feedwall/delete',
                type: 'POST',
                data: {
                    'id': id,
                    "_token": $("[name='_token']").val(),
                },
                success: function (response) {
                    var data = JSON.parse(response);
                    if (data.status == 1) {
                        successMsg(data.msg);
                        readFeedwallData();
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


function edit_feedwall(id) {
    showloader();
    $.ajax({
        url: BASE_URL + '/' + ADMIN + '/feedwall/edit',
        type: 'POST',
        data: {
            "_token": $("[name='_token']").val(),
            'id': id,
        },
        success: function (responce) {
            $('#hfwid').val();
            var data = JSON.parse(responce);
            if (data.status == 1) {
                console.log(data)
                var result = data.user;
                $('#feedwallModal').modal('show');
                $('#submitfeedwallbtn').html('Update');
                $('#feedwallModalLabel').html('Update Feedwall');
                $('#hfwid').val(result.id);
                $('#hifid').val(result.image);
                $("#feedwallFilees").attr("src", $("#hifid").val());
                $('#name').val(result.name);
                $('#category').val(result.category_id);
                $('select[name="status"]').val(result.status).trigger("change");
                hideloader();
            }
        }
    });
}

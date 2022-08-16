$(document).ready(function () {
    readCategoryData();
    $('#categoryModelBtn').click(function () {
        $('#categoryModal').modal('show');
    });

    $('#categoryModal').on('hidden.bs.modal', function () {
        $('#Categoryform')[0].reset();
        $('#submitcategorybtn').html('Add');
        $('#hcid').val('');
        $('.print-error-msg').hide();
        $('#categoryModalLabel').html('Add Category');
        $('label[class="error"]').remove();
        $("#Categoryform").removeClass("was-validated");
        $('select').removeClass('error');
    });
    
    $('form[id="Categoryform"]').validate({
        rules: {
          name: 'required',
        },
        messages: {
          name: 'Category Name is required',
        },
        submitHandler: function(form) {
            showloader();
            $.ajax({
                type: 'POST',
                url: BASE_URL + '/' + ADMIN + '/category/add',
                data: $('#Categoryform').serialize(),
                success: function (responce) {
                    var data = JSON.parse(responce);
                    if (data.status == 1) {
                        $('#hcid').val('');
                        $('#name').val('');
                        $('#categoryModal').modal('hide');
                        successMsg(data.msg);
                        readCategoryData();
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

function readCategoryData() {
    $('#categoryTable').DataTable({
        processing: true,
        "bDestroy": true,
        "bAutoWidth": false,
        serverSide: false,
        //orderable: true,
        aaSorting: [[0, "asc"]],
        "ajax": {
            type: 'POST',
            url: BASE_URL + '/' + ADMIN + '/category/datatable',
            data: {
                "_token": $("[name='_token']").val(),
            },

        },
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'status', name: 'status' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
    });
}


function delete_category(id) {
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
                url: BASE_URL + '/' + ADMIN + '/category/delete',
                type: 'POST',
                data: {
                    'id': id,
                    "_token": $("[name='_token']").val(),
                },
                success: function (response) {
                    var data = JSON.parse(response);
                    if (data.status == 1) {
                        successMsg(data.msg);
                        readCategoryData();
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


function edit_category(id) {
    showloader();
    $.ajax({
        url: BASE_URL + '/' + ADMIN + '/category/edit',
        type: 'POST',
        data: {
            "_token": $("[name='_token']").val(),
            'id': id,
        },
        success: function (responce) {
            $('#hcid').val();
            var data = JSON.parse(responce);
            if (data.status == 1) {
                var result = data.user;
                $('#categoryModal').modal('show');
                $('#submitcategorybtn').html('Update');
                $('#categoryModalLabel').html('Update Category');
                $('#hcid').val(result.id);
                $('#name').val(result.name);
                $('select[name="status"]').val(result.status).trigger("change");
                hideloader();
            }
        }
    });
}

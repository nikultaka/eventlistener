$(document).ready(function () {
    readSubCategoryData();
    $('#subcategoryModelBtn').click(function () {
        $('#subcategoryModal').modal('show');
    });

    $('#subcategoryModal').on('hidden.bs.modal', function () {
        $('#SubCategoryform')[0].reset();
        $('#submitsubcategorybtn').html('Add');
        $('#hscid').val('');
        $('.print-error-msg').hide();
        $('#subcategoryModalLabel').html('Add SubCategory');
        $('label[class="error"]').remove();
        $("#SubCategoryform").removeClass("was-validated");
        $('select').removeClass('error');
    });
    $('form[id="SubCategoryform"]').validate({
        rules: {
          name: 'required',
        },
        messages: {
          name: 'SubCategory Name is required',
        },
        submitHandler: function(form) {
            showloader();
            $.ajax({
                type: 'POST',
                url: BASE_URL + '/' + ADMIN + '/subcategory/add',
                data: $('#SubCategoryform').serialize(),
                success: function (responce) {
                    var data = JSON.parse(responce);
                    if (data.status == 1) {
                        $('#hscid').val('');
                        $('#name').val('');
                        $('#subcategoryModal').modal('hide');
                        successMsg(data.msg);
                        readSubCategoryData();
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

function readSubCategoryData() {
    $('#subcategoryTable').DataTable({
        processing: true,
        "bDestroy": true,
        "bAutoWidth": false,
        serverSide: true,
        "ajax": {
            type: 'POST',
            url: BASE_URL + '/' + ADMIN + '/subcategory/datatable',
            data: {
                "_token": $("[name='_token']").val(),
            },

        },
        columns: [
            { data: 'category_name', name: 'category_name' },
            { data: 'name', name: 'name' },
            { data: 'status', name: 'status' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
    });
}


function delete_subcategory(id) {
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
                url: BASE_URL + '/' + ADMIN + '/subcategory/delete',
                type: 'POST',
                data: {
                    'id': id,
                    "_token": $("[name='_token']").val(),
                },
                success: function (response) {
                    var data = JSON.parse(response);
                    if (data.status == 1) {
                        successMsg(data.msg);
                        readSubCategoryData();
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


function edit_subcategory(id) {
    showloader();
    $.ajax({
        url: BASE_URL + '/' + ADMIN + '/subcategory/edit',
        type: 'POST',
        data: {
            "_token": $("[name='_token']").val(),
            'id': id,
        },
        success: function (responce) {
            $('#hscid').val();
            var data = JSON.parse(responce);
            if (data.status == 1) {
                var result = data.user;
                $('#subcategoryModal').modal('show');
                $('#submitsubcategorybtn').html('Update');
                $('#subcategoryModalLabel').html('Update SubCategory');
                $('#hscid').val(result.id);
                $('#category').val(result.category_id);
                $('#name').val(result.name);
                $('select[name="status"]').val(result.status).trigger("change");
                hideloader();
            }
        }
    });
}

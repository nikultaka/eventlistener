$(document).ready(function () {
    readDiscoverData();
    $("#discoverModelBtn").click(function () {
        $("#discoverModal").modal("show");
    });

    $("#discoverModal").on("hidden.bs.modal", function () {
        $("#Discoverform")[0].reset();
        $("#submitdiscoverbtn").html("Add");
        $("#hdid").val("");
        $(".print-error-msg").hide();
        $("#discoverModalLabel").html("Add Discover");
        $('label[class="error"]').remove();
        $("#Discoverform").removeClass("was-validated");
        $("select").removeClass("error");
    });
    $('form[id="Discoverform"]').validate({
        rules: {
            name: "required",
            category: "required",
            subcategory: "required",
            description: "required",
            type_of_card: "required",
            is_blog: "required",
        },
        messages: {
            name: "Name is required",
            description: "Description is required",
            category: "Category Name Is required",
            subcategory: "SubCategory Name Is required",
            type_of_card: " Type Of Card Is required",
            is_blog: "Is Blog required",
        },
        submitHandler: function (form) {
            showloader();
            $.ajax({
                type: "POST",
                url: BASE_URL + "/" + ADMIN + "/discover/add",
                data: $("#Discoverform").serialize(),
                success: function (responce) {
                    var data = JSON.parse(responce);
                    if (data.status == 1) {
                        $("#hdid").val("");
                        $("#name").val("");
                        $("#description").val("");
                        $("#discoverModal").modal("hide");
                        successMsg(data.msg);
                        readDiscoverData();
                        hideloader();
                    } else if (data.status == 0) {
                        printErrorMsg(data.error);
                        hideloader();
                    } else {
                        errorMsg(data.msg);
                        hideloader();
                    }
                },
            });
        },
    });
});

function printErrorMsg(msg) {
    $(".print-error-msg").find("ul").html("");
    $(".print-error-msg").css("display", "block");
    $.each(msg, function (key, value) {
        $(".print-error-msg")
            .find("ul")
            .append("<li>" + value + "</li>");
    });
}

function readDiscoverData() {
    $("#discoverTable").DataTable({
        processing: true,
        bDestroy: true,
        bAutoWidth: false,
        serverSide: true,
        ajax: {
            type: "POST",
            url: BASE_URL + "/" + ADMIN + "/discover/datatable",
            data: {
                _token: $("[name='_token']").val(),
            },
        },
        columns: [
            { data: "name", name: "name" },
            // { data: 'description', name: 'description' },
            { data: "category_name", name: "category_name" },
            { data: "type_of_card", name: "type_of_card" },
            { data: "is_featured", name: "is_featured" },
            { data: "status", name: "status" },
            {
                data: "action",
                name: "action",
                orderable: false,
                searchable: false,
            },
        ],
    });
}

function delete_discover(id) {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            showloader();
            $.ajax({
                url: BASE_URL + "/" + ADMIN + "/discover/delete",
                type: "POST",
                data: {
                    id: id,
                    _token: $("[name='_token']").val(),
                },
                success: function (response) {
                    var data = JSON.parse(response);
                    if (data.status == 1) {
                        successMsg(data.msg);
                        readDiscoverData();
                        hideloader();
                    } else {
                        errorMsg(data.msg);
                        hideloader();
                    }
                },
            });
        }
    });
}

function edit_discover(id) {
    showloader();
    $.ajax({
        url: BASE_URL + "/" + ADMIN + "/discover/edit",
        type: "POST",
        data: {
            _token: $("[name='_token']").val(),
            id: id,
        },
        success: function (responce) {
            $("#hdid").val();
            var data = JSON.parse(responce);
            if (data.status == 1) {
                var result = data.user;
                console.log(result);
                $("#discoverModal").modal("show");
                $("#submitdiscoverbtn").html("Update");
                $("#discoverModalLabel").html("Update Discover");
                $("#hdid").val(result.id);
                $("#name").val(result.name);
                $("#description").val(result.description);
                $("#category").val(result.category_id);
                if (result.category_id != "" && result.category_id != null) {
                    getSubCategoryDataedit(result.subcategory_id);
                    $("#subcategory").val(result.subcategory_id);
                }
                $("#text_color").val(result.text_color);
                $("#background_color").val(result.background_color);
                $('select[name="type_of_card"]')
                    .val(result.type_of_card)
                    .trigger("change");
                $('select[name="is_blog"]')
                    .val(result.is_blog)
                    .trigger("change");
                $('select[name="is_featured"]')
                    .val(result.is_featured)
                    .trigger("change");
                $('select[name="status"]').val(result.status).trigger("change");
                hideloader();
            }
        },
    });
}

function getSubCategoryData(id, subid = null) {
    $.ajax({
        url: BASE_URL + "/" + ADMIN + "/discover/subcategory_id",
        type: "POST",
        data: {
            _token: $("[name='_token']").val(),
            id: id,
        },
        success: function (responce) {
            var data = JSON.parse(responce);
            if (data.status == 1) {
                var subcategory = data.subcategory;

                var subcategoryString =
                    '<option value="0"  class="custom-select"> - - - - - - Select SubCategory - - - - - - </option>';

                $.each(subcategory, function (index, value) {
                    subcategoryString +=
                        '<option id="subcategory" value="' +
                        value["id"] +
                        '">' +
                        value["name"] +
                        "</option>";
                });

                $("#subcategory").html(subcategoryString);
            } else {
                var subcategoryString =
                    '<option value="0"  class="custom-select"> - - - - - - Select SubCategory - - - - - - </option>';
                $("#subcategory").html(subcategoryString);
            }
        },
    });
}

$("#category").on("change", function () {
    var id = $(this).val();
    getSubCategoryData(id);
});

function getSubCategoryDataedit(id) {
    $.ajax({
        url: BASE_URL + "/" + ADMIN + "/discover/editsubcategory_id",
        type: "POST",
        data: {
            _token: $("[name='_token']").val(),
            id: id,
        },
        success: function (responce) {
            var data = JSON.parse(responce);
            if (data.status == 1) {
                var subcategoryid = data.subcategory.id;
                var subcategoryname = data.subcategory.name;
                subcategoryString =
                    '<option id="subcategory" value="' +
                    subcategoryid +
                    '">' +
                    subcategoryname +
                    "</option>";

                $("#subcategory").html(subcategoryString);
            }
        },
    });
}

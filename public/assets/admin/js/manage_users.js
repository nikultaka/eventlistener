$(document).ready(function () {
    userDataTable();
    $("#addNewUser").on("click", function () {
        $("#userModal").modal("show");
    });
    $("#userModal").on("hidden.bs.modal", function () {
        $("#addNewUserForm")[0].reset();
        $("#userHdnID").val("");
        $("#profileimage").attr("src", "");
        $("#hidprofile_pic").val("");
        $("#password").rules("add", "required");
        $("#email").rules("add", "required");
        $("#email").css("cursor", "text");
        $("#email").prop("readonly", false);
        $(".modal-title").html("Add new user");
        $("#addUserBtn").html("Add");
    });

    $('form[id="addNewUserForm"]').validate({
        rules: {
            firstname: "required",
            lastname: "required",
            username: "required",
            email: {
                required: true,
                email: true,
                remote: {
                    url: BASE_URL + "/" + ADMIN + "/email/exist/or/not",
                    type: "get",
                    data: {
                        userHdnID: function () {
                            return $("#userHdnID").val();
                        },
                    },
                },
            },
            password: {
                required: true,
                minlength: 6,
            },
            phone: {
                required: true,
                minlength: 10,
                maxlength: 10,
            },
            type: "required",
            status: "required",
            is_seasoned_investor: "required",
            is_accurate_and_complete_answers: "required",
            is_experience_in_financial_and_business: "required",
            is_accredited_investor: "required",
            type: "required",
        },
        messages: {
            firstname: "First Name is required",
            lastname: "Last Name is required",
            username: "User Name is required",
            email: {
                required: "Password is required",
                email: "Enter valid email",
                remote: "That email address is already exist.",
            },
            password: {
                required: "Password is required",
                minlength: "Password must be at least 6 characters long",
            },
            phone: {
                required: "This field is required",
                minlength: "number must be 10 characters long",
                maxlength: "number must be 10 characters long",
            },
            status: "This field is required",
        },
        submitHandler: function (form) {
            var formData = new FormData($("#addNewUserForm")[0]);

            showloader();
            $.ajax({
                type: "POST",
                url: BASE_URL + "/" + ADMIN + "/manage/users/save",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (responce) {
                    var data = JSON.parse(responce);
                    if (data.status == 1) {
                        $("#hidprofile_pic").val("");
                        $("#firstname").val("");
                        $("#profileimage").val("");
                        $("#lastname").val("");
                        $("#username").val("");
                        $("#dob").val("");
                        $("#email").val("");
                        $("#profile_pic").val("");
                        $("#password").val("");
                        $("#phone").val("");
                        $("#networth").val("");
                        $("#grossincome").val("");
                        $("#service_utilized").val("");
                        $("#is_accredited_investor").val("");
                        $("#is_experience_in_financial_and_business").val("");
                        $("#is_accurate_and_complete_answers").val("");
                        $("#is_seasoned_investor").val("");
                        $("#type").val("");
                        $("#status").val("");
                        $("#userModal").modal("hide");
                        successMsg(data.msg);
                        hideloader();
                        userDataTable();
                    } else if (data.status == 0) {
                        printErrorMsg(data.msg);
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

function userDataTable() {
    $("#userDataTable").DataTable({
        processing: true,
        serverSide: true,
        bDestroy: true,
        bAutoWidth: false,
        ajax: {
            type: "POST",
            url: BASE_URL + "/" + ADMIN + "/manage/users/dataTable",
            data: {
                _token: $("[name='_token']").val(),
            },
        },
        columns: [
            { data: "firstname", name: "firstname" },
            { data: "lastname", name: "lastname" },
            { data: "username", name: "username" },
            { data: "profile_pic", name: "profile_pic" },
            { data: "email", name: "email" },
            { data: "phone", name: "phone" },
            { data: "type", name: "type" },
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

$(document).on("click", ".deleteUser", function () {
    var deleteID = $(this).data("id");
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
                url: BASE_URL + "/" + ADMIN + "/manage/users/delete",
                type: "POST",
                data: {
                    id: deleteID,
                    _token: $("[name='_token']").val(),
                },
                success: function (response) {
                    var data = JSON.parse(response);
                    if (data.status == 1) {
                        successMsg(data.msg);
                        hideloader();
                        userDataTable();
                    } else {
                        errorMsg(data.msg);
                        hideloader();
                    }
                },
            });
        }
    });
});

$(document).on("click", ".editUser", function () {
    var deleteID = $(this).data("id");
    $.ajax({
        url: BASE_URL + "/" + ADMIN + "/manage/users/edit",
        type: "POST",
        data: {
            id: deleteID,
            _token: $("[name='_token']").val(),
        },
        success: function (response) {
            $("#addUserBtn").html("Update");
            $(".modal-title").html("Update User Data");
            $("#password").prop("required", false);
            $("#email").prop("required", false);
            var data = JSON.parse(response);
            if (data.status == 1) {
                var result = data.userData;
                var result2 = data.userData2;
                $("#userHdnID").val(result.id);
                var hid = $("#userHdnID").val();
                if (hid != "" && hid != null) {
                    $("#password").rules("remove", "required");
                    $("#email").rules("remove", "required");
                }
                $("#firstname").val(result.firstname);
                $("#lastname").val(result.lastname);
                $("#username").val(result.username);
                $("#dob").val(result.dob);

                $("#hidprofile_pic").val(result.profile_pic);
                $("#profileimage").attr("src", $("#hidprofile_pic").val());

                $("#email").val(result.email).prop("readonly", true);
                $("#email").css("cursor", "not-allowed");
                $("#phone").val(result.phone);

                if (result2 != null && result2 != "") {
                    $("#networth").val(result2.networth);
                    $("#grossincome").val(result2.grossincome);
                    $("#service_utilized").val(result2.service_utilized);
                    $('select[name="is_accredited_investor"]')
                        .val(result2.is_accredited_investor)
                        .trigger("change");
                    $('select[name="is_experience_in_financial_and_business"]')
                        .val(result2.is_experience_in_financial_and_business)
                        .trigger("change");
                    $('select[name="is_accurate_and_complete_answers"]')
                        .val(result2.is_accurate_and_complete_answers)
                        .trigger("change");
                    $('select[name="is_seasoned_investor"]')
                        .val(result2.is_seasoned_investor)
                        .trigger("change");
                }

                $('select[name="type"]').val(result.type).trigger("change");
                $('select[name="status"]').val(result.status).trigger("change");
                $("#userModal").modal("show");
            }
        },
    });
});

$(document).on("click", ".viewUser", function () {
    $("#userviewModal").modal("show");
    var ID = $(this).data("id");
    showloader();
    $.ajax({
        url: BASE_URL + "/" + ADMIN + "/manage/users/view",
        type: "POST",
        data: {
            id: ID,
            _token: $("[name='_token']").val(),
        },
        success: function (response) {
            var data = JSON.parse(response);
            if (data.status == 1) {
                $("#userviewstring").html("");
                $("#userviewstring").html(data.userview_string);
                successMsg(data.msg);
                hideloader();
            } else {
                errorMsg(data.msg);
                hideloader();
            }
        },
    });
});

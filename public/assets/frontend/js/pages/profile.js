// Class definition
var KTFormControls = function() {
    // Private functions

    var editeProfile = function() {
        $("#editProfile").validate({
            // define validation rules
            rules: {
                first_name: {
                    required: true,
                    digits: false,
                    lettersonly: true
                },
                last_name: {
                    required: true,
                    lettersonly: true
                },
                // company_email: {
                //     required: true,
                //     email: true,
                //     minlength: 10
                // },
                // company_title: {
                //     required: true,
                //     lettersonly: true
                // },
                phone: {
                    required: true,
                    digits: true,
                    minlength: 10,
                    maxlength: 10
                },
                date_of_birth: {
                    required: true
                },
                user_name: {
                    required: true
                },
                email: {
                    required: true,
                    email: true,
                    minlength: 10
                },
                current_password: {
                    required: function(element) {
                        return $("#new_password").val().length > 0;
                    },
                },
                new_password: {
                    required: function(element) {
                        return $("#current_password").val().length > 0;
                    },
                    minlength: 6

                },
                confirm_passwords: {
                    required: function(element) {
                        return $("#current_password").val().length > 0;
                    },
                    minlength: 6,
                    equalTo: "#new_password",
                },
                authphone: {
                    required: function(element) {
                        return $("#authphone").val().length > 0;
                    },
                    digits: true,
                    minlength: 10,
                    maxlength: 10
                }
            },

            messages: {
                phone: {
                    required: 'Please specify a valid phone number',
                    digits: 'Phone number must be number',
                    minlength: 'Phone number must be 10 digits',
                    maxlength: 'Phone number must be 10 digits'
                },
                confirm_passwords: {
                    equalTo: "Your password confirmation doesn't match",
                    required: "Enter password confirmation"
                },
                authphone: {
                    required: 'Please specify a valid phone number',
                    digits: 'Phone number must be number',
                    minlength: 'Phone number must be 10 digits',
                    maxlength: 'Phone number must be 10 digits'
                },
            },
            //display error alert on form submit  
            invalidHandler: function(event, validator) {
                validator.focusInvalid();
                event.preventDefault();
            },

            submitHandler: function(form) {
                $("#edit_save_btn").addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', true);
                var dataString = new FormData(form);
                $.ajax({
                    url: BASE_URL + '/profile/save-profile',
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
                    },
                    data: dataString,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        response = JSON.parse(response);
                        if (!response.status) {
                            setTimeout(function() {
                                $("#edit_save_btn").removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
                                $("html").animate({ scrollTop: 0 }, "slow");
                                errorMsg(response.msg);
                            }, 2000);
                        } else if (response.status) {
                            setTimeout(function() {
                                $("#edit_save_btn").removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
                                successMsg(response.msg);
                                $("html").animate({ scrollTop: 0 }, "slow");
                                setTimeout(function() {
                                    if (response.redirect) {
                                        window.location.replace(response.redirect);
                                    } else if (response.reload) {
                                        window.location.reload();
                                    }
                                }, 2000);
                            }, 2000);
                        }
                    }
                });
                return false;
            }
        });
    }

    var submitFeedBack = function() {
        $("#submitFeedback").validate({
            // define validation rules
            rules: {
                feedback: {
                    required: true,

                },
            },

            //display error alert on form submit  
            invalidHandler: function(event, validator) {
                validator.focusInvalid();
                event.preventDefault();
            },

            submitHandler: function(form) {
                if ($('#feedbackItems').val().length == 0) {
                    $('#subject-matter').click();
                    errorMsg("Please select the feedback subject.");
                } else {
                    $("#feedback_save_btn").addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', true);
                    var dataString = new FormData(form);
                    $.ajax({
                        url: BASE_URL + '/profile/feedback',
                        type: "POST",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
                        },
                        data: dataString,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            response = JSON.parse(response);
                            if (!response.status) {
                                setTimeout(function() {
                                    $("#feedback_save_btn").removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
                                    $("html").animate({ scrollTop: 0 }, "slow");
                                    errorMsg(response.msg);
                                }, 2000);
                            } else if (response.status) {
                                setTimeout(function() {
                                    $("#feedback_save_btn").removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
                                    successMsg(response.msg);
                                    $("html").animate({ scrollTop: 0 }, "slow");
                                    setTimeout(function() {
                                        if (response.redirect) {
                                            window.location.replace(response.redirect);
                                        } else if (response.reload) {
                                            window.location.reload();
                                        }
                                    }, 2000);
                                }, 2000);
                            }
                        }
                    });
                }

                return false;
            }
        });
    }

    return {
        // public functions
        init: function() {
            editeProfile();
            submitFeedBack();
        }
    };
}();

jQuery(document).ready(function() {
    KTFormControls.init();
    $(".nav-item").click(function() {
        $('#pageName').html($(this).data('id'));
    });

    $('.feedback-item').change(function() {
        const feedback_id = $(this).val();
        if (this.checked) {
            var val = $("#feedbackItems").val();
            if (val == "") {
                $("#feedbackItems").val(feedback_id);
            } else {
                var test = val.split(',')
                test.push(feedback_id)
                var numbersString = test.join(',');
                $("#feedbackItems").val(numbersString);
            }
        } else {
            var val = $("#feedbackItems").val();
            var test = val.split(',')
            test = $.grep(test, function(value) {
                return value != feedback_id;
            });
            console.log(test);
            var numbersString = test.join(',');
            $("#feedbackItems").val(numbersString);
        }
    });
});
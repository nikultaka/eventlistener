var KTFormControls = function() {
    var createhighlight = function() {
        $("#Createhighlight").validate({
            // define validation rules
            rules: {
                highlight_title: {
                    required: true,
                },
                highlight_date: {
                    required: true,
                },
                highlight_desc: {
                    required: true,
                },
            },
            invalidHandler: function(event, validator) {
                validator.focusInvalid();
                event.preventDefault();
            },
            submitHandler: function(form) {
                var dataString = new FormData(form);
                $("#btnhighlight").addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--sucsses').attr('disabled', true);
                if ($(`#highlight_id`).val().length != 0) {
                    $.ajax({
                        url: BASE_URL + '/status/update',
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
                                    $("#btnhighlight").removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--sucsses').attr('disabled', false);
                                    $("html").animate({ scrollTop: 0 }, "slow");
                                    errorMsg(response.msg);
                                }, 2000);
                            } else if (response.status) {
                                setTimeout(function() {
                                    $("#btnhighlight").removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--sucsses').attr('disabled', false);
                                    successMsg(response.msg);
                                    var count = $(`[data-collect=${dataString.get('highlight_id')}]`).data('count');
                                    if (count == 0) {
                                        count = 1;
                                    }
                                    if (dataString.get('highlight_title').length > 40) {
                                        title = dataString.get('highlight_title').substring(0, 40) + '...';
                                    } else {
                                        title = dataString.get('highlight_title');
                                    }
                                    const html = `<div class="information-box" data-content=${dataString.get('highlight_id')}>
                                <div class="row">
                                    <div class="col-sm-1 col-md-1">
                                        <span class="text">${('0' + parseInt(count)).slice(-2)}</span>
                                    </div>
                                    <div class="col-sm-1 col-md-9">
                                        <span class="text">${title}</span>
                                    </div>
                                    <div class="col-sm-1 col-md-1 deletedata" data-deletecount = ${dataString.get('highlight_id')}>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                                            class="bi bi-trash" viewBox="0 0 16 16">
                                                            <path
                                                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                            <path fill-rule="evenodd"
                                                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                        </svg>
                                                    </div>
                                    <div class="col-sm-1 col-md-1 edit-highlight editdata" data-editcount = ${dataString.get('highlight_id')}>
                                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="48" height="48"
                                            viewBox="0 0 48 48" style=" fill:#000000; height:20px; ">
                                            <path
                                                d="M 36 5.0097656 C 34.205301 5.0097656 32.410791 5.6901377 31.050781 7.0507812 L 8.9160156 29.183594 C 8.4960384 29.603571 8.1884588 30.12585 8.0253906 30.699219 L 5.0585938 41.087891 A 1.50015 1.50015 0 0 0 6.9121094 42.941406 L 17.302734 39.974609 A 1.50015 1.50015 0 0 0 17.304688 39.972656 C 17.874212 39.808939 18.39521 39.50518 18.816406 39.083984 L 40.949219 16.949219 C 43.670344 14.228094 43.670344 9.7719064 40.949219 7.0507812 C 39.589209 5.6901377 37.794699 5.0097656 36 5.0097656 z M 36 7.9921875 C 37.020801 7.9921875 38.040182 8.3855186 38.826172 9.171875 A 1.50015 1.50015 0 0 0 38.828125 9.171875 C 40.403 10.74675 40.403 13.25325 38.828125 14.828125 L 36.888672 16.767578 L 31.232422 11.111328 L 33.171875 9.171875 C 33.957865 8.3855186 34.979199 7.9921875 36 7.9921875 z M 29.111328 13.232422 L 34.767578 18.888672 L 16.693359 36.962891 C 16.634729 37.021121 16.560472 37.065723 16.476562 37.089844 L 8.6835938 39.316406 L 10.910156 31.521484 A 1.50015 1.50015 0 0 0 10.910156 31.519531 C 10.933086 31.438901 10.975086 31.366709 11.037109 31.304688 L 29.111328 13.232422 z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                          </div>`;
                                    $(`[ data-main-title="highlight"]`).html('Create');
                                    $('#highlight_id').val('');
                                    $(`[data-content=${dataString.get('highlight_id')}]`).remove();
                                    $(`[data-collect=${dataString.get('highlight_id')}]`).append(html);
                                    $(`#Createhighlight`)[0].reset();
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
                } else {
                    $.ajax({
                        url: BASE_URL + '/status/submit',
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
                                    $("#btnhighlight").removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--sucsses').attr('disabled', false);
                                    $("html").animate({ scrollTop: 0 }, "slow");
                                    errorMsg(response.msg);
                                }, 2000);
                            } else if (response.status) {
                                setTimeout(function() {
                                    $("#btnhighlight").removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--sucsses').attr('disabled', false);
                                    successMsg(response.msg);
                                    if (response.id) {
                                        var count = $(`.data-highlight`).length;
                                        if (count == 0) {
                                            count = 1;
                                        } else {
                                            count = count + 1;
                                        }
                                        if (dataString.get('highlight_title').length > 40) {
                                            title = dataString.get('highlight_title').substring(0, 40) + '...';
                                        } else {
                                            title = dataString.get('highlight_title');
                                        }
                                        const html = `<div class="col-md-12 mb-4 data-highlight" data-count="${count}" data-collect=${response.id}>
                            <div class="information-box" data-content=${response.id}>
                                <div class="row">
                                    <div class="col-sm-1 col-md-1">
                                        <span class="text">${('0' + parseInt(count)).slice(-2)}</span>
                                    </div>
                                    <div class="col-sm-1 col-md-9">
                                        <span class="text">${title}</span>
                                    </div>
                                    <div class="col-sm-1 col-md-1 deletedata" data-deletecount = ${response.id}>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                                            class="bi bi-trash" viewBox="0 0 16 16">
                                                            <path
                                                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                            <path fill-rule="evenodd"
                                                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                        </svg>
                                                    </div>
                                    <div class="col-sm-1 col-md-1 edit-highlight editdata" data-editcount = ${response.id}>
                                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="48" height="48"
                                            viewBox="0 0 48 48" style=" fill:#000000; height:20px; ">
                                            <path
                                                d="M 36 5.0097656 C 34.205301 5.0097656 32.410791 5.6901377 31.050781 7.0507812 L 8.9160156 29.183594 C 8.4960384 29.603571 8.1884588 30.12585 8.0253906 30.699219 L 5.0585938 41.087891 A 1.50015 1.50015 0 0 0 6.9121094 42.941406 L 17.302734 39.974609 A 1.50015 1.50015 0 0 0 17.304688 39.972656 C 17.874212 39.808939 18.39521 39.50518 18.816406 39.083984 L 40.949219 16.949219 C 43.670344 14.228094 43.670344 9.7719064 40.949219 7.0507812 C 39.589209 5.6901377 37.794699 5.0097656 36 5.0097656 z M 36 7.9921875 C 37.020801 7.9921875 38.040182 8.3855186 38.826172 9.171875 A 1.50015 1.50015 0 0 0 38.828125 9.171875 C 40.403 10.74675 40.403 13.25325 38.828125 14.828125 L 36.888672 16.767578 L 31.232422 11.111328 L 33.171875 9.171875 C 33.957865 8.3855186 34.979199 7.9921875 36 7.9921875 z M 29.111328 13.232422 L 34.767578 18.888672 L 16.693359 36.962891 C 16.634729 37.021121 16.560472 37.065723 16.476562 37.089844 L 8.6835938 39.316406 L 10.910156 31.521484 A 1.50015 1.50015 0 0 0 10.910156 31.519531 C 10.933086 31.438901 10.975086 31.366709 11.037109 31.304688 L 29.111328 13.232422 z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>`;
                                        $(`#display-highlight`).append(html);
                                    }
                                    $(`#Createhighlight`)[0].reset();
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
        init: function() {
            createhighlight();
        }
    };

}();


jQuery(document).ready(function() {
    KTFormControls.init();
    $(document).on('click', '#addDiscussion', function() {
        $(`[ data-main-title="highlight"]`).html('Create');
        $(`#Createhighlight`)[0].reset();
        $('#highlight_id').val('');
    });


});

$(document).on('click', '.editdata', function() {
    var id = $(this).data('editcount');
    console.log(id);
    $.ajax({
        url: BASE_URL + '/status/gethighlight',
        type: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
        },
        data: {
            id: id,
            _token: $("[name='_token']").val(),
        },
        cache: false,
        success: function(response) {
            response = JSON.parse(response);
            if (!response.status) {
                setTimeout(function() {
                    $("html").animate({ scrollTop: 0 }, "slow");
                    errorMsg(response.msg);
                }, 2000);
            } else if (response.status) {
                setTimeout(function() {
                    if (response.data) {
                        $(`[ data-main-title="highlight"]`).html('Edit');
                        $("[name='highlight_title']").val(response.data['highlight_title']);
                        $("[name='highlight_desc']").val(response.data['highlight_desc']);
                        $("[name='highlight_date']").val(response.data['highlight_date']);
                        $("[name='highlight_id']").val(response.data['id']);
                    }
                })
            }
        }
    });

});

$(document).on('click', '.deletedata', function() {
    var id = $(this).data('deletecount');
    $.ajax({
        url: BASE_URL + '/status/delete',
        type: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
        },
        data: {
            id: id,
            _token: $("[name='_token']").val(),
        },
        cache: false,
        success: function(response) {
            response = JSON.parse(response);
            if (!response.status) {
                setTimeout(function() {
                    $("html").animate({ scrollTop: 0 }, "slow");
                    errorMsg(response.msg);
                }, 2000);
            } else if (response.status) {
                $(`.data-highlight`).remove();
                jQuery.each(response.data, function(i, val) {
                    var count = $(`.data-highlight`).length;
                    if (count == 0) {
                        count = 1;
                    } else {
                        count = count + 1;
                    }
                    if (val.highlight_title.length > 40) {
                        title = val.highlight_title.substring(0, 40) + '...';
                    } else {
                        title = val.highlight_title;
                    }
                    const html = `<div class="col-md-12 mb-4 data-highlight" data-count="${count}" data-collect=${val.id}>
        <div class="information-box" data-content=${val.id}>
            <div class="row">
                <div class="col-sm-1 col-md-1">
                    <span class="text">${('0' + parseInt(count)).slice(-2)}</span>
                </div>
                <div class="col-sm-1 col-md-9">
                    <span class="text">${title}</span>
                </div>
                <div class="col-sm-1 col-md-1 deletedata" data-deletecount = ${val.id}>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-trash" viewBox="0 0 16 16">
                                        <path
                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                        <path fill-rule="evenodd"
                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                    </svg>
                                </div>
                <div class="col-sm-1 col-md-1 edit-highlight editdata" data-editcount = ${val.id}>
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="48" height="48"
                        viewBox="0 0 48 48" style=" fill:#000000; height:20px; ">
                        <path
                            d="M 36 5.0097656 C 34.205301 5.0097656 32.410791 5.6901377 31.050781 7.0507812 L 8.9160156 29.183594 C 8.4960384 29.603571 8.1884588 30.12585 8.0253906 30.699219 L 5.0585938 41.087891 A 1.50015 1.50015 0 0 0 6.9121094 42.941406 L 17.302734 39.974609 A 1.50015 1.50015 0 0 0 17.304688 39.972656 C 17.874212 39.808939 18.39521 39.50518 18.816406 39.083984 L 40.949219 16.949219 C 43.670344 14.228094 43.670344 9.7719064 40.949219 7.0507812 C 39.589209 5.6901377 37.794699 5.0097656 36 5.0097656 z M 36 7.9921875 C 37.020801 7.9921875 38.040182 8.3855186 38.826172 9.171875 A 1.50015 1.50015 0 0 0 38.828125 9.171875 C 40.403 10.74675 40.403 13.25325 38.828125 14.828125 L 36.888672 16.767578 L 31.232422 11.111328 L 33.171875 9.171875 C 33.957865 8.3855186 34.979199 7.9921875 36 7.9921875 z M 29.111328 13.232422 L 34.767578 18.888672 L 16.693359 36.962891 C 16.634729 37.021121 16.560472 37.065723 16.476562 37.089844 L 8.6835938 39.316406 L 10.910156 31.521484 A 1.50015 1.50015 0 0 0 10.910156 31.519531 C 10.933086 31.438901 10.975086 31.366709 11.037109 31.304688 L 29.111328 13.232422 z">
                        </path>
                    </svg>
                </div>
            </div>
        </div>
    </div>`;
                    $(`#display-highlight`).append(html)
                });
            }
        }
    });

});
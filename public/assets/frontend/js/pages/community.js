var KTFormControls = function() {
    var creatediscussion = function() {
        $("#Creatediscussion").validate({
            // define validation rules
            rules: {
                discussion_title: {
                    required: true,
                },
                discussion_desc: {
                    required: true,
                },
            },
            invalidHandler: function(event, validator) {
                validator.focusInvalid();
                event.preventDefault();
            },
            submitHandler: function(form) {
                var dataString = new FormData(form);
                $("#btndiscussion").addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--sucsses').attr('disabled', true);
                if ($(`#discussion_id`).val().length != 0) {
                    $.ajax({
                        url: BASE_URL + '/discussion/update',
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
                                    $("#btndiscussion").removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--sucsses').attr('disabled', false);
                                    $("html").animate({ scrollTop: 0 }, "slow");
                                    errorMsg(response.msg);
                                }, 2000);
                            } else if (response.status) {
                                setTimeout(function() {
                                    $("#btndiscussion").removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--sucsses').attr('disabled', false);
                                    successMsg(response.msg);
                                    var count = $(`[data-collect=${dataString.get('discussion_id')}]`).data('count');
                                    if (count == 0) {
                                        count = 1;
                                    }
                                    if (dataString.get('discussion_title').length > 40) {
                                        title = dataString.get('discussion_title').substring(0, 40) + '...';
                                    } else {
                                        title = dataString.get('discussion_title');
                                    }
                                    const html = `<div class="information-box" data-content=${dataString.get('discussion_id')}>
                                <div class="row">
                                    <div class="col-sm-1 col-md-1">
                                        <span class="text">${('0' + parseInt(count)).slice(-2)}</span>
                                    </div>
                                    <div class="col-sm-1 col-md-9">
                                        <span class="text">${title}</span>
                                    </div>
                                    <div class="col-sm-1 col-md-1 deletedata" data-deletecount = ${dataString.get('discussion_id')}>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                                            class="bi bi-trash" viewBox="0 0 16 16">
                                                            <path
                                                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                            <path fill-rule="evenodd"
                                                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                        </svg>
                                                    </div>
                                    <div class="col-sm-1 col-md-1 edit-discussion editdata" data-editcount = ${dataString.get('discussion_id')}>
                                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="48" height="48"
                                            viewBox="0 0 48 48" style=" fill:#000000; height:20px; ">
                                            <path
                                                d="M 36 5.0097656 C 34.205301 5.0097656 32.410791 5.6901377 31.050781 7.0507812 L 8.9160156 29.183594 C 8.4960384 29.603571 8.1884588 30.12585 8.0253906 30.699219 L 5.0585938 41.087891 A 1.50015 1.50015 0 0 0 6.9121094 42.941406 L 17.302734 39.974609 A 1.50015 1.50015 0 0 0 17.304688 39.972656 C 17.874212 39.808939 18.39521 39.50518 18.816406 39.083984 L 40.949219 16.949219 C 43.670344 14.228094 43.670344 9.7719064 40.949219 7.0507812 C 39.589209 5.6901377 37.794699 5.0097656 36 5.0097656 z M 36 7.9921875 C 37.020801 7.9921875 38.040182 8.3855186 38.826172 9.171875 A 1.50015 1.50015 0 0 0 38.828125 9.171875 C 40.403 10.74675 40.403 13.25325 38.828125 14.828125 L 36.888672 16.767578 L 31.232422 11.111328 L 33.171875 9.171875 C 33.957865 8.3855186 34.979199 7.9921875 36 7.9921875 z M 29.111328 13.232422 L 34.767578 18.888672 L 16.693359 36.962891 C 16.634729 37.021121 16.560472 37.065723 16.476562 37.089844 L 8.6835938 39.316406 L 10.910156 31.521484 A 1.50015 1.50015 0 0 0 10.910156 31.519531 C 10.933086 31.438901 10.975086 31.366709 11.037109 31.304688 L 29.111328 13.232422 z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                          </div>`;
                                    $(`[ data-main-title="discussion"]`).html('Create');
                                    $('#discussion_id').val('');
                                    $(`[data-content=${dataString.get('discussion_id')}]`).remove();
                                    $(`[data-collect=${dataString.get('discussion_id')}]`).append(html);
                                    $(`#Creatediscussion`)[0].reset();
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
                        url: BASE_URL + '/discussion/submit',
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
                                    $("#btndiscussion").removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--sucsses').attr('disabled', false);
                                    $("html").animate({ scrollTop: 0 }, "slow");
                                    errorMsg(response.msg);
                                }, 2000);
                            } else if (response.status) {
                                setTimeout(function() {
                                    $("#btndiscussion").removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--sucsses').attr('disabled', false);
                                    successMsg(response.msg);
                                    if (response.id) {
                                        var count = $(`.data-discussion`).length;
                                        if (count == 0) {
                                            count = 1;
                                        } else {
                                            count = count + 1;
                                        }
                                        if (dataString.get('discussion_title').length > 40) {
                                            title = dataString.get('discussion_title').substring(0, 40) + '...';
                                        } else {
                                            title = dataString.get('discussion_title');
                                        }
                                        const html = `<div class="col-md-12 mb-4 data-discussion" data-count="${count}" data-collect=${response.id}>
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
                                    <div class="col-sm-1 col-md-1 edit-discussion editdata" data-editcount = ${response.id}>
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
                                        $(`#display-discussion`).append(html);
                                    }
                                    $(`#Creatediscussion`)[0].reset();
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


    var postform = function() {
        $("#post-form").validate({
            // define validation rules
            rules: {
                desc: {
                    required: true,
                },
            },
            invalidHandler: function(event, validator) {
                validator.focusInvalid();
                event.preventDefault();
            },
            submitHandler: function(form) {
                $("#feedback_save_btns").addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', true);
                var dataString = new FormData(form);
                var id = $(`#comment_id`).val();
                if ($(`#comment_id`).val().length != 0) {
                    $.ajax({
                        url: BASE_URL + '/community/addcomment',
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
                                    $("#feedback_save_btns").removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
                                    $("html").animate({ scrollTop: 0 }, "slow");
                                    errorMsg(response.msg);
                                }, 2000);
                            } else if (response.status) {
                                setTimeout(function() {
                                    $("#feedback_save_btns").removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
                                    successMsg(response.msg);
                                    $(`.${id}-remove`).remove();
                                    var post_id = $(`[ data-id="${id}"]`).data('main-post');
                                    html = `<div class="row mb-3 d-flex flex-row-reverse bd-highlight ${post_id}-post ${id}-remove" style="border-left: 1px solid;border-bottom: 1px solid;border-bottom-left-radius: 10px;">`;
                                    jQuery.each(response.data, function(i, val) {
                                        html = html + `<div class="col-lg-12 card team-card main-comments mb-2" data-comment-id="${val.id}">
                                    <div class="card-body">
                                        <div class="media align-items-center">
                                            <div class="img-group">
                                                <a class="user-avatar me-1" href="#">
                                                    <img src="${BASE_URL}/assets/frontend/images/user-vector.png" alt="user"
                                                        class="rounded-circle thumb-md">
                                                    <span class="avatar-badge online"></span>
                                                </a>
                                            </div>
                                            <div class="media-body ms-2 align-self-center">
                                                <h6 class="m-0">${val.name}</h6>
                                                <p class="text-muted mb-0">${val.ago}</p>
                                            </div>
                                        </div>
                                        <div class="mt-2 d-flex justify-content-between mb-2">
                                            <p class="text-muted bold mb-0">${val.comment_desc}</p>
                                        </div>
                                        <div class="d-flex flex-row-reverse bd-highlight">
                                            <div class="align-self-center div-comment"  data-id="${val.id}" data-main-post="${val.post_id}>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                                    class="bi bi-chat-text" viewBox="0 0 16 18">
                                                    <path
                                                        d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z">
                                                    </path>
                                                    <path
                                                        d="M4 5.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zM4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8zm0 2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div data-comment="${val.id}-comments"></div>`;
                                    });
                                    html = html + `</div>`;
                                    $(`[data-comment="${id}-comments"]`).after(html);


                                    $(`#post-form`)[0].reset();
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
                        url: BASE_URL + '/community/addpost',
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
                                    $("#feedback_save_btns").removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
                                    $("html").animate({ scrollTop: 0 }, "slow");
                                    errorMsg(response.msg);
                                }, 2000);
                            } else if (response.status) {
                                setTimeout(function() {
                                    $("#feedback_save_btns").removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
                                    successMsg(response.msg);
                                    var html = ''
                                    jQuery.each(response.data, function(i, val) {
                                        html = html + `<div class="col-lg-12">
                                        <div class="row d-flex flex-row-reverse bd-highlight" style="">
                                            <div class="col-lg-12 card team-card main-comments mb-2"
                                                data-comment-id="${val.id}">
                                                <div class="card-body">
                                                    <div class="media align-items-center">
                                                        <div class="img-group">
                                                            <a class="user-avatar me-1" href="#">
                                                                <img src="${BASE_URL}/assets/frontend/images/user-vector.png"
                                                                    alt="user" class="rounded-circle thumb-md">
                                                                <span class="avatar-badge online"></span>
                                                            </a>
                                                        </div>
                                                        <div class="media-body ms-2 align-self-center">
                                                            <h6 class="m-0">${val.name}</h6>
                                                            <p class="text-muted mb-0">
                                                                ${val.ago}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="mt-2 d-flex justify-content-between mb-2">
                                                        <p class="text-muted bold mb-0">${val.post_desc }
                                                        </p>
                                                    </div>
                                                    <div class="d-flex flex-row-reverse bd-highlight">
                                                        <div class="align-self-center post ${val.id}-active div-comment"
                                                            data-id="${val.id}" data-main-post="${val.id}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                height="20" fill="currentColor"
                                                                class="bi bi-chat-text" viewBox="0 0 16 18">
                                                                <path
                                                                    d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z">
                                                                </path>
                                                                <path
                                                                    d="M4 5.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zM4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8zm0 2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z">
                                                                </path>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div data-comment="${val.id}-comments"></div>
                                        </div>
                                    </div>`;
                                    });
                                    $(`#postdata`).after(html);
                                    $(`#post-form`)[0].reset();
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



    var qustions = function() {
        $("#question-form").validate({
            // define validation rules
            rules: {
                answer: {
                    required: true,
                },
            },
            invalidHandler: function(event, validator) {
                validator.focusInvalid();
                event.preventDefault();
            },
            submitHandler: function(form) {
                $("#feedback_save_btn").addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', true);
                var dataString = new FormData(form);
                var countid = $(`#question_id`).val();

                if ($(`#question_id`).val().length != 0) {
                    $.ajax({
                        url: BASE_URL + '/community/answer',
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
                                    $(`.${countid}-answer-div`).remove();
                                    html = `<div class="row mb-3 d-flex flex-row-reverse bd-highlight qustions-div ${countid}-answer-div" style="border-left: 1px solid;border-bottom: 1px solid;border-bottom-left-radius: 10px;">`;
                                    jQuery.each(response.data, function(i, val) {
                                        html = html + `<div class="col-lg-12 card team-card mb-2">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="img-group">
                                <a class="user-avatar me-1" href="#">
                                    <img src="${BASE_URL}/assets/frontend/images/user-vector.png" alt="user"
                                        class="rounded-circle thumb-md">
                                    <span class="avatar-badge online"></span>
                                </a>
                            </div>
                            <div class="media-body ms-2 align-self-center">
                                <h6 class="m-0">${val.name}</h6>
                                <p class="text-muted mb-0">${val.ago}</p>
                            </div>
                        </div>
                        <div class="mt-2 d-flex justify-content-between mb-2">
                            <p class="text-muted bold mb-0">${val.answers}</p>
                        </div>
                       
                    </div>
                </div>`;
                                    });
                                    html = html + `</div>`;
                                    $(`[data-answer="${countid}-answer"]`).after(html);

                                    $(`#question-form`)[0].reset();
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
                    setTimeout(function() {
                        $("#feedback_save_btn").removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
                        $("html").animate({ scrollTop: 0 }, "slow");
                        errorMsg("Please Select the Question");
                    }, 2000);
                }
                return false;
            }
        });
    }

    return {
        init: function() {
            creatediscussion();
            postform();
            qustions();
        }
    };

}();


jQuery(document).ready(function() {
    KTFormControls.init();
    $(document).on('click', '.div-comment', function() {
        var id = $(this).data('id');
        var post_id = $(this).data('main-post');
        var divobj = $('.main-comment-div');
        for (let i = 0; i < divobj.length; i++) {
            if (!$(divobj[i]).hasClass(`${post_id}-post`)) {
                $(divobj[i]).remove();
            }
        }

        var objpost = $('.post');
        for (let i = 0; i < objpost.length; i++) {
            if ($(objpost[i]).hasClass('activecomment')) {
                if (!$(objpost[i]).hasClass(`${post_id}-active`)) {
                    $(objpost[i]).removeClass('activecomment');
                }
            }
        }

        if ($(this).hasClass('activecomment')) {
            $(`.${id}-remove`).remove();
            $(this).removeClass('activecomment');
        } else {
            $(this).addClass('activecomment');
            $(`.${id}-remove`).remove();
            $.ajax({
                url: BASE_URL + '/community/comment',
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
                        $(`[data-id="${id}"]`).removeClass('activecomment');
                        setTimeout(function() {

                            $("html").animate({ scrollTop: 0 }, "slow");
                        }, 2000);
                    } else if (response.status) {
                        html = `<div class="row mb-3 d-flex flex-row-reverse bd-highlight main-comment-div ${post_id}-post ${id}-remove" style="border-left: 1px solid;border-bottom: 1px solid;border-bottom-left-radius: 10px;">`;
                        jQuery.each(response.data, function(i, val) {
                            html = html + `<div class="col-lg-12 card team-card main-comments mb-2" data-comment-id="${val.id}">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="img-group">
                                    <a class="user-avatar me-1" href="#">
                                        <img src="${BASE_URL}/assets/frontend/images/user-vector.png" alt="user"
                                            class="rounded-circle thumb-md">
                                        <span class="avatar-badge online"></span>
                                    </a>
                                </div>
                                <div class="media-body ms-2 align-self-center">
                                    <h6 class="m-0">${val.name}</h6>
                                    <p class="text-muted mb-0">${val.ago}</p>
                                </div>
                            </div>
                            <div class="mt-2 d-flex justify-content-between mb-2">
                                <p class="text-muted bold mb-0">${val.comment_desc}</p>
                            </div>
                            <div class="d-flex flex-row-reverse bd-highlight">
                                <div class="align-self-center div-comment"  data-id="${val.id}" data-main-post="${val.post_id}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                        class="bi bi-chat-text" viewBox="0 0 16 18">
                                        <path
                                            d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z">
                                        </path>
                                        <path
                                            d="M4 5.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zM4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8zm0 2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div data-comment="${val.id}-comments"></div>`;
                        });
                        html = html + `</div>`;
                        $(`[data-comment="${id}-comments"]`).after(html);
                    }
                }
            });
        }
    });



    $(document).on('click', '#addDiscussion', function() {
        $(`[ data-main-title="discussion"]`).html('Create');
        $(`#Creatediscussion`)[0].reset();
        $('#discussion_id').val('');
    });


    $(document).on('click', '.create-post', function() {
        $(`.post-title`).html('Create New Post');
        $(`.team-card`).removeClass("active");
        $(`.post-btn`).html('Create Post');
        $(`#comment_id`).val('');
    });


    $(document).on('click', '.main-comments', function() {
        $(`.team-card`).removeClass("active");
        $(this).addClass('active');
        $(`.post-title`).html('Add New Comment');
        $(`.post-btn`).html('Add Comment');
        $(`#comment_id`).val($(this).data('comment-id'));
    });

    $(document).on('click', '.qustions', function() {
        if ($(this).hasClass('active')) {
            $(`.qustions-div`).remove();
            $(`.qustions`).removeClass("active");
        } else {
            $(`.qustions`).removeClass("active");
            $(this).addClass('active');
            $(`#main-question`).html($(`[data-question="${$(this).data('question-id')}"]`).html());
            $(`#question_id`).val($(this).data('question-id'));
            var id = $(this).data('question-id');
            $(`.${id}-answer-div`).remove();
            $(`.qustions-div`).remove();
            $.ajax({
                url: BASE_URL + '/community/getAnswer',
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
                        }, 2000);
                    } else if (response.status) {
                        html = `<div class="row mb-3 d-flex flex-row-reverse bd-highlight qustions-div ${id}-answer-div" style="border-left: 1px solid;border-bottom: 1px solid;border-bottom-left-radius: 10px;">`;
                        jQuery.each(response.data, function(i, val) {
                            html = html + `<div class="col-lg-12 card team-card mb-2">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="img-group">
                                <a class="user-avatar me-1" href="#">
                                    <img src="${BASE_URL}/assets/frontend/images/user-vector.png" alt="user"
                                        class="rounded-circle thumb-md">
                                    <span class="avatar-badge online"></span>
                                </a>
                            </div>
                            <div class="media-body ms-2 align-self-center">
                                <h6 class="m-0">${val.name}</h6>
                                <p class="text-muted mb-0">${val.ago}</p>
                            </div>
                        </div>
                        <div class="mt-2 d-flex justify-content-between mb-2">
                            <p class="text-muted bold mb-0">${val.answers}</p>
                        </div>
                       
                    </div>
                </div>`;
                        });
                        html = html + `</div>`;
                        $(`[data-answer="${id}-answer"]`).after(html);
                    }
                }
            });
        }
    });


    $(document).on('click', '.editdata', function() {
        var id = $(this).data('editcount');
        console.log(id);
        $.ajax({
            url: BASE_URL + '/discussion/gettopic',
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
                            $(`[ data-main-title="discussion"]`).html('Edit');
                            $("[name='discussion_title']").val(response.data['topic_title']);
                            $("[name='discussion_desc']").val(response.data['topic_desc']);
                            $("[name='discussion_id']").val(response.data['id']);
                        }
                    })
                }
            }
        });

    });

    $(document).on('click', '.deletedata', function() {
        var id = $(this).data('deletecount');
        $.ajax({
            url: BASE_URL + '/discussion/delete',
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
                    $(`.data-discussion`).remove();
                    jQuery.each(response.data, function(i, val) {
                        var count = $(`.data-discussion`).length;
                        if (count == 0) {
                            count = 1;
                        } else {
                            count = count + 1;
                        }
                        if (val.topic_title.length > 40) {
                            title = val.topic_title.substring(0, 40) + '...';
                        } else {
                            title = val.topic_title;
                        }
                        const html = `<div class="col-md-12 mb-4 data-discussion" data-count="${count}" data-collect=${val.id}>
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
                    <div class="col-sm-1 col-md-1 edit-discussion editdata" data-editcount = ${val.id}>
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
                        $(`#display-discussion`).append(html)
                    });
                }
            }
        });

    });
});
// Class definition

var KTFormControls = function() {
    // Private functions

    var mainform = function() {

        $("#mainform").validate({
            // define validation rules
            rules: {
                champing_id: {
                    required: true,
                },
                champing_title: {
                    required: true,
                },
                champing_desc: {
                    required: true,
                },
            },
            //display error alert on form submit  
            invalidHandler: function(event, validator) {
                console.log(validator);
                $.each(validator, function(key, value) {
                    $(`[data-focus="${key}"]`).focus();
                    return;
                });
                // validator.focusInvalid();
                // event.preventDefault();
            },
            submitHandler: function(form) {
                var flag = false;
                if ($(`#offers_data`).val().length == 0) {
                    $(`[data-focus="offers_data"]`).focus();
                    $(`[data-errorh ="offer-module"]`).addClass('form-control is-invalid', true);
                    $(`#offer-module-error`).remove();
                    $(`[data-errorh ="offer-module"]`).after(`<div id="offer-module-error" class="error invalid-feedback">This field is required.</div>`)
                } else if ($(`#highlights_data`).val().length == 0) {
                    $(`[data-focus="highlights_data"]`).focus();
                    $(`[data-errorh ="highlights-module"]`).addClass('form-control is-invalid', true);
                    $(`#highlights-module-error`).remove();
                    $(`[data-errorh ="highlights-module"]`).after(`<div id="highlights-module-error" class="error invalid-feedback">This field is required.</div>`)
                } else if ($(`#team_data`).val().length == 0) {
                    $(`[data-focus="team_data"]`).focus();
                    $(`[data-errorh ="team-module"]`).addClass('form-control is-invalid', true);
                    $(`#team-module-error`).remove();
                    $(`[data-errorh ="team-module"]`).after(`<div id="team-module-error" class="error invalid-feedback">This field is required.</div>`)
                } else if ($(`#board_data`).val().length == 0) {
                    $(`[data-focus="board_data"]`).focus();
                    $(`[data-errorh ="board-module"]`).addClass('form-control is-invalid', true);
                    $(`#board-module-error`).remove();
                    $(`[data-errorh ="board-module"]`).after(`<div id="board-module-error" class="error invalid-feedback">This field is required.</div>`)
                } else if ($(`#officers_data`).val().length == 0) {
                    $(`[data-focus="officers_data"]`).focus();
                    $(`[data-errorh ="officers-module"]`).addClass('form-control is-invalid', true);
                    $(`#officers-module-error`).remove();
                    $(`[data-errorh ="officers-module"]`).after(`<div id="officers-module-error" class="error invalid-feedback">This field is required.</div>`)
                } else if ($(`#voting_data`).val().length == 0) {
                    $(`[data-focus="voting_data"]`).focus();
                    $(`[data-errorh ="voting-module"]`).addClass('form-control is-invalid', true);
                    $(`#voting-module-error`).remove();
                    $(`[data-errorh ="voting-module"]`).after(`<div id="voting-module-error" class="error invalid-feedback">This field is required.</div>`)
                } else if ($(`#risk_data`).val().length == 0) {
                    $(`[data-focus="risk_data"]`).focus();
                    $(`[data-errorh ="risk-module"]`).addClass('form-control is-invalid', true);
                    $(`#risk-module-error`).remove();
                    $(`[data-errorh ="risk-module"]`).after(`<div id="risk-module-error" class="error invalid-feedback">This field is required.</div>`)
                } else if ($(`#fundraising_data`).val().length == 0) {
                    $(`[data-focus="fundraising_data"]`).focus();
                    $(`[data-errorh ="fundraising-module"]`).addClass('form-control is-invalid', true);
                    $(`#fundraising-module-error`).remove();
                    $(`[data-errorh ="fundraising-module"]`).after(`<div id="fundraising-module-error" class="error invalid-feedback">This field is required.</div>`)
                } else if ($(`#transactions_data`).val().length == 0) {
                    $(`[data-focus="transactions_data"]`).focus();
                    $(`[data-errorh ="transactions-module"]`).addClass('form-control is-invalid', true);
                    $(`#transactions-module-error`).remove();
                    $(`[data-errorh ="transactions-module"]`).after(`<div id="transactions-module-error" class="error invalid-feedback">This field is required.</div>`)
                } else if ($(`#asset_data`).val().length == 0 && $(`#debt_data`).val().length == 0 && $(`#equity_data`).val().length == 0) {
                    $(`[data-focus="asset_data"]`).focus();
                    $(`[data-errorh ="showcase"]`).addClass('form-control is-invalid', true);
                    $(`#showcase-module-error`).remove();
                    $(`[data-errorh ="showcase-module"]`).after(`<div id="showcase-module-error" class="error invalid-feedback">This field is required.</div>`)
                } else if ($(`#questions_data`).val().length == 0) {
                    $(`[data-focus="questions_data"]`).focus();
                    $(`[data-errorh ="questions-module"]`).addClass('form-control is-invalid', true);
                    $(`#questions-module-error`).remove();
                    $(`[data-errorh ="questions-module"]`).after(`<div id="questions-module-error" class="error invalid-feedback">This field is required.</div>`)
                } else if ($(`#discussion_data`).val().length == 0) {
                    $(`[data-focus="discussion_data"]`).focus();
                    $(`[data-errorh ="discussion-module"]`).addClass('form-control is-invalid', true);
                    $(`#discussion-module-error`).remove();
                    $(`[data-errorh ="discussion-module"]`).after(`<div id="discussion-module-error" class="error invalid-feedback">This field is required.</div>`)
                } else {
                    var dataString = new FormData(form);
                    $.ajax({
                        url: BASE_URL + '/campaigns-creator/submit',
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
                }


            }
        });
    }




    var createOffer = function() {

        $("#CreateOfferings").validate({
            // define validation rules
            rules: {
                offer_title: {
                    required: true,


                },
                offer_amount: {
                    required: true,
                    digits: true,
                },
                offer_desc: {
                    required: true,
                },
            },
            //display error alert on form submit  
            invalidHandler: function(event, validator) {
                // validator.focusInvalid();
                // event.preventDefault();
            },
            submitHandler: function(form) {
                var dataString = new FormData(form);
                DataObj = [];
                var obj = $(`.data-offer`);
                var count = 1;
                for (let i = 0; i < obj.length; i++) {
                    count = $(obj[i]).data("count") + 1;
                }
                if ($(`#offer_id`).val().length != 0) {
                    DataObj = JSON.parse($(`#offers_data`).val());
                    let id = $(`#offer_id`).val();
                    DataObj.forEach(data => {
                        for (let key in data) {
                            if (key == 'offer_id' && data[key] == id) {
                                for (let key in data) {
                                    data[key] = dataString.get(key);
                                    console.log(data);
                                }
                            }
                        }
                    });
                    console.log(DataObj);
                    $(`#offers_data`).html(JSON.stringify(DataObj));
                    Addoffer();
                    $(`#CreateOfferings`)[0].reset();
                    $(`#offer_id`).val('');
                    $(`[data-main-title="offer-module"]`).html("Create")

                    successMsg("Offer Item Updated Sucssesfully");
                } else {
                    if ($(`#offers_data`).val().length == 0) {
                        DataObj = [];
                    } else {
                        DataObj = JSON.parse($(`#offers_data`).val());
                    }
                    item = {}
                    item["offer_id"] = count;
                    item["offer_title"] = dataString.get('offer_title');
                    item["offer_amount"] = dataString.get('offer_amount');
                    item["offer_desc"] = dataString.get('offer_desc');
                    DataObj.push(item);
                    $(`#offers_data`).html(JSON.stringify(DataObj));
                    $(`#CreateOfferings`)[0].reset();
                    Addoffer();
                    successMsg("Offer Item Added Sucssesfully");
                }

            }
        });
    }

    var createhighlight = function() {

        $("#CreateHighlight").validate({
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
            //display error alert on form submit  
            invalidHandler: function(event, validator) {
                // validator.focusInvalid();
                // event.preventDefault();
            },
            submitHandler: function(form) {
                var dataString = new FormData(form);
                DataObj = [];
                var obj = $(`.data-highlights`);
                var count = 1;
                for (let i = 0; i < obj.length; i++) {
                    count = $(obj[i]).data("count") + 1;
                }
                if ($(`#highlight_id`).val().length != 0) {
                    DataObj = JSON.parse($(`#highlights_data`).val());
                    let id = $(`#highlight_id`).val();
                    DataObj.forEach(data => {
                        for (let key in data) {
                            if (key == 'highlight_id' && data[key] == id) {
                                for (let key in data) {
                                    data[key] = dataString.get(key);
                                    console.log(data);
                                }
                            }
                        }
                    });
                    console.log(DataObj);
                    $(`#highlights_data`).html(JSON.stringify(DataObj));
                    Addhighlights();
                    $(`#CreateHighlight`)[0].reset();
                    $(`#highlight_id`).val('');
                    $(`[data-main-title="highlights-module"]`).html("Create")

                    successMsg("Highlights Item Updated Sucssesfully");
                } else {
                    if ($(`#highlights_data`).val().length == 0) {
                        DataObj = [];
                    } else {
                        DataObj = JSON.parse($(`#highlights_data`).val());
                    }
                    item = {}
                    item["highlight_id"] = count;
                    item["highlight_title"] = dataString.get('highlight_title');
                    item["highlight_date"] = dataString.get('highlight_date');
                    item["highlight_desc"] = dataString.get('highlight_desc');
                    DataObj.push(item);
                    $(`#highlights_data`).html(JSON.stringify(DataObj));
                    $(`#CreateHighlight`)[0].reset();
                    Addhighlights();
                    successMsg("Highlights Item Added Sucssesfully");

                }
            }
        });
    }

    var boardmember = function() {
        $("#boardmember").validate({
            // define validation rules
            rules: {
                board_title: {
                    required: true,

                },
                board_name: {
                    required: true,

                },
                board_desc: {
                    required: true,
                },

            },


            //display error alert on form submit  
            invalidHandler: function(event, validator) {
                validator.focusInvalid();
                event.preventDefault();
            },

            submitHandler: function(form) {
                var dataString = new FormData(form);
                DataObj = [];
                var obj = $(`.data-boardteam`);
                var count = 1;
                for (let i = 0; i < obj.length; i++) {
                    count = $(obj[i]).data("count") + 1;
                }
                if ($(`#board_id`).val().length != 0) {
                    DataObj = JSON.parse($(`#board_data`).val());
                    let id = $(`#board_id`).val();
                    DataObj.forEach(data => {
                        for (let key in data) {
                            if (key == 'board_id' && data[key] == id) {
                                for (let key in data) {
                                    data[key] = dataString.get(key);
                                }
                            }
                        }
                    });
                    console.log(DataObj);
                    $(`#board_data`).html(JSON.stringify(DataObj));
                    Addboardteam();
                    $(`#boardmember`)[0].reset();
                    $(`#board_id`).val('');
                    $(`[data-main-title="board-module"]`).html("Create")

                    successMsg("Board Team Updated Sucssesfully");
                } else {
                    if ($(`#board_data`).val().length == 0) {
                        DataObj = [];
                    } else {
                        DataObj = JSON.parse($(`#board_data`).val());
                    }
                    item = {}
                    item["board_id"] = count;
                    item["board_name"] = dataString.get('board_name');
                    item["board_title"] = dataString.get('board_title');
                    item["board_desc"] = dataString.get('board_desc');
                    DataObj.push(item);
                    $(`#board_data`).html(JSON.stringify(DataObj));
                    $(`#boardmember`)[0].reset();
                    Addboardteam();
                    successMsg("Board Team Added Sucssesfully");

                }
                return false;
            }
        });
    }

    var createvoting = function() {
        $("#Createvoting").validate({
            // define validation rules
            rules: {
                voting_title: {
                    required: true,
                },
                voting_level: {
                    required: true,
                },
                voting_desc: {
                    required: true,
                },
            },

            //display error alert on form submit  
            invalidHandler: function(event, validator) {
                validator.focusInvalid();
                event.preventDefault();
            },

            submitHandler: function(form) {
                var dataString = new FormData(form);
                DataObj = [];
                var obj = $(`.data-voting`);
                var count = 1;
                for (let i = 0; i < obj.length; i++) {
                    count = $(obj[i]).data("count") + 1;
                }
                if ($(`#voting_id`).val().length != 0) {
                    DataObj = JSON.parse($(`#voting_data`).val());
                    let id = $(`#voting_id`).val();
                    DataObj.forEach(data => {
                        for (let key in data) {
                            if (key == 'voting_id' && data[key] == id) {
                                for (let key in data) {
                                    data[key] = dataString.get(key);
                                }
                            }
                        }
                    });
                    console.log(DataObj);
                    $(`#voting_data`).html(JSON.stringify(DataObj));
                    Addvoting();
                    $(`#Createvoting`)[0].reset();
                    $(`#voting_id`).val('');
                    $(`[data-main-title="voting-module"]`).html("Create")

                    successMsg("Voting item Updated Sucssesfully");
                } else {
                    if ($(`#voting_data`).val().length == 0) {
                        DataObj = [];
                    } else {
                        DataObj = JSON.parse($(`#voting_data`).val());
                    }
                    item = {}
                    item["voting_id"] = count;
                    item["voting_title"] = dataString.get('voting_title');
                    item["voting_level"] = dataString.get('voting_level');
                    item["voting_desc"] = dataString.get('voting_desc');
                    DataObj.push(item);
                    $(`#voting_data`).html(JSON.stringify(DataObj));
                    $(`#Createvoting`)[0].reset();
                    Addvoting();
                    successMsg("Voting item Added Sucssesfully");
                    // }
                }
                return false;
            }
        });
    }


    var createrisk = function() {
        $("#Createrisk").validate({
            // define validation rules
            rules: {
                risk_title: {
                    required: true,
                },
                risk_desc: {
                    required: true,
                },
            },


            //display error alert on form submit  
            invalidHandler: function(event, validator) {
                validator.focusInvalid();
                event.preventDefault();
            },

            submitHandler: function(form) {
                var dataString = new FormData(form);
                DataObj = [];
                var obj = $(`.data-risk`);
                var count = 1;
                for (let i = 0; i < obj.length; i++) {
                    count = $(obj[i]).data("count") + 1;
                }
                if ($(`#risk_id`).val().length != 0) {
                    DataObj = JSON.parse($(`#risk_data`).val());
                    let id = $(`#risk_id`).val();
                    DataObj.forEach(data => {
                        for (let key in data) {
                            if (key == 'risk_id' && data[key] == id) {
                                for (let key in data) {
                                    data[key] = dataString.get(key);
                                }
                            }
                        }
                    });
                    $(`#risk_data`).html(JSON.stringify(DataObj));
                    Addrisk();
                    $(`#Createrisk`)[0].reset();
                    $(`#risk_id`).val('');
                    $(`[data-main-title="risk-module"]`).html("Create")
                    successMsg("Risk item Updated Sucssesfully");
                } else {
                    if ($(`#risk_data`).val().length == 0) {
                        DataObj = [];
                    } else {
                        DataObj = JSON.parse($(`#risk_data`).val());
                    }
                    console.log(DataObj);
                    item = {}
                    item["risk_id"] = count;
                    item["risk_title"] = dataString.get('risk_title');
                    item["risk_desc"] = dataString.get('risk_desc');
                    DataObj.push(item);
                    $(`#risk_data`).html(JSON.stringify(DataObj));
                    $(`#Createrisk`)[0].reset();
                    Addrisk();
                    successMsg("Risk item Added Sucssesfully");
                }
                return false;
            }
        });
    }

    var createfundraising = function() {
        $("#Createfundraising").validate({
            // define validation rules
            rules: {
                fundraising_funds: {
                    required: true,
                },
                fundraising_desc: {
                    required: true,
                },
            },


            //display error alert on form submit  
            invalidHandler: function(event, validator) {
                validator.focusInvalid();
                event.preventDefault();
            },

            submitHandler: function(form) {
                var dataString = new FormData(form);
                DataObj = [];
                var obj = $(`.data-fundraising`);
                var count = 1;
                for (let i = 0; i < obj.length; i++) {
                    count = $(obj[i]).data("count") + 1;
                }
                if ($(`#fundraising_id`).val().length != 0) {
                    DataObj = JSON.parse($(`#fundraising_data`).val());
                    let id = $(`#fundraising_id`).val();
                    DataObj.forEach(data => {
                        for (let key in data) {
                            if (key == 'fundraising_id' && data[key] == id) {
                                for (let key in data) {
                                    data[key] = dataString.get(key);
                                }
                            }
                        }
                    });
                    $(`#fundraising_data`).html(JSON.stringify(DataObj));
                    Addfundraising();
                    $(`#Createfundraising`)[0].reset();
                    $(`#fundraising_id`).val('');
                    $(`[data-main-title="fundraising-module"]`).html("Create")
                    successMsg("Fundraising Updated Sucssesfully");
                } else {
                    if ($(`#fundraising_data`).val().length == 0) {
                        DataObj = [];
                    } else {
                        DataObj = JSON.parse($(`#fundraising_data`).val());
                    }
                    console.log(DataObj);
                    item = {}
                    item["fundraising_id"] = count;
                    item["fundraising_funds"] = dataString.get('fundraising_funds');
                    item["fundraising_desc"] = dataString.get('fundraising_desc');
                    DataObj.push(item);
                    $(`#fundraising_data`).html(JSON.stringify(DataObj));
                    $(`#Createfundraising`)[0].reset();
                    Addfundraising();
                    successMsg("Fundraising Added Sucssesfully");
                }
                return false;
            }
        });
    }
    var createtransactions = function() {
        $("#Createtransactions").validate({
            // define validation rules
            rules: {
                transactions_title: {
                    required: true,
                },
                transactions_cost: {
                    required: true,
                },
                transactions_desc: {
                    required: true,
                },
            },


            //display error alert on form submit  
            invalidHandler: function(event, validator) {
                validator.focusInvalid();
                event.preventDefault();
            },

            submitHandler: function(form) {
                var dataString = new FormData(form);
                DataObj = [];
                var obj = $(`.data-transactions`);
                var count = 1;
                for (let i = 0; i < obj.length; i++) {
                    count = $(obj[i]).data("count") + 1;
                }
                if ($(`#transactions_id`).val().length != 0) {
                    DataObj = JSON.parse($(`#transactions_data`).val());
                    let id = $(`#transactions_id`).val();
                    DataObj.forEach(data => {
                        for (let key in data) {
                            if (key == 'transactions_id' && data[key] == id) {
                                for (let key in data) {
                                    data[key] = dataString.get(key);
                                }
                            }
                        }
                    });
                    $(`#transactions_data`).html(JSON.stringify(DataObj));
                    Addtransaction();
                    $(`#Createtransactions`)[0].reset();
                    $(`#transactions_id`).val('');
                    $(`[data-main-title="transactions-module"]`).html("Create")
                    successMsg("Transaction Updated Sucssesfully");
                } else {
                    if ($(`#transactions_data`).val().length == 0) {
                        DataObj = [];
                    } else {
                        DataObj = JSON.parse($(`#transactions_data`).val());
                    }
                    console.log(DataObj);
                    item = {}
                    item["transactions_id"] = count;
                    item["transactions_title"] = dataString.get('transactions_title');
                    item["transactions_cost"] = dataString.get('transactions_cost');
                    item["transactions_desc"] = dataString.get('transactions_desc');
                    DataObj.push(item);
                    $(`#transactions_data`).html(JSON.stringify(DataObj));
                    $(`#Createtransactions`)[0].reset();
                    Addtransaction();
                    successMsg("Transaction Added Sucssesfully");
                }
                return false;
            }
        });
    }

    var createquestions = function() {
        $("#Createquestions").validate({
            // define validation rules
            rules: {
                questions_title: {
                    required: true,
                },

                questions_desc: {
                    required: true,
                },
            },


            //display error alert on form submit  
            invalidHandler: function(event, validator) {
                validator.focusInvalid();
                event.preventDefault();
            },

            submitHandler: function(form) {
                var dataString = new FormData(form);
                DataObj = [];
                var obj = $(`.data-questions`);
                var count = 1;
                for (let i = 0; i < obj.length; i++) {
                    count = $(obj[i]).data("count") + 1;
                }
                if ($(`#questions_id`).val().length != 0) {
                    DataObj = JSON.parse($(`#questions_data`).val());
                    let id = $(`#questions_id`).val();
                    DataObj.forEach(data => {
                        for (let key in data) {
                            if (key == 'questions_id' && data[key] == id) {
                                for (let key in data) {
                                    data[key] = dataString.get(key);
                                }
                            }
                        }
                    });
                    $(`#questions_data`).html(JSON.stringify(DataObj));
                    Addquestion();
                    $(`#Createquestions`)[0].reset();
                    $(`#questions_id`).val('');
                    $(`[data-main-title="questions-module"]`).html("Create")
                    successMsg("Question Updated Sucssesfully");
                } else {
                    if ($(`#questions_data`).val().length == 0) {
                        DataObj = [];
                    } else {
                        DataObj = JSON.parse($(`#questions_data`).val());
                    }
                    console.log(DataObj);
                    item = {}
                    item["questions_id"] = count;
                    item["questions_title"] = dataString.get('questions_title');
                    item["questions_desc"] = dataString.get('questions_desc');
                    DataObj.push(item);
                    $(`#questions_data`).html(JSON.stringify(DataObj));
                    $(`#Createquestions`)[0].reset();
                    Addquestion();
                    successMsg("Question Added Sucssesfully");
                }
                return false;
            }
        });
    }

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


            //display error alert on form submit  
            invalidHandler: function(event, validator) {
                validator.focusInvalid();
                event.preventDefault();
            },

            submitHandler: function(form) {
                var dataString = new FormData(form);
                DataObj = [];
                var obj = $(`.data-discussion`);
                var count = 1;
                for (let i = 0; i < obj.length; i++) {
                    count = $(obj[i]).data("count") + 1;
                }
                if ($(`#discussion_id`).val().length != 0) {
                    DataObj = JSON.parse($(`#discussion_data`).val());
                    let id = $(`#discussion_id`).val();
                    DataObj.forEach(data => {
                        for (let key in data) {
                            if (key == 'discussion_id' && data[key] == id) {
                                for (let key in data) {
                                    data[key] = dataString.get(key);
                                }
                            }
                        }
                    });
                    $(`#discussion_data`).html(JSON.stringify(DataObj));
                    Adddiscussion();
                    $(`#Creatediscussion`)[0].reset();
                    $(`#discussion_id`).val('');
                    $(`[data-main-title="discussion-module"]`).html("Create")
                    successMsg("Discussion Updated Sucssesfully");
                } else {
                    if ($(`#discussion_data`).val().length == 0) {
                        DataObj = [];
                    } else {
                        DataObj = JSON.parse($(`#discussion_data`).val());
                    }
                    console.log(DataObj);
                    item = {}
                    item["discussion_id"] = count;
                    item["discussion_title"] = dataString.get('discussion_title');
                    item["discussion_desc"] = dataString.get('discussion_desc');
                    DataObj.push(item);
                    $(`#discussion_data`).html(JSON.stringify(DataObj));
                    $(`#Creatediscussion`)[0].reset();
                    Adddiscussion();
                    successMsg("Discussion Added Sucssesfully");
                }
                return false;
            }
        });
    }

    var createofficers = function() {
        $("#Createofficers").validate({
            // define validation rules
            rules: {
                officers_name: {
                    required: true,
                },
                officers_title: {
                    required: true,
                },
                officers_desc: {
                    required: true,
                },
            },


            //display error alert on form submit  
            invalidHandler: function(event, validator) {
                validator.focusInvalid();
                event.preventDefault();
            },

            submitHandler: function(form) {
                var dataString = new FormData(form);
                DataObj = [];
                var obj = $(`.data-officers`);
                var count = 1;
                for (let i = 0; i < obj.length; i++) {
                    count = $(obj[i]).data("count") + 1;
                }
                if ($(`#officers_id`).val().length != 0) {
                    DataObj = JSON.parse($(`#officers_data`).val());
                    let id = $(`#officers_id`).val();
                    DataObj.forEach(data => {
                        for (let key in data) {
                            if (key == 'officers_id' && data[key] == id) {
                                for (let key in data) {
                                    data[key] = dataString.get(key);
                                }
                            }
                        }
                    });
                    $(`#officers_data`).html(JSON.stringify(DataObj));
                    Addofficers();
                    $(`#Createofficers`)[0].reset();
                    $(`#officers_id`).val('');
                    $(`[data-main-title="officers-module"]`).html("Create")
                    successMsg("Officer Updated Sucssesfully");
                } else {
                    if ($(`#officers_data`).val().length == 0) {
                        DataObj = [];
                    } else {
                        DataObj = JSON.parse($(`#officers_data`).val());
                    }
                    console.log(DataObj);
                    item = {}
                    item["officers_id"] = count;
                    item["officers_name"] = dataString.get('officers_name');
                    item["officers_title"] = dataString.get('officers_title');
                    item["officers_desc"] = dataString.get('officers_desc');
                    DataObj.push(item);
                    $(`#officers_data`).html(JSON.stringify(DataObj));
                    $(`#Createofficers`)[0].reset();
                    Addofficers();
                    successMsg("Officer Added Sucssesfully");
                }
                return false;
            }
        });
    }


    var createteam = function() {
        $("#Createteam").validate({
            // define validation rules
            rules: {
                team_name: {
                    required: true,
                },
                team_title: {
                    required: true,
                },
                team_desc: {
                    required: true,
                },
            },


            //display error alert on form submit  
            invalidHandler: function(event, validator) {
                validator.focusInvalid();
                event.preventDefault();
            },

            submitHandler: function(form) {
                var dataString = new FormData(form);
                DataObj = [];
                var obj = $(`.data-team`);
                var count = 1;
                for (let i = 0; i < obj.length; i++) {
                    count = $(obj[i]).data("count") + 1;
                }
                if ($(`#team_id`).val().length != 0) {
                    DataObj = JSON.parse($(`#team_data`).val());
                    let id = $(`#team_id`).val();
                    DataObj.forEach(data => {
                        for (let key in data) {
                            if (key == 'team_id' && data[key] == id) {
                                for (let key in data) {
                                    data[key] = dataString.get(key);
                                }
                            }
                        }
                    });
                    $(`#team_data`).html(JSON.stringify(DataObj));
                    Addteam();
                    $(`#Createteam`)[0].reset();
                    $(`#team_id`).val('');
                    $(`[data-main-title="team-module"]`).html("Create")
                    successMsg("Team Member Updated Sucssesfully");
                } else {
                    if ($(`#team_data`).val().length == 0) {
                        DataObj = [];
                    } else {
                        DataObj = JSON.parse($(`#team_data`).val());
                    }
                    console.log(DataObj);
                    item = {}
                    item["team_id"] = count;
                    item["team_name"] = dataString.get('team_name');
                    item["team_title"] = dataString.get('team_title');
                    item["team_desc"] = dataString.get('team_desc');
                    DataObj.push(item);
                    $(`#team_data`).html(JSON.stringify(DataObj));
                    $(`#Createteam`)[0].reset();
                    Addteam();
                    successMsg("Team Member Added Sucssesfully");
                }
                return false;
            }
        });
    }



    var createasset = function() {
        $("#Createasset").validate({
            // define validation rules
            rules: {
                asset_title: {
                    required: true,
                },
                asset_value: {
                    required: true,
                },
            },


            //display error alert on form submit  
            invalidHandler: function(event, validator) {
                validator.focusInvalid();
                event.preventDefault();
            },

            submitHandler: function(form) {
                var dataString = new FormData(form);
                DataObj = [];
                var obj = $(`.data-asset`);
                var count = 1;
                for (let i = 0; i < obj.length; i++) {
                    count = $(obj[i]).data("count") + 1;
                }
                if ($(`#asset_id`).val().length != 0) {
                    DataObj = JSON.parse($(`#asset_data`).val());
                    let id = $(`#asset_id`).val();
                    DataObj.forEach(data => {
                        for (let key in data) {
                            if (key == 'asset_id' && data[key] == id) {
                                for (let key in data) {
                                    data[key] = dataString.get(key);
                                }
                            }
                        }
                    });
                    $(`#asset_data`).html(JSON.stringify(DataObj));
                    Addasset();
                    $(`#Createasset`)[0].reset();
                    $(`#asset_id`).val('');
                    $(`[data-main-title="asset-module"]`).html("Create")
                    successMsg("Asset Item Updated Sucssesfully");
                } else {
                    if ($(`#asset_data`).val().length == 0) {
                        DataObj = [];
                    } else {
                        DataObj = JSON.parse($(`#asset_data`).val());
                    }
                    item = {}
                    item["asset_id"] = count;
                    item["asset_title"] = dataString.get('asset_title');
                    item["asset_value"] = dataString.get('asset_value');
                    DataObj.push(item);
                    $(`#asset_data`).html(JSON.stringify(DataObj));
                    $(`#Createasset`)[0].reset();
                    Addasset();
                    successMsg("Asset Item Added Sucssesfully");
                }
                return false;
            }
        });
    }

    var createdebt = function() {
        $("#Createdebt").validate({
            // define validation rules
            rules: {
                debt_title: {
                    required: true,
                },
                debt_value: {
                    required: true,
                },
            },


            //display error alert on form submit  
            invalidHandler: function(event, validator) {
                validator.focusInvalid();
                event.preventDefault();
            },

            submitHandler: function(form) {
                var dataString = new FormData(form);
                DataObj = [];
                var obj = $(`.data-debt`);
                var count = 1;
                for (let i = 0; i < obj.length; i++) {
                    count = $(obj[i]).data("count") + 1;
                }
                if ($(`#debt_id`).val().length != 0) {
                    DataObj = JSON.parse($(`#debt_data`).val());
                    let id = $(`#debt_id`).val();
                    DataObj.forEach(data => {
                        for (let key in data) {
                            if (key == 'debt_id' && data[key] == id) {
                                for (let key in data) {
                                    data[key] = dataString.get(key);
                                }
                            }
                        }
                    });
                    $(`#debt_data`).html(JSON.stringify(DataObj));
                    Adddebt();
                    $(`#Createdebt`)[0].reset();
                    $(`#debt_id`).val('');
                    $(`[data-main-title="debt-module"]`).html("Create")
                    successMsg("debt Item Updated Sucssesfully");
                } else {
                    if ($(`#debt_data`).val().length == 0) {
                        DataObj = [];
                    } else {
                        DataObj = JSON.parse($(`#debt_data`).val());
                    }
                    item = {}
                    item["debt_id"] = count;
                    item["debt_title"] = dataString.get('debt_title');
                    item["debt_value"] = dataString.get('debt_value');
                    DataObj.push(item);
                    $(`#debt_data`).html(JSON.stringify(DataObj));
                    $(`#Createdebt`)[0].reset();
                    Adddebt();
                    successMsg("debt Item Added Sucssesfully");
                }
                return false;
            }
        });
    }


    var createequity = function() {
        $("#Createequity").validate({
            // define validation rules
            rules: {
                equity_title: {
                    required: true,
                },
                equity_value: {
                    required: true,
                },
            },


            //display error alert on form submit  
            invalidHandler: function(event, validator) {
                validator.focusInvalid();
                event.preventDefault();
            },

            submitHandler: function(form) {
                var dataString = new FormData(form);
                DataObj = [];
                var obj = $(`.data-equity`);
                var count = 1;
                for (let i = 0; i < obj.length; i++) {
                    count = $(obj[i]).data("count") + 1;
                }
                if ($(`#equity_id`).val().length != 0) {
                    DataObj = JSON.parse($(`#equity_data`).val());
                    let id = $(`#equity_id`).val();
                    DataObj.forEach(data => {
                        for (let key in data) {
                            if (key == 'equity_id' && data[key] == id) {
                                for (let key in data) {
                                    data[key] = dataString.get(key);
                                }
                            }
                        }
                    });
                    $(`#equity_data`).html(JSON.stringify(DataObj));
                    Addequity();
                    $(`#Createequity`)[0].reset();
                    $(`#equity_id`).val('');
                    $(`[data-main-title="equity-module"]`).html("Create")
                    successMsg("equity Item Updated Sucssesfully");
                } else {
                    if ($(`#equity_data`).val().length == 0) {
                        DataObj = [];
                    } else {
                        DataObj = JSON.parse($(`#equity_data`).val());
                    }
                    item = {}
                    item["equity_id"] = count;
                    item["equity_title"] = dataString.get('equity_title');
                    item["equity_value"] = dataString.get('equity_value');
                    DataObj.push(item);
                    $(`#equity_data`).html(JSON.stringify(DataObj));
                    $(`#Createequity`)[0].reset();
                    Addequity();
                    successMsg("equity Item Added Sucssesfully");
                }
                return false;
            }
        });
    }


    return {

        init: function() {
            mainform();
            createOffer();
            createhighlight();
            boardmember();
            createofficers();
            createvoting();
            createrisk();
            createfundraising();
            createtransactions();
            createquestions();
            creatediscussion();
            createteam();
            createequity();
            createdebt();
            createasset();
        }
    };
}();

jQuery(document).ready(function() {
    KTFormControls.init();




    $("input,textarea").keyup(function() {

        var attr = $(this).data('for');

        if (typeof attr !== 'undefined' && attr !== false) {
            if ($(`#${attr}`).val().length == 0) {
                var obj = $(`[data-for="${attr}"]`);
                var flag = false;
                for (let i = 0; i < obj.length; i++) {
                    if ($(obj[i]).val().length > 0) {
                        flag = true;
                    } else {
                        flag = false;
                        break;
                    }
                }
            } else {
                var $checkbox = $(`[data-for-check="${attr}"]`);
                $checkbox.prop("checked", true);
            }
        } else {
            const data_id = $(this).data("id");
            var obj = $(`[data-id="${data_id}"]`);
            var flag = false;
            for (let i = 0; i < obj.length; i++) {
                if ($(obj[i]).val().length > 0) {
                    flag = true;
                } else {
                    flag = false;
                    break;
                }
            }
            var $checkbox = $(`#${data_id}`);
            if (flag) {
                $checkbox.prop("checked", flag);
            } else {
                $checkbox.prop("checked", flag);
            }
        }
    });

    $(".item-check").on("click", function() {
        const data_id = $(this).attr('id');
        var obj = $(`[data-id="${data_id}"]`);
        var flag = false;
        for (let i = 0; i < obj.length; i++) {
            if ($(obj[i]).val().length > 0) {
                flag = true;
            } else {
                flag = false;
                break;
            }
        }
        $(this).prop("checked", flag);
    });

    $("#showcase").on("click", function() {
        const data_id = $(this).attr('id');
        var obj = $(`[data-hide="${data_id}"]`);
        for (let i = 0; i < obj.length; i++) {
            if ($(obj[i]).hasClass("hidden")) {
                $(obj[i]).removeClass('hidden');
                if ($('[data-errorh="showcase"]').hasClass('form-control is-invalid')) {
                    $('[data-errorh="showcase"]').removeClass('form-control is-invalid', true)
                }
            } else {
                $(obj[i]).addClass('hidden');
                if (!$('[data-errorh="showcase"]').hasClass('form-control is-invalid')) {
                    $('[data-errorh="showcase"]').addClass('form-control is-invalid', true)
                }
            }
        }
    });



    $(".item-lable").on("click", function() {
        const data_label = $(this).data("label");
        var obj = $(`[data-id="${data_label}"]`);
        for (let i = 0; i < obj.length; i++) {
            if ($(obj[i]).val().length > 0) {
                $(obj[i]).focus();
            } else {
                $(obj[i]).focus();
                break;
            }
        }
    });


    $(".item-move").on("click", function() {

        var defaultAnchorOffset = 0;

        const data_label = $(this).data("move");

        var anchorOffset = $('#' + data_label).attr('data-scroll-offset');
        if (!anchorOffset)
            anchorOffset = defaultAnchorOffset;
        $('#' + data_label).focus()

    });

    $(".check-item-agree").on("click", function() {

        const data_check = $(this).data("check");
        const data_title = $(this).data("title");
        $(`#${data_check}-error`).remove();
        if ($(this).prop('checked')) {
            const html = `<div class="col-md-6 mb-4 add-check" data-block="${data_check}">
            <div class="information-box">
                <div class="row">
                    <div class="col-sm-11 col-md-11">
                        <span class="text">${data_title}</span>
                    </div>
                    <div class="col-sm-1 col-md-1">
                        <svg class="" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                            <path
                                d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path
                                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>`;
            $(`#${data_check}`).after(html);

            if ($(`[data-errorh="${data_check}"]`).hasClass('form-control is-invalid')) {
                $(`[data-errorh="${data_check}"]`).removeClass('form-control is-invalid', true)
            }
        } else {
            $(`[data-block="${data_check}"]`).remove();
            if (!$(`[data-edit="${data_check}"]`).hasClass("hidden")) {
                $(`[data-edit="${data_check}"]`).addClass('hidden');
            }
            if (!$(`[data-errorh="${data_check}"]`).hasClass('form-control is-invalid')) {
                $(`[data-errorh="${data_check}"]`).addClass('form-control is-invalid', true)
                $(`[data-errorh ="${data_check}"]`).after(`<div id="${data_check}-error" class="error invalid-feedback">This field is required.</div>`)
            }
        }
    });

    $(document).on('click', '.add-check', function() {
        const data_block = $(this).data("block");
        if ($(`[data-form-id ="${data_block}"]`).val().length != 0) {
            $(`[data-form ="${data_block}"]`)[0].reset();
            $(`[data-form-id ="${data_block}"]`).val('');

        }
        var obj = $(`.zero-top`);
        for (let i = 0; i < obj.length; i++) {
            if (!$(obj[i]).hasClass("hidden")) {
                $(obj[i]).addClass('hidden');
            }
        }

        if ($(`[data-edit="${data_block}"]`).hasClass("hidden")) {
            $(`[data-edit="${data_block}"]`).removeClass('hidden');
            $(`[data-input="${data_block}"]`).focus();
            $(`[data-main-title="${data_block}"]`).html("Create")
        } else {
            $(`[data-edit="${data_block}"]`).addClass('hidden');
        }
    });


    $(document).on('click', '.editdata', function() {
        var obj = $(`.zero-top`);
        for (let i = 0; i < obj.length; i++) {
            if (!$(obj[i]).hasClass("hidden")) {
                $(obj[i]).addClass('hidden');
            }
        }
        const data_object = $(this).data("object");
        if ($(`[data-edit="${data_object}"]`).hasClass("hidden")) {
            $(`[data-edit="${data_object}"]`).removeClass('hidden');
            $(`[data-input="${data_object}"]`).focus();
        }
    });

    $(document).on('click', '.edit-offer', function() {
        $(`[data-main-title="${$(this).data("object")}"]`).html("Edit")
        const data_number = $(this).data("editcount");
        DataObj = JSON.parse($(`#offers_data`).val());
        DataObj.forEach(data => {
            for (let key in data)
                if (key == 'offer_id' && data[key] == data_number) {
                    for (let key in data) {
                        $(`[name="${key}"]`).val(data[key]);
                    }
                }
        });
    });

    // $(".center-main-content").scroll(function() {
    //     $('.zero-top').each(function() {
    //         if (!$(this).hasClass("hidden")) {
    //             const data_edit = $(this).data("edit");
    //             if ($(`[data-input="${data_edit}"]`).val().length == 0) {
    //                 $(this).addClass('hidden');
    //             }
    //         }
    //     });
    // });


});

function Addoffer() {

    data = JSON.parse($(`#offers_data`).val());
    $(`.data-offer`).remove();
    jQuery.each(data, function(i, val) {
        if (val.offer_title.length > 40) {
            title = val.offer_title.substring(0, 40) + '...';
        } else {
            title = val.offer_title;
        }

        const html = `<div class="col-md-12 mb-4 data-offer"  data-count="${val.offer_id}">
        <div class="information-box">
            <div class="row">
                <div class="col-sm-1 col-md-1">
                    <span class="text">${('0' + val.offer_id).slice(-2)}</span>
                </div>
                <div class="col-sm-1 col-md-5">
                    <span class="text">${title}</span>
                </div>
                <div class="col-sm-1 col-md-5">
                    <span class="text">investor Amount: </span>
                    <span class="text-bold"> $${val.offer_amount}</span>
                </div>
                <div class="col-sm-1 col-md-1 edit-offer editdata" data-object="offer-module" data-editcount = ${val.offer_id}>
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
        $(`#display-offer`).append(html)

    });
}


$(document).on('click', '.edit-highlights', function() {
    $(`[data-main-title="${$(this).data("object")}"]`).html("Edit")
    const data_number = $(this).data("editcount");
    DataObj = JSON.parse($(`#highlights_data`).val());
    DataObj.forEach(data => {
        for (let key in data)
            if (key == 'highlight_id' && data[key] == data_number) {
                for (let key in data) {
                    $(`[name="${key}"]`).val(data[key]);
                }
            }
    });
});

function Addhighlights() {

    data = JSON.parse($(`#highlights_data`).val());
    $(`.data-highlights`).remove();
    jQuery.each(data, function(i, val) {
        if (val.highlight_title.length > 40) {
            title = val.highlight_title.substring(0, 40) + '...';
        } else {
            title = val.highlight_title;
        }
        const html = `<div class="col-md-12 mb-4 data-highlights"  data-count="${val.highlight_id}">
        <div class="information-box">
            <div class="row">
                <div class="col-sm-1 col-md-1">
                    <span class="text">${('0' + val.highlight_id).slice(-2)}</span>
                </div>
                <div class="col-sm-1 col-md-10">
                    <span class="text">${title}</span>
                </div>
                <div class="col-sm-1 col-md-1 edit-highlights editdata" data-object="highlights-module" data-editcount = ${val.highlight_id}>
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
        $(`#display-highlights`).append(html)
    });

}


$(document).on('click', '.edit-boardteam', function() {
    $(`[data-main-title="${$(this).data("object")}"]`).html("Edit")
    const data_number = $(this).data("editcount");
    DataObj = JSON.parse($(`#board_data`).val());
    DataObj.forEach(data => {
        for (let key in data)
            if (key == 'board_id' && data[key] == data_number) {
                for (let key in data) {
                    $(`[name="${key}"]`).val(data[key]);
                }
            }
    });
});

$(document).on('click', '.delete-boardteam', function() {
    const data_number = $(this).data("deletecount");
    DataObj = JSON.parse($(`#board_data`).val());
    var flag = false;
    jQuery.each(DataObj, function(i, val) {
        if (val.board_id == `${data_number}`) // delete index
        {
            delete DataObj[i];
            flag = true;
        }

        if (flag) {
            val.board_id = parseInt(val.board_id) - 1;
        }
    });
    var arr = [];
    arr = DataObj.filter(function(n) { return n });
    $(`#board_data`).html(JSON.stringify(arr));
    Addboardteam()

});

function Addboardteam() {
    data = JSON.parse($(`#board_data`).val());
    $(`.data-boardteam`).remove();
    jQuery.each(data, function(i, val) {
        if (val.board_name.length > 40) {
            title = val.board_name.substring(0, 40) + '...';
        } else {
            title = val.board_name;
        }
        const html = `<div class="col-md-12 mb-4 data-boardteam"  data-count="${val.board_id}">
    <div class="information-box">
        <div class="row">
            <div class="col-sm-1 col-md-1">
                <span class="text">${('0' + val.board_id).slice(-2)}</span>
            </div>
            <div class="col-sm-1 col-md-9">
                <span class="text">${title}</span>
            </div>
            <div class="col-sm-1 col-md-1 delete-boardteam" data-deletecount = ${val.board_id}>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-trash" viewBox="0 0 16 16">
                                    <path
                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                    <path fill-rule="evenodd"
                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                </svg>
                            </div>
            <div class="col-sm-1 col-md-1 edit-boardteam editdata" data-object="board-module" data-editcount = ${val.board_id}>
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

        $(`#display-board`).append(html)
    });
}


$(document).on('click', '.edit-voting', function() {
    $(`[data-main-title="${$(this).data("object")}"]`).html("Edit")
    const data_number = $(this).data("editcount");
    DataObj = JSON.parse($(`#voting_data`).val());
    DataObj.forEach(data => {
        for (let key in data)
            if (key == 'voting_id' && data[key] == data_number) {
                for (let key in data) {
                    $(`[name="${key}"]`).val(data[key]);
                }
            }
    });
});

$(document).on('click', '.delete-voting', function() {
    const data_number = $(this).data("deletecount");
    DataObj = JSON.parse($(`#voting_data`).val());
    var flag = false;
    jQuery.each(DataObj, function(i, val) {
        if (val.voting_id == `${data_number}`) // delete index
        {
            delete DataObj[i];
            flag = true;
        }

        if (flag) {
            val.voting_id = parseInt(val.voting_id) - 1;
        }
    });
    var arr = [];
    arr = DataObj.filter(function(n) { return n });
    $(`#voting_data`).html(JSON.stringify(arr));
    Addvoting()

});

function Addvoting() {
    data = JSON.parse($(`#voting_data`).val());
    $(`.data-voting`).remove();
    jQuery.each(data, function(i, val) {
        if (val.voting_title.length > 40) {
            title = val.voting_title.substring(0, 40) + '...';
        } else {
            title = val.voting_title;
        }
        const html = `<div class="col-md-12 mb-4 data-voting"  data-count="${val.voting_id}">
    <div class="information-box">
        <div class="row">
            <div class="col-sm-1 col-md-1">
                <span class="text">${('0' + val.voting_id).slice(-2)}</span>
            </div>
            <div class="col-sm-1 col-md-9">
                <span class="text">${title}</span>
            </div>
            <div class="col-sm-1 col-md-1 delete-voting" data-deletecount = ${val.voting_id}>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-trash" viewBox="0 0 16 16">
                                    <path
                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                    <path fill-rule="evenodd"
                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                </svg>
                            </div>
            <div class="col-sm-1 col-md-1 edit-voting editdata" data-object="voting-module" data-editcount = ${val.voting_id}>
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

        $(`#display-voting`).append(html)
    });
}

$(document).on('click', '.edit-risk', function() {
    $(`[data-main-title="${$(this).data("object")}"]`).html("Edit")
    const data_number = $(this).data("editcount");
    DataObj = JSON.parse($(`#risk_data`).val());
    DataObj.forEach(data => {
        for (let key in data)
            if (key == 'risk_id' && data[key] == data_number) {
                for (let key in data) {
                    $(`[name="${key}"]`).val(data[key]);
                }
            }
    });
});

$(document).on('click', '.delete-risk', function() {
    const data_number = $(this).data("deletecount");
    DataObj = JSON.parse($(`#risk_data`).val());
    var flag = false;
    jQuery.each(DataObj, function(i, val) {
        if (val.risk_id == `${data_number}`) // delete index
        {
            delete DataObj[i];
            flag = true;
        }

        if (flag) {
            val.risk_id = parseInt(val.risk_id) - 1;
        }
    });
    var arr = [];
    arr = DataObj.filter(function(n) { return n });
    $(`#risk_data`).html(JSON.stringify(arr));
    Addrisk()

});

function Addrisk() {
    data = JSON.parse($(`#risk_data`).val());
    $(`.data-risk`).remove();
    jQuery.each(data, function(i, val) {
        if (val.risk_title.length > 40) {
            title = val.risk_title.substring(0, 40) + '...';
        } else {
            title = val.risk_title;
        }
        const html = `<div class="col-md-12 mb-4 data-risk"  data-count="${val.risk_id}">
    <div class="information-box">
        <div class="row">
            <div class="col-sm-1 col-md-1">
                <span class="text">${('0' + val.risk_id).slice(-2)}</span>
            </div>
            <div class="col-sm-1 col-md-9">
                <span class="text">${title}</span>
            </div>
            <div class="col-sm-1 col-md-1 delete-risk" data-deletecount = ${val.risk_id}>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-trash" viewBox="0 0 16 16">
                                    <path
                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                    <path fill-rule="evenodd"
                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                </svg>
                            </div>
            <div class="col-sm-1 col-md-1 edit-risk editdata" data-object="risk-module" data-editcount = ${val.risk_id}>
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

        $(`#display-risk`).append(html)
    });
}

$(document).on('click', '.edit-fundraising', function() {
    $(`[data-main-title="${$(this).data("object")}"]`).html("Edit")
    const data_number = $(this).data("editcount");
    DataObj = JSON.parse($(`#fundraising_data`).val());
    DataObj.forEach(data => {
        for (let key in data)
            if (key == 'fundraising_id' && data[key] == data_number) {
                for (let key in data) {
                    $(`[name="${key}"]`).val(data[key]);
                }
            }
    });
});

$(document).on('click', '.delete-fundraising', function() {
    const data_number = $(this).data("deletecount");
    DataObj = JSON.parse($(`#fundraising_data`).val());
    var flag = false;
    jQuery.each(DataObj, function(i, val) {
        if (val.fundraising_id == `${data_number}`) // delete index
        {
            delete DataObj[i];
            flag = true;
        }

        if (flag) {
            val.fundraising_id = parseInt(val.fundraising_id) - 1;
        }
    });
    var arr = [];
    arr = DataObj.filter(function(n) { return n });
    $(`#fundraising_data`).html(JSON.stringify(arr));
    Addfundraising()

});

function Addfundraising() {
    data = JSON.parse($(`#fundraising_data`).val());
    $(`.data-fundraising`).remove();
    jQuery.each(data, function(i, val) {
        if (val.fundraising_funds.length > 40) {
            title = val.fundraising_funds.substring(0, 40) + '...';
        } else {
            title = val.fundraising_funds;
        }
        const html = `<div class="col-md-12 mb-4 data-fundraising"  data-count="${val.fundraising_id}">
    <div class="information-box">
        <div class="row">
            <div class="col-sm-1 col-md-1">
                <span class="text">${('0' + val.fundraising_id).slice(-2)}</span>
            </div>
            <div class="col-sm-1 col-md-9">
                <span class="text">${title}</span>
            </div>
            <div class="col-sm-1 col-md-1 delete-fundraising" data-deletecount = ${val.fundraising_id}>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-trash" viewBox="0 0 16 16">
                                    <path
                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                    <path fill-rule="evenodd"
                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                </svg>
                            </div>
            <div class="col-sm-1 col-md-1 edit-fundraising editdata" data-object="fundraising-module" data-editcount = ${val.fundraising_id}>
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

        $(`#display-fundraising`).append(html)
    });
}

$(document).on('click', '.edit-transactions', function() {
    $(`[data-main-title="${$(this).data("object")}"]`).html("Edit")
    const data_number = $(this).data("editcount");
    DataObj = JSON.parse($(`#transactions_data`).val());
    DataObj.forEach(data => {
        for (let key in data)
            if (key == 'transactions_id' && data[key] == data_number) {
                for (let key in data) {
                    $(`[name="${key}"]`).val(data[key]);
                }
            }
    });
});

$(document).on('click', '.delete-transactions', function() {
    const data_number = $(this).data("deletecount");
    DataObj = JSON.parse($(`#transactions_data`).val());
    var flag = false;
    jQuery.each(DataObj, function(i, val) {
        if (val.transactions_id == `${data_number}`) // delete index
        {
            delete DataObj[i];
            flag = true;
        }

        if (flag) {
            val.transactions_id = parseInt(val.transactions_id) - 1;
        }
    });
    var arr = [];
    arr = DataObj.filter(function(n) { return n });
    $(`#transactions_data`).html(JSON.stringify(arr));
    Addtransaction()

});

function Addtransaction() {
    data = JSON.parse($(`#transactions_data`).val());
    $(`.data-transactions`).remove();
    jQuery.each(data, function(i, val) {
        if (val.transactions_title.length > 40) {
            title = val.transactions_title.substring(0, 40) + '...';
        } else {
            title = val.transactions_title;
        }
        const html = `<div class="col-md-12 mb-4 data-transactions"  data-count="${val.transactions_id}">
    <div class="information-box">
        <div class="row">
            <div class="col-sm-1 col-md-1">
                <span class="text">${('0' + val.transactions_id).slice(-2)}</span>
            </div>
            <div class="col-sm-1 col-md-9">
                <span class="text">${title}</span>
            </div>
            <div class="col-sm-1 col-md-1 delete-transactions" data-deletecount = ${val.transactions_id}>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-trash" viewBox="0 0 16 16">
                                    <path
                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                    <path fill-rule="evenodd"
                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                </svg>
                            </div>
            <div class="col-sm-1 col-md-1 edit-transactions editdata" data-object="transactions-module" data-editcount = ${val.transactions_id}>
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

        $(`#display-transactions`).append(html)
    });
}


$(document).on('click', '.edit-questions', function() {
    $(`[data-main-title="${$(this).data("object")}"]`).html("Edit")
    const data_number = $(this).data("editcount");
    DataObj = JSON.parse($(`#questions_data`).val());
    DataObj.forEach(data => {
        for (let key in data)
            if (key == 'questions_id' && data[key] == data_number) {
                for (let key in data) {
                    $(`[name="${key}"]`).val(data[key]);
                }
            }
    });
});

$(document).on('click', '.delete-questions', function() {
    const data_number = $(this).data("deletecount");
    DataObj = JSON.parse($(`#questions_data`).val());
    var flag = false;
    jQuery.each(DataObj, function(i, val) {
        if (val.questions_id == `${data_number}`) // delete index
        {
            delete DataObj[i];
            flag = true;
        }

        if (flag) {
            val.questions_id = parseInt(val.questions_id) - 1;
        }
    });
    var arr = [];
    arr = DataObj.filter(function(n) { return n });
    $(`#questions_data`).html(JSON.stringify(arr));
    Addquestion()

});

function Addquestion() {
    data = JSON.parse($(`#questions_data`).val());
    $(`.data-questions`).remove();
    jQuery.each(data, function(i, val) {
        if (val.questions_title.length > 40) {
            title = val.questions_title.substring(0, 40) + '...';
        } else {
            title = val.questions_title;
        }
        const html = `<div class="col-md-12 mb-4 data-questions"  data-count="${val.questions_id}">
    <div class="information-box">
        <div class="row">
            <div class="col-sm-1 col-md-1">
                <span class="text">${('0' + val.questions_id).slice(-2)}</span>
            </div>
            <div class="col-sm-1 col-md-9">
                <span class="text">${title}</span>
            </div>
            <div class="col-sm-1 col-md-1 delete-questions" data-deletecount = ${val.questions_id}>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-trash" viewBox="0 0 16 16">
                                    <path
                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                    <path fill-rule="evenodd"
                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                </svg>
                            </div>
            <div class="col-sm-1 col-md-1 edit-questions editdata" data-object="questions-module" data-editcount = ${val.questions_id}>
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

        $(`#display-questions`).append(html)
    });
}

$(document).on('click', '.edit-discussion', function() {
    $(`[data-main-title="${$(this).data("object")}"]`).html("Edit")
    const data_number = $(this).data("editcount");
    DataObj = JSON.parse($(`#discussion_data`).val());
    DataObj.forEach(data => {
        for (let key in data)
            if (key == 'discussion_id' && data[key] == data_number) {
                for (let key in data) {
                    $(`[name="${key}"]`).val(data[key]);
                }
            }
    });
});

$(document).on('click', '.delete-discussion', function() {
    const data_number = $(this).data("deletecount");
    DataObj = JSON.parse($(`#discussion_data`).val());
    var flag = false;
    jQuery.each(DataObj, function(i, val) {
        if (val.discussion_id == `${data_number}`) // delete index
        {
            delete DataObj[i];
            flag = true;
        }

        if (flag) {
            val.discussion_id = parseInt(val.discussion_id) - 1;
        }
    });
    var arr = [];
    arr = DataObj.filter(function(n) { return n });
    $(`#discussion_data`).html(JSON.stringify(arr));
    Adddiscussion()

});

function Adddiscussion() {
    data = JSON.parse($(`#discussion_data`).val());
    $(`.data-discussion`).remove();
    jQuery.each(data, function(i, val) {
        if (val.discussion_title.length > 40) {
            title = val.discussion_title.substring(0, 40) + '...';
        } else {
            title = val.discussion_title;
        }
        const html = `<div class="col-md-12 mb-4 data-discussion"  data-count="${val.discussion_id}">
    <div class="information-box">
        <div class="row">
            <div class="col-sm-1 col-md-1">
                <span class="text">${('0' + val.discussion_id).slice(-2)}</span>
            </div>
            <div class="col-sm-1 col-md-9">
                <span class="text">${title}</span>
            </div>
            <div class="col-sm-1 col-md-1 delete-discussion" data-deletecount = ${val.discussion_id}>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-trash" viewBox="0 0 16 16">
                                    <path
                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                    <path fill-rule="evenodd"
                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                </svg>
                            </div>
            <div class="col-sm-1 col-md-1 edit-discussion editdata" data-object="discussion-module" data-editcount = ${val.discussion_id}>
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

$(document).on('click', '.edit-officers', function() {
    $(`[data-main-title="${$(this).data("object")}"]`).html("Edit")
    const data_number = $(this).data("editcount");
    DataObj = JSON.parse($(`#officers_data`).val());
    DataObj.forEach(data => {
        for (let key in data)
            if (key == 'officers_id' && data[key] == data_number) {
                for (let key in data) {
                    $(`[name="${key}"]`).val(data[key]);
                }
            }
    });
});

$(document).on('click', '.delete-officers', function() {
    const data_number = $(this).data("deletecount");
    DataObj = JSON.parse($(`#officers_data`).val());
    var flag = false;
    jQuery.each(DataObj, function(i, val) {
        if (val.officers_id == `${data_number}`) // delete index
        {
            delete DataObj[i];
            flag = true;
        }

        if (flag) {
            val.officers_id = parseInt(val.officers_id) - 1;
        }
    });
    var arr = [];
    arr = DataObj.filter(function(n) { return n });
    $(`#officers_data`).html(JSON.stringify(arr));
    Addofficers()

});

function Addofficers() {
    data = JSON.parse($(`#officers_data`).val());
    $(`.data-officers`).remove();
    jQuery.each(data, function(i, val) {
        if (val.officers_name.length > 40) {
            title = val.officers_name.substring(0, 40) + '...';
        } else {
            title = val.officers_name;
        }
        const html = `<div class="col-md-12 mb-4 data-officers"  data-count="${val.officers_id}">
    <div class="information-box">
        <div class="row">
            <div class="col-sm-1 col-md-1">
                <span class="text">${('0' + val.officers_id).slice(-2)}</span>
            </div>
            <div class="col-sm-1 col-md-9">
                <span class="text">${title}</span>
            </div>
            <div class="col-sm-1 col-md-1 delete-officers" data-deletecount = ${val.officers_id}>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-trash" viewBox="0 0 16 16">
                                    <path
                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                    <path fill-rule="evenodd"
                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                </svg>
                            </div>
            <div class="col-sm-1 col-md-1 edit-officers editdata" data-object="officers-module" data-editcount = ${val.officers_id}>
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

        $(`#display-officers`).append(html)
    });
}

$(document).on('click', '.edit-team', function() {
    $(`[data-main-title="${$(this).data("object")}"]`).html("Edit")
    const data_number = $(this).data("editcount");
    DataObj = JSON.parse($(`#team_data`).val());
    DataObj.forEach(data => {
        for (let key in data)
            if (key == 'team_id' && data[key] == data_number) {
                for (let key in data) {
                    $(`[name="${key}"]`).val(data[key]);
                }
            }
    });
});

$(document).on('click', '.delete-team', function() {
    const data_number = $(this).data("deletecount");
    DataObj = JSON.parse($(`#team_data`).val());
    var flag = false;
    jQuery.each(DataObj, function(i, val) {
        if (val.team_id == `${data_number}`) // delete index
        {
            delete DataObj[i];
            flag = true;
        }

        if (flag) {
            val.team_id = parseInt(val.team_id) - 1;
        }
    });
    var arr = [];
    arr = DataObj.filter(function(n) { return n });
    $(`#team_data`).html(JSON.stringify(arr));
    Addteam()
});

function Addteam() {
    data = JSON.parse($(`#team_data`).val());
    $(`.data-team`).remove();
    jQuery.each(data, function(i, val) {
        if (val.team_name.length > 40) {
            title = val.team_name.substring(0, 40) + '...';
        } else {
            title = val.team_name;
        }
        const html = `<div class="col-md-12 mb-4 data-team"  data-count="${val.team_id}">
    <div class="information-box">
        <div class="row">
            <div class="col-sm-1 col-md-1">
                <span class="text">${('0' + val.team_id).slice(-2)}</span>
            </div>
            <div class="col-sm-1 col-md-9">
                <span class="text">${title}</span>
            </div>
            <div class="col-sm-1 col-md-1 delete-team" data-deletecount = ${val.team_id}>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-trash" viewBox="0 0 16 16">
                                    <path
                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                    <path fill-rule="evenodd"
                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                </svg>
                            </div>
            <div class="col-sm-1 col-md-1 edit-team editdata" data-object="team-module" data-editcount = ${val.team_id}>
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

        $(`#display-team`).append(html)
    });
}

$(document).on('click', '.edit-asset', function() {
    $(`[data-main-title="${$(this).data("object")}"]`).html("Edit")
    const data_number = $(this).data("editcount");
    DataObj = JSON.parse($(`#asset_data`).val());
    DataObj.forEach(data => {
        for (let key in data)
            if (key == 'asset_id' && data[key] == data_number) {
                for (let key in data) {
                    $(`[name="${key}"]`).val(data[key]);
                }
            }
    });
});

$(document).on('click', '.delete-asset', function() {
    const data_number = $(this).data("deletecount");
    DataObj = JSON.parse($(`#asset_data`).val());
    var flag = false;
    jQuery.each(DataObj, function(i, val) {
        if (val.asset_id == `${data_number}`) // delete index
        {
            delete DataObj[i];
            flag = true;
        }

        if (flag) {
            val.asset_id = parseInt(val.asset_id) - 1;
        }
    });
    var arr = [];
    arr = DataObj.filter(function(n) { return n });
    $(`#asset_data`).html(JSON.stringify(arr));
    Addasset()
});

function Addasset() {
    data = JSON.parse($(`#asset_data`).val());
    $(`.data-asset`).remove();
    jQuery.each(data, function(i, val) {
        if (val.asset_title.length > 10) {
            title = val.asset_title.substring(0, 10) + '...';
        } else {
            title = val.asset_title;
        }


        const html = `<div class="col-md-12 mb-4 data-asset"  data-count="${val.asset_id}">
<div class="information-box">
    <div class="row">
        <div class="col-sm-1 col-md-1">
            <span class="text">${('0' + val.asset_id).slice(-2)}</span>
        </div>
        <div class="col-sm-1 col-md-7">
            <span class="text">${title}</span>
        </div>
        <div class="col-sm-1 col-md-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                fill="currentColor" class="bi bi-arrow-down-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M2 13.5a.5.5 0 0 0 .5.5h6a.5.5 0 0 0 0-1H3.707L13.854 2.854a.5.5 0 0 0-.708-.708L3 12.293V7.5a.5.5 0 0 0-1 0v6z" />
            </svg>
        </div>
        <div class="col-sm-1 col-md-1 delete-asset" data-deletecount = ${val.asset_id}>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                <path
                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                <path fill-rule="evenodd"
                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
            </svg>
        </div>
        <div class="col-sm-1 col-md-1 edit-asset editdata" data-object="asset-module" data-editcount = ${val.asset_id}>
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20"
                viewBox="0 0 48 48" style=" fill:#000000; ">
                <path
                    d="M 36 5.0097656 C 34.205301 5.0097656 32.410791 5.6901377 31.050781 7.0507812 L 8.9160156 29.183594 C 8.4960384 29.603571 8.1884588 30.12585 8.0253906 30.699219 L 5.0585938 41.087891 A 1.50015 1.50015 0 0 0 6.9121094 42.941406 L 17.302734 39.974609 A 1.50015 1.50015 0 0 0 17.304688 39.972656 C 17.874212 39.808939 18.39521 39.50518 18.816406 39.083984 L 40.949219 16.949219 C 43.670344 14.228094 43.670344 9.7719064 40.949219 7.0507812 C 39.589209 5.6901377 37.794699 5.0097656 36 5.0097656 z M 36 7.9921875 C 37.020801 7.9921875 38.040182 8.3855186 38.826172 9.171875 A 1.50015 1.50015 0 0 0 38.828125 9.171875 C 40.403 10.74675 40.403 13.25325 38.828125 14.828125 L 36.888672 16.767578 L 31.232422 11.111328 L 33.171875 9.171875 C 33.957865 8.3855186 34.979199 7.9921875 36 7.9921875 z M 29.111328 13.232422 L 34.767578 18.888672 L 16.693359 36.962891 C 16.634729 37.021121 16.560472 37.065723 16.476562 37.089844 L 8.6835938 39.316406 L 10.910156 31.521484 A 1.50015 1.50015 0 0 0 10.910156 31.519531 C 10.933086 31.438901 10.975086 31.366709 11.037109 31.304688 L 29.111328 13.232422 z">
                </path>
            </svg>
        </div>
    </div>
</div>
</div>`;



        $(`#display-asset`).append(html)
    });
}

$(document).on('click', '.edit-debt', function() {
    $(`[data-main-title="${$(this).data("object")}"]`).html("Edit")
    const data_number = $(this).data("editcount");
    DataObj = JSON.parse($(`#debt_data`).val());
    DataObj.forEach(data => {
        for (let key in data)
            if (key == 'debt_id' && data[key] == data_number) {
                for (let key in data) {
                    $(`[name="${key}"]`).val(data[key]);
                }
            }
    });
});

$(document).on('click', '.delete-debt', function() {
    const data_number = $(this).data("deletecount");
    DataObj = JSON.parse($(`#debt_data`).val());
    var flag = false;
    jQuery.each(DataObj, function(i, val) {
        if (val.debt_id == `${data_number}`) // delete index
        {
            delete DataObj[i];
            flag = true;
        }

        if (flag) {
            val.debt_id = parseInt(val.debt_id) - 1;
        }
    });
    var arr = [];
    arr = DataObj.filter(function(n) { return n });
    $(`#debt_data`).html(JSON.stringify(arr));
    Adddebt()
});

function Adddebt() {
    data = JSON.parse($(`#debt_data`).val());
    $(`.data-debt`).remove();
    jQuery.each(data, function(i, val) {
        if (val.debt_title.length > 10) {
            title = val.debt_title.substring(0, 10) + '...';
        } else {
            title = val.debt_title;
        }


        const html = `<div class="col-md-12 mb-4 data-debt"  data-count="${val.debt_id}">
<div class="information-box">
    <div class="row">
        <div class="col-sm-1 col-md-1">
            <span class="text">${('0' + val.debt_id).slice(-2)}</span>
        </div>
        <div class="col-sm-1 col-md-7">
            <span class="text">${title}</span>
        </div>
        <div class="col-sm-1 col-md-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                fill="currentColor" class="bi bi-arrow-down-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M2 13.5a.5.5 0 0 0 .5.5h6a.5.5 0 0 0 0-1H3.707L13.854 2.854a.5.5 0 0 0-.708-.708L3 12.293V7.5a.5.5 0 0 0-1 0v6z" />
            </svg>
        </div>
        <div class="col-sm-1 col-md-1 delete-debt" data-deletecount = ${val.debt_id}>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                <path
                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                <path fill-rule="evenodd"
                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
            </svg>
        </div>
        <div class="col-sm-1 col-md-1 edit-debt editdata" data-object="debt-module" data-editcount = ${val.debt_id}>
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20"
                viewBox="0 0 48 48" style=" fill:#000000; ">
                <path
                    d="M 36 5.0097656 C 34.205301 5.0097656 32.410791 5.6901377 31.050781 7.0507812 L 8.9160156 29.183594 C 8.4960384 29.603571 8.1884588 30.12585 8.0253906 30.699219 L 5.0585938 41.087891 A 1.50015 1.50015 0 0 0 6.9121094 42.941406 L 17.302734 39.974609 A 1.50015 1.50015 0 0 0 17.304688 39.972656 C 17.874212 39.808939 18.39521 39.50518 18.816406 39.083984 L 40.949219 16.949219 C 43.670344 14.228094 43.670344 9.7719064 40.949219 7.0507812 C 39.589209 5.6901377 37.794699 5.0097656 36 5.0097656 z M 36 7.9921875 C 37.020801 7.9921875 38.040182 8.3855186 38.826172 9.171875 A 1.50015 1.50015 0 0 0 38.828125 9.171875 C 40.403 10.74675 40.403 13.25325 38.828125 14.828125 L 36.888672 16.767578 L 31.232422 11.111328 L 33.171875 9.171875 C 33.957865 8.3855186 34.979199 7.9921875 36 7.9921875 z M 29.111328 13.232422 L 34.767578 18.888672 L 16.693359 36.962891 C 16.634729 37.021121 16.560472 37.065723 16.476562 37.089844 L 8.6835938 39.316406 L 10.910156 31.521484 A 1.50015 1.50015 0 0 0 10.910156 31.519531 C 10.933086 31.438901 10.975086 31.366709 11.037109 31.304688 L 29.111328 13.232422 z">
                </path>
            </svg>
        </div>
    </div>
</div>
</div>`;



        $(`#display-debt`).append(html)
    });
}

$(document).on('click', '.edit-equity', function() {
    $(`[data-main-title="${$(this).data("object")}"]`).html("Edit")
    const data_number = $(this).data("editcount");
    DataObj = JSON.parse($(`#equity_data`).val());
    DataObj.forEach(data => {
        for (let key in data)
            if (key == 'equity_id' && data[key] == data_number) {
                for (let key in data) {
                    $(`[name="${key}"]`).val(data[key]);
                }
            }
    });
});

$(document).on('click', '.delete-equity', function() {
    const data_number = $(this).data("deletecount");
    DataObj = JSON.parse($(`#equity_data`).val());
    var flag = false;
    jQuery.each(DataObj, function(i, val) {
        if (val.equity_id == `${data_number}`) // delete index
        {
            delete DataObj[i];
            flag = true;
        }

        if (flag) {
            val.equity_id = parseInt(val.equity_id) - 1;
        }
    });
    var arr = [];
    arr = DataObj.filter(function(n) { return n });
    $(`#equity_data`).html(JSON.stringify(arr));
    Addequity()
});

function Addequity() {
    data = JSON.parse($(`#equity_data`).val());
    $(`.data-equity`).remove();
    jQuery.each(data, function(i, val) {
        if (val.equity_title.length > 10) {
            title = val.equity_title.substring(0, 10) + '...';
        } else {
            title = val.equity_title;
        }


        const html = `<div class="col-md-12 mb-4 data-equity"  data-count="${val.equity_id}">
<div class="information-box">
    <div class="row">
        <div class="col-sm-1 col-md-1">
            <span class="text">${('0' + val.equity_id).slice(-2)}</span>
        </div>
        <div class="col-sm-1 col-md-7">
            <span class="text">${title}</span>
        </div>
        <div class="col-sm-1 col-md-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                fill="currentColor" class="bi bi-arrow-down-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M2 13.5a.5.5 0 0 0 .5.5h6a.5.5 0 0 0 0-1H3.707L13.854 2.854a.5.5 0 0 0-.708-.708L3 12.293V7.5a.5.5 0 0 0-1 0v6z" />
            </svg>
        </div>
        <div class="col-sm-1 col-md-1 delete-equity" data-deletecount = ${val.equity_id}>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                <path
                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                <path fill-rule="evenodd"
                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
            </svg>
        </div>
        <div class="col-sm-1 col-md-1 edit-equity editdata" data-object="equity-module" data-editcount = ${val.equity_id}>
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20"
                viewBox="0 0 48 48" style=" fill:#000000; ">
                <path
                    d="M 36 5.0097656 C 34.205301 5.0097656 32.410791 5.6901377 31.050781 7.0507812 L 8.9160156 29.183594 C 8.4960384 29.603571 8.1884588 30.12585 8.0253906 30.699219 L 5.0585938 41.087891 A 1.50015 1.50015 0 0 0 6.9121094 42.941406 L 17.302734 39.974609 A 1.50015 1.50015 0 0 0 17.304688 39.972656 C 17.874212 39.808939 18.39521 39.50518 18.816406 39.083984 L 40.949219 16.949219 C 43.670344 14.228094 43.670344 9.7719064 40.949219 7.0507812 C 39.589209 5.6901377 37.794699 5.0097656 36 5.0097656 z M 36 7.9921875 C 37.020801 7.9921875 38.040182 8.3855186 38.826172 9.171875 A 1.50015 1.50015 0 0 0 38.828125 9.171875 C 40.403 10.74675 40.403 13.25325 38.828125 14.828125 L 36.888672 16.767578 L 31.232422 11.111328 L 33.171875 9.171875 C 33.957865 8.3855186 34.979199 7.9921875 36 7.9921875 z M 29.111328 13.232422 L 34.767578 18.888672 L 16.693359 36.962891 C 16.634729 37.021121 16.560472 37.065723 16.476562 37.089844 L 8.6835938 39.316406 L 10.910156 31.521484 A 1.50015 1.50015 0 0 0 10.910156 31.519531 C 10.933086 31.438901 10.975086 31.366709 11.037109 31.304688 L 29.111328 13.232422 z">
                </path>
            </svg>
        </div>
    </div>
</div>
</div>`;

        $(`#display-equity`).append(html)
    });
}
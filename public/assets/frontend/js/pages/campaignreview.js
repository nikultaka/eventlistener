jQuery(document).ready(function() {
    $(`#main`).hide();
    $("input").prop("disabled", true);
    $("textarea").prop("disabled", true);
    $(".card").click(function() {
        $(`#main`).hide();
        $(`.card`).removeClass("active");
        $(this).addClass('active');
        var id = $(this).data('id');

        KTApp.block(`#${id}`, {
            overlayColor: '#000000',
            type: 'v2',
            state: 'success',
            size: 'lg'
        });

        setTimeout(function() {
            KTApp.unblock(`#${id}`);
        }, 2000);


        $(`.data-items`).remove();

        $.ajax({
            url: BASE_URL + '/campaigns-review/get-review',
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
                        $(`#main`).show();

                        $(`#Campaign_id`).val(response.data.champing_id);
                        $(`#Campaign_title`).val(response.data.campaign_title);
                        $(`#Campaign_desc`).html(response.data.campaign_desc);

                        var offerdata = JSON.parse(response.data.campaign_offerings);
                        jQuery.each(offerdata, function(i, val) {
                            if (val.offer_title.length > 40) {
                                title = val.offer_title.substring(0, 40) + '...';
                            } else {
                                title = val.offer_title;
                            }
                            const html = `<div class="col-md-12 mb-4 data-items">
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
                                </div>
                            </div>
                            </div>`;
                            $(`#display-Offerings`).append(html)
                        });

                        var Highlights = JSON.parse(response.data.campaign_highlights);
                        jQuery.each(Highlights, function(i, val) {
                            if (val.highlight_title.length > 40) {
                                title = val.highlight_title.substring(0, 40) + '...';
                            } else {
                                title = val.highlight_title;
                            }
                            const html = `<div class="col-md-12 mb-4 data-items" >
                            <div class="information-box">
                                <div class="row">
                                    <div class="col-sm-1 col-md-1">
                                        <span class="text">${('0' + val.highlight_id).slice(-2)}</span>
                                    </div>
                                    <div class="col-sm-1 col-md-10">
                                        <span class="text">${title}</span>
                                    </div>
                                 </div>
                            </div>
                        </div>`;
                            $(`#display-Highlights`).append(html)
                        });

                        var Board = JSON.parse(response.data.board_member);
                        jQuery.each(Board, function(i, val) {
                            if (val.board_name.length > 40) {
                                title = val.board_name.substring(0, 40) + '...';
                            } else {
                                title = val.board_name;
                            }
                            const html = `<div class="col-md-12 mb-4 data-boardteam data-items">
                        <div class="information-box">
                            <div class="row">
                                <div class="col-sm-1 col-md-1">
                                    <span class="text">${('0' + val.board_id).slice(-2)}</span>
                                </div>
                                <div class="col-sm-1 col-md-9">
                                    <span class="text">${title}</span>
                                </div>
                            </div>
                        </div>
                    </div>`;
                            $(`#display-Board`).append(html)
                        });

                        var Voting = JSON.parse(response.data.voting_power);
                        jQuery.each(Voting, function(i, val) {
                            if (val.voting_title.length > 40) {
                                title = val.voting_title.substring(0, 40) + '...';
                            } else {
                                title = val.voting_title;
                            }
                            const html = `<div class="col-md-12 mb-4 data-items">
                        <div class="information-box">
                            <div class="row">
                                <div class="col-sm-1 col-md-1">
                                    <span class="text">${('0' + val.voting_id).slice(-2)}</span>
                                </div>
                                <div class="col-sm-1 col-md-9">
                                    <span class="text">${title}</span>
                                </div>
                                
                            </div>
                        </div>
                    </div>`;

                            $(`#display-Voting`).append(html)
                        });

                        var Risks = JSON.parse(response.data.investor_risks);
                        jQuery.each(Risks, function(i, val) {
                            if (val.risk_title.length > 40) {
                                title = val.risk_title.substring(0, 40) + '...';
                            } else {
                                title = val.risk_title;
                            }
                            const html = `<div class="col-md-12 mb-4 data-items">
                        <div class="information-box">
                            <div class="row">
                                <div class="col-sm-1 col-md-1">
                                    <span class="text">${('0' + val.risk_id).slice(-2)}</span>
                                </div>
                                <div class="col-sm-1 col-md-9">
                                    <span class="text">${title}</span>
                                </div>
                            </div>
                        </div>
                    </div>`;

                            $(`#display-Risks`).append(html)
                        });

                        var Fundraising = JSON.parse(response.data.use_of_fundraising);
                        jQuery.each(Fundraising, function(i, val) {
                            if (val.fundraising_funds.length > 40) {
                                title = val.fundraising_funds.substring(0, 40) + '...';
                            } else {
                                title = val.fundraising_funds;
                            }
                            const html = `<div class="col-md-12 mb-4 data-items">
                        <div class="information-box">
                            <div class="row">
                                <div class="col-sm-1 col-md-1">
                                    <span class="text">${('0' + val.fundraising_id).slice(-2)}</span>
                                </div>
                                <div class="col-sm-1 col-md-9">
                                    <span class="text">${title}</span>
                                </div>
                            </div>
                        </div>
                    </div>`;

                            $(`#display-Fundraising`).append(html)
                        });

                        var Transactions = JSON.parse(response.data.party_transactions);
                        jQuery.each(Transactions, function(i, val) {
                            if (val.transactions_title.length > 40) {
                                title = val.transactions_title.substring(0, 40) + '...';
                            } else {
                                title = val.transactions_title;
                            }
                            const html = `<div class="col-md-12 mb-4 data-items">
                        <div class="information-box">
                            <div class="row">
                                <div class="col-sm-1 col-md-1">
                                    <span class="text">${('0' + val.transactions_id).slice(-2)}</span>
                                </div>
                                <div class="col-sm-1 col-md-9">
                                    <span class="text">${title}</span>
                                </div>
                            </div>
                        </div>
                    </div>`;

                            $(`#display-Transactions`).append(html)
                        });


                        var Questions = JSON.parse(response.data.asked_questions);
                        jQuery.each(Questions, function(i, val) {
                            if (val.questions_title.length > 40) {
                                title = val.questions_title.substring(0, 40) + '...';
                            } else {
                                title = val.questions_title;
                            }
                            const html = `<div class="col-md-12 mb-4 data-items">
                        <div class="information-box">
                            <div class="row">
                                <div class="col-sm-1 col-md-1">
                                    <span class="text">${('0' + val.questions_id).slice(-2)}</span>
                                </div>
                                <div class="col-sm-1 col-md-9">
                                    <span class="text">${title}</span>
                                </div>
                            </div>
                        </div>
                    </div>`;

                            $(`#display-Questions`).append(html)
                        });

                        var Discussion = JSON.parse(response.data.discussion_topics);
                        jQuery.each(Discussion, function(i, val) {
                            if (val.discussion_title.length > 40) {
                                title = val.discussion_title.substring(0, 40) + '...';
                            } else {
                                title = val.discussion_title;
                            }
                            const html = `<div class="col-md-12 mb-4 data-items">
                        <div class="information-box">
                            <div class="row">
                                <div class="col-sm-1 col-md-1">
                                    <span class="text">${('0' + val.discussion_id).slice(-2)}</span>
                                </div>
                                <div class="col-sm-1 col-md-9">
                                    <span class="text">${title}</span>
                                </div>
                               
                            </div>
                        </div>
                    </div>`;

                            $(`#display-Discussion`).append(html)
                        });

                        var Officers = JSON.parse(response.data.officer_member);
                        jQuery.each(Officers, function(i, val) {
                            if (val.officers_name.length > 40) {
                                title = val.officers_name.substring(0, 40) + '...';
                            } else {
                                title = val.officers_name;
                            }
                            const html = `<div class="col-md-12 mb-4 data-items">
                        <div class="information-box">
                            <div class="row">
                                <div class="col-sm-1 col-md-1">
                                    <span class="text">${('0' + val.officers_id).slice(-2)}</span>
                                </div>
                                <div class="col-sm-1 col-md-9">
                                    <span class="text">${title}</span>
                                </div>
                            </div>
                        </div>
                    </div>`;

                            $(`#display-Officers`).append(html)
                        });

                        var Team = JSON.parse(response.data.team_member);
                        jQuery.each(Team, function(i, val) {
                            if (val.team_name.length > 40) {
                                title = val.team_name.substring(0, 40) + '...';
                            } else {
                                title = val.team_name;
                            }
                            const html = `<div class="col-md-12 mb-4 data-items">
                        <div class="information-box">
                            <div class="row">
                                <div class="col-sm-1 col-md-1">
                                    <span class="text">${('0' + val.team_id).slice(-2)}</span>
                                </div>
                                <div class="col-sm-1 col-md-9">
                                    <span class="text">${title}</span>
                                </div>
                            </div>
                        </div>
                    </div>`;

                            $(`#display-Team`).append(html)
                        });

                        if (response.data.assets_structure_showcase != "") {
                            var Assets = JSON.parse(response.data.assets_structure_showcase);
                            jQuery.each(Assets, function(i, val) {
                                if (val.asset_title.length > 10) {
                                    title = val.asset_title.substring(0, 10) + '...';
                                } else {
                                    title = val.asset_title;
                                }


                                const html = `<div class="col-md-12 mb-4 data-items">
                    <div class="information-box">
                        <div class="row">
                            <div class="col-sm-1 col-md-1">
                                <span class="text">${('0' + val.asset_id).slice(-2)}</span>
                            </div>
                            <div class="col-sm-1 col-md-7">
                                <span class="text">${title}</span>
                            </div>
                        </div>
                    </div>
                    </div>`;



                                $(`#display-Assets`).append(html)
                            });
                        }

                        if (response.data.debts_structure_showcase != "") {
                            var Debts = JSON.parse(response.data.debts_structure_showcase);
                            jQuery.each(Debts, function(i, val) {
                                if (val.debt_title.length > 10) {
                                    title = val.debt_title.substring(0, 10) + '...';
                                } else {
                                    title = val.debt_title;
                                }


                                const html = `<div class="col-md-12 mb-4 data-items">
                    <div class="information-box">
                        <div class="row">
                            <div class="col-sm-1 col-md-1">
                                <span class="text">${('0' + val.debt_id).slice(-2)}</span>
                            </div>
                            <div class="col-sm-1 col-md-7">
                                <span class="text">${title}</span>
                            </div>
                        </div>
                    </div>
                    </div>`;
                                $(`#display-Debts`).append(html)
                            });
                        }

                        if (response.data.equity_structure_showcase != "") {
                            var Equity = JSON.parse(response.data.equity_structure_showcase);
                            jQuery.each(Equity, function(i, val) {
                                if (val.equity_title.length > 10) {
                                    title = val.equity_title.substring(0, 10) + '...';
                                } else {
                                    title = val.equity_title;
                                }


                                const html = `<div class="col-md-12 mb-4 data-items">
                    <div class="information-box">
                        <div class="row">
                            <div class="col-sm-1 col-md-1">
                                <span class="text">${('0' + val.equity_id).slice(-2)}</span>
                            </div>
                            <div class="col-sm-1 col-md-7">
                                <span class="text">${title}</span>
                            </div>
                        </div>
                    </div>
                    </div>`;

                                $(`#display-Equity`).append(html)
                            });
                        }

                        console.log(response);
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



    });
});
@extends('Frontend.layouts.Dashboard.index')
@section('frontTitle', 'Campaigns | Campaigns Review Editor')

@section('frontHeaderSection')
<style>
.card.active {
    border: 2.5px solid #1CA887;
    border-radius: 10px;
}

.card {
    border: 1.5px solid #1C1C1C;
    border-radius: 10px;
}

.kt-spinner {
    left: -14px;
    position: relative;
}
</style>
@endsection



@section('frontPagination')
<ul class="pagination">
    <li><a href="#">Home</a></li>
    <li><a href="#">Campaigns</a></li>
    <li>Account Set Up</li>
</ul>
@endsection
@section('frontMainContent')
<div class="row">
    <div class="col-lg-3">


        @if(!empty($campaigns))
        @foreach($campaigns as $val)
        <div class="under-review-cards mb-1">
            <div class="card " id="{{$val->champing_id}}" data-id="{{$val->champing_id}}">
                <div class="card-body">
                    <h6 class="card-header-small-title">#{{ $val->champing_id }}</h6>
                    <h3 class="card-title">{{ Str::of($val->campaign_title)->limit(20) }}
                        <span class="ml-1">
                            <svg width="14" height="20" viewBox="0 0 14 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M7.00016 0.416992C4.70649 0.416992 2.8335 2.28998 2.8335 4.58366V7.70866H2.8514C1.3197 8.93148 0.333496 10.8104 0.333496 12.917C0.333496 16.5915 3.32566 19.5837 7.00016 19.5837C10.6747 19.5837 13.6668 16.5915 13.6668 12.917C13.6668 10.8104 12.6806 8.93148 11.1489 7.70866H11.1668V4.58366C11.1668 2.28998 9.29384 0.416992 7.00016 0.416992ZM7.00016 1.66699C8.61815 1.66699 9.91683 2.96567 9.91683 4.58366V6.93229C9.0343 6.50015 8.04679 6.25033 7.00016 6.25033C5.95354 6.25033 4.96603 6.50015 4.0835 6.93229V4.58366C4.0835 2.96567 5.38217 1.66699 7.00016 1.66699ZM7.00016 7.50033C9.99911 7.50033 12.4168 9.91805 12.4168 12.917C12.4168 15.9159 9.99911 18.3337 7.00016 18.3337C4.00121 18.3337 1.5835 15.9159 1.5835 12.917C1.5835 9.91805 4.00121 7.50033 7.00016 7.50033ZM7.00016 10.0003C6.52263 10.0017 6.06007 10.1671 5.68992 10.4688C5.31978 10.7706 5.06453 11.1903 4.9669 11.6577C4.86927 12.1252 4.9352 12.612 5.15364 13.0366C5.37208 13.4613 5.72977 13.798 6.16683 13.9904V15.417C6.16683 15.8774 6.53975 16.2503 7.00016 16.2503C7.46058 16.2503 7.8335 15.8774 7.8335 15.417V13.992C8.27153 13.8002 8.63025 13.4635 8.84942 13.0385C9.06859 12.6135 9.13488 12.126 9.03715 11.6579C8.93943 11.1898 8.68364 10.7696 8.31273 10.4677C7.94182 10.1659 7.47836 10.0009 7.00016 10.0003Z"
                                    fill="#313131" />
                            </svg>
                        </span>
                    </h3>
                    <h3 class="card-subtitle weight-400 yellow-dot-before p-0 m-0">Under Review</h3>
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>
    <div class="col-lg-9" id="main">
        <div class="center-main-content">
            <form>
                <div class="mb-4">
                    <label class="form-label tool-tip">Campaign ID</label>
                    <input type="email" class="form-control" value="" id="Campaign_id">
                </div>
                <div class="mb-4">
                    <label class="form-label tool-tip">campaign or Company Title</label>
                    <input type="email" class="form-control" value="" id="Campaign_title">
                </div>
                <div class="mb-4 mt-4">
                    <label class="form-label tool-tip">Company Description</label>
                    <textarea class="form-control" placeholder="" id="Campaign_desc"></textarea>
                </div>
                <div class="mb-4 mt-5">
                    <label class="form-label tool-tip ">campaign Investment Terms</label>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="information-box">
                                <div class="row">
                                    <div class="col-md-5">
                                        <span class="text">minimum investment</span>
                                    </div>
                                    <div class="col-md-7 text-end">
                                        <span class="text-bold">$000000</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="information-box">
                                <div class="row">
                                    <div class="col-md-5">
                                        <span class="text">maximum investment</span>
                                    </div>
                                    <div class="col-md-7 text-end">
                                        <span class="text-bold">$000000</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="information-box">
                                <div class="row">
                                    <div class="col-md-5">
                                        <span class="text">minimum Funding Goal</span>
                                    </div>
                                    <div class="col-md-7 text-end">
                                        <span class="text-bold">$000000</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="information-box">
                                <div class="row">
                                    <div class="col-md-5">
                                        <span class="text">maximum Funding Goal</span>
                                    </div>
                                    <div class="col-md-7 text-end">
                                        <span class="text-bold">$000000</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="information-box">
                                <div class="row">
                                    <div class="col-md-5">
                                        <span class="text">Valuation Cap</span>
                                    </div>
                                    <div class="col-md-7 text-end">
                                        <span class="text-bold">$000000</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="information-box">
                                <div class="row">
                                    <div class="col-md-5">
                                        <span class="text">Discount</span>
                                    </div>
                                    <div class="col-md-7 text-end">
                                        <span class="text-bold">000%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-4 mt-4">
                    <label class="form-label tool-tip">Campaign Offerings</label>
                    <div class="row" id="display-Offerings">
                    </div>
                </div>
                <div class="mb-4 mt-4">
                    <label class="form-label tool-tip">Company Highlights</label>
                    <div class="row" id="display-Highlights">
                    </div>
                </div>
                <div class="mb-4 mt-4">
                    <label class="form-label tool-tip">Company Team Memebers</label>
                    <div class="row" id="display-Team">
                    </div>
                </div>
                <div class="mb-4 mt-4">
                    <label class="form-label tool-tip">Company Board Member</label>
                    <div class="row" id="display-Board">
                    </div>
                </div>
                <div class="mb-4 mt-4">
                    <label class="form-label tool-tip">Company Officers</label>
                    <div class="row" id="display-Officers">
                    </div>
                </div>
                <div class="mb-4 mt-4">
                    <label class="form-label tool-tip">Voting Power</label>
                    <div class="row" id="display-Voting">
                    </div>
                </div>
                <div class="mb-4 mt-4">
                    <label class="form-label tool-tip">Investor Risks</label>
                    <div class="row" id="display-Risks">
                    </div>
                </div>
                <div class="mb-4 mt-4">
                    <label class="form-label tool-tip">Previous Fundraising</label>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="information-box">
                                <div class="row">
                                    <div class="col-sm-11 col-md-11">
                                        <span class="text">Past fundraising campaign?</span>
                                    </div>
                                    <div class="col-sm-1 col-md-1">
                                        <input class="form-check-input" type="checkbox" value="" id="not-applicable">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="information-box">
                                <div class="row">
                                    <div class="col-sm-11 col-md-4">
                                        <span class="text">Funding Gathered:</span>
                                    </div>
                                    <div class="col-sm-1 col-md-8 form-group">
                                        <input class="form-control " type="text" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-1 col-md-12 mb-4">
                            <div class="row ">
                                <div class="col-md-12 mb-4">
                                    <div class="information-box">
                                        <div class="row align-items-center">
                                            <div class="col-sm-11 col-md-8">
                                                <span class="text ">Date ended:</span></span>
                                            </div>
                                            <div class="col-sm-1 col-md-4 form-group">
                                                <input class="form-control " type="date" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-4 mt-4">
                    <label class="form-label tool-tip">Use Of Fundraising</label>
                    <div class="row" id="display-Fundraising">
                    </div>
                </div>
                <div class="mb-4 mt-4">
                    <label class="form-label tool-tip">Outstanding Debt</label>

                </div>
                <div class="mb-4 mt-4">
                    <label class="form-label tool-tip">Related Party Transactions</label>
                    <div class="row" id="display-Transactions">
                    </div>
                </div>
                <div class="mb-4 mt-4">
                    <label class="form-label tool-tip">Capital Structure Showcase</label>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="form-label tool-tip ">Assets</label>
                            <div class="row" id="display-Assets">

                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label tool-tip ">Debts</label>
                            <div class="row" id="display-Debts">

                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label tool-tip ">Equity</label>
                            <div class="row" id="display-Equity">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-4 mt-4">
                    <label class="form-label tool-tip">Frequently Asked Questions</label>
                    <div class="row" id="display-Questions">
                    </div>
                </div>
                <div class="mb-4 mt-4">
                    <label class="form-label tool-tip">Discussion Topics</label>
                    <div class="row" id="display-Discussion">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('frontFooterSection')
<script type="text/javascript">
var BASE_URL = "{{ url('/') }}";
</script>
<script type="text/javascript" src="{{ asset('assets/frontend/js/pages/campaignreview.js') }}"></script>
@endsection
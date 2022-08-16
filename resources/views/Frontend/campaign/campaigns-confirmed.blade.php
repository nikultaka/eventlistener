@extends('Frontend.layouts.Dashboard.index')
@section('frontTitle', 'Campaigns | Campaigns Confirmed')
@section('frontMainContent')
<div class="row">
    <div class="col-lg-3 relative">
        <div class="under-review-cards">
            <!-- <div class="card">
                <div class="card-body">
                    <h6 class="card-header-small-title">New Account</h6>
                    <h3 class="card-title">ExampleBiz LLC. is now verified!</h3>
                    <h3 class="card-subtitle weight-400 green-dot-before p-0 m-0 display-inline-full">Confirmed
                        <button class="btn small-btn green-btn extra-small-btn float-right">

                            Create Campaign<span style="margin-left: 10px;"><svg width="16" height="14"
                                    viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9.03527 0.743164C8.91088 0.743194 8.78934 0.780334 8.68618 0.849831C8.58302 0.919328 8.50295 1.01802 8.45619 1.13329C8.40944 1.24855 8.39814 1.37514 8.42374 1.49686C8.44934 1.61858 8.51067 1.7299 8.59988 1.81657L13.3663 6.58301H1.12511C1.04229 6.58184 0.960066 6.59714 0.883211 6.62802C0.806355 6.65891 0.736405 6.70476 0.677424 6.76291C0.618443 6.82106 0.571608 6.89036 0.53964 6.96677C0.507673 7.04318 0.491211 7.12518 0.491211 7.20801C0.491211 7.29084 0.507673 7.37284 0.53964 7.44925C0.571608 7.52566 0.618443 7.59495 0.677424 7.65311C0.736405 7.71126 0.806355 7.75711 0.883211 7.78799C0.960066 7.81888 1.04229 7.83418 1.12511 7.83301H13.3663L8.59988 12.5994C8.5399 12.657 8.49201 12.726 8.45903 12.8023C8.42604 12.8787 8.40861 12.9608 8.40776 13.044C8.40692 13.1271 8.42267 13.2096 8.4541 13.2866C8.48553 13.3636 8.53201 13.4335 8.59081 13.4923C8.64961 13.5511 8.71955 13.5976 8.79653 13.629C8.87352 13.6604 8.956 13.6762 9.03915 13.6754C9.1223 13.6745 9.20444 13.6571 9.28077 13.6241C9.3571 13.5911 9.42608 13.5432 9.48367 13.4832L15.317 7.6499C15.4342 7.53269 15.5 7.37374 15.5 7.20801C15.5 7.04228 15.4342 6.88333 15.317 6.76611L9.48367 0.93278C9.42542 0.872786 9.35571 0.825091 9.27869 0.792521C9.20167 0.759951 9.11889 0.743167 9.03527 0.743164Z"
                                        fill="#1C1C1C" />
                                </svg>
                            </span>
                        </button>
                    </h3>
                </div>
            </div> -->
        </div>
        <div class="center-sidebar border fixed-height mt-3 mb-3 sidebar-error">
            @if(!empty($campaigns))
            @foreach($campaigns as $val)

            <div class="under-review-cards mb-2" id="{{$val->champing_id}}-card">
                <div class="card" id="{{$val->champing_id}}" data-id="{{$val->champing_id}}">
                    <div class="card-body">
                        <h6 class="card-header-small-title">#New Account</h6>
                        <h3 class="card-title">{{ Str::of($val->campaign_title)->limit(18) }} .is now verified!
                        </h3>
                        <h3 class="card-subtitle weight-400 green-dot-before p-0 m-0 display-inline-full">Confirmed</h3>
                    </div>
                </div>
            </div>

            @endforeach
            @endif
        </div>





        <div class="create-campaign-bottom">
            <a href="{{ route('campaigns-creator') }}" class="green-border-btn"
                style="text-align: center;    color: #000000;">
                Create Campaign
                <span>
                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M2.07038 29.1782C1.82161 29.1782 1.57852 29.1039 1.3722 28.9649C1.16588 28.8259 1.00573 28.6285 0.912225 28.398C0.818721 28.1675 0.796121 27.9143 0.847316 27.6708C0.898511 27.4274 1.02117 27.2048 1.19961 27.0314L24.8992 3.33187H16.2501C16.0844 3.33421 15.92 3.30361 15.7663 3.24184C15.6125 3.18007 15.4726 3.08838 15.3547 2.97207C15.2367 2.85576 15.1431 2.71717 15.0791 2.56435C15.0152 2.41153 14.9823 2.24753 14.9823 2.08187C14.9823 1.91621 15.0152 1.75221 15.0791 1.59939C15.1431 1.44657 15.2367 1.30797 15.3547 1.19167C15.4726 1.07536 15.6125 0.983664 15.7663 0.921896C15.92 0.860128 16.0844 0.829527 16.2501 0.831869H27.7589C27.95 0.805708 28.1447 0.824156 28.3275 0.885765C28.5104 0.947374 28.6765 1.05047 28.8128 1.18699C28.9492 1.32351 29.0521 1.48973 29.1135 1.67266C29.1749 1.85558 29.1931 2.05023 29.1667 2.24137V13.7485C29.1691 13.9142 29.1385 14.0786 29.0767 14.2323C29.0149 14.386 28.9232 14.526 28.8069 14.6439C28.6906 14.7619 28.552 14.8555 28.3992 14.9195C28.2464 14.9834 28.0824 15.0163 27.9167 15.0163C27.7511 15.0163 27.5871 14.9834 27.4342 14.9195C27.2814 14.8555 27.1428 14.7619 27.0265 14.6439C26.9102 14.526 26.8185 14.386 26.7568 14.2323C26.695 14.0786 26.6644 13.9142 26.6667 13.7485V5.09945L2.96719 28.799C2.85067 28.919 2.71127 29.0144 2.55722 29.0795C2.40318 29.1446 2.23763 29.1782 2.07038 29.1782Z"
                            fill="#1C1C1C" />
                    </svg>
                </span>
            </a>
            <a href="{{ route('campaigns-review') }}" class="green-border-btn mt-2"
                style="text-align: center;    color: #000000;">
                Campaign Review
                <span>
                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M2.07038 29.1782C1.82161 29.1782 1.57852 29.1039 1.3722 28.9649C1.16588 28.8259 1.00573 28.6285 0.912225 28.398C0.818721 28.1675 0.796121 27.9143 0.847316 27.6708C0.898511 27.4274 1.02117 27.2048 1.19961 27.0314L24.8992 3.33187H16.2501C16.0844 3.33421 15.92 3.30361 15.7663 3.24184C15.6125 3.18007 15.4726 3.08838 15.3547 2.97207C15.2367 2.85576 15.1431 2.71717 15.0791 2.56435C15.0152 2.41153 14.9823 2.24753 14.9823 2.08187C14.9823 1.91621 15.0152 1.75221 15.0791 1.59939C15.1431 1.44657 15.2367 1.30797 15.3547 1.19167C15.4726 1.07536 15.6125 0.983664 15.7663 0.921896C15.92 0.860128 16.0844 0.829527 16.2501 0.831869H27.7589C27.95 0.805708 28.1447 0.824156 28.3275 0.885765C28.5104 0.947374 28.6765 1.05047 28.8128 1.18699C28.9492 1.32351 29.0521 1.48973 29.1135 1.67266C29.1749 1.85558 29.1931 2.05023 29.1667 2.24137V13.7485C29.1691 13.9142 29.1385 14.0786 29.0767 14.2323C29.0149 14.386 28.9232 14.526 28.8069 14.6439C28.6906 14.7619 28.552 14.8555 28.3992 14.9195C28.2464 14.9834 28.0824 15.0163 27.9167 15.0163C27.7511 15.0163 27.5871 14.9834 27.4342 14.9195C27.2814 14.8555 27.1428 14.7619 27.0265 14.6439C26.9102 14.526 26.8185 14.386 26.7568 14.2323C26.695 14.0786 26.6644 13.9142 26.6667 13.7485V5.09945L2.96719 28.799C2.85067 28.919 2.71127 29.0144 2.55722 29.0795C2.40318 29.1446 2.23763 29.1782 2.07038 29.1782Z"
                            fill="#1C1C1C" />
                    </svg>
                </span>
            </a>
            <a href="{{ route('campaigns-revisions') }}" class="green-border-btn mt-2"
                style="text-align: center; font-size:18px;   color: #000000;">
                Campaign Revisions Needed
                <span>
                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M2.07038 29.1782C1.82161 29.1782 1.57852 29.1039 1.3722 28.9649C1.16588 28.8259 1.00573 28.6285 0.912225 28.398C0.818721 28.1675 0.796121 27.9143 0.847316 27.6708C0.898511 27.4274 1.02117 27.2048 1.19961 27.0314L24.8992 3.33187H16.2501C16.0844 3.33421 15.92 3.30361 15.7663 3.24184C15.6125 3.18007 15.4726 3.08838 15.3547 2.97207C15.2367 2.85576 15.1431 2.71717 15.0791 2.56435C15.0152 2.41153 14.9823 2.24753 14.9823 2.08187C14.9823 1.91621 15.0152 1.75221 15.0791 1.59939C15.1431 1.44657 15.2367 1.30797 15.3547 1.19167C15.4726 1.07536 15.6125 0.983664 15.7663 0.921896C15.92 0.860128 16.0844 0.829527 16.2501 0.831869H27.7589C27.95 0.805708 28.1447 0.824156 28.3275 0.885765C28.5104 0.947374 28.6765 1.05047 28.8128 1.18699C28.9492 1.32351 29.0521 1.48973 29.1135 1.67266C29.1749 1.85558 29.1931 2.05023 29.1667 2.24137V13.7485C29.1691 13.9142 29.1385 14.0786 29.0767 14.2323C29.0149 14.386 28.9232 14.526 28.8069 14.6439C28.6906 14.7619 28.552 14.8555 28.3992 14.9195C28.2464 14.9834 28.0824 15.0163 27.9167 15.0163C27.7511 15.0163 27.5871 14.9834 27.4342 14.9195C27.2814 14.8555 27.1428 14.7619 27.0265 14.6439C26.9102 14.526 26.8185 14.386 26.7568 14.2323C26.695 14.0786 26.6644 13.9142 26.6667 13.7485V5.09945L2.96719 28.799C2.85067 28.919 2.71127 29.0144 2.55722 29.0795C2.40318 29.1446 2.23763 29.1782 2.07038 29.1782Z"
                            fill="#1C1C1C" />
                    </svg>
                </span>
            </a>
        </div>
        <!-- <div class="center-sidebar border height-100">
			<h3 class="border-after mb-3">Initial Screening</h3>
			<div class="form-check mb-3">
			  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault1">
			  <label class="form-check-label" for="flexCheckDefault1">
			    Company Overview
			  </label>
			</div>
			<div class="form-check mb-3">
			  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault2">
			  <label class="form-check-label" for="flexCheckDefault2">
			    Personal Information
			  </label>
			</div>
			<div class="form-check mb-3">
			  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault3">
			  <label class="form-check-label" for="flexCheckDefault3">
			   Company Location
			  </label>
			</div>
			<div class="form-check mb-3">
			  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault4">
			  <label class="form-check-label" for="flexCheckDefault4">
			   Company Description
			  </label>
			</div>
			<div class="form-check mb-3">
			  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault5">
			  <label class="form-check-label" for="flexCheckDefault5">
			   Company Financials
			  </label>
			</div>
			<div class="form-check mb-3">
			  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault6">
			  <label class="form-check-label" for="flexCheckDefault6">
			   Company Social
			  </label>
			</div>
			<div class="form-check mb-3">
			  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault7">
			  <label class="form-check-label" for="flexCheckDefault7">
			   Legal
			  </label>
			</div>
			<div class="form-check mb-3">
			  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault8">
			  <label class="form-check-label" for="flexCheckDefault8">
			   Terms Agreement
			  </label>
			</div>
			<div class="form-check mb-3">
			  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault9">
			  <label class="form-check-label" for="flexCheckDefault9">
			   Privacy Agreement
			  </label>
			</div>
			<div class="form-check mb-3">
			  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault10">
			  <label class="form-check-label" for="flexCheckDefault10">
			  Submit Company
			  </label>
			</div>
		</div> -->
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
@extends('Frontend.layouts.Dashboard.index')
@section('frontTitle', 'Campaigns | Campaigns Creator')
@section('frontHeaderSection')
<style>
.hidden {
    display: none;
}

.zero-top {
    margin-top: -1.75rem !important;
}

input[type="text"].hidden-feild {
    height: 0px;
    width: 0px;
    border: 0px;
    padding: 0px
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
        <div class="center-sidebar border height-100">
            <h3 class="border-after mb-3">Campaign Sections</h3>
            <div class="form-check mb-3">
                <input class="form-check-input item-check" type="checkbox" value="" id="champing_id">
                <label class="form-check-label item-lable" data-label="test">
                    Campaign ID & Title
                </label>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input item-check" type="checkbox" value="" id="flexCheckDefault2">
                <label class="form-check-label item-lable item-move" data-move="video_div" for="flexCheckDefault2">
                    Video Upload
                </label>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input item-check" type="checkbox" value="" id="champing_desc">
                <label class="form-check-label item-lable" for="flexCheckDefault3">
                    Company Description
                </label>
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input item-check" type="checkbox" value="" id="flexCheckDefault4">
                <label class="form-check-label item-lable" for="flexCheckDefault3">
                    Campaign Investment Terms
                </label>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input item-check" type="checkbox" value="" id="offer"
                    data-for-check="offers_data">
                <label class="form-check-label item-lable item-move" data-move="offerings_div" for="flexCheckDefault3">
                    Campaign Offerings
                </label>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input item-check" type="checkbox" value="" id="highlights"
                    data-for-check="highlights_data">
                <label class="form-check-label item-lable item-move" data-move="video_div" for="flexCheckDefault3">
                    Company Highlights
                </label>
            </div>


            <div class="form-check mb-3">
                <input class="form-check-input item-check" type="checkbox" value="" id="team"
                    data-for-check="team_data">
                <label class="form-check-label item-lable item-move" data-move="video_div" for="flexCheckDefault3">
                    Team Members
                </label>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input item-check" type="checkbox" value="" id="board"
                    data-for-check="board_data">
                <label class="form-check-label item-lable item-move" data-move="video_div" for="flexCheckDefault3">
                    Board Members
                </label>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input item-check" type="checkbox" value="" id="office"
                    data-for-check="officers_data">
                <label class="form-check-label item-lable item-move" data-move="video_div" for="flexCheckDefault3">
                    Office Members
                </label>
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input item-check" type="checkbox" value="" id="office"
                    data-for-check="voting_data">
                <label class="form-check-label item-lable item-move" data-move="video_div" for="flexCheckDefault3">
                    Voting Power
                </label>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input item-check" type="checkbox" value="" id="flexCheckDefault9">
                <label class="form-check-label item-lable" for="flexCheckDefault3">
                    Pitch Deck
                </label>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input item-check" type="checkbox" value="" id="flexCheckDefault10">
                <label class="form-check-label item-lable" for="flexCheckDefault3">
                    Investor Risk
                </label>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input item-check" type="checkbox" value="" id="flexCheckDefault11">
                <label class="form-check-label item-lable" for="flexCheckDefault3">
                    Campaign Financials
                </label>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input item-check" type="checkbox" value="" id="flexCheckDefault12">
                <label class="form-check-label item-lable" for="flexCheckDefault3">
                    Previous Fundraising
                </label>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input item-check" type="checkbox" value="" id="flexCheckDefault13">
                <label class="form-check-label item-lable" for="flexCheckDefault3">
                    Use Of Funds
                </label>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input item-check" type="checkbox" value="" id="flexCheckDefault14">
                <label class="form-check-label item-lable" for="flexCheckDefault3">
                    Debt & Transactions
                </label>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input item-check" type="checkbox" value="" id="flexCheckDefault15">
                <label class="form-check-label item-lable" for="flexCheckDefault3">
                    Capital Structure
                </label>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input item-check" type="checkbox" value="" id="flexCheckDefault16">
                <label class="form-check-label item-lable" for="flexCheckDefault3">
                    Form C & Legal Documents
                </label>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input item-check" type="checkbox" value="" id="flexCheckDefault17">
                <label class="form-check-label item-lable" for="flexCheckDefault3">
                    FAQ & Discussion
                </label>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input item-check" type="checkbox" value="" id="flexCheckDefault18">
                <label class="form-check-label item-lable" for="flexCheckDefault3">
                    Terms Agreement
                </label>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input item-check" type="checkbox" value="" id="flexCheckDefault19">
                <label class="form-check-label item-lable" for="flexCheckDefault3">
                    Submit Campaign
                </label>
            </div>
        </div>
    </div>
    <div class="col-lg-9">
        <div class="center-main-content">



            <form id="mainform" method="post">
                <div class="mb-4 form-group">
                    <label class="form-label tool-tip">Campaign ID
                        <span class="tool-tip dropdown-toggle no-arrow" id="campaign-id-dropdown"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.75" y="0.75" width="18.5" height="18.5" rx="4.25" stroke="#313131"
                                    stroke-width="1.5" />
                                <path
                                    d="M7.00008 7.6087C7.00008 6.17571 8.35213 5 10 5C11.6479 5 13 6.17571 13 7.6087C13 8.98221 12.1793 9.7403 11.5879 10.1444L11.5759 10.1526C11.2864 10.3503 11.0775 10.4931 10.9561 10.6369C10.833 10.7827 10.75 10.9334 10.75 11.3043C10.7514 11.3908 10.7331 11.4766 10.696 11.5568C10.659 11.637 10.6039 11.71 10.5342 11.7715C10.4644 11.833 10.3812 11.8819 10.2895 11.9153C10.1978 11.9486 10.0994 11.9658 10 11.9658C9.90065 11.9658 9.80224 11.9486 9.71055 11.9153C9.61886 11.8819 9.53571 11.833 9.46592 11.7715C9.39614 11.71 9.34112 11.637 9.30406 11.5568C9.267 11.4766 9.24864 11.3908 9.25005 11.3043C9.25005 10.7125 9.4483 10.219 9.74711 9.86498C10.0459 9.51096 10.3954 9.30081 10.6621 9.11855C11.1957 8.75402 11.5 8.62648 11.5 7.6087C11.5 6.88081 10.8371 6.30435 10 6.30435C9.16298 6.30435 8.50006 6.88081 8.50006 7.6087V7.82609C8.50146 7.91251 8.4831 7.99831 8.44604 8.07851C8.40898 8.1587 8.35396 8.23169 8.28418 8.29324C8.2144 8.35479 8.13124 8.40366 8.03955 8.43701C7.94786 8.47037 7.84946 8.48755 7.75007 8.48755C7.65067 8.48755 7.55227 8.47037 7.46058 8.43701C7.36889 8.40366 7.28574 8.35479 7.21595 8.29324C7.14617 8.23169 7.09115 8.1587 7.05409 8.07851C7.01703 7.99831 6.99867 7.91251 7.00008 7.82609V7.6087Z"
                                    fill="#313131" />
                                <path
                                    d="M9.29294 13.5156C9.48047 13.3525 9.73482 13.2609 10 13.2609C10.2653 13.2609 10.5196 13.3525 10.7071 13.5156C10.8947 13.6786 11 13.8998 11 14.1304C11 14.3611 10.8947 14.5822 10.7071 14.7453C10.5196 14.9084 10.2653 15 10 15C9.73482 15 9.48047 14.9084 9.29294 14.7453C9.10541 14.5822 9.00005 14.3611 9.00005 14.1304C9.00005 13.8998 9.10541 13.6786 9.29294 13.5156Z"
                                    fill="#313131" />
                            </svg>
                        </span>
                        <div class="dropdown-menu label-dropdoen" aria-labelledby="campaign-id-dropdown">
                            <h5 class="text-white">Campaign ID</h5>
                            <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla lacus
                                risus, feugiat in justo et, auctor pulvinar urna. Morbi quis tincidunt est. Phasellus
                                lacinia, sapien sitmet!</p>
                            <button class="btn full-width black-btn">
                                <svg width="17" height="16" viewBox="0 0 17 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11.1251 0.0834961C8.25602 0.0834961 5.91673 2.42279 5.91673 5.29183C5.91673 5.878 6.03998 6.43103 6.21946 6.95687L1.17145 12.0049C1.17118 12.0049 1.1709 12.0049 1.17063 12.0049C0.28091 12.8946 0.281496 14.3561 1.17145 15.2454C1.61632 15.6897 2.20596 15.9168 2.79173 15.9168C3.37749 15.9168 3.96714 15.6897 4.41201 15.2454C4.41228 15.2454 4.41255 15.2454 4.41282 15.2454L9.46002 10.1974C9.98584 10.377 10.5393 10.5002 11.1259 10.5002C13.9949 10.5002 16.3342 8.16087 16.3342 5.29183C16.3342 4.45812 16.1319 3.67072 15.7857 2.97493C15.7415 2.88628 15.6769 2.8094 15.5972 2.75063C15.5174 2.69185 15.4249 2.65287 15.3271 2.6369C15.2293 2.62092 15.1292 2.62841 15.0349 2.65874C14.9406 2.68907 14.8548 2.74138 14.7847 2.81136L11.9226 5.67269C11.7575 5.83778 11.5477 5.91683 11.3334 5.91683C11.1191 5.91683 10.9093 5.83778 10.7442 5.67269C10.4138 5.34252 10.4138 4.82528 10.7442 4.49512C10.7442 4.49485 10.7442 4.49458 10.7442 4.4943L13.6055 1.63298C13.6755 1.56286 13.7278 1.47712 13.7581 1.38283C13.7885 1.28853 13.796 1.18837 13.78 1.09061C13.764 0.992851 13.725 0.900288 13.6663 0.820551C13.6075 0.740815 13.5306 0.676188 13.442 0.631999C12.746 0.285207 11.9588 0.0834961 11.1251 0.0834961ZM11.1251 1.3335C11.4373 1.3335 11.7395 1.37163 12.03 1.44092L9.86041 3.61051C9.05165 4.41868 9.05165 5.74831 9.86041 6.55648C10.2645 6.96055 10.801 7.16683 11.3334 7.16683C11.8658 7.16683 12.4023 6.96055 12.8064 6.55648L14.9768 4.38688C15.046 4.67747 15.0842 4.97957 15.0842 5.29183C15.0842 7.48529 13.3193 9.25016 11.1259 9.25016C10.5597 9.25016 10.025 9.12993 9.53733 8.91569C9.42209 8.86505 9.29424 8.85039 9.17053 8.87363C9.04681 8.89686 8.93299 8.9569 8.84397 9.0459L3.52822 14.3617C3.32151 14.5678 3.05904 14.6668 2.79173 14.6668C2.52416 14.6668 2.26122 14.5682 2.05442 14.3617C1.64271 13.9502 1.64329 13.3006 2.05524 12.8887L7.37099 7.57373C7.45999 7.48471 7.52003 7.37089 7.54326 7.24718C7.5665 7.12346 7.55184 6.99561 7.5012 6.88037C7.287 6.39284 7.16673 5.85756 7.16673 5.29183C7.16673 3.09837 8.9316 1.3335 11.1251 1.3335Z"
                                        fill="#DFDFDF" />
                                </svg><span style="margin-left: 10px;">Request Support</span>
                            </button>
                        </div>
                    </label>
                    <input type="text" id="Campaign_id" form="mainform" data-focus="champing_id" name="champing_id"
                        data-id="champing_id" class="form-control" value="">
                </div>
                <div class="mb-4 form-group">
                    <label class="form-label tool-tip">campaign or Company Title
                        <span class="tool-tip dropdown-toggle no-arrow" id="campaign-title-dropdown"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.75" y="0.75" width="18.5" height="18.5" rx="4.25" stroke="#313131"
                                    stroke-width="1.5" />
                                <path
                                    d="M7.00008 7.6087C7.00008 6.17571 8.35213 5 10 5C11.6479 5 13 6.17571 13 7.6087C13 8.98221 12.1793 9.7403 11.5879 10.1444L11.5759 10.1526C11.2864 10.3503 11.0775 10.4931 10.9561 10.6369C10.833 10.7827 10.75 10.9334 10.75 11.3043C10.7514 11.3908 10.7331 11.4766 10.696 11.5568C10.659 11.637 10.6039 11.71 10.5342 11.7715C10.4644 11.833 10.3812 11.8819 10.2895 11.9153C10.1978 11.9486 10.0994 11.9658 10 11.9658C9.90065 11.9658 9.80224 11.9486 9.71055 11.9153C9.61886 11.8819 9.53571 11.833 9.46592 11.7715C9.39614 11.71 9.34112 11.637 9.30406 11.5568C9.267 11.4766 9.24864 11.3908 9.25005 11.3043C9.25005 10.7125 9.4483 10.219 9.74711 9.86498C10.0459 9.51096 10.3954 9.30081 10.6621 9.11855C11.1957 8.75402 11.5 8.62648 11.5 7.6087C11.5 6.88081 10.8371 6.30435 10 6.30435C9.16298 6.30435 8.50006 6.88081 8.50006 7.6087V7.82609C8.50146 7.91251 8.4831 7.99831 8.44604 8.07851C8.40898 8.1587 8.35396 8.23169 8.28418 8.29324C8.2144 8.35479 8.13124 8.40366 8.03955 8.43701C7.94786 8.47037 7.84946 8.48755 7.75007 8.48755C7.65067 8.48755 7.55227 8.47037 7.46058 8.43701C7.36889 8.40366 7.28574 8.35479 7.21595 8.29324C7.14617 8.23169 7.09115 8.1587 7.05409 8.07851C7.01703 7.99831 6.99867 7.91251 7.00008 7.82609V7.6087Z"
                                    fill="#313131" />
                                <path
                                    d="M9.29294 13.5156C9.48047 13.3525 9.73482 13.2609 10 13.2609C10.2653 13.2609 10.5196 13.3525 10.7071 13.5156C10.8947 13.6786 11 13.8998 11 14.1304C11 14.3611 10.8947 14.5822 10.7071 14.7453C10.5196 14.9084 10.2653 15 10 15C9.73482 15 9.48047 14.9084 9.29294 14.7453C9.10541 14.5822 9.00005 14.3611 9.00005 14.1304C9.00005 13.8998 9.10541 13.6786 9.29294 13.5156Z"
                                    fill="#313131" />
                            </svg>
                        </span>
                        <div class="dropdown-menu label-dropdoen" aria-labelledby="campaign-title-dropdown">
                            <h5 class="text-white">Campaign Title</h5>
                            <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla lacus
                                risus, feugiat in justo et, auctor pulvinar urna. Morbi quis tincidunt est. Phasellus
                                lacinia, sapien sitmet!</p>
                            <button class="btn full-width black-btn">
                                <svg width="17" height="16" viewBox="0 0 17 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11.1251 0.0834961C8.25602 0.0834961 5.91673 2.42279 5.91673 5.29183C5.91673 5.878 6.03998 6.43103 6.21946 6.95687L1.17145 12.0049C1.17118 12.0049 1.1709 12.0049 1.17063 12.0049C0.28091 12.8946 0.281496 14.3561 1.17145 15.2454C1.61632 15.6897 2.20596 15.9168 2.79173 15.9168C3.37749 15.9168 3.96714 15.6897 4.41201 15.2454C4.41228 15.2454 4.41255 15.2454 4.41282 15.2454L9.46002 10.1974C9.98584 10.377 10.5393 10.5002 11.1259 10.5002C13.9949 10.5002 16.3342 8.16087 16.3342 5.29183C16.3342 4.45812 16.1319 3.67072 15.7857 2.97493C15.7415 2.88628 15.6769 2.8094 15.5972 2.75063C15.5174 2.69185 15.4249 2.65287 15.3271 2.6369C15.2293 2.62092 15.1292 2.62841 15.0349 2.65874C14.9406 2.68907 14.8548 2.74138 14.7847 2.81136L11.9226 5.67269C11.7575 5.83778 11.5477 5.91683 11.3334 5.91683C11.1191 5.91683 10.9093 5.83778 10.7442 5.67269C10.4138 5.34252 10.4138 4.82528 10.7442 4.49512C10.7442 4.49485 10.7442 4.49458 10.7442 4.4943L13.6055 1.63298C13.6755 1.56286 13.7278 1.47712 13.7581 1.38283C13.7885 1.28853 13.796 1.18837 13.78 1.09061C13.764 0.992851 13.725 0.900288 13.6663 0.820551C13.6075 0.740815 13.5306 0.676188 13.442 0.631999C12.746 0.285207 11.9588 0.0834961 11.1251 0.0834961ZM11.1251 1.3335C11.4373 1.3335 11.7395 1.37163 12.03 1.44092L9.86041 3.61051C9.05165 4.41868 9.05165 5.74831 9.86041 6.55648C10.2645 6.96055 10.801 7.16683 11.3334 7.16683C11.8658 7.16683 12.4023 6.96055 12.8064 6.55648L14.9768 4.38688C15.046 4.67747 15.0842 4.97957 15.0842 5.29183C15.0842 7.48529 13.3193 9.25016 11.1259 9.25016C10.5597 9.25016 10.025 9.12993 9.53733 8.91569C9.42209 8.86505 9.29424 8.85039 9.17053 8.87363C9.04681 8.89686 8.93299 8.9569 8.84397 9.0459L3.52822 14.3617C3.32151 14.5678 3.05904 14.6668 2.79173 14.6668C2.52416 14.6668 2.26122 14.5682 2.05442 14.3617C1.64271 13.9502 1.64329 13.3006 2.05524 12.8887L7.37099 7.57373C7.45999 7.48471 7.52003 7.37089 7.54326 7.24718C7.5665 7.12346 7.55184 6.99561 7.5012 6.88037C7.287 6.39284 7.16673 5.85756 7.16673 5.29183C7.16673 3.09837 8.9316 1.3335 11.1251 1.3335Z"
                                        fill="#DFDFDF" />
                                </svg><span style="margin-left: 10px;">Request Support</span>
                            </button>
                        </div>
                    </label>
                    <input type="text" id="Campaign_title" data-id="champing_id" data-focus="champing_title"
                        form="mainform" name="champing_title" class="form-control" value="Overview Inc. Seed Round 4">
                </div>

                <div class="mb-4 form-group">
                    <input type="text" class="hidden-feild" id="video_div">
                    <label class="form-label tool-tip">campaign Video
                        <span class="tool-tip dropdown-toggle no-arrow" id="campaign-video-dropdown"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.75" y="0.75" width="18.5" height="18.5" rx="4.25" stroke="#313131"
                                    stroke-width="1.5" />
                                <path
                                    d="M7.00008 7.6087C7.00008 6.17571 8.35213 5 10 5C11.6479 5 13 6.17571 13 7.6087C13 8.98221 12.1793 9.7403 11.5879 10.1444L11.5759 10.1526C11.2864 10.3503 11.0775 10.4931 10.9561 10.6369C10.833 10.7827 10.75 10.9334 10.75 11.3043C10.7514 11.3908 10.7331 11.4766 10.696 11.5568C10.659 11.637 10.6039 11.71 10.5342 11.7715C10.4644 11.833 10.3812 11.8819 10.2895 11.9153C10.1978 11.9486 10.0994 11.9658 10 11.9658C9.90065 11.9658 9.80224 11.9486 9.71055 11.9153C9.61886 11.8819 9.53571 11.833 9.46592 11.7715C9.39614 11.71 9.34112 11.637 9.30406 11.5568C9.267 11.4766 9.24864 11.3908 9.25005 11.3043C9.25005 10.7125 9.4483 10.219 9.74711 9.86498C10.0459 9.51096 10.3954 9.30081 10.6621 9.11855C11.1957 8.75402 11.5 8.62648 11.5 7.6087C11.5 6.88081 10.8371 6.30435 10 6.30435C9.16298 6.30435 8.50006 6.88081 8.50006 7.6087V7.82609C8.50146 7.91251 8.4831 7.99831 8.44604 8.07851C8.40898 8.1587 8.35396 8.23169 8.28418 8.29324C8.2144 8.35479 8.13124 8.40366 8.03955 8.43701C7.94786 8.47037 7.84946 8.48755 7.75007 8.48755C7.65067 8.48755 7.55227 8.47037 7.46058 8.43701C7.36889 8.40366 7.28574 8.35479 7.21595 8.29324C7.14617 8.23169 7.09115 8.1587 7.05409 8.07851C7.01703 7.99831 6.99867 7.91251 7.00008 7.82609V7.6087Z"
                                    fill="#313131" />
                                <path
                                    d="M9.29294 13.5156C9.48047 13.3525 9.73482 13.2609 10 13.2609C10.2653 13.2609 10.5196 13.3525 10.7071 13.5156C10.8947 13.6786 11 13.8998 11 14.1304C11 14.3611 10.8947 14.5822 10.7071 14.7453C10.5196 14.9084 10.2653 15 10 15C9.73482 15 9.48047 14.9084 9.29294 14.7453C9.10541 14.5822 9.00005 14.3611 9.00005 14.1304C9.00005 13.8998 9.10541 13.6786 9.29294 13.5156Z"
                                    fill="#313131" />
                            </svg>
                        </span>
                        <div class="dropdown-menu label-dropdoen" aria-labelledby="campaign-video-dropdown">
                            <h5 class="text-white">Campaign Title</h5>
                            <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla lacus
                                risus, feugiat in justo et, auctor pulvinar urna. Morbi quis tincidunt est. Phasellus
                                lacinia, sapien sitmet!</p>
                            <button class="btn full-width black-btn">
                                <svg width="17" height="16" viewBox="0 0 17 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11.1251 0.0834961C8.25602 0.0834961 5.91673 2.42279 5.91673 5.29183C5.91673 5.878 6.03998 6.43103 6.21946 6.95687L1.17145 12.0049C1.17118 12.0049 1.1709 12.0049 1.17063 12.0049C0.28091 12.8946 0.281496 14.3561 1.17145 15.2454C1.61632 15.6897 2.20596 15.9168 2.79173 15.9168C3.37749 15.9168 3.96714 15.6897 4.41201 15.2454C4.41228 15.2454 4.41255 15.2454 4.41282 15.2454L9.46002 10.1974C9.98584 10.377 10.5393 10.5002 11.1259 10.5002C13.9949 10.5002 16.3342 8.16087 16.3342 5.29183C16.3342 4.45812 16.1319 3.67072 15.7857 2.97493C15.7415 2.88628 15.6769 2.8094 15.5972 2.75063C15.5174 2.69185 15.4249 2.65287 15.3271 2.6369C15.2293 2.62092 15.1292 2.62841 15.0349 2.65874C14.9406 2.68907 14.8548 2.74138 14.7847 2.81136L11.9226 5.67269C11.7575 5.83778 11.5477 5.91683 11.3334 5.91683C11.1191 5.91683 10.9093 5.83778 10.7442 5.67269C10.4138 5.34252 10.4138 4.82528 10.7442 4.49512C10.7442 4.49485 10.7442 4.49458 10.7442 4.4943L13.6055 1.63298C13.6755 1.56286 13.7278 1.47712 13.7581 1.38283C13.7885 1.28853 13.796 1.18837 13.78 1.09061C13.764 0.992851 13.725 0.900288 13.6663 0.820551C13.6075 0.740815 13.5306 0.676188 13.442 0.631999C12.746 0.285207 11.9588 0.0834961 11.1251 0.0834961ZM11.1251 1.3335C11.4373 1.3335 11.7395 1.37163 12.03 1.44092L9.86041 3.61051C9.05165 4.41868 9.05165 5.74831 9.86041 6.55648C10.2645 6.96055 10.801 7.16683 11.3334 7.16683C11.8658 7.16683 12.4023 6.96055 12.8064 6.55648L14.9768 4.38688C15.046 4.67747 15.0842 4.97957 15.0842 5.29183C15.0842 7.48529 13.3193 9.25016 11.1259 9.25016C10.5597 9.25016 10.025 9.12993 9.53733 8.91569C9.42209 8.86505 9.29424 8.85039 9.17053 8.87363C9.04681 8.89686 8.93299 8.9569 8.84397 9.0459L3.52822 14.3617C3.32151 14.5678 3.05904 14.6668 2.79173 14.6668C2.52416 14.6668 2.26122 14.5682 2.05442 14.3617C1.64271 13.9502 1.64329 13.3006 2.05524 12.8887L7.37099 7.57373C7.45999 7.48471 7.52003 7.37089 7.54326 7.24718C7.5665 7.12346 7.55184 6.99561 7.5012 6.88037C7.287 6.39284 7.16673 5.85756 7.16673 5.29183C7.16673 3.09837 8.9316 1.3335 11.1251 1.3335Z"
                                        fill="#DFDFDF" />
                                </svg><span style="margin-left: 10px;">Request Support</span>
                            </button>
                        </div>
                    </label>
                    <div class="dropzone dropzone-default" id="kt_dropzone_1">
                        <div class="dropzone-msg dz-message needsclick">
                            <svg width="80" height="53" viewBox="0 0 80 53" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M40 0.666504C27.5167 0.666504 17.2168 10.1832 15.9668 22.3332H15C6.73333 22.3332 0 29.0665 0 37.3332C0 45.5998 6.73333 52.3332 15 52.3332H32.9329C32.6496 51.5498 32.5 50.7165 32.5 49.8332V47.3332H15C9.48333 47.3332 5 42.8498 5 37.3332C5 31.8165 9.48333 27.3332 15 27.3332H18.3333C19.7167 27.3332 20.8333 26.2165 20.8333 24.8332C20.8333 14.2665 29.4333 5.6665 40 5.6665C50.5667 5.6665 59.1667 14.2665 59.1667 24.8332C59.1667 26.2165 60.2833 27.3332 61.6667 27.3332H65C70.5167 27.3332 75 31.8165 75 37.3332C75 42.8498 70.5167 47.3332 65 47.3332H47.5V49.8332C47.5 50.7165 47.3504 51.5498 47.0671 52.3332H65C73.2667 52.3332 80 45.5998 80 37.3332C80 29.0665 73.2667 22.3332 65 22.3332H64.0332C62.7832 10.1832 52.4833 0.666504 40 0.666504ZM39.8763 19.0031C39.2863 19.0327 38.7258 19.2703 38.2943 19.6737L25.7943 31.3403C25.5418 31.561 25.3363 31.8301 25.19 32.1318C25.0437 32.4335 24.9595 32.7615 24.9425 33.0964C24.9256 33.4313 24.9761 33.7661 25.0912 34.0811C25.2063 34.396 25.3836 34.6846 25.6124 34.9296C25.8413 35.1746 26.1171 35.3711 26.4235 35.5074C26.7298 35.6437 27.0605 35.7169 27.3957 35.7228C27.7309 35.7287 28.0639 35.6671 28.3749 35.5416C28.6859 35.4162 28.9684 35.2295 29.2057 34.9927L37.5 27.255V49.8332C37.4953 50.1644 37.5565 50.4934 37.6801 50.8008C37.8036 51.1082 37.987 51.388 38.2196 51.6239C38.4522 51.8598 38.7294 52.0472 39.035 52.1751C39.3407 52.3029 39.6687 52.3688 40 52.3688C40.3313 52.3688 40.6593 52.3029 40.965 52.1751C41.2706 52.0472 41.5478 51.8598 41.7804 51.6239C42.013 51.388 42.1964 51.1082 42.3199 50.8008C42.4435 50.4934 42.5047 50.1644 42.5 49.8332V27.255L50.7943 34.9927C51.0316 35.2295 51.3141 35.4162 51.6251 35.5416C51.9361 35.6671 52.2691 35.7287 52.6043 35.7228C52.9395 35.7169 53.2702 35.6437 53.5765 35.5074C53.8829 35.3711 54.1587 35.1746 54.3876 34.9296C54.6164 34.6846 54.7937 34.396 54.9088 34.0811C55.0239 33.7661 55.0744 33.4313 55.0575 33.0964C55.0405 32.7615 54.9563 32.4335 54.81 32.1318C54.6637 31.8301 54.4582 31.561 54.2057 31.3403L41.7057 19.6737C41.4612 19.4451 41.1733 19.268 40.859 19.1528C40.5448 19.0376 40.2106 18.9867 39.8763 19.0031Z"
                                    fill="#BFBFBF" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="mb-4 mt-4 form-group">
                    <label class="form-label tool-tip">Company description
                        <span class="tool-tip dropdown-toggle no-arrow" id="campaign-listing-dropdown"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.75" y="0.75" width="18.5" height="18.5" rx="4.25" stroke="#313131"
                                    stroke-width="1.5" />
                                <path
                                    d="M7.00008 7.6087C7.00008 6.17571 8.35213 5 10 5C11.6479 5 13 6.17571 13 7.6087C13 8.98221 12.1793 9.7403 11.5879 10.1444L11.5759 10.1526C11.2864 10.3503 11.0775 10.4931 10.9561 10.6369C10.833 10.7827 10.75 10.9334 10.75 11.3043C10.7514 11.3908 10.7331 11.4766 10.696 11.5568C10.659 11.637 10.6039 11.71 10.5342 11.7715C10.4644 11.833 10.3812 11.8819 10.2895 11.9153C10.1978 11.9486 10.0994 11.9658 10 11.9658C9.90065 11.9658 9.80224 11.9486 9.71055 11.9153C9.61886 11.8819 9.53571 11.833 9.46592 11.7715C9.39614 11.71 9.34112 11.637 9.30406 11.5568C9.267 11.4766 9.24864 11.3908 9.25005 11.3043C9.25005 10.7125 9.4483 10.219 9.74711 9.86498C10.0459 9.51096 10.3954 9.30081 10.6621 9.11855C11.1957 8.75402 11.5 8.62648 11.5 7.6087C11.5 6.88081 10.8371 6.30435 10 6.30435C9.16298 6.30435 8.50006 6.88081 8.50006 7.6087V7.82609C8.50146 7.91251 8.4831 7.99831 8.44604 8.07851C8.40898 8.1587 8.35396 8.23169 8.28418 8.29324C8.2144 8.35479 8.13124 8.40366 8.03955 8.43701C7.94786 8.47037 7.84946 8.48755 7.75007 8.48755C7.65067 8.48755 7.55227 8.47037 7.46058 8.43701C7.36889 8.40366 7.28574 8.35479 7.21595 8.29324C7.14617 8.23169 7.09115 8.1587 7.05409 8.07851C7.01703 7.99831 6.99867 7.91251 7.00008 7.82609V7.6087Z"
                                    fill="#313131" />
                                <path
                                    d="M9.29294 13.5156C9.48047 13.3525 9.73482 13.2609 10 13.2609C10.2653 13.2609 10.5196 13.3525 10.7071 13.5156C10.8947 13.6786 11 13.8998 11 14.1304C11 14.3611 10.8947 14.5822 10.7071 14.7453C10.5196 14.9084 10.2653 15 10 15C9.73482 15 9.48047 14.9084 9.29294 14.7453C9.10541 14.5822 9.00005 14.3611 9.00005 14.1304C9.00005 13.8998 9.10541 13.6786 9.29294 13.5156Z"
                                    fill="#313131" />
                            </svg>
                        </span>
                        <div class="dropdown-menu label-dropdoen" aria-labelledby="campaign-listing-dropdown">
                            <h5 class="text-white">Company description</h5>
                            <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla lacus
                                risus, feugiat in justo et, auctor pulvinar urna. Morbi quis tincidunt est. Phasellus
                                lacinia, sapien sitmet!</p>
                            <button class="btn full-width black-btn">
                                <svg width="17" height="16" viewBox="0 0 17 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11.1251 0.0834961C8.25602 0.0834961 5.91673 2.42279 5.91673 5.29183C5.91673 5.878 6.03998 6.43103 6.21946 6.95687L1.17145 12.0049C1.17118 12.0049 1.1709 12.0049 1.17063 12.0049C0.28091 12.8946 0.281496 14.3561 1.17145 15.2454C1.61632 15.6897 2.20596 15.9168 2.79173 15.9168C3.37749 15.9168 3.96714 15.6897 4.41201 15.2454C4.41228 15.2454 4.41255 15.2454 4.41282 15.2454L9.46002 10.1974C9.98584 10.377 10.5393 10.5002 11.1259 10.5002C13.9949 10.5002 16.3342 8.16087 16.3342 5.29183C16.3342 4.45812 16.1319 3.67072 15.7857 2.97493C15.7415 2.88628 15.6769 2.8094 15.5972 2.75063C15.5174 2.69185 15.4249 2.65287 15.3271 2.6369C15.2293 2.62092 15.1292 2.62841 15.0349 2.65874C14.9406 2.68907 14.8548 2.74138 14.7847 2.81136L11.9226 5.67269C11.7575 5.83778 11.5477 5.91683 11.3334 5.91683C11.1191 5.91683 10.9093 5.83778 10.7442 5.67269C10.4138 5.34252 10.4138 4.82528 10.7442 4.49512C10.7442 4.49485 10.7442 4.49458 10.7442 4.4943L13.6055 1.63298C13.6755 1.56286 13.7278 1.47712 13.7581 1.38283C13.7885 1.28853 13.796 1.18837 13.78 1.09061C13.764 0.992851 13.725 0.900288 13.6663 0.820551C13.6075 0.740815 13.5306 0.676188 13.442 0.631999C12.746 0.285207 11.9588 0.0834961 11.1251 0.0834961ZM11.1251 1.3335C11.4373 1.3335 11.7395 1.37163 12.03 1.44092L9.86041 3.61051C9.05165 4.41868 9.05165 5.74831 9.86041 6.55648C10.2645 6.96055 10.801 7.16683 11.3334 7.16683C11.8658 7.16683 12.4023 6.96055 12.8064 6.55648L14.9768 4.38688C15.046 4.67747 15.0842 4.97957 15.0842 5.29183C15.0842 7.48529 13.3193 9.25016 11.1259 9.25016C10.5597 9.25016 10.025 9.12993 9.53733 8.91569C9.42209 8.86505 9.29424 8.85039 9.17053 8.87363C9.04681 8.89686 8.93299 8.9569 8.84397 9.0459L3.52822 14.3617C3.32151 14.5678 3.05904 14.6668 2.79173 14.6668C2.52416 14.6668 2.26122 14.5682 2.05442 14.3617C1.64271 13.9502 1.64329 13.3006 2.05524 12.8887L7.37099 7.57373C7.45999 7.48471 7.52003 7.37089 7.54326 7.24718C7.5665 7.12346 7.55184 6.99561 7.5012 6.88037C7.287 6.39284 7.16673 5.85756 7.16673 5.29183C7.16673 3.09837 8.9316 1.3335 11.1251 1.3335Z"
                                        fill="#DFDFDF" />
                                </svg><span style="margin-left: 10px;">Request Support</span>
                            </button>
                        </div>
                    </label>
                    <textarea id="Campaign_desc" data-id="champing_desc" class="form-control" data-focus="champing_desc"
                        form="mainform" name="champing_desc" placeholder="Update text here..."></textarea>
                </div>

                <div class="mb-4 mt-5">
                    <label class="form-label tool-tip ">campaign Investment Terms
                        <span class="tool-tip dropdown-toggle no-arrow" id="campaign-investment-dropdown"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.75" y="0.75" width="18.5" height="18.5" rx="4.25" stroke="#313131"
                                    stroke-width="1.5" />
                                <path
                                    d="M7.00008 7.6087C7.00008 6.17571 8.35213 5 10 5C11.6479 5 13 6.17571 13 7.6087C13 8.98221 12.1793 9.7403 11.5879 10.1444L11.5759 10.1526C11.2864 10.3503 11.0775 10.4931 10.9561 10.6369C10.833 10.7827 10.75 10.9334 10.75 11.3043C10.7514 11.3908 10.7331 11.4766 10.696 11.5568C10.659 11.637 10.6039 11.71 10.5342 11.7715C10.4644 11.833 10.3812 11.8819 10.2895 11.9153C10.1978 11.9486 10.0994 11.9658 10 11.9658C9.90065 11.9658 9.80224 11.9486 9.71055 11.9153C9.61886 11.8819 9.53571 11.833 9.46592 11.7715C9.39614 11.71 9.34112 11.637 9.30406 11.5568C9.267 11.4766 9.24864 11.3908 9.25005 11.3043C9.25005 10.7125 9.4483 10.219 9.74711 9.86498C10.0459 9.51096 10.3954 9.30081 10.6621 9.11855C11.1957 8.75402 11.5 8.62648 11.5 7.6087C11.5 6.88081 10.8371 6.30435 10 6.30435C9.16298 6.30435 8.50006 6.88081 8.50006 7.6087V7.82609C8.50146 7.91251 8.4831 7.99831 8.44604 8.07851C8.40898 8.1587 8.35396 8.23169 8.28418 8.29324C8.2144 8.35479 8.13124 8.40366 8.03955 8.43701C7.94786 8.47037 7.84946 8.48755 7.75007 8.48755C7.65067 8.48755 7.55227 8.47037 7.46058 8.43701C7.36889 8.40366 7.28574 8.35479 7.21595 8.29324C7.14617 8.23169 7.09115 8.1587 7.05409 8.07851C7.01703 7.99831 6.99867 7.91251 7.00008 7.82609V7.6087Z"
                                    fill="#313131" />
                                <path
                                    d="M9.29294 13.5156C9.48047 13.3525 9.73482 13.2609 10 13.2609C10.2653 13.2609 10.5196 13.3525 10.7071 13.5156C10.8947 13.6786 11 13.8998 11 14.1304C11 14.3611 10.8947 14.5822 10.7071 14.7453C10.5196 14.9084 10.2653 15 10 15C9.73482 15 9.48047 14.9084 9.29294 14.7453C9.10541 14.5822 9.00005 14.3611 9.00005 14.1304C9.00005 13.8998 9.10541 13.6786 9.29294 13.5156Z"
                                    fill="#313131" />
                            </svg>
                        </span>
                        <div class="dropdown-menu label-dropdoen" aria-labelledby="campaign-investment-dropdown">
                            <h5 class="text-white">Campaign Investment Terms</h5>
                            <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla lacus
                                risus, feugiat in justo et, auctor pulvinar urna. Morbi quis tincidunt est. Phasellus
                                lacinia, sapien sitmet!</p>
                            <button class="btn full-width black-btn">
                                <svg width="17" height="16" viewBox="0 0 17 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11.1251 0.0834961C8.25602 0.0834961 5.91673 2.42279 5.91673 5.29183C5.91673 5.878 6.03998 6.43103 6.21946 6.95687L1.17145 12.0049C1.17118 12.0049 1.1709 12.0049 1.17063 12.0049C0.28091 12.8946 0.281496 14.3561 1.17145 15.2454C1.61632 15.6897 2.20596 15.9168 2.79173 15.9168C3.37749 15.9168 3.96714 15.6897 4.41201 15.2454C4.41228 15.2454 4.41255 15.2454 4.41282 15.2454L9.46002 10.1974C9.98584 10.377 10.5393 10.5002 11.1259 10.5002C13.9949 10.5002 16.3342 8.16087 16.3342 5.29183C16.3342 4.45812 16.1319 3.67072 15.7857 2.97493C15.7415 2.88628 15.6769 2.8094 15.5972 2.75063C15.5174 2.69185 15.4249 2.65287 15.3271 2.6369C15.2293 2.62092 15.1292 2.62841 15.0349 2.65874C14.9406 2.68907 14.8548 2.74138 14.7847 2.81136L11.9226 5.67269C11.7575 5.83778 11.5477 5.91683 11.3334 5.91683C11.1191 5.91683 10.9093 5.83778 10.7442 5.67269C10.4138 5.34252 10.4138 4.82528 10.7442 4.49512C10.7442 4.49485 10.7442 4.49458 10.7442 4.4943L13.6055 1.63298C13.6755 1.56286 13.7278 1.47712 13.7581 1.38283C13.7885 1.28853 13.796 1.18837 13.78 1.09061C13.764 0.992851 13.725 0.900288 13.6663 0.820551C13.6075 0.740815 13.5306 0.676188 13.442 0.631999C12.746 0.285207 11.9588 0.0834961 11.1251 0.0834961ZM11.1251 1.3335C11.4373 1.3335 11.7395 1.37163 12.03 1.44092L9.86041 3.61051C9.05165 4.41868 9.05165 5.74831 9.86041 6.55648C10.2645 6.96055 10.801 7.16683 11.3334 7.16683C11.8658 7.16683 12.4023 6.96055 12.8064 6.55648L14.9768 4.38688C15.046 4.67747 15.0842 4.97957 15.0842 5.29183C15.0842 7.48529 13.3193 9.25016 11.1259 9.25016C10.5597 9.25016 10.025 9.12993 9.53733 8.91569C9.42209 8.86505 9.29424 8.85039 9.17053 8.87363C9.04681 8.89686 8.93299 8.9569 8.84397 9.0459L3.52822 14.3617C3.32151 14.5678 3.05904 14.6668 2.79173 14.6668C2.52416 14.6668 2.26122 14.5682 2.05442 14.3617C1.64271 13.9502 1.64329 13.3006 2.05524 12.8887L7.37099 7.57373C7.45999 7.48471 7.52003 7.37089 7.54326 7.24718C7.5665 7.12346 7.55184 6.99561 7.5012 6.88037C7.287 6.39284 7.16673 5.85756 7.16673 5.29183C7.16673 3.09837 8.9316 1.3335 11.1251 1.3335Z"
                                        fill="#DFDFDF" />
                                </svg><span style="margin-left: 10px;">Request Support</span>
                            </button>
                        </div>
                    </label>
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

                <textarea form="mainform" data-id="offer" name="offers_data" id="offers_data" value=""
                    style="display:none;"></textarea>
                <textarea form="mainform" data-id="highlights" name="highlights_data" id="highlights_data" value=""
                    style="display:none;"></textarea>
                <textarea form="mainform" data-id="team" name="team_data" id="team_data" value=""
                    style="display:none;"></textarea>
                <textarea form="mainform" data-id="board" name="board_data" id="board_data" value=""
                    style="display:none;"></textarea>

                <textarea form="mainform" data-id="office" name="officers_data" id="officers_data" value=""
                    style="display:none;"></textarea>
                <textarea form="mainform" name="voting_data" id="voting_data" value="" style="display:none;"></textarea>
                <textarea form="mainform" name="risk_data" id="risk_data" value="" style="display:none;"></textarea>
                <textarea form="mainform" name="fundraising_data" id="fundraising_data" value=""
                    style="display:none;"></textarea>
                <textarea form="mainform" name="transactions_data" id="transactions_data" value=""
                    style="display:none;"></textarea>
                <textarea form="mainform" name="asset_data" id="asset_data" value="" style="display:none;"></textarea>
                <textarea form="mainform" name="debt_data" id="debt_data" value="" style="display:none;"></textarea>
                <textarea form="mainform" name="equity_data" id="equity_data" value="" style="display:none;"></textarea>
                <textarea form="mainform" name="questions_data" id="questions_data" value=""
                    style="display:none;"></textarea>
                <textarea form="mainform" name="discussion_data" id="discussion_data" value=""
                    style="display:none;"></textarea>
            </form>

            <div class="mb-4 mt-5">
                <input type="text" class="hidden-feild" data-focus="offers_data">
                <label class="form-label tool-tip ">campaign Offerings </label>
                <div class="row">
                    <div class="col-md-6 mb-4" id="offer-module">
                        <div class="information-box" data-errorh="offer-module">
                            <div class="row">
                                <div class="col-sm-11 col-md-11">
                                    <span class="text">Offer investor perks?</span>
                                </div>
                                <div class="col-sm-1 col-md-1">
                                    <input class="form-check-input check-item-agree" type="checkbox" value=""
                                        data-title="Add new offering" data-check="offer-module">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" id="display-offer">
                </div>
            </div>
            <div class="mb-4 zero-top hidden" data-edit="offer-module">
                <label class="form-label tool-tip "><span data-main-title="offer-module"></span> Campaign
                    Offerings</label>

                <form id="CreateOfferings" data-form="offer-module" method="post">

                    <input type="hidden" data-form-id="offer-module" name="offer_id" id="offer_id" value="">
                    <div class="row ">
                        <div class="col-md-6 mb-4 ">
                            <div class="information-box">
                                <div class="row align-items-center">
                                    <div class="col-sm-11 col-md-4">
                                        <span class="text">Offering Title:</span>
                                    </div>
                                    <div class="col-sm-1 col-md-8 form-group">
                                        <input data-for="offers_data" class="form-control" form="CreateOfferings"
                                            type="text" name="offer_title" data-input="offer-module" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="information-box">
                                <div class="row align-items-center">
                                    <div class="col-sm-11 col-md-4">
                                        <span class="text ">Offering Amount:</span></span>
                                    </div>
                                    <div class="col-sm-1 col-md-8 form-group">
                                        <input data-for="offers_data" class="form-control" form="CreateOfferings"
                                            name="offer_amount" type="text" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mb-4 form-group">
                            <textarea data-for="offers_data" data-id="" class="form-control" form="CreateOfferings"
                                name="offer_desc" placeholder="Offering desc here..."></textarea>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="information-box">
                                <div class="row align-items-center">
                                    <div class="col-sm-11 col-md-4">
                                        <span class="text ">Select order:</span></span>
                                    </div>
                                    <div class="col-sm-1 col-md-8 form-group">
                                        <input class="form-control" form="CreateOfferings" name="offer_order"
                                            type="text" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="information-box">
                                <div class="row align-items-center">
                                    <div class="col-sm-11 col-md-4">
                                        <span class="text ">Select Stock:</span></span>
                                    </div>
                                    <div class="col-sm-1 col-md-8 form-group">
                                        <input class="form-control" form="CreateOfferings" name="offer_stock"
                                            type="text" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <button class="btn fixed-width mr-5 small-btn green-border" type="submit"
                                form="CreateOfferings" style="width:100%; height:100%;">
                                Save Offer
                            </button>
                        </div>
                </form>
            </div>
        </div>

        <div class="mb-4 mt-5">
            <input type="text" class="hidden-feild" data-focus="highlights_data">
            <label class="form-label tool-tip ">Company Highlights</label>
            <div class="row">
                <div class="col-md-6 mb-4" id="highlights-module">
                    <div class="information-box" data-errorh="highlights-module">
                        <div class="row">
                            <div class="col-sm-11 col-md-11">
                                <span class="text">Showcase Company highlights?</span>
                            </div>
                            <div class="col-sm-1 col-md-1">
                                <input class="form-check-input check-item-agree" type="checkbox" value=""
                                    data-title="Add new highlight" data-check="highlights-module">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" id="display-highlights">

            </div>
        </div>
        <div class="mb-4 zero-top hidden" data-edit="highlights-module">
            <label class="form-label tool-tip "><span data-main-title="highlights-module"></span> Company
                Highlights</label>

            <form id="CreateHighlight" data-form="highlights-module" method="post">

                <input type="hidden" data-form-id="highlights-module" name="highlight_id" id="highlight_id" value="">
                <div class="row ">
                    <div class="col-md-6 mb-4 ">
                        <div class="information-box">
                            <div class="row align-items-center">
                                <div class="col-sm-11 col-md-4">
                                    <span class="text ">Highlight Title:</span>
                                </div>
                                <div class="col-sm-1 col-md-8 form-group">
                                    <input data-for="highlights_data" class="form-control"
                                        data-input="highlights-module" name="highlight_title" type="text" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="information-box">
                            <div class="row align-items-center">
                                <div class="col-sm-11 col-md-4">
                                    <span class="text ">Update Date:</span></span>
                                </div>
                                <div class="col-sm-1 col-md-8 form-group">
                                    <input data-for="highlights_data" class="form-control" name="highlight_date"
                                        type="date" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-4 form-group">
                        <textarea data-for="highlights_data" data-id="" class="form-control" name="highlight_desc"
                            placeholder="Update text here..."></textarea>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="information-box">
                            <div class="row align-items-center">
                                <div class="col-sm-11 col-md-4">
                                    <span class="text ">Select Emoji:</span></span>
                                </div>
                                <div class="col-sm-1 col-md-8 form-group">
                                    <input class="form-control " type="text" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="information-box">
                            <div class="row align-items-center">
                                <div class="col-sm-11 col-md-4">
                                    <span class="text ">Select order:</span></span>
                                </div>
                                <div class="col-sm-1 col-md-8">
                                    <input class="form-control " type="text" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <button class="btn fixed-width mr-5 small-btn green-border" style="width:100%; height:100%;"
                            type="submit" form="CreateHighlight">
                            Save Hightlight
                        </button>
                    </div>
                </div>
            </form>
        </div>



        <div class="mb-4 mt-5">
            <input type="text" class="hidden-feild" data-focus="team_data">
            <label class="form-label tool-tip ">Company Team Memebers</label>
            <div class="row">
                <div class="col-md-6 mb-4" id="team-module">
                    <div class="information-box" data-errorh="team-module">
                        <div class="row">
                            <div class="col-sm-11 col-md-11">
                                <span class="text">Include company officers? </span>
                            </div>
                            <div class="col-sm-1 col-md-1">
                                <input class="form-check-input check-item-agree" type="checkbox" value=""
                                    data-title="Add new team memeber" data-check="team-module">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" id="display-team">

            </div>
        </div>
        <div class="mb-4 zero-top hidden" data-edit="team-module">
            <label class="form-label tool-tip "><span data-main-title="team-module"></span> Company Officers</label>

            <form id="Createteam" data-form="team-module" method="post">

                <input type="hidden" data-form-id="team-module" name="team_id" id="team_id" value="">

                <div class="row ">
                    <div class="col-md-6 mb-4 ">
                        <div class="information-box">
                            <div class="row align-items-center">
                                <div class="col-sm-11 col-md-4">
                                    <span class="text ">Member Name:</span>
                                </div>
                                <div class="col-sm-1 col-md-8 form-group">
                                    <input data-for="team_data" class="form-control" name="team_name"
                                        data-input="team-module" type="text" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="information-box">
                            <div class="row align-items-center">
                                <div class="col-sm-11 col-md-4">
                                    <span class="text ">Member Title:</span></span>
                                </div>
                                <div class="col-sm-1 col-md-8 form-group">
                                    <input data-for="team_data" class="form-control " name="team_title" type="text"
                                        value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-4">
                        <textarea data-for="team_data" data-id="" class="form-control" name="team_desc"
                            placeholder="About the team memeber..."></textarea>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="information-box">
                            <div class="row align-items-center">
                                <div class="col-sm-11 col-md-4">
                                    <span class="text ">Member Image:</span></span>
                                </div>
                                <div class="col-sm-1 col-md-8 form-group">
                                    <input class="form-control " type="text" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="information-box">
                            <div class="row align-items-center">
                                <div class="col-sm-11 col-md-4">
                                    <span class="text ">Select order:</span></span>
                                </div>
                                <div class="col-sm-1 col-md-8 form-group">
                                    <input class="form-control " type="text" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <button class="btn fixed-width mr-5 small-btn green-border" style="width:100%; height:100%;"
                            type="submit" form="Createteam">
                            Save Team Memeber
                        </button>
                    </div>

                </div>
            </form>
        </div>








        <div class="mb-4 mt-5">
            <input type="text" class="hidden-feild" data-focus="board_data">
            <label class="form-label tool-tip ">Company Board Member</label>
            <div class="row">
                <div class="col-md-6 mb-4" id="board-module">
                    <div class="information-box" data-errorh="board-module">
                        <div class="row">
                            <div class="col-sm-11 col-md-11">
                                <span class="text">Include Board of Directors?</span>
                            </div>
                            <div class="col-sm-1 col-md-1">
                                <input class="form-check-input check-item-agree" type="checkbox" value=""
                                    data-title="Add new board memeber" data-check="board-module">
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row" id="display-board">

            </div>
        </div>
        <div class="mb-4 zero-top hidden" data-edit="board-module">
            <label class="form-label tool-tip "><span data-main-title="board-module"></span> Board Team Member</label>

            <form id="boardmember" data-form="board-module" method="post">
                <input type="hidden" data-form-id="board-module" name="board_id" id="board_id" value="">
                <div class="row ">
                    <div class="col-md-6 mb-4 ">
                        <div class="information-box">
                            <div class="row align-items-center">
                                <div class="col-sm-11 col-md-4">
                                    <span class="text ">Member Name:</span>
                                </div>
                                <div class="col-sm-1 col-md-8 form-group">
                                    <input data-for="board_data" class="form-control" name="board_name"
                                        data-input="board-module" type="text" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="information-box">
                            <div class="row align-items-center">
                                <div class="col-sm-11 col-md-4">
                                    <span class="text ">Member Title:</span></span>
                                </div>
                                <div class="col-sm-1 col-md-8 form-group">
                                    <input data-for="board_data" class="form-control " name="board_title" type="text"
                                        value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-4">
                        <textarea data-for="board_data" data-id="" class="form-control" name="board_desc"
                            placeholder="About the team memeber..."></textarea>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="information-box">
                            <div class="row align-items-center">
                                <div class="col-sm-11 col-md-4">
                                    <span class="text ">Member Image:</span></span>
                                </div>
                                <div class="col-sm-1 col-md-8 form-group">
                                    <input class="form-control " type="text" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="information-box">
                            <div class="row align-items-center">
                                <div class="col-sm-11 col-md-4">
                                    <span class="text ">Select order:</span></span>
                                </div>
                                <div class="col-sm-1 col-md-8 form-group">
                                    <input class="form-control " type="text" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <button class="btn fixed-width mr-5 small-btn green-border" style="width:100%; height:100%;"
                            type="submit" form="boardmember">
                            Save Board Member
                        </button>
                    </div>
                </div>
            </form>
        </div>


        <div class="mb-4 mt-5">
            <input type="text" class="hidden-feild" data-focus="officers_data">
            <label class="form-label tool-tip ">Company Officers</label>
            <div class="row">
                <div class="col-md-6 mb-4" id="officers-module">
                    <div class="information-box" data-errorh="officers-module">
                        <div class="row">
                            <div class="col-sm-11 col-md-11">
                                <span class="text">Include company officers? </span>
                            </div>
                            <div class="col-sm-1 col-md-1">
                                <input class="form-check-input check-item-agree" type="checkbox" value=""
                                    data-title="Add new Officer Memeber" data-check="officers-module">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" id="display-officers">

            </div>
        </div>
        <div class="mb-4 zero-top hidden" data-edit="officers-module">
            <label class="form-label tool-tip "><span data-main-title="officers-module"></span> Company Officers</label>

            <form id="Createofficers" data-form="officers-module" method="post">

                <input type="hidden" data-form-id="officers-module" name="officers_id" id="officers_id" value="">

                <div class="row ">
                    <div class="col-md-6 mb-4 ">
                        <div class="information-box">
                            <div class="row align-items-center">
                                <div class="col-sm-11 col-md-4">
                                    <span class="text ">Member Name:</span>
                                </div>
                                <div class="col-sm-1 col-md-8 form-group">
                                    <input data-for="officers_data" class="form-control" name="officers_name"
                                        data-input="officers-module" type="text" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="information-box">
                            <div class="row align-items-center">
                                <div class="col-sm-11 col-md-4">
                                    <span class="text ">Member Title:</span></span>
                                </div>
                                <div class="col-sm-1 col-md-8 form-group">
                                    <input data-for="officers_data" class="form-control " name="officers_title"
                                        type="text" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-4">
                        <textarea data-for="officers_data" class="form-control" name="officers_desc"
                            placeholder="About the team memeber..."></textarea>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="information-box">
                            <div class="row align-items-center">
                                <div class="col-sm-11 col-md-4">
                                    <span class="text ">Member Image:</span></span>
                                </div>
                                <div class="col-sm-1 col-md-8 form-group">
                                    <input class="form-control " type="text" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="information-box">
                            <div class="row align-items-center">
                                <div class="col-sm-11 col-md-4">
                                    <span class="text ">Select order:</span></span>
                                </div>
                                <div class="col-sm-1 col-md-8 form-group">
                                    <input class="form-control " type="text" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <button class="btn fixed-width mr-5 small-btn green-border" style="width:100%; height:100%;"
                            type="submit" form="Createofficers">
                            Save Team Memeber
                        </button>
                    </div>

                </div>
            </form>
        </div>

        <div class="mb-4 mt-5">
            <input type="text" class="hidden-feild" data-focus="voting_data">
            <label class="form-label tool-tip ">Voting Power</label>
            <div class="row">
                <div class="col-md-6 mb-4" id="voting-module">
                    <div class="information-box" data-errorh="voting-module">
                        <div class="row">
                            <div class="col-sm-11 col-md-11">
                                <span class="text">Include Voting power outline</span>
                            </div>
                            <div class="col-sm-1 col-md-1">
                                <input class="form-check-input check-item-agree" type="checkbox" value=""
                                    data-title="Add vote item" data-check="voting-module">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" id="display-voting">

            </div>
        </div>
        <div class="mb-4 zero-top hidden" data-edit="voting-module">
            <label class="form-label tool-tip "><span data-main-title="voting-module"></span> Voting Power</label>

            <form id="Createvoting" data-form="voting-module" method="post">

                <input type="hidden" data-form-id="voting-module" name="voting_id" id="voting_id" value="">
                <div class="row ">
                    <div class="col-md-6 mb-4 ">
                        <div class="information-box">
                            <div class="row align-items-center">
                                <div class="col-sm-11 col-md-4">
                                    <span class="text">Member Title:</span>
                                </div>
                                <div class="col-sm-1 col-md-8 form-group">
                                    <input class="form-control" name="voting_title" data-input="voting-module"
                                        type="text" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="information-box">
                            <div class="row align-items-center">
                                <div class="col-sm-11 col-md-4">
                                    <span class="text ">Voting Level:</span></span>
                                </div>
                                <div class="col-sm-1 col-md-8 form-group">
                                    <input class="form-control " name="voting_level" type="text" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-4">
                        <textarea data-id="" class="form-control" name="voting_desc"
                            placeholder="About the team memeber..."></textarea>
                    </div>

                    <div class="col-md-12 mb-4">
                        <button class="btn fixed-width mr-5 small-btn green-border" style="width:100%; height:100%;"
                            type="submit" form="Createvoting">
                            Save Voting Power
                        </button>
                    </div>
                </div>
            </form>
        </div>


        <div class="mb-4 mt-5">
            <input type="text" class="hidden-feild" data-focus="risk_data">
            <label class="form-label tool-tip ">Investor Risks</label>
            <div class="row">
                <div class="col-md-12 mb-4 add-check" data-block="risk-module">
                    <div class="information-box">
                        <div class="row">
                            <div class="col-sm-11 col-md-11">
                                <span class="text">Add Invstor risk</span>
                            </div>
                            <div class="col-sm-1 col-md-1">
                                <svg class="" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z">
                                    </path>
                                    <path
                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" id="display-risk">

            </div>
        </div>
        <div class="mb-4 zero-top hidden" data-edit="risk-module">
            <label class="form-label tool-tip "><span data-main-title="risk-module"></span> Investor Risk
                Outline</label>

            <form id="Createrisk" data-form="risk-module" method="post">

                <input type="hidden" data-form-id="risk-module" name="risk_id" id="risk_id" value="">
                <div class="row ">
                    <div class="col-md-12 mb-4">
                        <div class="information-box">
                            <div class="row align-items-center">
                                <div class="col-sm-11 col-md-3">
                                    <span class="text ">Risk Title:</span></span>
                                </div>
                                <div class="col-sm-1 col-md-9 form-group">
                                    <input class="form-control" name="risk_title" data-input="risk-module" type="text"
                                        value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-4">
                        <textarea data-id="" class="form-control" name="risk_desc"
                            placeholder="Update text here..."></textarea>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="information-box">
                            <div class="row align-items-center">
                                <div class="col-sm-11 col-md-4">
                                    <span class="text ">Risk Order:</span></span>
                                </div>
                                <div class="col-sm-1 col-md-8 form-group">
                                    <input class="form-control " type="text" value="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-4">
                        <button class="btn fixed-width mr-5 small-btn green-border" style="width:100%; height:100%;"
                            type="submit" form="Createrisk">
                            Save Risk
                        </button>
                    </div>

                </div>
            </form>
        </div>

        <div class="mb-4 mt-5">

            <label class="form-label tool-tip ">Previous fundraising</label>
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



        <div class="mb-4 mt-5">
            <input type="text" class="hidden-feild" data-focus="fundraising_data">
            <label class="form-label tool-tip ">Use of fundraising</label>
            <div class="row">
                <div class="col-md-6 mb-4" id="fundraising-module">
                    <div class="information-box" data-errorh="fundraising-module">
                        <div class="row">
                            <div class="col-sm-11 col-md-11">
                                <span class="text">showcase funding use?</span>
                            </div>
                            <div class="col-sm-1 col-md-1">
                                <input class="form-check-input check-item-agree" type="checkbox" value=""
                                    data-title="Add new use of funds" data-check="fundraising-module">
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row" id="display-fundraising">

            </div>
        </div>
        <div class="mb-4 zero-top hidden" data-edit="fundraising-module">
            <label class="form-label tool-tip "><span data-main-title="fundraising-module"></span> use of
                fundraising</label>

            <form id="Createfundraising" data-form="fundraising-module" method="post">

                <input type="hidden" data-form-id="fundraising-module" name="fundraising_id" id="fundraising_id"
                    value="">

                <div class="row ">
                    <div class="col-md-12 mb-4 ">
                        <div class="information-box">
                            <div class="row align-items-center">
                                <div class="col-sm-11 col-md-4">
                                    <span class="text ">Use of funds:</span>
                                </div>
                                <div class="col-sm-1 col-md-8 form-group">
                                    <input class="form-control" name="fundraising_funds" data-input="fundraising-module"
                                        type="text" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-4">
                        <textarea data-id="" class="form-control" name="fundraising_desc"
                            placeholder="About the team memeber..."></textarea>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="information-box">
                            <div class="row align-items-center">
                                <div class="col-sm-11 col-md-4">
                                    <span class="text ">Fund Order:</span></span>
                                </div>
                                <div class="col-sm-1 col-md-8 form-group">
                                    <input class="form-control " type="text" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <button class="btn fixed-width mr-5 small-btn green-border" style="width:100%; height:100%;"
                            type="submit" form="Createfundraising">
                            Save Fund use case
                        </button>
                    </div>
                </div>
            </form>
        </div>




        <div class="mb-4 mt-5">

            <label class="form-label tool-tip ">Outstanding debt</label>
            <div class="row ">
                <div class="col-md-6 mb-4 ">
                    <div class="information-box">
                        <div class="row align-items-center">
                            <div class="col-sm-11 col-md-4">
                                <span class="text ">Debt Amount:</span>
                            </div>
                            <div class="col-sm-1 col-md-8">
                                <input form="mainform" name="debt_amount" class="form-control" type="text" value="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4 ">
                    <div class="information-box">
                        <div class="row align-items-center">
                            <div class="col-sm-11 col-md-5">
                                <span class="text ">Debt interest rate:</span>
                            </div>
                            <div class="col-sm-1 col-md-7">
                                <input form="mainform" name="debt_interest_rate" class="form-control" type="text"
                                    value="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4 ">
                    <div class="information-box">
                        <div class="row align-items-center">
                            <div class="col-sm-11 col-md-4">
                                <span class="text ">Loan Count:</span>
                            </div>
                            <div class="col-sm-1 col-md-8">
                                <input form="mainform" name="loan_count" class="form-control" type="text" value="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4 ">
                    <div class="information-box">
                        <div class="row align-items-center">
                            <div class="col-sm-11 col-md-6">
                                <span class="text ">Chief Financial Officer:</span>
                            </div>
                            <div class="col-sm-1 col-md-6">
                                <input form="mainform" name="financial_officer" class="form-control" type="text"
                                    value="">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="mb-4 mt-5">
            <input type="text" class="hidden-feild" data-focus="transactions_data">
            <label class="form-label tool-tip ">Related party transactions</label>
            <div class="row">
                <div class="col-md-6 mb-4" id="transactions-module">
                    <div class="information-box" data-errorh="transactions-module">
                        <div class="row">
                            <div class="col-sm-11 col-md-11">
                                <span class="text">Include party transactions?</span>
                            </div>
                            <div class="col-sm-1 col-md-1">
                                <input class="form-check-input check-item-agree" type="checkbox" value=""
                                    data-title="Add new transaction" data-check="transactions-module">
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row" id="display-transactions">
            </div>
        </div>
        <div class="mb-4 zero-top hidden" data-edit="transactions-module">
            <label class="form-label tool-tip "><span data-main-title="transactions-module"></span> Transactions</label>

            <form id="Createtransactions" data-form="transactions-module" method="post">

                <input type="hidden" data-form-id="transactions-module" name="transactions_id" id="transactions_id"
                    value="">
                <div class="row ">
                    <div class="col-md-6 mb-4 ">
                        <div class="information-box">
                            <div class="row align-items-center">
                                <div class="col-sm-11 col-md-5">
                                    <span class="text ">transaction title:</span>
                                </div>
                                <div class="col-sm-1 col-md-7 form-group">
                                    <input class="form-control" type="text" name="transactions_title"
                                        data-input="transactions-module" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4 ">
                        <div class="information-box">
                            <div class="row align-items-center">
                                <div class="col-sm-11 col-md-5">
                                    <span class="text ">transaction Cost:</span>
                                </div>
                                <div class="col-sm-1 col-md-7 form-group">
                                    <input class="form-control" name="transactions_cost" type="text" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-4">
                        <textarea data-id="" class="form-control" name="transactions_desc"
                            placeholder="About the transaction..."></textarea>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="information-box">
                            <div class="row align-items-center">
                                <div class="col-sm-11 col-md-4">
                                    <span class="text ">Select order:</span></span>
                                </div>
                                <div class="col-sm-1 col-md-8 form-group">
                                    <input class="form-control " type="text" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <button class="btn fixed-width mr-5 small-btn green-border" style="width:100%; height:100%;"
                            type="submit" form="Createtransactions">
                            Save Transaction
                        </button>
                    </div>

                </div>
            </form>
        </div>



        <div class="mb-4 mt-5">
            <input type="text" class="hidden-feild" data-focus="asset_data">
            <input type="text" class="hidden-feild" data-focus="debt_data">
            <input type="text" class="hidden-feild" data-focus="equity_data">
            <label class="form-label tool-tip ">Capital Structure Showcase</label>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="information-box" data-errorh="showcase">
                        <div class="row">
                            <div class="col-sm-11 col-md-11">
                                <span class="text">showcase Capital Structure?</span>
                            </div>
                            <div class="col-sm-1 col-md-1">
                                <input class="form-check-input" type="checkbox" value="" id="showcase">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 mb-4 hidden add-check" data-hide="showcase" data-block="asset-module">
                    <div class="information-box">
                        <div class="row align-items-center">
                            <div class="col-sm-11 col-md-7">
                                <span class="text">Add Asset</span>
                            </div>
                            <div class="col-sm-1 col-md-5">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-plus-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                    <path
                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 mb-4 hidden add-check" data-hide="showcase" data-block="debt-module">
                    <div class="information-box">
                        <div class="row align-items-center">
                            <div class="col-sm-11 col-md-7">
                                <span class="text">Add Debt</span>
                            </div>
                            <div class="col-sm-1 col-md-5">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-plus-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                    <path
                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 mb-4 hidden add-check" data-hide="showcase" data-block="equity-module">
                    <div class="information-box">
                        <div class="row align-items-center">
                            <div class="col-sm-11 col-md-7">
                                <span class="text">Add Equity</span>
                            </div>
                            <div class="col-sm-1 col-md-5">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-plus-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                    <path
                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <label class="form-label tool-tip ">Assets</label>
                    <div class="row" id="display-asset">

                    </div>
                </div>
                <div class="col-md-4">
                    <label class="form-label tool-tip ">Debts</label>
                    <div class="row" id="display-debt">

                    </div>
                </div>
                <div class="col-md-4">
                    <label class="form-label tool-tip ">Equity</label>
                    <div class="row" id="display-equity">

                    </div>
                </div>
            </div>
        </div>
        <div class="mb-4 zero-top hidden" data-edit="asset-module">
            <label class="form-label tool-tip "><span data-main-title="asset-module"></span> Asset Capital
                Structure Showcase</label>

            <form id="Createasset" data-form="asset-module" method="post">

                <input type="hidden" data-form-id="asset-module" name="asset_id" id="asset_id" value="">
                <div class="row ">
                    <div class="col-md-6 mb-4 ">
                        <div class="information-box">
                            <div class="row align-items-center">
                                <div class="col-sm-11 col-md-5">
                                    <span class="text ">Title:</span>
                                </div>
                                <div class="col-sm-1 col-md-7 form-group">
                                    <input class="form-control" name="asset_title" data-input="asset-module" type="text"
                                        value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4 ">
                        <div class="information-box">
                            <div class="row align-items-center">
                                <div class="col-sm-11 col-md-5">
                                    <span class="text ">Value of item:</span>
                                </div>
                                <div class="col-sm-1 col-md-7 form-group">
                                    <input class="form-control" name="asset_value" type="text" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-4">
                        <textarea data-id="" class="form-control"
                            placeholder="About the asset, debt, equity..."></textarea>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="information-box">
                            <div class="row align-items-center">
                                <div class="col-sm-11 col-md-4">
                                    <span class="text ">item Order:</span></span>
                                </div>
                                <div class="col-sm-1 col-md-8 form-group">
                                    <input class="form-control " type="text" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <button class="btn fixed-width mr-5 small-btn green-border" style="width:100%; height:100%;"
                            type="submit" form="Createasset">
                            Save Asset Structure Item
                        </button>
                    </div>

                </div>
            </form>
        </div>


        <div class="mb-4 zero-top hidden" data-edit="debt-module">
            <label class="form-label tool-tip "><span data-main-title="debt-module"></span> Debt Capital
                Structure Showcase</label>

            <form id="Createdebt" data-form="debt-module" method="post">

                <input type="hidden" data-form-id="debt-module" name="debt_id" id="debt_id" value="">
                <div class="row ">
                    <div class="col-md-6 mb-4 ">
                        <div class="information-box">
                            <div class="row align-items-center">
                                <div class="col-sm-11 col-md-5">
                                    <span class="text ">Title:</span>
                                </div>
                                <div class="col-sm-1 col-md-7 form-group">
                                    <input class="form-control" name="debt_title" data-input="debt-module" type="text"
                                        value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4 ">
                        <div class="information-box">
                            <div class="row align-items-center">
                                <div class="col-sm-11 col-md-5">
                                    <span class="text ">Value of item:</span>
                                </div>
                                <div class="col-sm-1 col-md-7 form-group">
                                    <input class="form-control" name="debt_value" type="text" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-4">
                        <textarea data-id="" class="form-control"
                            placeholder="About the debt, debt, equity..."></textarea>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="information-box">
                            <div class="row align-items-center">
                                <div class="col-sm-11 col-md-4">
                                    <span class="text ">item Order:</span></span>
                                </div>
                                <div class="col-sm-1 col-md-8 form-group">
                                    <input class="form-control " type="text" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <button class="btn fixed-width mr-5 small-btn green-border" style="width:100%; height:100%;"
                            type="submit" form="Createdebt">
                            Save Debt Structure Item
                        </button>
                    </div>

                </div>
            </form>
        </div>

        <div class="mb-4 zero-top hidden" data-edit="equity-module">
            <label class="form-label tool-tip "><span data-main-title="equity-module"></span> Equity Capital
                Structure Showcase</label>

            <form id="Createequity" data-form="equity-module" method="post">

                <input type="hidden" data-form-id="equity-module" name="equity_id" id="equity_id" value="">
                <div class="row ">
                    <div class="col-md-6 mb-4 ">
                        <div class="information-box">
                            <div class="row align-items-center">
                                <div class="col-sm-11 col-md-5">
                                    <span class="text ">Title:</span>
                                </div>
                                <div class="col-sm-1 col-md-7 form-group">
                                    <input class="form-control" name="equity_title" data-input="equity-module"
                                        type="text" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4 ">
                        <div class="information-box">
                            <div class="row align-items-center">
                                <div class="col-sm-11 col-md-5">
                                    <span class="text ">Value of item:</span>
                                </div>
                                <div class="col-sm-1 col-md-7 form-group">
                                    <input class="form-control" name="equity_value" type="text" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-4">
                        <textarea data-id="" class="form-control"
                            placeholder="About the equity, debt, equity..."></textarea>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="information-box">
                            <div class="row align-items-center">
                                <div class="col-sm-11 col-md-4">
                                    <span class="text ">item Order:</span></span>
                                </div>
                                <div class="col-sm-1 col-md-8 form-group">
                                    <input class="form-control " type="text" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <button class="btn fixed-width mr-5 small-btn green-border" style="width:100%; height:100%;"
                            type="submit" form="Createequity">
                            Save Equity Structure Item
                        </button>
                    </div>

                </div>
            </form>
        </div>

        <div class="mb-4 mt-5">
            <input type="text" class="hidden-feild" data-focus="questions_data">
            <label class="form-label tool-tip ">frequently asked questions</label>
            <div class="row">
                <div class="col-md-12 mb-4 add-check" data-block="questions-module">
                    <div class="information-box">
                        <div class="row">
                            <div class="col-sm-11 col-md-11">
                                <span class="text">Add frequently asked question</span>
                            </div>
                            <div class="col-sm-1 col-md-1">
                                <svg class="" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z">
                                    </path>
                                    <path
                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row" id="display-questions">

            </div>
        </div>
        <div class="mb-4 zero-top hidden" data-edit="questions-module">
            <label class="form-label tool-tip "><span data-main-title="questions-module"></span> frequently asked
                questions</label>

            <form id="Createquestions" data-form="questions-module" method="post">

                <input type="hidden" data-form-id="questions-module" name="questions_id" id="questions_id" value="">
                <div class="row ">
                    <div class="col-md-12 mb-4 ">
                        <div class="information-box">
                            <div class="row align-items-center">
                                <div class="col-sm-11 col-md-4">
                                    <span class="text ">FAQ Title:</span>
                                </div>
                                <div class="col-sm-1 col-md-8 form-group">
                                    <input class="form-control" name="questions_title" data-input="questions-module"
                                        type="text" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-4">
                        <textarea data-id="" class="form-control" name="questions_desc"
                            placeholder="frequently asked question..."></textarea>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="information-box">
                            <div class="row align-items-center">
                                <div class="col-sm-11 col-md-4">
                                    <span class="text ">FAQ Order:</span></span>
                                </div>
                                <div class="col-sm-1 col-md-8 form-group">
                                    <input class="form-control " type="text" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <button class="btn fixed-width mr-5 small-btn green-border" style="width:100%; height:100%;"
                            type="submit" form="Createquestions">
                            Save FAQ
                        </button>
                    </div>

                </div>
            </form>
        </div>


        <div class="mb-4 mt-5">
            <input type="text" class="hidden-feild" data-focus="discussion_data">
            <label class="form-label tool-tip ">Discussion Topics</label>
            <div class="row">
                <div class="col-md-12 mb-4 add-check" data-block="discussion-module">
                    <div class="information-box">
                        <div class="row">
                            <div class="col-sm-11 col-md-11">
                                <span class="text">Add Discussion Topic</span>
                            </div>
                            <div class="col-sm-1 col-md-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-plus-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                    <path
                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" id="display-discussion">

            </div>
        </div>
        <div class="mb-4 zero-top hidden" data-edit="discussion-module">
            <label class="form-label tool-tip "><span data-main-title="discussion-module"></span> Discussion
                Topics</label>

            <form id="Creatediscussion" data-form="discussion-module" method="post">

                <input type="hidden" data-form-id="discussion-module" name="discussion_id" id="discussion_id" value="">


                <div class="row ">
                    <div class="col-md-12 mb-4 ">
                        <div class="information-box">
                            <div class="row align-items-center">
                                <div class="col-sm-11 col-md-4">
                                    <span class="text ">Topic Title:</span>
                                </div>
                                <div class="col-sm-1 col-md-8 form-group">
                                    <input class="form-control" name="discussion_title" data-input="discussion-module"
                                        type="text" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-4">
                        <textarea data-id="" class="form-control" name="discussion_desc"
                            placeholder="frequently asked question..."></textarea>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="information-box">
                            <div class="row align-items-center">
                                <div class="col-sm-11 col-md-4">
                                    <span class="text ">Topic Order:</span></span>
                                </div>
                                <div class="col-sm-1 col-md-8 form-group">
                                    <input class="form-control " type="text" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <button class="btn fixed-width mr-5 small-btn green-border" style="width:100%; height:100%;"
                            type="submit" form="Creatediscussion">
                            Save Topic
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="mb-4 mt-5">
            <label class="form-label tool-tip ">Ready to Submit Campaign?</label>
            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="information-box">
                        <div class="row">
                            <div class="col-sm-11 col-md-11">
                                <span class="text">I accept that I will be unable to edit my campaign after I
                                    submit it for review.</span>
                            </div>
                            <div class="col-sm-1 col-md-1">
                                <input class="form-check-input" type="checkbox" value="" id="not-applicable">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mb-4">
                    <button class="btn fixed-width mr-5 small-btn green-border" form="mainform" type="submit"
                        style="width:100%; height:100%;">
                        Submit Your Campaign
                    </button>
                </div>
            </div>
        </div>
        <!-- </form> -->
    </div>
</div>
</div>
@endsection
@section('frontFooterSection')
<script type="text/javascript">
var BASE_URL = "{{ url('/') }}";
</script>
<script type="text/javascript" src="{{ asset('assets/frontend/js/pages/campaign.js') }}"></script>
@endsection
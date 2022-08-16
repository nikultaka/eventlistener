@extends('Frontend.layouts.Dashboard.index')
@section('frontTitle', 'Profile | Personal Information')

@section('frontPagination')
<ul class="pagination">
    <li><a href="#">Home</a></li>
    <!-- <li><a href="#">Settings</a></li> -->
    <li>Settings</li>
    <li id="pageName">Edit Profile</li>
</ul>
@endsection

@section('frontHeaderSection')
<style>
.card.active {
    border: 2.5px solid #1CA887;
    border-radius: 10px;
}

.card {
    border: 1.5px solid #DFDFDF;
    border-radius: 10px;
}

.kt-spinner {
    /* left: -14px; */
    position: relative;
}

.kt-spinner.kt-spinner--sucsses:before {
    border: 2px solid #1CA887;
    border-right: 2px solid transparent;
}

.media {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: start;
    -ms-flex-align: start;
    align-items: flex-start;
}

.img-group .user-avatar {
    position: relative;
    display: inline-block;
}

.img-group .user-avatar img {
    -webkit-box-shadow: 0 0 0 2px #fafbfb;
    box-shadow: 0 0 0 2px #fafbfb;
}

.img-group .user-avatar .online {
    background: #22b783;
}

.img-group .avatar-badge {
    position: absolute;
    right: 1px;
    width: 8px;
    height: 8px;
    border-radius: 8px;
    -webkit-box-shadow: 0 0 0 2px #fff;
    box-shadow: 0 0 0 2px #fff;
    z-index: 2;
}

.media-body {
    -webkit-box-flex: 1;
    -ms-flex: 1;
    flex: 1;
}

.thumb-md {
    height: 48px;
    width: 48px;
    font-size: 18px;
    font-weight: 700;
}

h6 {
    padding: 0 0 0 0;
}

.text-muted {
    padding: 0px;
    font-size: 13px;
    line-height: 19px;

}

.text-muted.bold {
    padding: 0px;
    font-size: 13px;
    line-height: 19px;
    color: #1C1C1C !important;
}

.activecomment {
    padding: 5px;
    background: #1ca887;
    border-radius: 20px;
}
</style>
@endsection



@section('frontMainContent')
<div class="row">
    <div class="col-lg-3 relative">
        <div class="under-review-cards">
            <div class="card black-border">
                <div class="card-body">
                    <h6 class="card-header-small-title">#1234567890</h6>
                    <h3 class="card-title">Overview Inc. Seed Round
                        <span>
                            <svg width="14" height="20" viewBox="0 0 14 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M7.00001 0.416687C4.70633 0.416687 2.83334 2.28968 2.83334 4.58335V7.70835H2.85125C1.31955 8.93118 0.333344 10.8101 0.333344 12.9167C0.333344 16.5912 3.32551 19.5834 7.00001 19.5834C10.6745 19.5834 13.6667 16.5912 13.6667 12.9167C13.6667 10.8101 12.6805 8.93118 11.1488 7.70835H11.1667V4.58335C11.1667 2.28968 9.29369 0.416687 7.00001 0.416687ZM7.00001 1.66669C8.618 1.66669 9.91668 2.96536 9.91668 4.58335V6.93199C9.03414 6.49985 8.04664 6.25002 7.00001 6.25002C5.95338 6.25002 4.96588 6.49985 4.08334 6.93199V4.58335C4.08334 2.96536 5.38202 1.66669 7.00001 1.66669ZM7.00001 7.50002C9.99896 7.50002 12.4167 9.91774 12.4167 12.9167C12.4167 15.9156 9.99896 18.3334 7.00001 18.3334C4.00106 18.3334 1.58334 15.9156 1.58334 12.9167C1.58334 9.91774 4.00106 7.50002 7.00001 7.50002ZM7.00001 10C6.52248 10.0014 6.05991 10.1668 5.68977 10.4685C5.31963 10.7703 5.06437 11.19 4.96675 11.6574C4.86912 12.1249 4.93504 12.6117 5.15348 13.0363C5.37192 13.461 5.72962 13.7977 6.16668 13.9901V15.4167C6.16668 15.8771 6.53959 16.25 7.00001 16.25C7.46043 16.25 7.83334 15.8771 7.83334 15.4167V13.9917C8.27138 13.7999 8.63009 13.4632 8.84927 13.0382C9.06844 12.6132 9.13472 12.1257 9.037 11.6576C8.93927 11.1895 8.68349 10.7693 8.31257 10.4674C7.94166 10.1656 7.47821 10.0006 7.00001 10Z"
                                    fill="#313131" />
                            </svg>
                        </span>
                    </h3>
                    <h3 class="card-subtitle weight-400 green-dot-before p-0 m-0 display-inline-full">Published</h3>
                </div>
            </div>

            <ul class="nav nav-tabs mt-3 no-border user-profile-tabs" role="tablist">
                <li class="nav-item" data-id="Submit Feedback">
                    <a class="nav-link" data-bs-toggle="tab" href="#submit-feedback">Create New Highlight
                        <span>
                            <svg width="16" height="14" viewBox="0 0 16 14" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9.03515 0.743469C8.91076 0.7435 8.78922 0.780639 8.68606 0.850136C8.5829 0.919633 8.50282 1.01833 8.45607 1.13359C8.40932 1.24885 8.39802 1.37544 8.42362 1.49717C8.44921 1.61889 8.51055 1.7302 8.59976 1.81687L13.3662 6.58331H1.12499C1.04217 6.58214 0.959944 6.59744 0.883089 6.62833C0.806233 6.65921 0.736283 6.70506 0.677302 6.76321C0.618321 6.82137 0.571486 6.89066 0.539518 6.96707C0.507551 7.04348 0.491089 7.12548 0.491089 7.20831C0.491089 7.29114 0.507551 7.37314 0.539518 7.44955C0.571486 7.52597 0.618321 7.59526 0.677302 7.65341C0.736283 7.71157 0.806233 7.75742 0.883089 7.7883C0.959944 7.81918 1.04217 7.83448 1.12499 7.83331H13.3662L8.59976 12.5998C8.53978 12.6573 8.49189 12.7263 8.4589 12.8027C8.42591 12.879 8.40849 12.9611 8.40764 13.0443C8.4068 13.1274 8.42255 13.2099 8.45398 13.2869C8.48541 13.3639 8.53189 13.4338 8.59069 13.4926C8.64948 13.5514 8.71942 13.5979 8.79641 13.6293C8.87339 13.6608 8.95588 13.6765 9.03903 13.6757C9.12218 13.6748 9.20432 13.6574 9.28065 13.6244C9.35698 13.5914 9.42596 13.5435 9.48355 13.4835L15.3169 7.65021C15.4341 7.53299 15.4999 7.37405 15.4999 7.20831C15.4999 7.04258 15.4341 6.88363 15.3169 6.76642L9.48355 0.933085C9.42529 0.873091 9.35559 0.825396 9.27857 0.792826C9.20155 0.760256 9.11877 0.743473 9.03515 0.743469Z"
                                    fill="#1C1C1C" />
                            </svg>
                        </span>
                    </a>
                </li>
            </ul>
        </div>

    </div>
    <div class="col-lg-9">
        <div class="center-main-content">
            <div class="tab-content">
                <div id="edit-profile" class="container tab-pane active"><br>

                    <h3>Campaign Status</h3>
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-4 form-group">
                                <label for="exampleInputEmail1" class="form-label small">Total Amount
                                    Raised:</label>
                                <input type="text" name="first_name" class="form-control" value="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-4 form-group">
                                <label for="exampleInputEmail1" class="form-label small">Campaign Amount
                                    Goal:</label>
                                <input type="text" name="last_name" class="form-control" value="">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-4 form-group">
                                <label for="exampleInputEmail1" class="form-label small">
                                </label>
                                <input type="text" name="last_name" class="form-control" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-4 form-group">
                                <label for="exampleInputEmail1" class="form-label small">Total Time Live:</label>
                                <input type="date" name="user_name" class="form-control" value="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-4 form-group">
                                <label for="exampleInputEmail1" class="form-label small">Total Investors: </label>
                                <input type="text" name="email" class="form-control" value="">
                            </div>
                        </div>
                    </div>
                    <div class="mb-4 zero-top hidden" data-edit="offer-module">
                        <label class="form-label tool-tip "><span data-main-title="offer-module"></span> Create Campaign
                            Update</label>
                        <form id="CreateOfferings" data-form="offer-module" method="post">
                            <input type="hidden" data-form-id="offer-module" name="offer_id" id="offer_id" value="">
                            <div class="row ">
                                <div class="col-md-6 mb-4 ">
                                    <div class="information-box">
                                        <div class="row align-items-center">
                                            <div class="col-sm-11 col-md-4">
                                                <span class="text">Update Subject:</span>
                                            </div>
                                            <div class="col-sm-1 col-md-8 form-group">
                                                <input data-for="offers_data" class="form-control"
                                                    form="CreateOfferings" type="text" name="offer_title"
                                                    data-input="offer-module" value="">
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
                                                <input data-for="offers_data" class="form-control"
                                                    form="CreateOfferings" name="offer_amount" type="date" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-4 form-group">
                                    <textarea data-for="offers_data" data-id="" class="form-control"
                                        form="CreateOfferings" name="offer_desc"
                                        placeholder="Update text here..."></textarea>
                                </div>

                                <div class="col-md-12 mb-4">
                                    <button class="btn fixed-width mr-5 small-btn green-border" type="submit"
                                        form="CreateOfferings" style="width:100%; height:100%;">
                                        Post Update
                                    </button>
                                </div>
                        </form>
                    </div>


                </div>
            </div>
            <div id="submit-feedback" class="container tab-pane fade"><br>
                <div class="mb-4 mt-5">
                    <label class="form-label tool-tip ">Previous Campaign Highlights</label>
                    <div class="row" id="display-highlight">
                        @if(!empty($topic))
                        @php
                        $i = 1
                        @endphp
                        @foreach($topic as $val)
                        <div class="col-md-12 mb-4 data-highlight" data-count="{{$val->id}}"
                            data-collect="{{$val->id}}">
                            <div class="information-box" data-content="{{$val->id}}">
                                <div class="row">
                                    <div class="col-sm-1 col-md-1">
                                        <span class="text">{{ Str::padLeft($i, 2,'0') }}</span>
                                    </div>
                                    <div class="col-sm-1 col-md-9">
                                        <span class="text">{{ Str::of($val->topic_title)->limit(20) }}</span>
                                    </div>
                                    <div class="col-sm-1 col-md-1 deletedata" data-deletecount="{{$val->id}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path
                                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                            <path fill-rule="evenodd"
                                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                        </svg>
                                    </div>
                                    <div class="col-sm-1 col-md-1 edit-highlight editdata"
                                        data-editcount="{{$val->id}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="48" height="48"
                                            viewBox="0 0 48 48" style=" fill:#000000; height:20px; ">
                                            <path
                                                d="M 36 5.0097656 C 34.205301 5.0097656 32.410791 5.6901377 31.050781 7.0507812 L 8.9160156 29.183594 C 8.4960384 29.603571 8.1884588 30.12585 8.0253906 30.699219 L 5.0585938 41.087891 A 1.50015 1.50015 0 0 0 6.9121094 42.941406 L 17.302734 39.974609 A 1.50015 1.50015 0 0 0 17.304688 39.972656 C 17.874212 39.808939 18.39521 39.50518 18.816406 39.083984 L 40.949219 16.949219 C 43.670344 14.228094 43.670344 9.7719064 40.949219 7.0507812 C 39.589209 5.6901377 37.794699 5.0097656 36 5.0097656 z M 36 7.9921875 C 37.020801 7.9921875 38.040182 8.3855186 38.826172 9.171875 A 1.50015 1.50015 0 0 0 38.828125 9.171875 C 40.403 10.74675 40.403 13.25325 38.828125 14.828125 L 36.888672 16.767578 L 31.232422 11.111328 L 33.171875 9.171875 C 33.957865 8.3855186 34.979199 7.9921875 36 7.9921875 z M 29.111328 13.232422 L 34.767578 18.888672 L 16.693359 36.962891 C 16.634729 37.021121 16.560472 37.065723 16.476562 37.089844 L 8.6835938 39.316406 L 10.910156 31.521484 A 1.50015 1.50015 0 0 0 10.910156 31.519531 C 10.933086 31.438901 10.975086 31.366709 11.037109 31.304688 L 29.111328 13.232422 z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php
                        $i++
                        @endphp
                        @endforeach
                        @endif
                    </div>
                </div>
                <div class="mb-4 zero-top hidden" data-edit="highlight-module">
                    <label class="form-label tool-tip "><span data-main-title="highlight">Create</span> Discussion
                        Topics</label>
                    <div class="row">
                        <div class="col-md-12 mb-4 add-check" id="addDiscussion">
                            <div class="information-box">
                                <div class="row">
                                    <div class="col-sm-11 col-md-11">
                                        <span class="text">Add Discussion Topic</span>
                                    </div>
                                    <div class="col-sm-1 col-md-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                            <path
                                                d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                            <path
                                                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form id="Createhighlight" data-form="highlight-module" method="post">
                        <input type="hidden" data-form-id="highlight-module" name="highlight_id" id="highlight_id"
                            value="">
                        <div class="row ">
                            <div class="col-md-6 mb-4 ">
                                <div class="information-box">
                                    <div class="row align-items-center">
                                        <div class="col-sm-11 col-md-4">
                                            <span class="text ">Highlight Title:</span>
                                        </div>
                                        <div class="col-sm-1 col-md-8 form-group">
                                            <input class="form-control" name="highlight_title"
                                                data-input="highlight-module" type="text" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4 ">
                                <div class="information-box">
                                    <div class="row align-items-center">
                                        <div class="col-sm-11 col-md-4">
                                            <span class="text ">Update Date:</span>
                                        </div>
                                        <div class="col-sm-1 col-md-8 form-group">
                                            <input class="form-control" name="highlight_date"
                                                data-input="highlight-module" type="date" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-4">
                                <textarea data-id="" class="form-control" name="highlight_desc"
                                    placeholder="Highlight description..."></textarea>
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
                                <button class="btn fixed-width mr-5 small-btn green-border"
                                    style="width:100%; height:100%;" type="submit" id="btnhighlight"
                                    form="Createhighlight">
                                    Save Topic
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@section('frontFooterSection')
<script type="text/javascript">
var BASE_URL = "{{ url('/') }}";
</script>
<script type="text/javascript" src="{{ asset('assets/frontend/js/pages/status.js') }}"></script>
@endsection
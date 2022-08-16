@extends('Frontend.layouts.Dashboard.index')
@section('frontTitle', 'Profile | Personal Information')

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
@section('frontPagination')
<ul class="pagination">
    <li><a href="#">Home</a></li>
    <!-- <li><a href="#">Settings</a></li> -->
    <li>Settings</li>
    <li>Edit Profile</li>
</ul>
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
    <div class="col-lg-3 relative">
        <div class="under-review-cards">
            <ul class="nav nav-tabs mt-3 no-border user-profile-tabs" role="tablist">
                <li class="nav-item" data-id="Edit Profile">
                    <a class="nav-link active bages" data-bs-toggle="tab" href="#edit-profile">Q&A Portal
                        <span>
                            <svg width="16" height="14" viewBox="0 0 16 14" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9.03515 0.743469C8.91076 0.7435 8.78922 0.780639 8.68606 0.850136C8.5829 0.919633 8.50282 1.01833 8.45607 1.13359C8.40932 1.24885 8.39802 1.37544 8.42362 1.49717C8.44921 1.61889 8.51055 1.7302 8.59976 1.81687L13.3662 6.58331H1.12499C1.04217 6.58214 0.959944 6.59744 0.883089 6.62833C0.806233 6.65921 0.736283 6.70506 0.677302 6.76321C0.618321 6.82137 0.571486 6.89066 0.539518 6.96707C0.507551 7.04348 0.491089 7.12548 0.491089 7.20831C0.491089 7.29114 0.507551 7.37314 0.539518 7.44955C0.571486 7.52597 0.618321 7.59526 0.677302 7.65341C0.736283 7.71157 0.806233 7.75742 0.883089 7.7883C0.959944 7.81918 1.04217 7.83448 1.12499 7.83331H13.3662L8.59976 12.5998C8.53978 12.6573 8.49189 12.7263 8.4589 12.8027C8.42591 12.879 8.40849 12.9611 8.40764 13.0443C8.4068 13.1274 8.42255 13.2099 8.45398 13.2869C8.48541 13.3639 8.53189 13.4338 8.59069 13.4926C8.64948 13.5514 8.71942 13.5979 8.79641 13.6293C8.87339 13.6608 8.95588 13.6765 9.03903 13.6757C9.12218 13.6748 9.20432 13.6574 9.28065 13.6244C9.35698 13.5914 9.42596 13.5435 9.48355 13.4835L15.3169 7.65021C15.4341 7.53299 15.4999 7.37405 15.4999 7.20831C15.4999 7.04258 15.4341 6.88363 15.3169 6.76642L9.48355 0.933085C9.42529 0.873091 9.35559 0.825396 9.27857 0.792826C9.20155 0.760256 9.11877 0.743473 9.03515 0.743469Z"
                                    fill="#1C1C1C" />
                            </svg>
                        </span>
                        <span class="badge bg-warning text-dark" style="position: relative;
    left: 0px;
    font-size: 11px;
    top: -3px;
    border-radius: 15px;">4</span>
                    </a>
                </li>
                <li class="nav-item" data-id="Edit Company">
                    <a class="nav-link" data-bs-toggle="tab" href="#edit-company">Community Discussion
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
                <li class="nav-item" data-id="Edit Payment">
                    <a class="nav-link" data-bs-toggle="tab" href="#edit-payment">Manage Discussion Topics
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

                    <h3>Communtiy Questions & Answers </h3>
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6 mb-4 ">
                            <div class="information-box">
                                <div class="row align-items-center">
                                    <div class="col-sm-11 col-md-4">
                                        <span class="text">New Questions:</span>
                                    </div>
                                    <div class="col-sm-1 col-md-8 form-group">
                                        <input data-for="offers_data" class="form-control" form="CreateOfferings"
                                            type="text" name="offer_title" data-input="offer-module" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="information-box">
                                <div class="row align-items-center">
                                    <div class="col-sm-11 col-md-4">
                                        <span class="text ">Posts To Review:</span></span>
                                    </div>
                                    <div class="col-sm-1 col-md-8 form-group">
                                        <input data-for="offers_data" class="form-control" form="CreateOfferings"
                                            name="offer_amount" type="text" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mb-4 ">
                            <hr>
                        </div>
                        <div class="col-md-12 mb-4 ">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3>Question</h3>
                                    <div class="row"
                                        style="overflow-y: scroll;margin-right: 0px;padding-right: 0px;max-height: 800px;">
                                        @if(!empty($data))
                                        @foreach($data as $val)
                                        <div class="col-lg-12">
                                            <div class="row d-flex flex-row-reverse bd-highlight" style="">
                                                <div class="col-lg-12 card team-card qustions mb-2"
                                                    data-question-id="{{ $val->id }}">
                                                    <div class="card-body">
                                                        <div class="media align-items-center">
                                                            <div class="img-group">
                                                                <a class="user-avatar me-1" href="#">
                                                                    @if($val->profile_pic != "" || $val->profile_pic !=
                                                                    null)
                                                                    <img src="{{ asset('assets/frontend/images/user-vector.png')}}"
                                                                        alt="user" class="rounded-circle thumb-md">
                                                                    @else
                                                                    <img src="{{ asset('assets/frontend/images/user-vector.png')}}"
                                                                        alt="user" class="rounded-circle thumb-md">
                                                                    @endif
                                                                    <span class="avatar-badge online"></span>
                                                                </a>
                                                            </div>
                                                            <div class="media-body ms-2 align-self-center">
                                                                <h6 class="m-0">{{ $val->name }}</h6>
                                                                <p class="text-muted mb-0">
                                                                    {{ Helper::time_elapsed_string($val->created_at)}}
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="mt-2 d-flex justify-content-between">
                                                            <p class="text-muted bold mb-0"
                                                                data-question="{{ $val->id }}">
                                                                {{ $val->questions }}</p>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div data-answer="{{$val->id}}-answer"></div>
                                            </div>
                                        </div>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h3>Answer</h3>
                                    <div class="row">
                                        <form id="question-form" method="post">
                                            <div class="col-lg-12 card team-card mb-2">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-12 col-md-12 media align-items-center">
                                                            <div class="img-group">
                                                                <a class="user-avatar me-1" href="#">
                                                                    <img src="{{ asset('assets/frontend/images/user-vector.png')}}"
                                                                        alt="user" class="rounded-circle thumb-md">
                                                                    <span class="avatar-badge online"></span>
                                                                </a>
                                                            </div>
                                                            <div class="media-body ms-2 align-self-center">
                                                                <h6 class="m-0">@username</h6>
                                                                <p class="text-muted mb-0"></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-12 information-box mt-3">
                                                            <div class="row align-items-center">
                                                                <div class="col-sm-11 col-md-12">
                                                                    <label class="form-label tool-tip">Question
                                                                        :</label>
                                                                    <span class="text-muted" id="main-question"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" name="question_id" id="question_id">
                                                        <div class="col-md-12 mt-4 mb-4 form-group">
                                                            <textarea data-for="offers_data" data-id=""
                                                                class="form-control" form="question-form" name="answer"
                                                                placeholder="Answer here..."></textarea>
                                                        </div>
                                                        <div class="col-12 col-md-12">
                                                            <button
                                                                class="btn fixed-width green-btn mr-5 small-btn custom-btn"
                                                                form="question-form" style="" id="feedback_save_btn">
                                                                <span class="mr-3">
                                                                    <svg width="16" height="16" viewBox="0 0 16 16"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M9.44939 0.916565C9.28519 0.918934 9.12852 0.985824 9.01324 1.10278C8.89797 1.21973 8.83334 1.37735 8.83334 1.54157V4.78538C7.72596 4.9089 5.90539 5.22627 4.0726 6.41298C1.99167 7.76037 0.141751 10.2375 0.0988057 14.3272C0.0981807 14.3303 0.0961714 14.3322 0.0955505 14.3353H0.0971781C0.096733 14.3803 0.0833435 14.4129 0.0833435 14.4582C0.0835081 14.6132 0.141236 14.7626 0.245325 14.8774C0.349413 14.9922 0.492441 15.0643 0.646655 15.0796C0.800869 15.0949 0.955271 15.0524 1.0799 14.9603C1.20453 14.8681 1.29051 14.733 1.32114 14.5811C1.81586 12.1077 3.358 11.0116 5.06707 10.4494C6.50955 9.975 7.92185 9.97484 8.83334 10.023V13.2082C8.83339 13.3318 8.87008 13.4526 8.93876 13.5554C9.00744 13.6581 9.10504 13.7382 9.21922 13.7855C9.3334 13.8328 9.45903 13.8451 9.58025 13.8211C9.70147 13.797 9.81282 13.7375 9.90024 13.6501L15.7336 7.81679C15.8507 7.69958 15.9166 7.54063 15.9166 7.3749C15.9166 7.20917 15.8507 7.05022 15.7336 6.933L9.90024 1.09967C9.84115 1.04056 9.7708 0.993895 9.69337 0.962444C9.61593 0.930993 9.53297 0.915393 9.44939 0.916565ZM10.0833 3.05035L14.4079 7.3749L10.0833 11.6994V9.41022C10.0834 9.25455 10.0254 9.10446 9.92063 8.98932C9.81587 8.87418 9.67192 8.80227 9.51694 8.78766C8.64862 8.70636 6.66237 8.60892 4.67644 9.26211C3.74864 9.56727 2.82727 10.0809 2.03647 10.8148C2.66941 9.26726 3.64407 8.18025 4.75213 7.46279C6.57461 6.28274 8.66886 5.99594 9.50392 5.93447C9.66137 5.92294 9.80863 5.85226 9.91611 5.73663C10.0236 5.62099 10.0833 5.46897 10.0833 5.3111V3.05035Z"
                                                                            fill="#1C1C1C"></path>
                                                                    </svg>
                                                                </span>Send Answer
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end card-body-->
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div id="edit-company" class="container tab-pane fade"><br>

                    <h3>Engage With Community</h3>
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6 mb-4 ">
                            <div class="information-box">
                                <div class="row align-items-center">
                                    <div class="col-sm-11 col-md-4">
                                        <span class="text">Community Topic:</span>
                                    </div>
                                    <div class="col-sm-1 col-md-8 form-group">
                                        <input data-for="offers_data" class="form-control" form="CreateOfferings"
                                            type="text" name="offer_title" data-input="offer-module" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="information-box create-post">
                                <div class="row">
                                    <div class="col-sm-11 col-md-11">
                                        <span class="text">Create New Post</span>
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
                        <div class="col-md-12 mb-4 ">
                            <hr>
                        </div>
                        <div class="col-md-12 mb-4 ">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row overflow-auto"
                                        style="overflow-y: scroll; max-height: 800px; margin-right: 0px;  padding-right: 0px;">
                                        <div id="postdata"></div>
                                        @if(!empty($discussion))
                                        @foreach($discussion as $val)
                                        <div class="col-lg-12">
                                            <div class="row d-flex flex-row-reverse bd-highlight" style="">
                                                <div class="col-lg-12 card team-card main-comments mb-2"
                                                    data-comment-id="{{$val->id}}">
                                                    <div class="card-body">
                                                        <div class="media align-items-center">
                                                            <div class="img-group">
                                                                <a class="user-avatar me-1" href="#">
                                                                    @if($val->profile_pic != "" || $val->profile_pic
                                                                    !=
                                                                    null)
                                                                    <img src="{{ asset('assets/frontend/images/user-vector.png')}}"
                                                                        alt="user" class="rounded-circle thumb-md">
                                                                    @else
                                                                    <img src="{{ asset('assets/frontend/images/user-vector.png')}}"
                                                                        alt="user" class="rounded-circle thumb-md">
                                                                    @endif
                                                                    <span class="avatar-badge online"></span>
                                                                </a>
                                                            </div>
                                                            <div class="media-body ms-2 align-self-center">
                                                                <h6 class="m-0">{{ $val->name }}</h6>
                                                                <p class="text-muted mb-0">
                                                                    {{ Helper::time_elapsed_string($val->created_at)}}
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="mt-2 d-flex justify-content-between mb-2">
                                                            <p class="text-muted bold mb-0">{{ $val->post_desc }}
                                                            </p>
                                                        </div>
                                                        <div class="d-flex flex-row-reverse bd-highlight">
                                                            <div class="align-self-center post {{ $val->id}}-active div-comment"
                                                                data-id="{{$val->id}}" data-main-post="{{ $val->id}}">
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
                                                <div class="" data-comment="{{$val->id}}-comments"></div>
                                            </div>
                                        </div>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h3 class="post-title">Create New Post</h3>
                                    <div class="row">
                                        <form id="post-form" method="post">
                                            <div class="col-lg-12 card team-card mb-2">
                                                <div class="card-body">
                                                    <div class="media align-items-center">
                                                        <div class="img-group">
                                                            <a class="user-avatar me-1" href="#">
                                                                <img src="{{ asset('assets/frontend/images/user-vector.png')}}"
                                                                    alt="user" class="rounded-circle thumb-md">
                                                                <span class="avatar-badge online"></span>
                                                            </a>
                                                        </div>
                                                        <div class="media-body ms-2 align-self-center">
                                                            <h6 class="m-0">@username</h6>
                                                            <p class="text-muted mb-0">1 minute ago</p>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="comment_id" id="comment_id">
                                                    <div class="col-md-12 mt-4 mb-4 form-group">
                                                        <textarea data-for="offers_data" data-id="" class="form-control"
                                                            name="desc" placeholder=""></textarea>
                                                    </div>
                                                    <div class="col-12">
                                                        <button type="submit"
                                                            class="btn fixed-width green-btn mr-5 small-btn custom-btn"
                                                            form="post-form" style="" id="feedback_save_btns">
                                                            <span class="mr-3">
                                                                <svg width="16" height="16" viewBox="0 0 16 16"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M9.44939 0.916565C9.28519 0.918934 9.12852 0.985824 9.01324 1.10278C8.89797 1.21973 8.83334 1.37735 8.83334 1.54157V4.78538C7.72596 4.9089 5.90539 5.22627 4.0726 6.41298C1.99167 7.76037 0.141751 10.2375 0.0988057 14.3272C0.0981807 14.3303 0.0961714 14.3322 0.0955505 14.3353H0.0971781C0.096733 14.3803 0.0833435 14.4129 0.0833435 14.4582C0.0835081 14.6132 0.141236 14.7626 0.245325 14.8774C0.349413 14.9922 0.492441 15.0643 0.646655 15.0796C0.800869 15.0949 0.955271 15.0524 1.0799 14.9603C1.20453 14.8681 1.29051 14.733 1.32114 14.5811C1.81586 12.1077 3.358 11.0116 5.06707 10.4494C6.50955 9.975 7.92185 9.97484 8.83334 10.023V13.2082C8.83339 13.3318 8.87008 13.4526 8.93876 13.5554C9.00744 13.6581 9.10504 13.7382 9.21922 13.7855C9.3334 13.8328 9.45903 13.8451 9.58025 13.8211C9.70147 13.797 9.81282 13.7375 9.90024 13.6501L15.7336 7.81679C15.8507 7.69958 15.9166 7.54063 15.9166 7.3749C15.9166 7.20917 15.8507 7.05022 15.7336 6.933L9.90024 1.09967C9.84115 1.04056 9.7708 0.993895 9.69337 0.962444C9.61593 0.930993 9.53297 0.915393 9.44939 0.916565ZM10.0833 3.05035L14.4079 7.3749L10.0833 11.6994V9.41022C10.0834 9.25455 10.0254 9.10446 9.92063 8.98932C9.81587 8.87418 9.67192 8.80227 9.51694 8.78766C8.64862 8.70636 6.66237 8.60892 4.67644 9.26211C3.74864 9.56727 2.82727 10.0809 2.03647 10.8148C2.66941 9.26726 3.64407 8.18025 4.75213 7.46279C6.57461 6.28274 8.66886 5.99594 9.50392 5.93447C9.66137 5.92294 9.80863 5.85226 9.91611 5.73663C10.0236 5.62099 10.0833 5.46897 10.0833 5.3111V3.05035Z"
                                                                        fill="#1C1C1C"></path>
                                                                </svg>
                                                            </span><span class="post-btn">Create Post</span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <!--end card-body-->
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="edit-payment" class="container tab-pane fade"><br>
                    <div class="mb-4 mt-5">
                        <label class="form-label tool-tip ">Discussion Topics</label>
                        <div class="row" id="display-discussion">
                            @if(!empty($topic))
                            @php
                            $i = 1
                            @endphp
                            @foreach($topic as $val)
                            <div class="col-md-12 mb-4 data-discussion" data-count="{{$val->id}}"
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
                                        <div class="col-sm-1 col-md-1 edit-discussion editdata"
                                            data-editcount="{{$val->id}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="48"
                                                height="48" viewBox="0 0 48 48" style=" fill:#000000; height:20px; ">
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
                    <div class="mb-4 zero-top hidden" data-edit="discussion-module">
                        <label class="form-label tool-tip "><span data-main-title="discussion">Create</span> Discussion
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
                        <form id="Creatediscussion" data-form="discussion-module" method="post">
                            <input type="hidden" data-form-id="discussion-module" name="discussion_id"
                                id="discussion_id" value="">
                            <div class="row ">
                                <div class="col-md-12 mb-4 ">
                                    <div class="information-box">
                                        <div class="row align-items-center">
                                            <div class="col-sm-11 col-md-4">
                                                <span class="text ">Topic Title:</span>
                                            </div>
                                            <div class="col-sm-1 col-md-8 form-group">
                                                <input class="form-control" name="discussion_title"
                                                    data-input="discussion-module" type="text" value="">
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
                                    <button class="btn fixed-width mr-5 small-btn green-border"
                                        style="width:100%; height:100%;" type="submit" id="btndiscussion"
                                        form="Creatediscussion">
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
<script type="text/javascript" src="{{ asset('assets/frontend/js/pages/community.js') }}"></script>
@endsection
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
                <li class="nav-item" data-id="Edit Profile">
                    <a class="nav-link active" data-bs-toggle="tab" href="#edit-profile">Edit Profile
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
                <li class="nav-item" data-id="Edit Company">
                    <a class="nav-link" data-bs-toggle="tab" href="#edit-company">Edit Company
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
                    <a class="nav-link" data-bs-toggle="tab" href="#edit-payment">Edit Payment
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
                <li class="nav-item" data-id="Submit Feedback">
                    <a class="nav-link" data-bs-toggle="tab" href="#submit-feedback">Submit Feedback
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

        <div class="create-campaign-bottom">
            <div class="row">
                <div class="col-xl-6 mb-2">
                    <button class="btn full-width">
                        <span>
                            <svg width="17" height="16" viewBox="0 0 17 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9.00002 0.0491943C6.15367 0.0491943 3.60521 1.34679 1.91669 3.38171V1.12504C1.91789 1.04139 1.90229 0.958346 1.8708 0.880836C1.83931 0.803326 1.79259 0.732925 1.73339 0.673806C1.6742 0.614686 1.60374 0.568052 1.52619 0.536666C1.44864 0.50528 1.36558 0.489782 1.28192 0.491089C1.11631 0.493676 0.958487 0.561895 0.84313 0.680761C0.727774 0.799626 0.664315 0.959419 0.66669 1.12504V4.87504C0.666707 5.0408 0.73256 5.19976 0.849767 5.31696C0.966974 5.43417 1.12594 5.50002 1.29169 5.50004H1.64163H5.04169C5.12451 5.50121 5.20674 5.48591 5.28359 5.45503C5.36045 5.42414 5.4304 5.37829 5.48938 5.32014C5.54836 5.26199 5.5952 5.19269 5.62716 5.11628C5.65913 5.03987 5.67559 4.95787 5.67559 4.87504C5.67559 4.79221 5.65913 4.71021 5.62716 4.6338C5.5952 4.55739 5.54836 4.48809 5.48938 4.42994C5.4304 4.37179 5.36045 4.32594 5.28359 4.29505C5.20674 4.26417 5.12451 4.24887 5.04169 4.25004H2.81757C4.27455 2.45006 6.49925 1.29919 9.00002 1.29919C11.7412 1.29919 14.1506 2.68145 15.5812 4.78634C15.6274 4.85425 15.6864 4.91242 15.755 4.95752C15.8236 5.00262 15.9004 5.03376 15.981 5.04918C16.0617 5.0646 16.1445 5.06398 16.2249 5.04737C16.3053 5.03075 16.3817 4.99847 16.4496 4.95235C16.5175 4.90624 16.5757 4.8472 16.6208 4.7786C16.6659 4.71001 16.697 4.6332 16.7124 4.55257C16.7278 4.47194 16.7272 4.38906 16.7106 4.30867C16.694 4.22827 16.6617 4.15194 16.6156 4.08402C14.9604 1.64891 12.1622 0.0491943 9.00002 0.0491943ZM9.00002 3.93673C8.0885 3.93673 7.32587 4.30099 6.83368 4.8547C6.3415 5.4084 6.1094 6.12282 6.1094 6.82817C6.1094 7.53351 6.3415 8.24712 6.83368 8.80082C7.32587 9.35453 8.0885 9.71879 9.00002 9.71879C10.5892 9.71879 11.8906 8.41733 11.8906 6.82817C11.8906 5.23901 10.5892 3.93673 9.00002 3.93673ZM9.00002 5.18673C9.91363 5.18673 10.6406 5.91456 10.6406 6.82817C10.6406 7.74178 9.91363 8.46879 9.00002 8.46879C8.401 8.46879 8.03102 8.26672 7.76793 7.97074C7.50483 7.67476 7.3594 7.25574 7.3594 6.82817C7.3594 6.4006 7.50483 5.98157 7.76793 5.68559C8.03102 5.38961 8.401 5.18673 9.00002 5.18673ZM5.84003 10.5C5.08474 10.5 4.39065 11.073 4.39065 11.8583V13.1425C4.39065 14.004 4.98992 14.7173 5.81073 15.1827C6.63155 15.648 7.72453 15.9175 8.99921 15.9175C10.2739 15.9175 11.3676 15.648 12.1885 15.1827C13.0094 14.7174 13.6094 14.0041 13.6094 13.1425V12.4833V11.8583C13.6094 11.0739 12.916 10.5 12.16 10.5H5.84003ZM5.84003 11.75H12.16C12.3157 11.75 12.3594 11.8335 12.3594 11.8583V13.1425C12.3594 13.4058 12.1516 13.7672 11.5725 14.0954C10.9934 14.4237 10.0937 14.6675 8.99921 14.6675C7.90472 14.6675 7.00657 14.4236 6.4276 14.0954C5.84862 13.7672 5.64065 13.4059 5.64065 13.1425V11.8583C5.64065 11.8335 5.68532 11.75 5.84003 11.75Z"
                                    fill="#1C1C1C" />
                            </svg>
                        </span>Switch Profile
                    </button>
                </div>
                <div class="col-xl-6 mb-2">
                    <a href="{{ route('logout-user') }}" class="btn full-width">
                        <span>
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M2.79167 0.5C1.53343 0.5 0.5 1.53343 0.5 2.79167V13.2083C0.5 14.4666 1.53343 15.5 2.79167 15.5H10.2917C11.5499 15.5 12.5833 14.4666 12.5833 13.2083C12.5845 13.1255 12.5692 13.0433 12.5383 12.9664C12.5074 12.8896 12.4616 12.8196 12.4034 12.7606C12.3453 12.7017 12.276 12.6548 12.1996 12.6229C12.1232 12.5909 12.0412 12.5744 11.9583 12.5744C11.8755 12.5744 11.7935 12.5909 11.7171 12.6229C11.6407 12.6548 11.5714 12.7017 11.5132 12.7606C11.4551 12.8196 11.4092 12.8896 11.3783 12.9664C11.3475 13.0433 11.3322 13.1255 11.3333 13.2083C11.3333 13.7909 10.8743 14.25 10.2917 14.25H2.79167C2.20907 14.25 1.75 13.7909 1.75 13.2083V2.79167C1.75 2.20907 2.20907 1.75 2.79167 1.75H10.2917C10.8743 1.75 11.3333 2.20907 11.3333 2.79167C11.3322 2.87449 11.3475 2.95671 11.3783 3.03357C11.4092 3.11042 11.4551 3.18037 11.5132 3.23936C11.5714 3.29834 11.6407 3.34517 11.7171 3.37714C11.7935 3.40911 11.8755 3.42557 11.9583 3.42557C12.0412 3.42557 12.1232 3.40911 12.1996 3.37714C12.276 3.34517 12.3453 3.29834 12.4034 3.23936C12.4616 3.18037 12.5074 3.11042 12.5383 3.03357C12.5692 2.95671 12.5845 2.87449 12.5833 2.79167C12.5833 1.53343 11.5499 0.5 10.2917 0.5H2.79167ZM11.9518 4.45182C11.8274 4.45185 11.7059 4.48899 11.6027 4.55849C11.4996 4.62799 11.4195 4.72668 11.3727 4.84194C11.326 4.95721 11.3147 5.0838 11.3403 5.20552C11.3659 5.32724 11.4272 5.43856 11.5164 5.52523L13.3662 7.375H4.45833C4.37551 7.37383 4.29329 7.38913 4.21643 7.42001C4.13958 7.4509 4.06963 7.49675 4.01064 7.5549C3.95166 7.61305 3.90483 7.68235 3.87286 7.75876C3.84089 7.83517 3.82443 7.91717 3.82443 8C3.82443 8.08283 3.84089 8.16483 3.87286 8.24124C3.90483 8.31765 3.95166 8.38695 4.01064 8.4451C4.06963 8.50325 4.13958 8.5491 4.21643 8.57999C4.29329 8.61087 4.37551 8.62617 4.45833 8.625H13.3662L11.5164 10.4748C11.4565 10.5324 11.4086 10.6013 11.3756 10.6777C11.3426 10.754 11.3252 10.8361 11.3243 10.9193C11.3235 11.0024 11.3392 11.0849 11.3707 11.1619C11.4021 11.2389 11.4486 11.3088 11.5074 11.3676C11.5662 11.4264 11.6361 11.4729 11.7131 11.5043C11.7901 11.5358 11.8726 11.5515 11.9557 11.5507C12.0389 11.5498 12.121 11.5324 12.1973 11.4994C12.2737 11.4664 12.3426 11.4185 12.4002 11.3586L15.3169 8.44189C15.4341 8.32468 15.4999 8.16573 15.4999 8C15.4999 7.83427 15.4341 7.67532 15.3169 7.55811L12.4002 4.64144C12.342 4.58144 12.2723 4.53375 12.1952 4.50118C12.1182 4.46861 12.0354 4.45183 11.9518 4.45182Z"
                                    fill="#313131" />
                            </svg>
                        </span>Sign Out
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-9">
        <div class="center-main-content">
            <div class="tab-content">
                <div id="edit-profile" class="container tab-pane active"><br>
                    <form class="kt-form kt-form--label-right" id="editProfile">
                        <h3>Personal Information</h3>
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4 form-group">
                                    <label for="exampleInputEmail1" class="form-label small">First Name</label>
                                    <input type="text" name="first_name" class="form-control"
                                        value="{{ $user->firstname}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4 form-group">
                                    <label for="exampleInputEmail1" class="form-label small">Last Name</label>
                                    <input type="text" name="last_name" class="form-control"
                                        value="{{ $user->lastname}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <div class="mb-4 form-group">
                                    <label for="exampleInputEmail1" class="form-label small">company Email</label>
                                    <input type="email" name="company_email" class="form-control"
                                        value="{{ $user->email}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4 form-group">
                                    <label for="exampleInputEmail1" class="form-label small">company Title</label>
                                    <input type="text" name="company_title" class="form-control" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4 form-group">
                                    <label for="exampleInputEmail1" class="form-label small">Phone Number</label>
                                    <input type="text" name="phone" class="form-control" value="{{ $user->phone}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4 form-group">
                                    <label for="exampleInputEmail1" class="form-label small">Date of Birth</label>
                                    <input type="date" name="date_of_birth" class="form-control"
                                        value="{{ $user->dob}}">
                                </div>
                            </div>
                        </div>
                        <h3>Account Information</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4 form-group">
                                    <label for="exampleInputEmail1" class="form-label small">Username</label>
                                    <input type="text" name="user_name" class="form-control"
                                        value="{{ $user->username}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4 form-group">
                                    <label for="exampleInputEmail1" class="form-label small">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ $user->email}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4 form-group">
                                    <label for="exampleInputEmail1" class="form-label small">Current Password</label>
                                    <input type="password" id="current_password" name="current_password"
                                        class="form-control" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4 form-group">
                                    <label for="exampleInputEmail1" class="form-label small">New Password</label>
                                    <input type="password" id="new_password" name="new_password" class="form-control"
                                        value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4 form-group">
                                    <label for="exampleInputEmail1" class="form-label small">Confirm Password</label>
                                    <input type="password" id="confirm_password" name="confirm_passwords"
                                        class="form-control" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4 form-group">
                                    <label for="exampleInputEmail1" class="form-label small">Phone Number</label>
                                    <input type="text" id="authphone" name="authphone" class="form-control" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4 form-group">
                                    <label for="exampleInputEmail1" class="form-label small">Two-Factor
                                        Authentication</label>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input form-control" name="authswitch" type="checkbox"
                                            role="switch" id="flexSwitchCheckDefault" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" id="edit_save_btn"
                                    class="btn fixed-width green-btn mr-5 small-btn custom-btn">
                                    Save Profile
                                </button>
                            </div>
                    </form>
                </div>
            </div>
            <div id="edit-company" class="container tab-pane fade"><br>
                <h3>Edit Company</h3>
                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat.</p>
            </div>
            <div id="edit-payment" class="container tab-pane fade"><br>
                <h3>Edit Payment</h3>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                    totam rem aperiam.</p>
            </div>
            <div id="submit-feedback" class="container tab-pane fade"><br>
                <form id="submitFeedback">
                    </from>
                    <h3 style="padding-bottom: 0; margin-bottom: 0;">Submit Feedback</h3>
                    <p>We always improving and growing our platfrom. Let us know your thoughts or feedback below! </p>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="mb-4">
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle dropdown-label-btn" type="button"
                                        id="subject-matter" data-bs-toggle="dropdown" aria-expanded="false">
                                        Subject Matter
                                    </button>
                                    <input type="hidden" id="feedbackItems" name="feedsubjects" form="submitFeedback"
                                        value="">
                                    <ul class="dropdown-menu subject-matter-dropdown dropdown-open-click checkbox-dropdown"
                                        aria-labelledby="subject-matter">
                                        @if(!empty($feedbackSubject))
                                        @foreach($feedbackSubject as $val)
                                        <li>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input feedback-item" type="checkbox"
                                                    value="{{$val->id}}" id="flexCheckDefault{{$val->id}}">
                                                <label class="form-check-label" for="flexCheckDefault{{$val->id}}">
                                                    {{$val->feedback_subject_name}}
                                                </label>
                                            </div>
                                        </li>
                                        @endforeach
                                        @endif
                                    </ul>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-4">
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle dropdown-label-btn " type="button"
                                        id="dashboard-location" data-bs-toggle="dropdown" aria-expanded="false">
                                        Dashboard Location
                                    </button>

                                    <ul class="dropdown-menu subject-matter-dropdown dropdown-open-click checkbox-dropdown"
                                        aria-labelledby="dashboard-location">
                                        <li>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="flexCheckDefault4">
                                                <label class="form-check-label" for="flexCheckDefault4">
                                                    Campaign Terms
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="flexCheckDefault5">
                                                <label class="form-check-label" for="flexCheckDefault5">
                                                    Campaign Terms
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="flexCheckDefault6">
                                                <label class="form-check-label" for="flexCheckDefault6">
                                                    Campaign Terms
                                                </label>
                                            </div>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="mb-4 mt-4">
                                <textarea class="form-control" form="submitFeedback" name="feedback"
                                    placeholder="ExampleBiz LLC is all about..." spellcheck="false"></textarea>
                                <grammarly-extension data-grammarly-shadow-root="true"
                                    style="position: absolute; top: 0px; left: 0px; pointer-events: none; z-index: auto;"
                                    class="cGcvT"></grammarly-extension>
                                <grammarly-extension data-grammarly-shadow-root="true"
                                    style="mix-blend-mode: darken; position: absolute; top: 0px; left: 0px; pointer-events: none; z-index: auto;"
                                    class="cGcvT"></grammarly-extension>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-check mb-3 border-checkbox-outer">
                                <input class="form-check-input" name="agree" form="submitFeedback" type="checkbox"
                                    value="1" id="i-agree">
                                <label class="form-check-label" for="i-agree">
                                    I agree that a Pyrium team member can contact me directly about this topic or
                                    suggestion.
                                </label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn fixed-width green-btn mr-5 small-btn custom-btn" form="submitFeedback"
                                style="padding: 10px 20px; font-weight: 700;" id="feedback_save_btn">
                                <span class="mr-3">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.44939 0.916565C9.28519 0.918934 9.12852 0.985824 9.01324 1.10278C8.89797 1.21973 8.83334 1.37735 8.83334 1.54157V4.78538C7.72596 4.9089 5.90539 5.22627 4.0726 6.41298C1.99167 7.76037 0.141751 10.2375 0.0988057 14.3272C0.0981807 14.3303 0.0961714 14.3322 0.0955505 14.3353H0.0971781C0.096733 14.3803 0.0833435 14.4129 0.0833435 14.4582C0.0835081 14.6132 0.141236 14.7626 0.245325 14.8774C0.349413 14.9922 0.492441 15.0643 0.646655 15.0796C0.800869 15.0949 0.955271 15.0524 1.0799 14.9603C1.20453 14.8681 1.29051 14.733 1.32114 14.5811C1.81586 12.1077 3.358 11.0116 5.06707 10.4494C6.50955 9.975 7.92185 9.97484 8.83334 10.023V13.2082C8.83339 13.3318 8.87008 13.4526 8.93876 13.5554C9.00744 13.6581 9.10504 13.7382 9.21922 13.7855C9.3334 13.8328 9.45903 13.8451 9.58025 13.8211C9.70147 13.797 9.81282 13.7375 9.90024 13.6501L15.7336 7.81679C15.8507 7.69958 15.9166 7.54063 15.9166 7.3749C15.9166 7.20917 15.8507 7.05022 15.7336 6.933L9.90024 1.09967C9.84115 1.04056 9.7708 0.993895 9.69337 0.962444C9.61593 0.930993 9.53297 0.915393 9.44939 0.916565ZM10.0833 3.05035L14.4079 7.3749L10.0833 11.6994V9.41022C10.0834 9.25455 10.0254 9.10446 9.92063 8.98932C9.81587 8.87418 9.67192 8.80227 9.51694 8.78766C8.64862 8.70636 6.66237 8.60892 4.67644 9.26211C3.74864 9.56727 2.82727 10.0809 2.03647 10.8148C2.66941 9.26726 3.64407 8.18025 4.75213 7.46279C6.57461 6.28274 8.66886 5.99594 9.50392 5.93447C9.66137 5.92294 9.80863 5.85226 9.91611 5.73663C10.0236 5.62099 10.0833 5.46897 10.0833 5.3111V3.05035Z"
                                            fill="#1C1C1C" />
                                    </svg>
                                </span>Submit Suggestion
                            </button>
                        </div>
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
<script type="text/javascript" src="{{ asset('assets/frontend/js/pages/profile.js') }}"></script>
@endsection
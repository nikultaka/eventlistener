@extends('Admin.layouts.Dashboard.index')
@section('adminTitle', 'Admin | Manage Story')
@section('breadcrumbFirst', 'Manage Story')
@section('breadcrumbSecond', 'Story')
{{-- @section('pageTitle', 'User List') --}}
@section('adminMainContent')

<style>
    .swal2-backdrop-show{
        z-index: 9999999999999999999999999999999999999999 !important;
    }
</style>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">

            <div class="panel-heading">
                <div class="panel-title">Story List</div>
                <div class="panel-options">
                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                    <a href="#" data-rel="close" class="bg"><i class="entypo-cancel"></i></a>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div style="float: right">
                            <button type="button" id="storyModelBtn" class="btn btn-blue float-right"><i class="entypo-user-add"></i> Add Story</button>
                        </div>
                        <br />
                        <br />
                        <br />

                        <div class="table-responsive">
                            <table class="table table-sm" id="storyTable">
                                <thead>
                                    <tr>
                                        <th>User Name</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th style="min-width: 200px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('Admin.story.modal')
@include('Admin.snaps.index')
@endsection


@section('adminFooterSection')
<script type="text/javascript" src="{{ asset('assets/admin/js/story.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/admin/js/snaps.js') }}"></script>

@endsection









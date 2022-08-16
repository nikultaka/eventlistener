@extends('Admin.layouts.Dashboard.index')
@section('adminTitle', 'Admin | Manage Messages')
@section('breadcrumbFirst', 'Manage Messages')
@section('breadcrumbSecond', 'Messages')
{{-- @section('pageTitle', 'User List') --}}
@section('adminMainContent')

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">

            <div class="panel-heading">
                <div class="panel-title">Messages List</div>
                <div class="panel-options">
                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                    <a href="#" data-rel="close" class="bg"><i class="entypo-cancel"></i></a>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
						<div style="float: right">
                            <button type="button" id="messagesModelBtn" class="btn btn-blue float-right"><i class="entypo-user-add"></i> Add Messages</button>
                        </div>
						<br />
						<br />
						<br />

						<div class="table-responsive">
							<table class="table table-sm" id="messagesTable">
								<thead>
                                    <tr>
                                        <th>Id</th>
                                        <!-- <th>Parent Id</th> -->
                                        <th>User Id</th>
                                        <th>Community Category Id</th>
                                        <th>Message type</th>
                                        <th>Message Text</th>
                                        <th>Is Read</th>
                                        <th>Is Verified</th>
                                        <th>Is Follow</th>
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
@include('Admin.messages.modal')
@endsection


@section('adminFooterSection')
    <script type="text/javascript" src="{{ asset('assets/admin/js/messages.js') }}"></script>
@endsection
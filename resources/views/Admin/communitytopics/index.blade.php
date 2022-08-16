@extends('Admin.layouts.Dashboard.index')
@section('adminTitle', 'Admin | Manage Community Topics')
@section('breadcrumbFirst', 'Manage Community Topics')
@section('breadcrumbSecond', 'Community Topics')
{{-- @section('pageTitle', 'User List') --}}
@section('adminMainContent')

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">

            <div class="panel-heading">
                <div class="panel-title">Community Topics List</div>
                <div class="panel-options">
                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                    <a href="#" data-rel="close" class="bg"><i class="entypo-cancel"></i></a>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
						<div style="float: right">
                            <button type="button" id="communitytopicsModelBtn" class="btn btn-blue float-right"><i class="entypo-user-add"></i> Add Community Topic</button>
                        </div>
						<br />
						<br />
						<br />

						<div class="table-responsive">
							<table class="table table-sm" id="communitytopicsTable">
								<thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Host</th>
                                        <th>Text color</th>
                                        <th>Background Color</th>
                                        <th>Is Verify</th>
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
@include('Admin.communitytopics.modal')
@endsection


@section('adminFooterSection')
    <script type="text/javascript" src="{{ asset('assets/admin/js/communitytopics.js') }}"></script>
@endsection
@extends('Admin.layouts.Dashboard.index')
@section('adminTitle', 'Admin | Manage Company')
@section('breadcrumbFirst', 'Manage Company')
@section('breadcrumbSecond', 'Company')
{{-- @section('pageTitle', 'User List') --}}
@section('adminMainContent')

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">

            <div class="panel-heading">
                <div class="panel-title">Company List</div>
                <div class="panel-options">
                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                    <a href="#" data-rel="close" class="bg"><i class="entypo-cancel"></i></a>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
						<div style="float: right">
                            <button type="button" id="industriesModelBtn" class="btn btn-blue float-right"><i class="entypo-user-add"></i> Add Company</button>
                        </div>
						<br />
						<br />
						<br />

						<div class="table-responsive">
							<table class="table table-sm" id="industriesTable">
								<thead>
                                    <tr>
                                        <!-- <th>User Name</th>   -->
                                        <th>Name</th>                                        
                                        <!-- <th>Logo</th>
                                        <th>banner_image</th> -->
                                        <th>Progress Details</th>
                                        <th>Total Hours</th>
                                        <th>Is Featured</th>
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
@include('Admin.Industries.modal')
@endsection


@section('adminFooterSection')
    <script type="text/javascript" src="{{ asset('assets/admin/js/industries.js') }}"></script>
@endsection
@extends('Admin.layouts.Dashboard.index')
@section('adminTitle', 'Admin | Manage Feedwall')
@section('breadcrumbFirst', 'Manage Feedwall')
@section('breadcrumbSecond', 'Feedwall')
{{-- @section('pageTitle', 'User List') --}}
@section('adminMainContent')

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">

            <div class="panel-heading">
                <div class="panel-title">Feedwall List</div>
                <div class="panel-options">
                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                    <a href="#" data-rel="close" class="bg"><i class="entypo-cancel"></i></a>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
						<div style="float: right">
                            <!-- <button type="button" id="feedwallModelBtn" class="btn btn-blue float-right"><i class="entypo-user-add"></i> Add Feedwall</button> -->
                        </div>
						<br />
						<br />
						<br />

						<div class="table-responsive">
							<table class="table table-sm" id="feedwallTable">
								<thead>
                                    <tr>
                                        <!-- <th>Feedwall ID</th> -->
                                        <th>Name</th>
                                        <th>Category Name</th>
                                        <th>Image</th>
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
@include('Admin.feedwall.modal')
@endsection


@section('adminFooterSection')
    <script type="text/javascript" src="{{ asset('assets/admin/js/feedwall.js') }}"></script>
@endsection
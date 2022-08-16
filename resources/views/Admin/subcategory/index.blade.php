@extends('Admin.layouts.Dashboard.index')
@section('adminTitle', 'Admin | Manage SubCategory')
@section('breadcrumbFirst', 'Manage SubCategory')
@section('breadcrumbSecond', 'SubCategory')
{{-- @section('pageTitle', 'User List') --}}
@section('adminMainContent')

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">

            <div class="panel-heading">
                <div class="panel-title">SubCategory List</div>
                <div class="panel-options">
                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                    <a href="#" data-rel="close" class="bg"><i class="entypo-cancel"></i></a>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
						<div style="float: right">
                            <button type="button" id="subcategoryModelBtn" class="btn btn-blue float-right"><i class="entypo-user-add"></i> Add SubCategory</button>
                        </div>
						<br />
						<br />
						<br />

						<div class="table-responsive">
							<table class="table table-sm" id="subcategoryTable">
								<thead>
                                    <tr>
                                        <th>Category Name</th>
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
@include('Admin.subcategory.modal')
@endsection


@section('adminFooterSection')
    <script type="text/javascript" src="{{ asset('assets/admin/js/subcategory.js') }}"></script>
@endsection
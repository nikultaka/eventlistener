@extends('Admin.layouts.Dashboard.index')
@section('adminTitle', 'Admin | Manage Event')
@section('breadcrumbFirst', 'Manage Event')
@section('breadcrumbSecond', 'Event')
@section('adminMainContent')

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">

            <div class="panel-heading">
                <div class="panel-title">Event List</div>
                <div class="panel-options">
                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                    <a href="#" data-rel="close" class="bg"><i class="entypo-cancel"></i></a>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
						<!-- <div style="float: right">
                            <button type="button" id="discoverModelBtn" class="btn btn-blue float-right"><i class="entypo-user-add"></i> Add Event</button>
                        </div>
						<br />
						<br />
						<br /> -->

						<div class="table-responsive">
							<table class="table table-sm" id="discoverTable">
								<thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Timezone</th>
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
@include('Admin.event.modal')
@endsection


@section('adminFooterSection')
    <script type="text/javascript" src="{{ asset('assets/admin/js/event.js') }}"></script>
@endsection
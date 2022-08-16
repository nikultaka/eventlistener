@extends('Admin.layouts.Dashboard.index')
@section('adminTitle', 'Admin | Manage Discover')
@section('breadcrumbFirst', 'Manage Discover')
@section('breadcrumbSecond', 'Discover')
{{-- @section('pageTitle', 'User List') --}}
@section('adminMainContent')

<?php
$pushNotifications = new \Pusher\PushNotifications\PushNotifications(array(
  "instanceId" => "526a07fe-587f-4002-9db8-62dc54ffb6be",
  "secretKey" => "DD6AF1EC0570578CADC2CC05FE7B61C0FEE131B4CE567D128FCB70CF265E4B1E",
));
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://526a07fe-587f-4002-9db8-62dc54ffb6be.pushnotifications.pusher.com/publish_api/v1/instances/526a07fe-587f-4002-9db8-62dc54ffb6be/publishes');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"interests\":[\"hello\"],\"web\":{\"notification\":{\"title\":\"Hello\",\"body\":\"Hello, world!\"}}}");

$headers = array();
$headers[] = 'Content-Type: application/json';
$headers[] = 'Authorization: Bearer DD6AF1EC0570578CADC2CC05FE7B61C0FEE131B4CE567D128FCB70CF265E4B1E';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);

?>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">

            <div class="panel-heading">
                <div class="panel-title">Discover List</div>
                <div class="panel-options">
                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                    <a href="#" data-rel="close" class="bg"><i class="entypo-cancel"></i></a>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
						<div style="float: right">
                            <button type="button" id="discoverModelBtn" class="btn btn-blue float-right"><i class="entypo-user-add"></i> Add Discover</button>
                        </div>
						<br />
						<br />
						<br />

						<div class="table-responsive">
							<table class="table table-sm" id="discoverTable">
								<thead>
                                    <tr>
                                        <th>Name</th>
                                        <!-- <th>Description</th> -->
                                        <th>Category Name</th>
                                        <th>Type Of Card</th>
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
@include('Admin.discover.modal')
@endsection


@section('adminFooterSection')
    <script type="text/javascript" src="{{ asset('assets/admin/js/discover.js') }}"></script>
@endsection
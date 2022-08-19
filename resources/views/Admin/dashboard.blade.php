<?php
$adminHeaderTitle = 'Admin Dasboard';
if (isset(Auth::user()->name) && Auth::user()->name != '') {
    $adminHeaderTitle = 'Welcome back!';
}
?>
@extends('Admin.layouts.Dashboard.index')
@section('adminTitle', 'Admin | Dasboard')
@section('pageTitle', $adminHeaderTitle)
@section('breadcrumbFirst', 'Admin Dasboard')
@section('breadcrumbSecond', 'Dasboard')
@section('adminMainContent')

@endsection

<?php
?>

@extends('default.default')

@section('title', 'Dashboard')
@section('endhead_script')
 <!-- scripts -->
@endsection
@section('content')

    <h1 class="page-title"> Dashboard 
        <small></small>
    </h1>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="index.html">Dashboard</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>Ativo</span>
            </li>
        </ul>
    </div>
        @if(Session::has('message'))
            <div class='alert alert-success'>
                {{Session::get('message')}}
            </div>
        @endif
    <!-- END PAGE HEADER-->
    <!-- BEGIN DASHBOARD STATS 1-->
    <div class="row">

    </div>
    <div class="clearfix"></div>
@endsection

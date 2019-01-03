@extends('dashboard.layouts.layout')
@section('title')المستخدمين@endsection
@section('address')المستخدمين@endsection
@section('header')@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-users"></i>جدول المستخدمين</div>
                    <div class="tools"> </div>
                </div>
                @include('dashboard.users._table')
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
@endsection
@section('footer')@endsection



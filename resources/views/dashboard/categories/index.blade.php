@extends('dashboard.layouts.layout')
@section('title')التصنيفات@endsection
@section('address')التصنيفات@endsection
@section('header')@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-users"></i>جدول التصنيفات</div>
                    <div class="tools"> </div>
                </div>
                @include('dashboard.categories._table')
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
@endsection
@section('footer')@endsection



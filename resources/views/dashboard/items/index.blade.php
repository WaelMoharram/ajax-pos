@extends('dashboard.layouts.layout')
@section('title')الأصناف@endsection
@section('address')الأصناف@endsection
@section('container_class')
    container
@endsection
@section('header')@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-users"></i>جدول الأصناف</div>
                    <div class="tools"> </div>
                </div>
                @include('dashboard.items._table')
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
@endsection
@section('footer')@endsection



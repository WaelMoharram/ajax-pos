@extends('dashboard.layouts.layout')
@section('title')الأحجام@endsection
@section('address')الأحجام@endsection
@section('container_class')
    container
@endsection
@section('header')
    <link href="{!!asset('assets')!!}/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="{!!asset('assets')!!}/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-body form">
                    {!!Form::open(['route'=>['add_size'],'method'=>'POST','files'=>'true'])!!}
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @include('dashboard.sizes._form')
                    {!! Form::close() !!}
                </div>
            </div>
            <!-- END SAMPLE FORM PORTLET-->
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-users"></i>جدول الأحجام</div>
                    <div class="tools"> </div>
                </div>
                @include('dashboard.sizes._table')
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
@endsection
@section('footer')@endsection



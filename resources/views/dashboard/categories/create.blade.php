@extends('dashboard.layouts.layout')
@section('title')اضافه تصنيف@endsection
@section('address')اضافة تصنيف جديد@endsection
@section('header')@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-body form">
                    {!!Form::open(['route'=>['category.store'],'method'=>'POST','files'=>'true'])!!}
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @include('dashboard.categories._form')
                    {!! Form::close() !!}
                </div>
            </div>
            <!-- END SAMPLE FORM PORTLET-->
        </div>
    </div>
@endsection
@section('footer')@endsection



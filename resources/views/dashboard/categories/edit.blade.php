@extends('dashboard.layouts.layout')
@section('title')تعديل تصنيف@endsection
@section('address')تعديل بيانات تصنيف@endsection
@section('container_class')
    container
@endsection
@section('header')@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-body form">
                    {!!Form::model($category,['route'=>['category.update',$category->id],'method'=>'put','files'=>'true'])!!}
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





@extends('dashboard.layouts.layout')
@section('title')تعديل صنف@endsection
@section('address')تعديل بيانات صنف@endsection
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
                    {!!Form::model($item,['route'=>['item.update',$item->id],'method'=>'put','files'=>'true'])!!}
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @include('dashboard.items._form')
                    {!! Form::close() !!}
                </div>
            </div>
            <!-- END SAMPLE FORM PORTLET-->
        </div>
    </div>
@endsection
@section('footer')
    <script src="{!!asset('assets')!!}/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
    <script>
        $(".select2").select2();
    </script>
@endsection




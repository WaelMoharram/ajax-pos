@extends('dashboard.layouts.layout')
@section('title')المبيعات ليوم معين@endsection
@section('address')المبيعات ليوم معين@endsection
@section('header')
    <link href="{!!asset('assets')!!}/global/plugins/hover/css/hover-min.css" rel="stylesheet" type="text/css" />
    <style>
        .mt-widget-3 .mt-head {
            margin-bottom: 0px;
        }
        a:hover{
            text-decoration: none;
        }
    </style>

@endsection
@section('content')

    <div class="col-xs-12">
        <div>
            <h1 class="text-center" style="background-color: #ececec;padding: 20px;"> مبيعات يوم {!! $date !!}</h1>
        </div>
        @php($orders = \App\Order::with('details')->where('status','finished')->where('created_at','>',$date)->get())
        @foreach($orders as $order)
            <div class='col-sm-12' style="border: 2px solid orange;border-radius: 22px;margin-bottom: 15px;">
                <div>
                    <h3 class="text-center h3" style="background-color: #ffdb98;padding: 20px;">تفاصيل الطلب رقم # {!! $order->id !!}</h3>
                    <div class="col-xs-12 text-center">
                        <div class="row">
                            <div class="col-md-5">
                                <h5 class="h5">الأصناف</h5>
                            </div>
                            <div class="col-md-2">
                                <h5 class="h5">الكمية</h5>
                            </div>
                            <div class="col-md-2">
                                <h5 class="h5">السعر</h5>
                            </div>
                            <div class="col-md-3">
                                <h5 class="h5">الاجمالى</h5>
                            </div>

                        </div>
                    </div>
                    <div id="order_details">
                        @foreach($order->details as $detail)

                            <div class="col-xs-12 right-peice text-center center-block" id="row-{!! $detail->id !!}">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="media">
                                            <div class="">
                                                <img style="width: 50px; height: 50px;" src="{!! $detail->size->item->image !!}" class=" text-center">
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading text-center">{!! $detail->size->item->name !!}</h6>
                                                <h6 class="media-heading text-center">{!! $detail->size->name !!}</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        {!! $detail->amount !!}
                                    </div>
                                    <div class="col-md-2"><h6 class="text-center">{!! $detail->price !!} جنيه</h6></div>
                                    <div class="col-md-3"><h6 class="text-center">{!! $detail->amount * $detail->price !!} جنيه</h6></div>
                                </div>
                            </div>

                        @endforeach
                    </div>
                </div>

                <hr>
                <div class="col-xs-6 text-center for-margin">
                    <h3>الاجمالى</h3>
                </div>
                <div class="col-xs-6 text-center for-margin" id="total">
                    <h3>{!! number_format(\App\OrderDetail::where('order_id',$order->id)->sum(DB::raw('amount * price')), 2, '.', '')  !!} جنيه</h3>
                </div>

                <div class="col-xs-6">
                    <a data-toggle="modal" data-target="#delete{{$order->id}}" class="btn  red col-xs-12"><i class="fa fa-trash"></i>حذف</a>
                </div>
                <div class="col-xs-6">
                    <button class="col-xs-12 btn green print" id="{!! $order->id !!}"><i class="fa fa-print"></i>طباعة</button>
                </div>

                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
            </div>
            <div id="delete{{$order->id}}" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">حذف الطلب</h4>
                        </div>
                        <div class="modal-body">
                            <p>هل أنت متأكد من حذف الطلب رقم {{$order->id}} ؟</p>
                        </div>
                        <div class="modal-footer">
                            {!!Form::open(['route'=>['order.destroy',$order->id],'method'=>'POST','files'=>'true'])!!}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger">حذف</button>
                            {!! Form::close() !!}
                            <button type="button" class="btn btn-default" data-dismiss="modal">لا</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
@section('footer')
    <script>
        $(document).on('click','.print', function () {
            var id = this.id;
            window.open("{!! url('bill') !!}"+"/"+id);

        });
    </script>
@endsection

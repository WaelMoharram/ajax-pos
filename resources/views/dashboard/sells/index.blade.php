@extends('dashboard.layouts.layout')
@section('title')نقطة البيع@endsection
@section('address')نقطة البيع@endsection
@section('container_class') container-fluid @endsection
@section('header')
    <link href="{!!asset('assets')!!}/global/plugins/pos/style.css" rel="stylesheet" type="text/css" />
    <link href="{!!asset('assets')!!}/global/plugins/bootstrap-touchspin/bootstrap.touchspin.css" rel="stylesheet" type="text/css" />
    <style>
        #loading {
            background: url('spinner.gif') no-repeat center center;
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            z-index: 9999999;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <section class='list'>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-7">
                            <div class="scrollmenu">
                                @foreach($categories as $category)
                                    <a data-toggle="tab" href="#category-{!! $category->id !!}">{!! $category->name !!}</a>
                                @endforeach


                            </div>
                            <div class="tab-content">
                                @foreach($categories as $category)
                                    <div id="category-{!! $category->id !!}" class="tab-pane fade in active">
                                        @foreach(\App\Item::where('category_id',$category->id)->whereHas('sizes')->get() as $item)
                                            <div class='col-lg-4 col-md-6'>
                                                <a class="item" id="{!! $item->id !!}">
                                                    <div class="product">
                                                        <div class="product-cart">
                                                            <img src="{!! $item->image !!}" class="img-responsive" >
                                                            <div class="product-cart-details">
                                                                <h4>{!! $item->name !!}</h4>
                                                                <h6>{!! str_limit($item->note, 40, '&raquo');  !!}</h6>
                                                                <ul class="list-inline">
                                                                    <li>
                                                                        @foreach($item->sizes as $size)
                                                                            <button class=" btn btn-default size-btn"  id="size-{!! $size->id !!}">{!! $size->name !!}</button>
                                                                        @endforeach
                                                                    </li>
                                                                </ul>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class='col-sm-5' style="border: 2px solid orange;border-radius: 22px;">
                            <div>
                                <h3 class="text-center h3">تفاصيل الطلب رقم # {!! $order->id !!}</h3>
                                <div class="col-xs-12 text-center">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <h5 class="h5">الأصناف</h5>
                                        </div>
                                        <div class="col-md-5">
                                            <h5 class="h5">الكمية</h5>
                                        </div>
                                        <div class="col-md-2">
                                            <h5 class="h5">السعر</h5>
                                        </div>
                                        <div class="col-md-2">
                                            <h5 class="h5">الاجمالى</h5>
                                        </div>
                                    </div>
                                </div>
                                <div id="order_details">
                                @foreach(\App\OrderDetail::where('order_id',$order->id)->get() as $detail)

                                        <div class="col-xs-12 right-peice text-center center-block" id="row-{!! $detail->id !!}">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="media">
                                                        <div class="">
                                                            <img src="{!! $detail->size->item->image !!}" class=" text-center">
                                                        </div>
                                                        <br>
                                                        <div class="media-body">
                                                            <h6 class="media-heading text-center">{!! $detail->size->item->name !!}</h6>
                                                            <h6 class="media-heading text-center">{!! $detail->size->name !!}</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <span class="input-group-addon" id="ded-{!! $detail->id !!}">
                                                                <i class="fa fa-minus"></i>
                                                            </span>
                                                            <input type="text" class="text-center form-control" value="{!! $detail->amount !!}" name="{!! $detail->id !!}" disabled >
                                                            <span class="input-group-addon" id="add-{!! $detail->id !!}">
                                                                <i class="fa fa-plus"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2"><h6 class="text-center">{!! $detail->price !!} جنيه</h6></div>
                                                <div class="col-md-2"><h6 class="text-center">{!! $detail->amount * $detail->price !!} جنيه</h6></div>
                                                <div class="col-md-1"><button id="d-{!! $detail->id !!}" class="delete-item btn btn-danger"><i class="fa fa-trash"></i></button></div>
                                            </div>
                                        </div>

                                @endforeach
                                </div>
                            </div>

                            <hr class="total-hr">
                            <div class="col-xs-6 text-center for-margin">
                                <h5>الاجمالى</h5>
                            </div>
                            <div class="col-xs-6 text-center for-margin" id="total">
                                <h4>{!! number_format(\App\OrderDetail::where('order_id',$order->id)->sum(DB::raw('amount * price')), 2, '.', '')  !!} جنيه</h4>
                            </div>
                            <button class="btn btn-success col-md-12" id="save-order">حفظ</button>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <div id="loading"></div>
{{--    @dd('test')--}}
@endsection
@section('footer')
    <script src="{!!asset('assets')!!}/global/plugins/bootstrap-touchspin/bootstrap.touchspin.js" type="text/javascript"></script>

    <script>
        $('#loading').hide();
            $(document).on('click','.size-btn', function () {
                $('#loading').show();
            var fid=this.id;
            var id=fid.substring(5, fid.length);
            //console.log(id);
            $.ajax({
                url: '{{url('add_to_order')}}' + '/' + id,
                type: 'GET',
                success: function (data) {
                    //console.log(data);
                    $('#order_details').children().remove();
                    $('#total').children().remove();
                    $('#total').append('<h4>' + data.total + ' جنيه</h4>');
                    $.each(data.data, function (e) {
                        $('#order_details').append('<div class="col-xs-12 right-peice text-center center-block" id="row-' + data.data[e].id + '">\n'+
                            '<div class="row">\n'+
                            '<div class="col-md-2">\n'+
                            '<div class="media">\n'+
                            '<div class="">\n'+
                            '<img src="' + data.data[e].size.item.image + '" class=" text-center">\n'+
                            '</div>\n'+
                            '<br>\n'+
                            '<div class="media-body">\n'+
                            '<h6 class="media-heading text-center">' + data.data[e].size.item.name + '</h6>\n'+
                            '<h6 class="media-heading text-center">' + data.data[e].size.name + '</h6>\n'+
                            '</div>\n'+
                            '</div>\n'+
                            '</div>\n'+
                            '<div class="col-md-5">\n'+
                            '<div class="form-group">\n'+
                            '<div class="input-group">\n'+
                            '<span class="input-group-addon" id="ded-' + data.data[e].id + '">\n'+
                            '<i class="fa fa-minus"></i>\n'+
                            '</span>\n'+
                            '<input type="text" class="text-center form-control" value="' + data.data[e].amount + '" name="' + data.data[e].id + '" disabled >\n'+
                        '<span class="input-group-addon" id="add-' + data.data[e].id + '">\n'+
                            '<i class="fa fa-plus"></i>\n'+
                            '</span>\n'+
                            '</div>\n'+
                            '</div>\n'+
                            '</div>\n'+
                            '<div class="col-md-2"><h6 class="text-center">' + data.data[e].price + ' جنيه</h6></div>\n'+
                        '<div class="col-md-2"><h6 class="text-center">' + data.data[e].amount * data.data[e].price + ' جنيه</h6></div>\n'+
                        '<div class="col-md-1"><button id="d-' + data.data[e].id + '" class="delete-item btn btn-danger"><i class="fa fa-trash"></i></button></div>\n'+
                        '</div>\n'+
                        '</div>')
                    });
                    $('#loading').hide();
                }
            });

        });
        $(document).on('click','.delete-item', function () {
            $('#loading').show();
            var fid = this.id;
            var id=fid.substring(2, fid.length);
            //console.log(id);
            $.ajax({
                url: '{{url('delete_from_order')}}' + '/' + id,
                type: 'GET',
                success: function (data) {
                    $('#row-'+ id).remove();
                    $('#total').children().remove();
                    $('#total').append('<h4>' + data.total + ' جنيه</h4>');
                    $('#loading').hide();
                }
            });

        });
        $(document).on('click','.input-group-addon', function () {
            $('#loading').show();
            var fid = this.id;
            var type = fid.substring(0, 3);
            var id=fid.substring(4, fid.length);
            //console.log(id);
            $.ajax({
                url: '{{url('add_ded_one_to_item')}}' + '/' + id,
                type: 'GET',
                data: {
                    "type": type,
                },
                success: function (data) {
                    //console.log(data);
                    $('#order_details').children().remove();
                    $('#total').children().remove();
                    $('#total').append('<h4>' + data.total + ' جنيه</h4>');
                    $.each(data.data, function (e) {
                        $('#order_details').append('<div class="col-xs-12 right-peice text-center center-block" id="row-' + data.data[e].id + '">\n'+
                            '<div class="row">\n'+
                            '<div class="col-md-2">\n'+
                            '<div class="media">\n'+
                            '<div class="">\n'+
                            '<img src="' + data.data[e].size.item.image + '" class=" text-center">\n'+
                            '</div>\n'+
                            '<br>\n'+
                            '<div class="media-body">\n'+
                            '<h6 class="media-heading text-center">' + data.data[e].size.item.name + '</h6>\n'+
                            '<h6 class="media-heading text-center">' + data.data[e].size.name + '</h6>\n'+
                            '</div>\n'+
                            '</div>\n'+
                            '</div>\n'+
                            '<div class="col-md-5">\n'+
                            '<div class="form-group">\n'+
                            '<div class="input-group">\n'+
                            '<span class="input-group-addon"  id="ded-' + data.data[e].id + '">\n'+
                            '<i class="fa fa-minus"></i>\n'+
                            '</span>\n'+
                            '<input type="text" class="text-center form-control" value="' + data.data[e].amount + '" name="' + data.data[e].id + '" disabled >\n'+
                            '<span class="input-group-addon"  id="add-' + data.data[e].id + '">\n'+
                            '<i class="fa fa-plus"></i>\n'+
                            '</span>\n'+
                            '</div>\n'+
                            '</div>\n'+
                            '</div>\n'+
                            '<div class="col-md-2"><h6 class="text-center">' + data.data[e].price + ' جنيه</h6></div>\n'+
                            '<div class="col-md-2"><h6 class="text-center">' + data.data[e].amount * data.data[e].price + ' جنيه</h6></div>\n'+
                            '<div class="col-md-1"><button id="d-' + data.data[e].id + '" class="delete-item btn btn-danger"><i class="fa fa-trash"></i></button></div>\n'+
                            '</div>\n'+
                            '</div>')
                    });
                    $('#loading').hide();
                }

            });

        });

        $(document).on('click','#save-order', function () {
            $.ajax({
                url: '{{url('save_order')}}' + '/' + 1,
                type: 'GET',
                success: function (data) {
                    console.log(data);
                    window.open("{!! url('bill') !!}"+"/"+data.id);
                    window.location.replace("{!! route('order.index') !!}");

                }
            });

        });
    </script>
@endsection



<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container" style="width: 80mm;">
    <div class="row">
        <div class="well col-xs-12">
            <div class="row">
                <div class="col-xs-6">
                    <address>
                        <strong>Rivers</strong>
                        <br>
                        rivers address
                        <br>
                        Mansoura
                        <br>
                        <abbr>tel:</abbr> 0123456789
                    </address>
                </div>
                <div class="col-xs-6 text-right">
                    <p>
                        <em>Date: {!! $order->created_at !!}</em>
                    </p>
                    <p>
                        <em>Receipt #: {!! $order->id !!}</em>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="text-center">
                    <h1>Receipt</h1>
                </div>
                </span>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th class="col-xs-9">Product</th>
                        <th class="col-xs-1">#</th>
                        <th class="col-xs-1 text-center">Price</th>
                        <th class="col-xs-1 text-center">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order->details as $row)
                        <tr>
                            <td class="col-xs-9"><em>{!! $row->size->item->name !!} - {!! $row->size->name !!}</em></td>
                            <td class="col-xs-1" style="text-align: center"> {!! $row->amount !!} </td>
                            <td class="col-xs-1 text-center">{!! $row->price !!} جنيه</td>
                            <td class="col-xs-1 text-center">{!! $row->amount * $row->price !!} جنيه</td>
                        </tr>
                    @endforeach


                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td class="text-right"><h4><strong>Total: {!! number_format(\App\OrderDetail::where('order_id',$order->id)->sum(DB::raw('amount * price')), 2, '.', '') !!}</strong></h4></td>
                        <td class="text-center text-danger"><h4><strong></strong></h4></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    window.print();
    window.close();

</script>

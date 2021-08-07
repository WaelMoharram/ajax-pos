<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
</head>
<body  style="width: 80mm;">



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
            <div >
                <div class="text-center">
                    <h1>Receipt</h1>
                </div>
                </span>
                <table class="table table-hover">

                    <thead>
                    <tr>
                        <th class="text-primary">Product</th>
                        <th class="">#</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order->details as $row)
                        <tr>
                            <td class=""><em>{!! $row->size->item->name !!} - {!! $row->size->name !!}</em></td>
                            <td class="" style="text-align: center"> {!! $row->amount !!} </td>
                            <td class="text-center">{!! $row->price !!} </td>
                            <td class="text-center">{!! $row->amount * $row->price !!} </td>
                        </tr>
                    @endforeach


                    <tr>


                        <td colspan="4" class="text-center"><h4><strong>Total: {!! number_format(\App\OrderDetail::where('order_id',$order->id)->sum(DB::raw('amount * price')), 2, '.', '') !!}</strong></h4></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<script>
    window.print();
    //window.close();
</script>

</body>
</html>



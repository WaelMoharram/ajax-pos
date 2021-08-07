<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use App\Order;
use App\OrderDetail;
use App\Size;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class OrderController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index()
    {
        //return 'wael';
        $categories =Category::all();
        $order = Order::where('status','open')->first();
        if(!$order){
            $order =Order::create(['status'=>'open']);
        }

        return view('dashboard.sells.index',compact('categories','order'));
    }

    public function addToOrder($id)
    {
        $size = Size::with('item')->find($id);
        $order = Order::where('status','open')->first();
        $old = OrderDetail::where('size_id',$id)->where('order_id',$order->id)->first();
        if($old){
            $old->amount += 1;
            $old->save();
        }else{
            OrderDetail::create([
                'order_id'=>$order->id,
                'size_id'=>$id,
                'price'=>$size->price,
                'amount'=>1
            ]);
        }

        $data=[
            'status'=>1,
            'message'=>'done',
            'data'=>OrderDetail::with('size')->where('order_id',$order->id)->get(),
            'total'=>number_format(OrderDetail::where('order_id',$order->id)->sum(DB::raw('amount * price')), 2, '.','')
        ];
        return response()->json($data);
    }

    public function deleteFromOrder($id)
    {
        OrderDetail::destroy($id);

        $order = Order::where('status','open')->first();

        $data=[
            'status'=>1,
            'message'=>'done',
            'id'=>$id,
            'total'=>number_format(OrderDetail::where('order_id',$order->id)->sum(DB::raw('amount * price')), 2, '.', '')
        ];
        return response()->json($data);
    }

    public function addDedOneToItem(Request $request,$id)
    {
        $order = Order::where('status','open')->first();
        if ($request->type == 'add'){
            OrderDetail::find($id)->increment('amount');
        }elseif($request->type == 'ded'){
            $item = OrderDetail::find($id);
            $item->decrement('amount');
            if ($item->amount == 0){
                OrderDetail::destroy($id);
            }
        }

        $data=[
            'status'=>1,
            'message'=>'done',
            'data'=>OrderDetail::with('size')->where('order_id',$order->id)->get(),
            'total'=>number_format(OrderDetail::where('order_id',$order->id)->sum(DB::raw('amount * price')), 2, '.', '')
        ];
        return response()->json($data);

    }

    public function saveOrder()
    {
        $order = Order::where('status','open')->first();
        $id=$order->id;
        $order->update(['status'=>'finished']);
        $data=[
            'status'=>1,
            'message'=>'done',
            'id'=>$id
        ];
        return response()->json($data);
    }

    public function bill($id)
    {
        $order = Order::find($id);
        return view('dashboard.bill.index',compact('order'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function create()
    {

    }

    /**
    * Store a newly created resource in storage.
    *
    * @return Response
    */
    public function store(Request $request)
    {

    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return Response
    */
    public function show($id)
    {

    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return Response
    */
    public function edit($id)
    {

    }

    /**
    * Update the specified resource in storage.
    *
    * @param  int  $id
    * @return Response
    */
    public function update($id)
    {

    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return Response
    */
    public function destroy($id)
    {
        Order::destroy($id);
        OrderDetail::where('order_id',$id)->delete();
        flash('تم الحذف بنجاح')->success();
        return back();
    }

}

?>

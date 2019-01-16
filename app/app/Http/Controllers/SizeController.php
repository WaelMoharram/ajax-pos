<?php 

namespace App\Http\Controllers;

use App\Size;
use Illuminate\Http\Request;

class SizeController extends Controller 
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
    public function index($id)
    {
        $sizes = Size::where('item_id',$id)->get();
        return view('dashboard.sizes.index',compact('sizes','id'));
    }

    /**
    * Store a newly created resource in storage.
    *
    * @return Response
    */
    public function store(Request $request)
    {

        $this->validate($request,
            [
                'name' => 'required|unique:items',
                'price' => 'required',
            ],
            [
                'name.required' => 'الاسم مطلوب',
                'name.unique' => 'الاسم موجود من قبل',
                'price.required' => 'السعر مطلوب',
            ]
        );
        $data =$request->all();

        $size=Size::create($data);
        if ($size){
            flash('تمت الاضافة بنجاح')->success();
            return redirect('sizes/'.$request->item_id);
        }else{
            return abort('403');
        }

    }


    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return Response
    */
    public function destroy(Request $request)
    {
        $size = Size::with('item')->find($request->id);
        $item = $size->item;
        $size->delete();

        flash('تم الحذف بنجاح')->success();
        return redirect('sizes/'.$item->id);
        return back();
    }
  
}

?>

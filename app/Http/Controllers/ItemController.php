<?php 

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ItemController extends Controller 
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
        $items= Item::all();
        return view('dashboard.items.index',compact('items'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function create()
    {
        $item=new Item();
        return view('dashboard.items.create',compact('item'));
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
                'image' => 'required|image',
                'price' => 'required',
                'category_id' => 'required',
            ],
            [
                'name.required' => 'الاسم مطلوب',
                'name.unique' => 'الاسم موجود من قبل',
                'image.required' => 'الصورة مطلوبة',
                'image.image' => 'مسموح برفع ملف من نوع صورة فقط',
                'price.required' => 'السعر مطلوب',
                'category_id.required' => 'التصنيف مطلوب',
            ]
        );
        $data =$request->all();

        $file = $request->file('image');
        $img = Image::make($file);
        $extension = $file->getClientOriginalExtension(); // getting image extension
        $fileName = time() . '' . rand(11111, 99999) . '.' . $extension; // renaming image
        $dest = 'uploads/';
        $img->save($dest . $fileName);
        unset($data['image']);
        $data['image'] = $dest . $fileName;

        $item=Item::create($data);
        if ($item){
            flash('تمت الاضافة بنجاح')->success();
            return redirect()->route('item.index');
        }else{
            return abort('403');
        }
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
        $item=Item::find($id);
        return view('dashboard.items.edit',compact('item'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  int  $id
    * @return Response
    */
    public function update(Request $request, $id)
    {
        $this->validate($request,
            [
                'name' => 'required|unique:items,name,'.$id,
                'image' => 'image',
                'price' => 'required',
                'category_id' => 'required',
            ],
            [
                'name.required' => 'الاسم مطلوب',
                'name.unique' => 'الاسم موجود من قبل',
                'image.image' => 'مسموح برفع ملف من نوع صورة فقط',
                'price.required' => 'السعر مطلوب',
                'category_id.required' => 'التصنيف مطلوب',
            ]
        );
        $item = Item::find($id);
        $data = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $img = Image::make($file);
            //$img->resize(640, 480);
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $fileName = time() . '' . rand(11111, 99999) . '.' . $extension; // renaming image
            $dest = 'uploads/';
            $img->save($dest . $fileName);
            unset($data['image']);
            $data['image'] = $dest . $fileName;
        }

        $item->fill($data)->save();
        if ($item){
            flash('تم التعديل بنجاح')->success();
            return redirect()->route('item.index');
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
    public function destroy($id)
    {
        Item::destroy($id);
        flash('تم الحذف بنجاح')->success();
        return back();
    }
  
}

?>

<?php 

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller 
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
        $categories= Category::all();
        return view('dashboard.categories.index',compact('categories'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function create()
    {
        $category=new Category();
        return view('dashboard.categories.create',compact('category'));
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
                'name' => 'required|unique:categories',
                'image' => 'required|image',
            ],
            [
                'name.required' => 'الاسم مطلوب',
                'name.unique' => 'الاسم موجود من قبل',
                'image.required' => 'الصورة مطلوبة',
                'image.image' => 'مسموح برفع ملف من نوع صورة فقط',

            ]
        );
        $data =$request->all();

        $file = $request->file('image');
        $img = Image::make($file);
        //$img->resize(640, 480);
        $extension = $file->getClientOriginalExtension(); // getting image extension
        $fileName = time() . '' . rand(11111, 99999) . '.' . $extension; // renaming image
        $dest = 'uploads/';
        $img->save($dest . $fileName);
        unset($data['image']);
        $data['image'] = $dest . $fileName;

        $category=Category::create($data);
        if ($category){
            flash('تمت الاضافة بنجاح')->success();
            return redirect()->route('category.index');
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
        $category=Category::find($id);
        return view('dashboard.categories.edit',compact('category'));
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
                'name' => 'unique:categories,name,'.$id,
                'image' => 'image',
            ],
            [
                'name.unique' => 'الاسم موجود من قبل',
                'image.image' => 'مسموح برفع ملف من نوع صورة فقط',
            ]
        );
        $category = Category::find($id);
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

        $category->fill($data)->save();
        if ($category){
            flash('تم التعديل بنجاح')->success();
            return redirect()->route('category.index');
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
        Category::destroy($id);
        flash('تم الحذف بنجاح')->success();
        return back();
    }
  
}

?>

<?php 

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller 
{

    /**
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index()
    {
        $users= User::all();
        return view('dashboard.users.index',compact('users'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function create()
    {
        $user=new User();
        return view('dashboard.users.create',compact('user'));
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
                'name' => 'required',
                'password' => 'required|min:6|confirmed',
            ], [
                'name.required' => 'اسم المستخدم مطلوب',
                'password.required' => 'كلمة المرور مطلوبة',
                'password.confirmed' => 'كلمة المرور غير مطابقة',
                'password.min' => 'كلمة المرور لا تقل عن 6 أرقام',
            ]);

        $data=$request->all();
        $data['password']=Hash::make($request->password);
        $user=User::create($data);
        if ($user){
            flash('تمت الاضافة بنجاح')->success();
            return redirect()->route('user.index');
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
        $user=User::find($id);
        return view('dashboard.users.edit',compact('user'));
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
                'name' => 'required',

                'password' => 'nullable|min:6|confirmed',
            ], [
                'name.required' => 'اسم المستخدم مطلوب',
                'password.confirmed' => 'كلمة المرور غير مطابقة',
                'password.min' => 'كلمة المرور لا تقل عن 6 أرقام',
            ]);

        $data=$request->all();
        if(!is_null($request->password)){
            $data['password']=Hash::make($request->password);
        }else{
            unset($data['password']);
        }
        $user = User::find($id)->fill($data)->save();
        if ($user){
            flash('تم التعديل بنجاح')->success();
            return redirect()->route('user.index');
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
        $users_count = User::all()->count();
        if ($users_count ==1){
            flash('لا يمكن حذف المستخدم لعدم وجود مستخدمين أخرين فى النظام')->error();
            return back();
        }
        User::destroy($id);
        flash('تم الحذف بنجاح')->success();
        return back();
    }
  
}

?>

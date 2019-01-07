<?php 

namespace App\Http\Controllers;

use App\Log;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller 
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
        $users= User::all();
        Log::create([
            'user_id'    =>Auth::id(),
            'model_id'   =>0,
            'model_type' =>'users',
            'operation'  =>'index',
            'status'     =>1,
            'note'       =>'show index of users'
        ]);
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

        Log::create([
            'user_id'    =>Auth::id(),
            'model_id'   =>0,
            'model_type' =>'users',
            'operation'  =>'create',
            'status'     =>1,
            'note'       =>'show create user page'
        ]);
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

            Log::create([
                'user_id'    =>Auth::id(),
                'model_id'   =>$user->id,
                'model_type' =>'users',
                'operation'  =>'store',
                'status'     =>1,
                'note'       =>'store new user'
            ]);
            flash('تمت الاضافة بنجاح')->success();
            return redirect()->route('user.index');
        }else{
            Log::create([
                'user_id'    =>Auth::id(),
                'model_id'   =>$user->id,
                'model_type' =>'users',
                'operation'  =>'store',
                'status'     =>0,
                'note'       =>'error when store new user'
            ]);
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

        Log::create([
            'user_id'    =>Auth::id(),
            'model_id'   =>$user->id,
            'model_type' =>'users',
            'operation'  =>'edit',
            'status'     =>1,
            'note'       =>'show edit user page'
        ]);
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
            Log::create([
                'user_id'    =>Auth::id(),
                'model_id'   =>$user->id,
                'model_type' =>'users',
                'operation'  =>'update',
                'status'     =>1,
                'note'       =>'update user data'
            ]);
            flash('تم التعديل بنجاح')->success();
            return redirect()->route('user.index');
        }else{
            Log::create([
                'user_id'    =>Auth::id(),
                'model_id'   =>$user->id,
                'model_type' =>'users',
                'operation'  =>'update',
                'status'     =>0,
                'note'       =>'error when update user data'
            ]);
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
            Log::create([
                'user_id'    =>Auth::id(),
                'model_id'   =>$id,
                'model_type' =>'users',
                'operation'  =>'delete',
                'status'     =>0,
                'note'       =>'error when delete user - last user in system'
            ]);
            flash('لا يمكن حذف المستخدم لعدم وجود مستخدمين أخرين على النظام')->error();
            return back();
        }
        User::destroy($id);
        Log::create([
            'user_id'    =>Auth::id(),
            'model_id'   =>$id,
            'model_type' =>'users',
            'operation'  =>'delete',
            'status'     =>1,
            'note'       =>'delete user'
        ]);
        flash('تم الحذف بنجاح')->success();
        return back();
    }
  
}

?>

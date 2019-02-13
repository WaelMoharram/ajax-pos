<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard.home');
    }


    public function dailyReport(Request $request){

        $date = date('Y-m-d');
        if ($request->has('date')){
            $date = date('Y-m-d',strtotime($request->date));
        }
        return view('dashboard.report.daily_sales',compact('date'));
    }
}

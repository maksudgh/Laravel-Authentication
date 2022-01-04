<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
        $role = Auth::user()->user_role;
        $data = DB::table('users')
        ->where('user_role',2)
        ->get();
        if($role == 0)
            return view('home',['data'=>$data]);
        else if($role == 1)
            return view('authentic');
        else
            return view('not_authentic');


    }
    public function accept($id){
        DB::table('users')
        ->where('id',$id)
        ->update(
            [
                'user_role' => 1
            ]
            );

        $data = DB::table('users')
        ->where('user_role',2)
        ->get();

        return view('newhome',['data'=>$data]);
    }

    public function deny($id){
        DB::table('users')
        ->where('id',$id)
        ->delete();

        $data = DB::table('users')
        ->where('user_role',2)
        ->get();

        return view('newhome',['data'=>$data]);
    }
}

<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index(){
        if(auth()->user()->isAdmin != '1'){
            return redirect('/posts')->with('error', 'Access denied! Unauthorized Page');
        }else{
            return view('admin.index');
        }
    }
}
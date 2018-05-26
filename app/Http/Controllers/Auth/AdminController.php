<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    //
    public function index(){
        return view('admin.index');
        if(auth()->user()->isAdmin !== 1){
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }
    }
}

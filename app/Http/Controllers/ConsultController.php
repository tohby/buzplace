<?php

namespace App\Http\Controllers;

use App\Consult;
use Illuminate\Http\Request;

class ConsultController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //display consultation messages
    public function index(){
        if(auth()->user()->isAdmin != 1){
            return redirect('/posts')->with('error', 'Access denied! Unauthorized Page');
        }else{
            $consults = Consult::orderBy('created_at', 'body')->paginate(11);
            return view ('admin.consultations')->with('consults', $consults);    
        }
        
    }

    //display form page
    public function create(){
        if(auth()->user()->isAdmin != 1){
            return redirect('/posts')->with('error', 'Access denied! Unauthorized Page');
        }else{
             return view('consult.form');
        }
    }

    //handle form request
    public function store(Request $request){
        Consult::create([
            'user_id' => auth()->user()->id,
            'subject' => $request->input('subject'),
            'message' => $request->input('message')
        ]);
        return redirect('/posts')->with('success', 'your message has been sent to our representative, we will get back to you shortly');
    }

}

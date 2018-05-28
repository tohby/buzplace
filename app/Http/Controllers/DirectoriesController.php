<?php

namespace App\Http\Controllers;

use App\Directory;
use Illuminate\Http\Request;

class DirectoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index(){
        if(auth()->user()->isAdmin != 1){
            return redirect('/posts')->with('error', 'Access denied! Unauthorized Page');
        }else{
            $directories = Directory::orderBy('created_at', 'body')->paginate(4);
            return view ('directory.index')->with('directories', $directories);
        }
    }

    public function create(){
        if(auth()->user()->isAdmin != 1){
            return redirect('/posts')->with('error', 'Access denied! Unauthorized Page');
        }else{
            return view('directory.create');
        }
    }

    public function store(Request $request){
        Directory::create([
            'name' => $request->input('name'),
            'details' => $request->input('details'),
            'location' => $request->input('location')
        ]);
        return redirect('/directories')->with('success', 'The directory has been added');
    }

    public function show(){

    }

    public function edit($id){
        if(auth()->user()->isAdmin != 1){
            return redirect('/posts')->with('error', 'Access denied! Unauthorized Page');
        }else{
            $directory = Directory::find($id);
            return view('directory.edit')->with('directory', $directory);
        }
    }

    public function update(Request $request, $id){
        $directory = Directory::find($id);
        $directory->name = $request->input('name');
        $directory->details = $request->input('details');
        $directory->location = $request->input('location');
        $directory->save();
        return redirect('/directories')->with('success', 'New directory added!');
    }

    public function destroy($id){
        if(auth()->user()->isAdmin != 1){
            return redirect('/posts')->with('error', 'Access denied! Unauthorized Page');
        }else{
            $directory = Directory::find($id);
        $directory->delete();
        return redirect('/directories')->with('success', 'Directory Deleted');
        }
    }
}
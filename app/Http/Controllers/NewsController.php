<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(auth()->user()->isAdmin != '1'){
            return redirect('/posts')->with('error', 'Access denied! Unauthorized Page');
        }else{
            $news = News::orderBy('created_at', 'body')->paginate(4);
            return view ('news.index')->with('news', $news);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if(auth()->user()->isAdmin != '1'){
            return redirect('/posts')->with('error', 'Access denied! Unauthorized Page');
        }else{
            return view('news.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'title' => 'required',
            'news_article' => 'required',
            'image' => 'image|nullable|max:1999'
        ]);
        if($request->hasFile('image')){
            //get file name with the extension
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            //get just filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //get just ext
            $extension = $request->file('image')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('image')->storeAs('public/newsImages', $fileNameToStore);
        }else{
            $fileNameToStore = 'null';
        }
        News::create([
            'title' => $request->input('title'),
            'news_article' => $request->input('news_article'),
            'image' => $fileNameToStore
        ]);
        return redirect('/news')->with('success', 'News post has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $newsItem = news::find($id);     
        if(auth()->user()->isAdmin != '1'){
            return redirect('/posts')->with('error', 'Access denied! Unauthorized Page');
        }else{
            return view('news.edit')->with('newsItem', $newsItem);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'title' => 'required',
            'news_article' => 'required',
            'image' => 'image|nullable|max:1999'
        ]);
        if($request->hasFile('image')){
            //get file name with the extension
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            //get just filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //get just ext
            $extension = $request->file('image')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('image')->storeAs('public/newsImages', $fileNameToStore);
        }else{
            $fileNameToStore = 'null';
        }
        $newsItem = News::find($id);
        $newsItem->title = $request->input('title');
        $newsItem->news_article = $request->input('news_article');
        $newsItem->image = $fileNameToStore;
        $newsItem->save();
        return redirect('/news')->with('success', 'News post has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if(auth()->user()->isAdmin != '1'){
            return redirect('/posts')->with('error', 'Access denied! Unauthorized Page');
        }else{
        $newsItem = News::find($id);
        $newsItem->delete();
        return redirect('/news')->with('success', 'News post has been removed');
        }
    }
}
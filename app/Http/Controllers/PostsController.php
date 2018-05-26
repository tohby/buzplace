<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Tag;
use App\PostsPhoto;
use App\Http\Requests\UploadRequest;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    // the resource thingy starts here
    public function index()
    {
        //
        $posts = Post::orderBy('created_at', 'body')->paginate(4);
        return view ('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //function to store new post in database

    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UploadRequest $request)
    {
        //function to store new post in database
        if($request->get('negotiable') == null){
            $negotiable = 0;
        } else {
            $negotiable = request('negotiable');
        }
        $post = Post::create([
            'user_id' => auth()->user()->id,
            'title' => $request->input('title'),
            'price' => $request->input('price'),
            'negotiable' => $negotiable,
            'product' => $request->input('product'),
            'quantity' => $request->input('quantity'),
            'body' => $request->input('body')
        ]);
        if ($request->hasFile('photos')){
            foreach ($request->photos as $photo){
                $fileNameWithExt = $photo->getClientOriginalName();
                $filename = $photo->getClientOriginalName();
                //get just filename
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                //get just ext
                $extension = $photo->getClientOriginalExtension();
                //file name to store
                $fileNameToStore = $fileName.'_'.time().'.'.$extension;
                $path = $photo->storeAs('public/upload', $fileNameToStore);
            PostsPhoto::Create([
                'post_id' => $post->id,
                'filename' => $fileNameToStore
               ]);
            }
        }
        $posttags = explode(",", $request->tags);
        foreach($posttags as $posttag){
            Tag::FirstOrCreate([
                'name' => $posttag
            ]);
            $tag = Tag::where('name', $posttag)->first();
        $post->tags()->attach($tag->id);
        }
        return redirect('/posts')->with('success', 'Your post has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $posts = Post::find($id);
        return view('posts.details')->with('posts', $posts);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //return edit page
        $post = Post::find($id);
        return view('posts.edit')->with('post', $post);
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

        //create post
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->price = $request->input('price');
        $post->negotiable = $request->input('negotiable');
        $post->product = $request->input('product');
        $post->quantity = $request->input('quantity');
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect('/posts')->with('success', 'Your post has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //function to delete post
        $post = Post::find($id);
        $post->delete();
        return redirect('/posts')->with('success', 'post Deleted');
    }

    public function search(Request $request){
        $searchKey = $request->input('searchKey');
        $posts = Post::search($searchKey)->paginate(5);
        return view('search')->with('posts', $posts);
    }
    
    public function myposts(){
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('posts.myposts')->with('posts', $user->posts);
    }
}
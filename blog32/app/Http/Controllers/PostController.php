<?php

namespace App\Http\Controllers;

use App\post;
use App\category;
use App\edit;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = post::latest()->paginate(5);
        
        return view('post.index', compact('posts'));
    }

    /** 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = category::all();
        return view('post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function  store ()//store(Request $request)
    {
        $this ->validate(request(), [
            'title' => 'required',
            'content' => 'required|min:20',
        ]);
        
        post::create([
            'title' => request('title'),
            'slug' => str_slug(request('title')),
            'content' => request('content'),
            'category_id' => request('category_id')
        ]);

        return redirect()-> route('post.index')->with('success', 'Your post has been submitted');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function view(post $post)
    {
        //
        return view('post.view', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
        $categories = category::all();

        return view('post.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(post $post)
    {
        $post->update([
            'title' => request('title'),
            'category_id' => request('category_id'),
            'content' => request('content')
        ]);

        return redirect()-> route('post.index')->with('info','Your edited post has been submited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        $post->delete();

        return redirect()->route('post.index')->withDanger('Your post has been successfully lost from existence');
    }
}

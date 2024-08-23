<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\SavePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::get();

        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create', ['post' => new Post]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SavePostRequest $request)
    {
        /*$validated = $request->validate([
            'title' => ['required', 'min:4'],
            'body' => ['required']
        ]);*/

        /*$post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();*/

        Post::create($request->validated());

        //session()->flash('status', 'Post created!');

        //return to_route('posts.index')
        //  ->with('status', 'Post created!');

        return to_route('posts.index')->with('status', 'Post created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SavePostRequest $request, Post $post)
    {
        /*$validated = $request->validate([
            'title' => ['required', 'min:4'],
            'body' => ['required']
        ]);*/

        /*$post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();*/

        $post->update($request->validated());

        //session()->flash('status', 'Post updated');

        return to_route('posts.show', $post)->with('status', 'Post updated!');

        //return to_route('posts.index')
        //  ->with('status', 'Post Edited!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return to_route('posts.index')
            ->with('status', 'Post deleted successfully');
    }
}

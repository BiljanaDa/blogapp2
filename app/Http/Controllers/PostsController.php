<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::paginate(3);
        return view('pages.posts', compact('posts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatePostRequest $request)
    {
        $post = new Post();

        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = Auth::id();
        $post->save();

        $post->tags()->attach($request->tags);

        return redirect('createpost')->with('status', 'Post successfully created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::with('comments')->find($id);
        return view('pages.post', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function createPost()
    {
        $tags = Tag::all();
        return view('pages.createpost', compact('tags'));
    }
}

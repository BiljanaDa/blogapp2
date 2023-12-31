<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Mail\CreatePostMail;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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

        $userEmail = Auth::user()->email;
        $mailData = $post->only('title', 'body', 'id');
        Mail::to($userEmail)->send(new CreatePostMail($mailData));

        return redirect('createpost')->with('status', 'Post successfully created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::with('comments')->find($id);
        $comments = Comment::where('post_id', $id)->get();
        $likes = $post->likes()->where('type', 'like')->count();
        $dislikes = $post->likes()->where('type', 'dislike')->count();
        return view('pages.post', compact('post', 'comments', 'likes', 'dislikes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::find($id);

        if ($post->user_id !== Auth::id()) {
            return redirect()->back()->withError('Only creator of the post can change it.');
        }

        $post->title = $request->title;
        $post->body = $request->body;

        $post->save();

        return redirect()->back()->with('status', 'Post successfully updated.');
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

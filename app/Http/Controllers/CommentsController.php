<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCommentRequest $request)
    {
        if(!Auth::check()) {
            return redirect('/posts/' . $request->post_id)->withErrors('Only creator of the comment can delete it.');
        }

        $post = Post::find($request->post_id);

        $user = User::find(Auth::user()->id);

        $comment = Comment::create([
            'body' => $request->body,
            'post_id' => $request->post_id,
            'user_id' => $user->id
        ]);

        $post = Post::find($request->post_id);

        return redirect('/posts/' . $post->id)->with('status', 'Comment successfully created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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

        $comment = Comment::find($id);

        if (Auth::id() !== $comment->user_id) {
            return redirect()->back()->withErrors('Only creator of the comment can delete comment.');
        }
        
        $comment->destroy($id);

        return redirect()->back()->with('success', 'Comment is successfully deleted.');
    }
}

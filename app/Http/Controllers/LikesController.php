<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikesController extends Controller
{


    
    public function like(string $post_id, string $type)
    {
        $user_id = Auth::user()->id;

        $like = Like::updateOrCreate(
            ['user_id' => $user_id, 'post_id' => $post_id],
            ['type' => $type]
        );

        if ($like->wasRecentlyCreated) {
            $message = ($type === 'like') ? 'Successfully liked post!' : 'Successfully disliked post!';
        } else {
            $message = ($type === 'like') ? 'Successfully changed to like!' : 'Successfully changed to dislike!';
        }
        return redirect()->back()->with('status', $message);
    }
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
    public function store(Request $request)
    {
        //
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
        //
    }
}

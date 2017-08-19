<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\UserCommentRequest;
use App\Post;
use App\Comment;

class UserCommentsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCommentRequest $request)
    {
    	$post = Post::findOrFail($request->post_id);
    	$post->comments()->create([
    		'body'=> $request->body,
    		'user_id' => Auth::user()->id
    		]);
    	return redirect(route('posts.show', $request->post_id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        $comment = Comment::findOrFail($id);
        //checking comment ownership
        if (Auth::user() && Auth::user()->id === $comment->user->id) {
	        $comment->delete();
        }
    	return redirect(route('posts.show', $request->post_id));
    }
}

<?php

namespace App\Http\Controllers\Post\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\Comment\StoreRequest;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Comment;


class StoreController extends Controller
{
    public function __invoke(StoreRequest $request, Post $post)
    {
    	$data = $request->validated();
    	// dd($data);
    	$data['user_id'] = auth()->user()->id;
    	$data['post_id'] = $post->id;

    	Comment::create($data);
    	return redirect()->route('post.show', $post->id);
    }
}

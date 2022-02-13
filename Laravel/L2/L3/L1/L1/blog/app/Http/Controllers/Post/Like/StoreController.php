<?php

namespace App\Http\Controllers\Post\Like;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\Comment\StoreRequest;

use Illuminate\Http\Request;

use App\Models\Post;

//user
class StoreController extends Controller
{
    public function __invoke(Post $post)
    {
    	auth()->user()->likedPosts()->toggle($post->id);

    	return redirect()->back();
    }
}

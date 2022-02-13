<?php

namespace App\Http\Controllers\Personal\Liked;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;

class deleteController extends Controller
{
    public function __invoke(Post $post)
    {  	

    	auth()->user()->likedPosts()->detach($post->id);
    	// dd($posts);
    	return redirect()->route('personal.liked.index');
    }
}

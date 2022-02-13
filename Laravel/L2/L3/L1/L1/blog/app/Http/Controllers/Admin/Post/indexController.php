<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;



class indexController extends BaseController
{
    public function __invoke()
    {
    	// $posts = Post::all();
    	$posts = Post::paginate(6);
    	return view('admin.post.index',compact('posts'));
    }
}

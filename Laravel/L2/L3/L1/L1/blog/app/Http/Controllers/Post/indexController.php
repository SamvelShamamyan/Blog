<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Category;



//users
class indexController extends Controller
{
    public function __invoke()
    {
    	$posts = Post::paginate(6);
    	$randomPosts = Post::get()->random(4);
    	// dd($randomPosts);
    	$likedPosts = Post::withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->get()->take(4);
    	// dd($likedPosts);
    	$categories = Category::all();
    	return view('post.index', compact('posts', 'randomPosts','likedPosts','categories'));
    }
}

<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;
use Carbon\Carbon;


//users
class ShowController extends Controller
{
    public function __invoke(Post $post)
    {
    	// Carbon::setLocale('ru_RU');
    	$data = Carbon::parse($post->created_at);
    	//dd($data->format('Y-m-d'));
    	$relatedPosts = Post::where('category_id', $post->category_id)
    	->where('id','!=', $post->id)
    		->get()
    			->take(3);
        return view('post.show', compact('post','data','relatedPosts'));
    }
}

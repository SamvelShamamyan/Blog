<?php

namespace App\Http\Controllers\Category\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;


//users
class indexController extends Controller
{
    public function __invoke(Category $category)
    {
    	$posts = $category->posts()->paginate(3);
    	return view('category.post.index', compact('posts'));
    }
}

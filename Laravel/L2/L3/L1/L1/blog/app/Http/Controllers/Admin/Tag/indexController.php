<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Tag;


class indexController extends Controller
{
    public function __invoke()
    {
    	$tags = Tag::all();
    	return view('admin.tag.index',compact('tags'));
    }
}

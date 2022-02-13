<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\StoreRequest;
use Illuminate\Http\Request;

use App\Models\Tag;

class ShowController extends Controller
{
    public function __invoke(Tag $tag)
    {
        return view('admin.tag.show', compact('tag'));
    }
}

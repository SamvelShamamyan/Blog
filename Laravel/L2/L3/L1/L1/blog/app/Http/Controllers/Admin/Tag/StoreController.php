<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\StoreRequest;
use Illuminate\Http\Request;

use App\Models\Tag;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        // Category::firsOrCreate(['titie'=>$data['title']]);
        Tag::firstOrCreate($data);

        return redirect()->route('admin.tag.index');
    }
}

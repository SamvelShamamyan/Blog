<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Exceptions\InvalidOrderException;
use Illuminate\Http\Request;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $this->service->store($data);

       return redirect()->route('admin.post.index');
    }
}

// Category::firsOrCreate(['titie'=>$data['title']]);

//$mainImage = $data['main_image'];
//$previewImagePath = Storage::put('/images', $previewImage);
//dd($previewImagePath);
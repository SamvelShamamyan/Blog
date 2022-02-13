<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'=>'required|string',
            'content'=>'required|string',
            'preview_image'=>'required|file',
            'main_image'=>'required|file',
            'category_id'=>'required|integer|exists:categories,id',
            'tag_ids'=>'nullable|array',
            'tag_ids.*'=>'nullable|integer|exists:tags,id',
        ];
    }


    // public function messages()
    // {
    //     return [
    //     'title.required'=>'Это поле необходимо для заполнение',
    //     'title.string'=>'Данные должны соответствовать к строчному типу',
    //     'content.required'=>'Это поле необходимо для заполнение',
    //     'content.string'=>'Данные должны соответствовать к строчному типу',
    //     'preview_image.required'=>'Это поле необходимо для заполнение'
    //     'preview_image.file'=>'Вы должны выбрать файл',
    //     ];

    // }
}

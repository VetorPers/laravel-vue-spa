<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
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
            'user_name'=>'required|max:20',
            'title'=>'required|min:3|max:200',
        ];
    }

    public function messages()
    {
        return [
            'user_name.required'=>'姓名不能为空',
            'user_name.max'=>'姓名不能大于20个字符',
            'title.required'=>'标题不能为空',
            'title.min'=>'标题不能少于3个字符',
        ];
    }
}

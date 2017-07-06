<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMessageRequest extends FormRequest
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
            'to_user_id' => 'required',
            'body' => 'required|max:100'
        ];
    }

    public function messages()
    {
        return [
            'body.required' => '请输入内容',
            'body.max' => '你的私信内容太长了'
        ];
    }
}

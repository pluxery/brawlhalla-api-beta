<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
        //todo add |nullable
        return [
            'id'=>'required|integer',
            'title' => 'string',
            'user_id' => 'required|integer',
            'content' => 'string',
            'category' => '',
            'tags' => 'array',
            'likes' => 'integer'
        ];
    }
}

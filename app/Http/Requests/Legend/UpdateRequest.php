<?php

namespace App\Http\Requests\Legend;

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
        return [
            'name' => 'string',
            'image' => 'string',
            'history' => 'string',
            'first_weapon' => '',//define struct
            'second_weapon' => '', //define struct
            'stats' => '',//define struct
        ];
    }
}

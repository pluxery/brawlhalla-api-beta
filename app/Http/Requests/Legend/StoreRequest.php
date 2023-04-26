<?php

namespace App\Http\Requests\Legend;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string',
            'image' => 'string',
            'history' => 'string',
            'first_weapon' => '',//define struct
            'second_weapon' => '', //define struct
            'stats' => '',//define struct
        ];
    }
}

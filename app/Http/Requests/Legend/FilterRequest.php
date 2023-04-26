<?php

namespace App\Http\Requests\Legend;

use Illuminate\Foundation\Http\FormRequest;

class FilterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'string',
            'weapons_or' => 'array',
            'weapons_and' => 'array',
        ];
    }
}

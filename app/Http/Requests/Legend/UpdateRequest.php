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
            'id' => 'required|integer',
            'name' => 'string',
            'image' => 'string',
            'history' => 'string',
            'first_weapon_id' => 'integer',//define struct
            'second_weapon_id' => 'integer', //define struct
            'stats_id' => 'integer',//define struct
        ];
    }
}

<?php

namespace App\Http\Requests\Stat;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStatRequest extends FormRequest
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
        return
            [
                'id'=>'required|integer',
                'attack' => 'integer',
                'dexterity' => 'integer',
                'defend' => 'integer',
                'speed' => 'integer',
            ];

    }
}

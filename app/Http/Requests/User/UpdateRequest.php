<?php

namespace App\Http\Requests\User;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['string', 'max:255'],
            'about' => ['string'],
            'email' => [
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'avatar' => ['file'],
            'favorite_legends' => ['array'],
            'steam_link' => ['string'],
            'elo' => ['integer', 'min:750', 'max:3000']
        ];
    }

}

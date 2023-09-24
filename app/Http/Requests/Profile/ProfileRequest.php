<?php

namespace App\Http\Requests\Profile;

use App\Enum\Salutation;
use App\Models\Profile;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'string|max:250',
            'salutation' => [new Enum(Salutation::class)],
            'firstname' => 'required|string|max:250',
            'lastname' => 'required|string|max:250',
            'avatar' => 'image|mimes:jpeg,jpg,png',
        ];
    }
}

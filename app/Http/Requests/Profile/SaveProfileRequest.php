<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;

class SaveProfileRequest extends FormRequest
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
            'firstname' => 'required',
            'name' => 'required',
            'email' => 'email',
            'address' => 'nullable|string',
            'phone_1' => 'nullable|string',
            'phone_2' => 'nullable|string',
            'profile_photo' => 'nullable|array',
        ];
    }
}

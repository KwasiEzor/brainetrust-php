<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthUserWithInfosRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => 'required|email|unique:users',
            'name' => 'required|string|max:50',
            'profile_img' => 'sometimes|file|mimes:png,jpg,jpeg|max:3500',
            'birthday' => 'sometimes|date',
            'zip_code' => 'sometimes|string',
            'address' => 'sometimes|string|min:20|max:255',
            'phone' => 'sometimes|string|min:20|max:30',
        ];
    }
}

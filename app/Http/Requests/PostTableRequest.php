<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostTableRequest extends FormRequest
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
            //
            'title' => 'required|min:4',
            'slug' => 'required',
            'content' => 'required|min:8',
            'image_url' => 'image',
            'video_url' => 'url'
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFrameRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'photo_url' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'filename' => 'string|required',
        ];
    }
    public function messages()
    {

        return [
            'title.required' => 'The title field is required.',
            'photo_url' => 'The photo Url is required',
            'filename.required' => 'filename is required',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CropRequest extends FormRequest
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
            'title' => 'string|max:255',
            'filename' => 'string|max:255',
            'croppedImageData' => 'nullable', // You can adjust this rule based on your requirements
            'marginTop' => 'nullable',
            'marginBottom' => 'nullable',
            'marginLeft' => 'nullable',
            'marginRight' => 'nullable',
            'dataX' => 'required|numeric',
            'dataY' => 'required|numeric',
            'dataHeight' => 'required|numeric',
            'dataWidth' => 'required|numeric',
        ];
    }
    public function getMarginDetails(): array
    {
        return [
            'marginTop' => $this->validated()['marginTop'],
            'marginBottom' => $this->validated()['marginBottom'],
            'marginLeft' => $this->validated()['marginLeft'],
            'marginRight' => $this->validated()['marginRight'],
        ];
    }
}

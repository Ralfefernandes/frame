<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientDataEditRequest extends FormRequest
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
            'name' => 'required',
            'logo' => 'image',
            'primary_color' => 'required|regex:/^rgb\((\d{1,3}), (\d{1,3}), (\d{1,3})\)$/',
            'second_color' => 'required|regex:/^rgb\((\d{1,3}), (\d{1,3}), (\d{1,3})\)$/',
            'collect_email' => 'boolean',
            'consent_for_questions' => 'boolean',
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'You need to fill your name',
            'primary_color' => 'Primary Color',
            'second_color' => 'Secondary Color',
            'collect_email' => 'Collect Email',
            'consent_for_questions' => 'Consent for Questions',
        ];
    }
}

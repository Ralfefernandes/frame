<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientDataRequest extends FormRequest
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
            'logo' => 'required|image',
            'primary_color' => 'nullable',
            'second_color' => 'nullable',
            'collect_email' => 'boolean',
            'consent_for_questions' => 'boolean',
            'nullable' => 'nullable',

        ];
    }
    public function attributes()
    {
        return [
            'primary_color' => 'Primary Color',
            'second_color' => 'Secondary Color',
            'collect_email' => 'Collect Email',
            'consent_for_questions' => 'Consent for Questions',
        ];
    }


}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
            'nom' => 'required|string|max:255|unique:brands,nom',
            'description' => 'nullable|string',
            'logo' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'nom.required' => 'Le nom de la marque est obligatoire',
            'nom.unique' => 'Cette marque existe déjà',
            'nom.max' => 'Le nom ne doit pas dépasser 255 caractères',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class HeroSectionRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Autoriser tous les utilisateurs (à adapter selon votre système d'authentification)
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'thumbnail' => 'required|image|max:2048|mimes:jpg,jpeg,png',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Le nom est obligatoire',
            'name.max' => 'Le nom ne doit pas dépasser 255 caractères',
            'description.required' => 'La description est obligatoire',
            'thumbnail.required' => 'Une image est requise',
            'thumbnail.image' => 'Le fichier doit être une image',
            'thumbnail.max' => "L'image ne doit pas dépasser 2Mo",
            'thumbnail.mimes' => "L'image doit être au format JPG, JPEG ou PNG",
        ];
    }
}
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TenueRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'prix' => 'required|numeric',
            'categorie_id' => 'required|exists:categories,id',
            'taille' => 'required|string',
            'couleur' => 'required|string',
            'disponible' => 'required|boolean',
            'image' => 'nullable|image',
            'date_creation' => 'required|date',
            'materiau' => 'required|string',
            'marque' => 'required|string',
            'reference' => 'required|string',
            'promotion' => 'nullable|integer',
        ];
    }
}
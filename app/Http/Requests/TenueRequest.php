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
            'images.*' => 'nullable|image',
            'date_creation' => 'required|date',
            'materiau' => 'required|string',
            'marque' => 'required|string',
            'reference' => 'required|string',
            'promotion' => 'nullable|integer',
            'league' => 'nullable|string|max:255', 
            'equipe' => 'nullable|string|max:255', 
            'quantite' => 'required|integer|min:0', 
            'statut' => 'required|in:published,pending,archive', 
            'premier_prix' => 'nullable|numeric',
             'joueur'=>'nullable|string',
             'number'=>'nullable|integer',
             'brand_id' => 'required|exists:brands,id',
        ];
    }

    public function messages()
    {
        return [
          
            'nom.required' => 'Le nom de la tenue est obligatoire.',
            'nom.string' => 'Le nom de la tenue doit être une chaîne de caractères.',
            'nom.max' => 'Le nom de la tenue ne doit pas dépasser :max caractères.',

            'number.integer'=>'La number doit être un nombre entier.',

            'joueur.string'=>'Le nom de le joueur doit être une chaîne de caractères',

            'prix.required' => 'Le prix est obligatoire.',
            'prix.numeric' => 'Le prix doit être un nombre.',

            'categorie_id.required' => 'La catégorie est obligatoire.',
            'categorie_id.exists' => 'La catégorie sélectionnée est invalide.',

          
            'taille.required' => 'La taille est obligatoire.',
            'taille.string' => 'La taille doit être une chaîne de caractères.',

            'couleur.required' => 'La couleur est obligatoire.',
            'couleur.string' => 'La couleur doit être une chaîne de caractères.',

            
            'disponible.required' => 'La disponibilité est obligatoire.',
            'disponible.boolean' => 'La disponibilité doit être "vrai" ou "faux".',

            'image.image' => 'Le fichier doit être une image.',

            
            'date_creation.required' => 'La date de création est obligatoire.',
            'date_creation.date' => 'La date de création doit être une date valide.',

         
            'materiau.required' => 'Le matériau est obligatoire.',
            'materiau.string' => 'Le matériau doit être une chaîne de caractères.',

           
            'marque.required' => 'La marque est obligatoire.',
            'marque.string' => 'La marque doit être une chaîne de caractères.',

            'reference.required' => 'La référence est obligatoire.',
            'reference.string' => 'La référence doit être une chaîne de caractères.',

         
            'promotion.integer' => 'La promotion doit être un nombre entier.',

           
            'league.string' => 'La ligue doit être une chaîne de caractères.',
            'league.max' => 'La ligue ne doit pas dépasser :max caractères.',

            'equipe.string' => 'L\'équipe doit être une chaîne de caractères.',
            'equipe.max' => 'L\'équipe ne doit pas dépasser :max caractères.',

            'quantite.required' => 'La quantité est obligatoire.',
            'quantite.integer' => 'La quantité doit être un nombre entier.',
            'quantite.min' => 'La quantité ne peut pas être négative.',

            
            'statut.required' => 'Le statut est obligatoire.',
            'statut.in' => 'Le statut doit être "published", "pending" ou "archive".',

            'premier_prix.numeric' => 'Le premier prix doit être un nombre.',
        ];
    }
}
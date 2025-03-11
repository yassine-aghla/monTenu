@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Ajouter une Tenue</h1>
    <form action="{{ route('tenues.create') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="nom" class="block text-gray-700">Nom de la tenue</label>
            <input type="text" name="nom" id="nom" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
        </div>
        <div class="mb-4">
            <label for="description" class="block text-gray-700">Description</label>
            <textarea name="description" id="description" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></textarea>
        </div>
        <div class="mb-4">
            <label for="prix" class="block text-gray-700">Prix</label>
            <input type="number" name="prix" id="prix" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
        </div>
        <div class="mb-4">
            <label for="categorie" class="block text-gray-700">Catégorie</label>
            <select name="categorie" id="categorie" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                <option value="homme">Homme</option>
                <option value="femme">Femme</option>
                <option value="enfant">Enfant</option>
                <option value="sport">Sport</option>
            </select>
        </div>
        <div class="mb-4">
            <label for="taille" class="block text-gray-700">Taille</label>
            <select name="taille" id="taille" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="XL">XL</option>
            </select>
        </div>
        <div class="mb-4">
            <label for="couleur" class="block text-gray-700">Couleur</label>
            <input type="text" name="couleur" id="couleur" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
        </div>
        <div class="mb-4">
            <label for="disponible" class="block text-gray-700">Disponibilité</label>
            <select name="disponible" id="disponible" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                <option value="1">Disponible</option>
                <option value="0">Non disponible</option>
            </select>
        </div>
        <div class="mb-4">
            <label for="image" class="block text-gray-700">Image</label>
            <input type="file" name="image" id="image" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
        </div>
        <div class="mb-4">
            <label for="date_creation" class="block text-gray-700">Date de création</label>
            <input type="date" name="date_creation" id="date_creation" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
        </div>
        <div class="mb-4">
            <label for="materiau" class="block text-gray-700">Equipe</label>
            <input type="text" name="materiau" id="materiau" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
        </div>
        <div class="mb-4">
            <label for="marque" class="block text-gray-700">Marque</label>
            <input type="text" name="marque" id="marque" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
        </div>
        <div class="mb-4">
            <label for="reference" class="block text-gray-700">Joueur</label>
            <input type="text" name="reference" id="reference" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
        </div>
        <div class="mb-4">
            <label for="promotion" class="block text-gray-700">Promotion</label>
            <input type="number" name="promotion" id="promotion" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="Pourcentage de réduction">
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Ajouter</button>
    </form>
</div>
@endsection
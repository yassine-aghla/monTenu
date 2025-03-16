@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Ajouter une Tenue</h1>

    <form action="{{ route('tenues.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-lg">
        @csrf


        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
          
            <div>
                <label for="nom" class="block text-sm font-medium text-gray-700">Nom de la tenue</label>
                <input type="text" name="nom" id="nom" class="mt-1 block w-full rounded-md border-gray-700 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>

            <div>
                <label for="categorie_id" class="block text-sm font-medium text-gray-700">Catégorie</label>
                <select name="categorie_id" id="categorie_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    @foreach ($categories as $categorie)
                    <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="mb-6">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" id="description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
        </div>

     
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">

            <div>
                <label for="prix" class="block text-sm font-medium text-gray-700">Prix</label>
                <input type="number" name="prix" id="prix" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>

    
            <div>
                <label for="taille" class="block text-sm font-medium text-gray-700">Taille</label>
                <select name="taille" id="taille" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                </select>
            </div>

            
            <div>
                <label for="couleur" class="block text-sm font-medium text-gray-700">Couleur</label>
                <input type="text" name="couleur" id="couleur" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>

            
            <div>
                <label for="disponible" class="block text-sm font-medium text-gray-700">Disponibilité</label>
                <select name="disponible" id="disponible" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    <option value="1">Disponible</option>
                    <option value="0">Non disponible</option>
                </select>
            </div>
        </div>


        <div class="mb-6">
            <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
            <input type="file" name="image" id="image" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
        </div>


        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
 
            <div>
                <label for="date_creation" class="block text-sm font-medium text-gray-700">Date de création</label>
                <input type="date" name="date_creation" id="date_creation" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>

       
            <div>
                <label for="materiau" class="block text-sm font-medium text-gray-700">Materiau</label>
                <input type="text" name="materiau" id="materiau" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>

         
            <div>
                <label for="marque" class="block text-sm font-medium text-gray-700">Marque</label>
                <input type="text" name="marque" id="marque" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>

 
            <div>
                <label for="reference" class="block text-sm font-medium text-gray-700">Référence</label>
                <input type="text" name="reference" id="reference" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>

  
            <div>
                <label for="promotion" class="block text-sm font-medium text-gray-700">Promotion</label>
                <input type="number" name="promotion" id="promotion" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" placeholder="Pourcentage de réduction">
            </div>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600 transition duration-300">
                Ajouter
            </button>
        </div>
    </form>
</div>
@endsection
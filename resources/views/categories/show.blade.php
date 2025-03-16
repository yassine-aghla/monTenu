@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Détails de la Catégorie</h1>
    <div class="bg-white p-6 rounded-lg shadow-md">
        <div class="mb-4">
            <label class="block text-gray-700">Nom de la catégorie</label>
            <p class="mt-1 block w-full rounded-md border-gray-300 shadow-sm p-2">{{ $categorie->name }}</p>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Description</label>
            <p class="mt-1 block w-full rounded-md border-gray-300 shadow-sm p-2">{{ $categorie->description }}</p>
        </div>
        <div class="flex space-x-2">
            <a href="{{ route('categories.edit', $categorie) }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">Modifier</a>
            <form action="{{ route('categories.destroy', $categorie) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md">Supprimer</button>
            </form>
        </div>
    </div>
</div>
@endsection
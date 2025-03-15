@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Ajouter une Catégorie</h1>
  <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="nom" class="block text-gray-700">Nom de la catégorie</label>
            <input type="text" name="name" id="nom" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
        </div>
        {{-- <div class="mb-4">
            <label for="description" class="block text-gray-700">Description</label>
            <textarea name="description" id="description" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></textarea>
        </div> --}}
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Ajouter</button>
    </form>
</div>
@endsection
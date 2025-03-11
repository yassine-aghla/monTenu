@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Ajouter un Client</h1>
    <form action="{{ route('clients.create') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="nom" class="block text-gray-700">Nom</label>
            <input type="text" name="nom" id="nom" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
        </div>
        <div class="mb-4">
            <label for="email" class="block text-gray-700">Email</label>
            <input type="email" name="email" id="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
        </div>
        <div class="mb-4">
            <label for="telephone" class="block text-gray-700">Téléphone</label>
            <input type="text" name="telephone" id="telephone" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
        </div>
        <div class="mb-4">
            <label for="adresse" class="block text-gray-700">Adresse</label>
            <textarea name="adresse" id="adresse" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></textarea>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Ajouter</button>
    </form>
</div>
@endsection
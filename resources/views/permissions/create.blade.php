@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Créer une Permission</h1>
    <form action="{{ route('permissions.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        @csrf

       
        <div class="mb-6">
            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nom de la Permission</label>
            <input type="text" name="name" id="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200" placeholder="Entrez le nom de la permission" required>
            
           
            @error('name')
                <div class="text-sm text-red-600 mt-2">{{ $message }}</div>
            @enderror
        </div>

       
        <div class="flex justify-end">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-200">
                Créer
            </button>
        </div>
    </form>
</div>
@endsection
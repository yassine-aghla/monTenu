@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Créer un Rôle</h1>
    <form action="{{ route('roles.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
    
        <div class="mb-6">
            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nom du Rôle</label>
            <input type="text" name="name" id="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200" placeholder="Entrez le nom du rôle" required>
            @error('name')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

     
        <div class="mb-6">
            <label for="permissions" class="block text-sm font-medium text-gray-700 mb-2">Permissions</label>
            <select name="permissions[]" id="permissions" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200" multiple>
                @foreach ($permissions as $permission)
                    <option value="{{ $permission->id }}" class="p-2 hover:bg-gray-100">{{ $permission->name }}</option>
                @endforeach
            </select>
            @error('permissions')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
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
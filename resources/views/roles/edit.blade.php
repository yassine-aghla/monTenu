@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Éditer le Rôle : {{ $role->name }}</h1>
    <form action="{{ route('roles.update', $role->id) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        @method('PUT')

        
        <div class="mb-6">
            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nom du Rôle</label>
            <input type="text" name="name" id="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200" value="{{ $role->name }}" placeholder="Entrez le nom du rôle" required>
        </div>

  
        <div class="mb-6">
            <label for="permissions" class="block text-sm font-medium text-gray-700 mb-2">Permissions</label>
            <select name="permissions[]" id="permissions" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200" multiple>
                @foreach ($permissions as $permission)
                    <option value="{{ $permission->id }}" {{ $role->permissions->contains($permission->id) ? 'selected' : '' }} class="p-2 hover:bg-gray-100">
                        {{ $permission->name }}
                    </option>
                @endforeach
            </select>
           
        </div>

        
        <div class="flex justify-end">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-200">
                Mettre à jour
            </button>
        </div>
    </form>
</div>
@endsection
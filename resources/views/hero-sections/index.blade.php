@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-2xl font-bold">Gestion des Hero Sections</h1>
        <a href="{{ route('hero-sections.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Ajouter</a>
    </div>

    <div class="bg-white rounded-lg shadow overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nom</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Image</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Statut</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($heroSections as $hero)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $hero->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <img src="{{ asset('storage/' . $hero->thumbnail_url) }}" alt="{{ $hero->name }}" class="h-10 w-10 rounded">
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($hero->is_active)
                            <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs">Active</span>
                        @else
                            <form action="{{ route('hero-sections.activate', $hero) }}" method="POST">
                                @csrf @method('PUT')
                                <button type="submit" class="text-blue-500 hover:text-blue-700">Activer</button>
                            </form>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap space-x-2">
                        <a href="{{ route('hero-sections.edit', $hero) }}" class="text-yellow-500 hover:text-yellow-700">Éditer</a>
                        <form action="{{ route('hero-sections.destroy', $hero) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('Supprimer cette hero section?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
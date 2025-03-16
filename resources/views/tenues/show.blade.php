@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Détails de la Tenue</h1>

    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
      
        @if ($tenue->image)
        <div class="w-full h-64 bg-gray-200 flex items-center justify-center">
            <img src="{{ asset('storage/' . $tenue->image) }}" alt="Image de la tenue" class="w-full h-full object-contain">
        </div>
        @else
        <div class="w-full h-64 bg-gray-200 flex items-center justify-center text-gray-500">
            <span>Aucune image disponible</span>
        </div>
        @endif


        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                <div>
                    <h2 class="text-xl font-semibold text-blue-700 mb-4">Informations de base</h2>
                    <div class="space-y-3">
                        <p><strong class="text-gray-600">Nom :</strong> <span class="text-gray-800">{{ $tenue->nom }}</span></p>
                        <p><strong class="text-gray-600">Description :</strong> <span class="text-gray-800">{{ $tenue->description }}</span></p>
                        <p><strong class="text-gray-600">Prix :</strong> <span class="text-gray-800">{{ $tenue->prix }} €</span></p>
                        <p><strong class="text-gray-600">Catégorie :</strong> <span class="text-gray-800">{{ $tenue->categorie->name }}</span></p>
                    </div>
                </div>

        
                <div>
                    <h2 class="text-xl font-semibold text-blue-700 mb-4">Détails supplémentaires</h2>
                    <div class="space-y-3">
                        <p><strong class="text-gray-600">Taille :</strong> <span class="text-gray-800">{{ $tenue->taille }}</span></p>
                        <p><strong class="text-gray-600">Couleur :</strong> <span class="text-gray-800">{{ $tenue->couleur }}</span></p>
                        <p><strong class="text-gray-600">Disponible :</strong> 
                            <span class="px-2 py-1 text-sm rounded-full {{ $tenue->disponible ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $tenue->disponible ? 'Oui' : 'Non' }}
                            </span>
                        </p>
                        <p><strong class="text-gray-600">Date de création :</strong> <span class="text-gray-800">{{ $tenue->date_creation }}</span></p>
                    </div>
                </div>
            </div>

            <div class="mt-6">
                <h2 class="text-xl font-semibold text-blue-700 mb-4">Autres informations</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <p><strong class="text-gray-600">Materiau :</strong> <span class="text-gray-800">{{ $tenue->materiau }}</span></p>
                    <p><strong class="text-gray-600">Marque :</strong> <span class="text-gray-800">{{ $tenue->marque }}</span></p>
                    <p><strong class="text-gray-600">Référence :</strong> <span class="text-gray-800">{{ $tenue->reference }}</span></p>
                    <p><strong class="text-gray-600">Promotion :</strong> <span class="text-gray-800">{{ $tenue->promotion }} %</span></p>
                </div>
            </div>
        </div>
    </div>

 
    <div class="mt-6">
        <a href="{{ route('tenues.index') }}" class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600 transition duration-300 inline-block">
            Retour à la liste
        </a>
    </div>
</div>
@endsection
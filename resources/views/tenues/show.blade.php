@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Détails de la Tenue</h1>

    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <!-- Image de la tenue -->
        {{-- @if ($tenue->image)
        <div class="w-full h-64 bg-gray-200 flex items-center justify-center">
            <img src="{{ asset('storage/' . $tenue->image) }}" alt="Image de la tenue" class="w-full h-full object-contain">
        </div>
        @else
        <div class="w-full h-64 bg-gray-200 flex items-center justify-center text-gray-500">
            <span>Aucune image disponible</span>
        </div>
        @endif --}}

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach($tenue->images as $image)
                <div class="bg-white rounded-lg shadow-md overflow-hidden relative"> 
                    <div class="absolute top-2 right-2"> 
                        <form action="{{ route('tenue-images.destroy', $image) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button 
                                type="submit" 
                                class="text-red-500 px-3 py-1 rounded-md hover:bg-red-300 transition duration-200"
                            >
                                <i class="fas fa-trash"></i> 
                            </button>
                        </form>
                    </div>
        
                    <!-- Image -->
                    <img 
                        src="{{ asset('storage/' . $image->image_path) }}" 
                        alt="Image de la tenue" 
                        class="w-full h-32 object-cover" <!-- Taille réduite de l'image -->
                    
                </div>
            @endforeach
        </div>

        <!-- Contenu détaillé -->
        <div class="p-6">
            <!-- Informations de base -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h2 class="text-xl font-semibold text-blue-700 mb-4">Informations de base</h2>
                    <div class="space-y-3">
                        <p><strong class="text-gray-600">Nom :</strong> <span class="text-gray-800">{{ $tenue->nom }}</span></p>
                        <p><strong class="text-gray-600">Description :</strong> <span class="text-gray-800">{{ $tenue->description }}</span></p>
                        <p><strong class="text-gray-600">Prix :</strong> <span class="text-gray-800">{{ $tenue->prix }} €</span></p>
                        <p><strong class="text-gray-600">joueur :</strong> <span class="text-gray-800">{{ $tenue->joueur }} </span></p>
                        <p><strong class="text-gray-600">number :</strong> <span class="text-gray-800">{{ $tenue->number }} </span></p>
                        <p><strong class="text-gray-600">Premier Prix :</strong> <span class="text-gray-800">{{ $tenue->premier_prix }} €</span></p>
                        <p><strong class="text-gray-600">Catégorie :</strong> <span class="text-gray-800">{{ $tenue->category->name }}</span></p>
                        <p><strong class="text-gray-600">Brand:</strong> <span class="text-gray-800">{{ $tenue->Brand->nom }}</span></p>
                    </div>
                </div>

                <!-- Détails supplémentaires -->
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

            <!-- Autres informations -->
            <div class="mt-6">
                <h2 class="text-xl font-semibold text-blue-700 mb-4">Autres informations</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <p><strong class="text-gray-600">Materiau :</strong> <span class="text-gray-800">{{ $tenue->materiau }}</span></p>
                    <p><strong class="text-gray-600">Marque :</strong> <span class="text-gray-800">{{ $tenue->marque }}</span></p>
                    <p><strong class="text-gray-600">Référence :</strong> <span class="text-gray-800">{{ $tenue->reference }}</span></p>
                    <p><strong class="text-gray-600">Quantité :</strong> <span class="text-gray-800">{{ $tenue->quantite }}</span></p>
                    <p><strong class="text-gray-600">Statut :</strong> 
                        <span class="px-2 py-1 text-sm rounded-full 
                            {{ $tenue->statut == 'published' ? 'bg-green-100 text-green-800' : 
                               ($tenue->statut == 'pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-gray-100 text-gray-800') }}">
                            {{ ucfirst($tenue->statut) }}
                        </span>
                    </p>
                    <p><strong class="text-gray-600">Ligue :</strong> <span class="text-gray-800">{{ $tenue->league }}</span></p>
                    <p><strong class="text-gray-600">Équipe :</strong> <span class="text-gray-800">{{ $tenue->equipe }}</span></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bouton de retour -->
    <div class="mt-6">
        <a href="{{ route('tenues.index') }}" class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600 transition duration-300 inline-block">
            Retour à la liste
        </a>
    </div>
</div>
@endsection
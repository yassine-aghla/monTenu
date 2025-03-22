@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Modifier la Tenue</h1>

    <form action="{{ route('tenues.update', $tenue->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-lg">
        @csrf
        @method('PUT')

        <!-- Nom et Catégorie -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <!-- Nom de la tenue -->
            <div>
                <label for="nom" class="block text-sm font-medium text-gray-700">Nom de la tenue</label>
                <input type="text" name="nom" id="nom" value="{{ old('nom', $tenue->nom) }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('nom') border-red-500 @enderror">
                @error('nom')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Catégorie -->
            <div>
                <label for="categorie_id" class="block text-sm font-medium text-gray-700">Catégorie</label>
                <select name="categorie_id" id="categorie_id"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('categorie_id') border-red-500 @enderror">
                    @foreach ($categories as $categorie)
                    <option value="{{ $categorie->id }}" {{ old('categorie_id', $tenue->categorie_id) == $categorie->id ? 'selected' : '' }}>{{ $categorie->name }}</option>
                    @endforeach
                </select>
                @error('categorie_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- Description -->
        <div class="mb-6">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" id="description" rows="3"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('description') border-red-500 @enderror">{{ old('description', $tenue->description) }}</textarea>
            @error('description')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Joueur et Numéro -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <!-- Joueur -->
            <div>
                <label for="joueur" class="block text-sm font-medium text-gray-700">Joueur</label>
                <input type="text" name="joueur" id="joueur" value="{{ old('joueur', $tenue->joueur) }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('joueur') border-red-500 @enderror">
                @error('joueur')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Numéro -->
            <div>
                <label for="number" class="block text-sm font-medium text-gray-700">Numéro</label>
                <input type="number" name="number" id="number" value="{{ old('number', $tenue->number) }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('number') border-red-500 @enderror">
                @error('number')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- Prix, Taille, Couleur, Disponibilité -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">


            
            <!-- Prix -->
            <div>
                <label for="prix" class="block text-sm font-medium text-gray-700">Prix</label>
                <input type="number" name="prix" id="prix" value="{{ old('prix', $tenue->prix) }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('prix') border-red-500 @enderror">
                @error('prix')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Taille -->
            <div>
                <label for="taille" class="block text-sm font-medium text-gray-700">Taille</label>
                <select name="taille" id="taille"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('taille') border-red-500 @enderror">
                    <option value="S" {{ old('taille', $tenue->taille) == 'S' ? 'selected' : '' }}>S</option>
                    <option value="M" {{ old('taille', $tenue->taille) == 'M' ? 'selected' : '' }}>M</option>
                    <option value="L" {{ old('taille', $tenue->taille) == 'L' ? 'selected' : '' }}>L</option>
                    <option value="XL" {{ old('taille', $tenue->taille) == 'XL' ? 'selected' : '' }}>XL</option>
                </select>
                @error('taille')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Couleur -->
            <div>
                <label for="couleur" class="block text-sm font-medium text-gray-700">Couleur</label>
                <input type="text" name="couleur" id="couleur" value="{{ old('couleur', $tenue->couleur) }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('couleur') border-red-500 @enderror">
                @error('couleur')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Disponibilité -->
            <div>
                <label for="disponible" class="block text-sm font-medium text-gray-700">Disponibilité</label>
                <select name="disponible" id="disponible"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('disponible') border-red-500 @enderror">
                    <option value="1" {{ old('disponible', $tenue->disponible) ? 'selected' : '' }}>Disponible</option>
                    <option value="0" {{ !old('disponible', $tenue->disponible) ? 'selected' : '' }}>Non disponible</option>
                </select>
                @error('disponible')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- Image -->
        {{-- <div class="mb-6">
            <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
            <input type="file" name="image" id="image"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('image') border-red-500 @enderror">
            @if ($tenue->image)
            <div class="mt-4">
                <p class="text-sm text-gray-600">Image actuelle :</p>
                <img src="{{ asset('storage/' . $tenue->image) }}" alt="Image actuelle" class="mt-2 w-48 rounded-md shadow-sm">
            </div>
            @endif
            @error('image')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div> --}}

        <div div class="mb-6">
            <label for="images">Images de la tenue</label>
            <input type="file" name="images[]" id="images" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('image') border-red-500 @enderror" multiple>
        </div>

        <!-- Date de création, Matériau, Marque, Référence, Promotion -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <!-- Date de création -->
            <div>
                <label for="date_creation" class="block text-sm font-medium text-gray-700">Date de création</label>
                <input type="date" name="date_creation" id="date_creation" value="{{ old('date_creation', $tenue->date_creation) }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('date_creation') border-red-500 @enderror">
                @error('date_creation')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Matériau -->
            <div>
                <label for="materiau" class="block text-sm font-medium text-gray-700">Matériau</label>
                <input type="text" name="materiau" id="materiau" value="{{ old('materiau', $tenue->materiau) }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('materiau') border-red-500 @enderror">
                @error('materiau')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Marque -->
            <div>
                <label for="marque" class="block text-sm font-medium text-gray-700">Marque</label>
                <input type="text" name="marque" id="marque" value="{{ old('marque', $tenue->marque) }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('marque') border-red-500 @enderror">
                @error('marque')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Référence -->
            <div>
                <label for="reference" class="block text-sm font-medium text-gray-700">Référence</label>
                <input type="text" name="reference" id="reference" value="{{ old('reference', $tenue->reference) }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('reference') border-red-500 @enderror">
                @error('reference')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Promotion -->
            <div>
                <label for="promotion" class="block text-sm font-medium text-gray-700">Promotion</label>
                <input type="number" name="promotion" id="promotion" value="{{ old('promotion', $tenue->promotion) }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('promotion') border-red-500 @enderror" placeholder="Pourcentage de réduction">
                @error('promotion')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- Nouveaux champs : League, Equipe, Quantité, Statut, Premier Prix -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <!-- League -->
            <div>
                <label for="league" class="block text-sm font-medium text-gray-700">Ligue</label>
                <input type="text" name="league" id="league" value="{{ old('league', $tenue->league) }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('league') border-red-500 @enderror">
                @error('league')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Equipe -->
            <div>
                <label for="equipe" class="block text-sm font-medium text-gray-700">Équipe</label>
                <input type="text" name="equipe" id="equipe" value="{{ old('equipe', $tenue->equipe) }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('equipe') border-red-500 @enderror">
                @error('equipe')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Quantité -->
            <div>
                <label for="quantite" class="block text-sm font-medium text-gray-700">Quantité</label>
                <input type="number" name="quantite" id="quantite" value="{{ old('quantite', $tenue->quantite) }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('quantite') border-red-500 @enderror" min="0">
                @error('quantite')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Statut -->
            <div>
                <label for="statut" class="block text-sm font-medium text-gray-700">Statut</label>
                <select name="statut" id="statut"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('statut') border-red-500 @enderror">
                    <option value="published" {{ old('statut', $tenue->statut) == 'published' ? 'selected' : '' }}>Publié</option>
                    <option value="pending" {{ old('statut', $tenue->statut) == 'pending' ? 'selected' : '' }}>En attente</option>
                    <option value="archive" {{ old('statut', $tenue->statut) == 'archive' ? 'selected' : '' }}>Archivé</option>
                </select>
                @error('statut')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Premier Prix -->
            <div>
                <label for="premier_prix" class="block text-sm font-medium text-gray-700">Premier Prix</label>
                <input type="number" name="premier_prix" id="premier_prix" value="{{ old('premier_prix', $tenue->premier_prix) }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('premier_prix') border-red-500 @enderror" step="0.01">
                @error('premier_prix')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- Bouton de soumission -->
        <div class="flex justify-end">
            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600 transition duration-300">
                Mettre à jour
            </button>
        </div>
    </form>
</div>
@endsection
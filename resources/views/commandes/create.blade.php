@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Ajouter une Commande</h1>
    <form action="{{ route('commandes.create') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="client_id" class="block text-gray-700">Client</label>
            <select name="client_id" id="client_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                <!-- Boucle pour afficher les clients -->
                {{-- @foreach($clients as $client) --}}
                <option value="">nom </option>
                {{-- @endforeach --}}
            </select>
        </div>
        <div class="mb-4">
            <label for="produit_id" class="block text-gray-700">Produit</label>
            <select name="produit_id" id="produit_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                <!-- Boucle pour afficher les produits -->
                {{-- @foreach($produits as $produit) --}}
                <option value="id">nom</option>
                {{-- @endforeach --}}
            </select>
        </div>
        <div class="mb-4">
            <label for="quantite" class="block text-gray-700">Quantité</label>
            <input type="number" name="quantite" id="quantite" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
        </div>
        <div class="mb-4">
            <label for="date_commande" class="block text-gray-700">Date de la commande</label>
            <input type="date" name="date_commande" id="date_commande" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
        </div>
        <div class="mb-4">
            <label for="adresse_livraison" class="block text-gray-700">Adresse de livraison</label>
            <textarea name="adresse_livraison" id="adresse_livraison" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required></textarea>
        </div>
        <div class="mb-4">
            <label for="methode_paiement" class="block text-gray-700">Méthode de paiement</label>
            <select name="methode_paiement" id="methode_paiement" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                <option value="carte">Carte de crédit</option>
                <option value="paypal">PayPal</option>
                <option value="virement">Virement bancaire</option>
            </select>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Ajouter</button>
    </form>
</div>
@endsection
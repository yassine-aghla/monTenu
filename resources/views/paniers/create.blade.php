@extends('layouts.app')

@section('content')
<form action="{{ route('paniers.create') }}" method="POST">
    @csrf
    <div class="mb-4">
        <label for="client_id" class="block text-gray-700">Client</label>
        <select name="client_id" id="client_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
            {{-- @foreach($clients as $client) --}}
            <option value="id ">nom</option>
            {{-- @endforeach --}}
        </select>
    </div>
    <div class="mb-4">
        <label for="produit_id" class="block text-gray-700">Produit</label>
        <select name="produit_id" id="produit_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
            {{-- @foreach($produits as $produit) --}}
            <option value="id">nom </option>
            {{-- @endforeach --}}
        </select>
    </div>
    <div class="mb-4">
        <label for="quantite" class="block text-gray-700">Quantité</label>
        <input type="number" name="quantite" id="quantite" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
    </div>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Ajouter au Panier</button>
</form>
@endsection
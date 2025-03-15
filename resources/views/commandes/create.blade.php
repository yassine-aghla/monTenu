@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md mb-6">
    <h2 class="text-xl font-semibold mb-4">Manage Commandes</h2>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">ID Commande</th>
                    <th class="py-2 px-4 border-b">Client</th>
                    <th class="py-2 px-4 border-b">Nombre des tenus</th>
                    <th class="py-2 px-4 border-b">Total</th>
                    <th class="py-2 px-4 border-b">Statut</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="py-2 px-4 border-b">101</td>
                    <td class="py-2 px-4 border-b">Jane Doe</td>
                    <td class="py-2 px-4 border-b">3 Tenus</td>
                    <td class="py-2 px-4 border-b">€200.00</td>
                    <td class="py-2 px-4 border-b">
                        <span class="bg-yellow-500 text-white px-2 py-1 rounded">En attente</span>
                    </td>
                    <td class="py-2 px-4 border-b">
                        <button class="bg-blue-500 text-white px-3 py-1 rounded">Voir</button>
                        <button class="bg-green-500 text-white px-3 py-1 rounded">Valider</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
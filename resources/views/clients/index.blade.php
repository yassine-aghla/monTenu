@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-xl font-semibold mb-4">Gestion des Clients</h2>
    
    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
            <p>{{ session('success') }}</p>
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">ID Client</th>
                    <th class="py-2 px-4 border-b">Nom</th>
                    <th class="py-2 px-4 border-b">Email</th>
                    <th class="py-2 px-4 border-b">Commandes</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clients as $client)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $client->id }}</td>
                    <td class="py-2 px-4 border-b">{{ $client->name }}</td>
                    <td class="py-2 px-4 border-b">{{ $client->email }}</td>
                    <td class="py-2 px-4 border-b">{{ $client->orders_count }} Commandes</td>
                     <td class="py-2 px-4 border-b space-x-2">
                                            @if($client->is_banned)
                                            <form action="{{ route('clients.Active', $client) }}" method="POST" class="inline">
                                                @csrf
                                                <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 transition">
                                                    Active
                                                </button>
                                            </form>
                                            @else
                                                <form action="{{ route('clients.ban', $client) }}" method="POST" class="inline">
                                                    @csrf
                                                    <button type="submit" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 transition">
                                                        Bannir
                                                    </button>
                                                </form>
                                            @endif
                                            
                                            <form action="{{ route('clients.destroy', $client) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition" 
                                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce client ?')">
                                                    Supprimer
                                                </button>
                                            </form>
                        </td>
                             
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
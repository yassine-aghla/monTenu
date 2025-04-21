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
                @foreach($orders as $order)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $order->id }}</td>
                    <td class="py-2 px-4 border-b">{{ $order->user->name }}</td>
                    <td class="py-2 px-4 border-b">
                        {{ $order->items->sum('quantity') }} Tenus
                    </td>
                    <td class="py-2 px-4 border-b">€{{ number_format($order->total, 2) }}</td>
                    <td class="py-2 px-4 border-b">
                        <span class="{{ $order->status_color_class }} px-2 py-1 rounded">
                            {{ $order->status_label }}
                        </span>
                    </td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('commandes.show', $order) }}" class="bg-blue-500 text-white px-3 py-1 rounded">Voir</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        <!-- Pagination -->
        <div class="mt-4">
            {{ $orders->links() }}
        </div>
    </div>
</div>
@endsection
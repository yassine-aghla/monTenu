@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    
    <div class="bg-white rounded-xl shadow-md overflow-hidden">
   
        <div class="bg-gradient-to-r from-blue-500 to-blue-600 p-6 text-white">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-bold">Commande #{{ $order->id }}</h1>
                    <p class="text-blue-100 mt-1">Passée le {{ $order->created_at->format('d/m/Y à H:i') }}</p>
                </div>
                <span class="{{ $order->status_color_class }} px-4 py-2 rounded-full text-sm font-semibold">
                    {{ $order->status_label }}
                </span>
            </div>
        </div>

       
        <div class="p-6 border-b">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Client</h3>
                    <p class="text-gray-600">{{ $order->user->name }}</p>
                    <p class="text-gray-500 text-sm mt-1">{{ $order->user->email }}</p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Adresse</h3>
                    <p class="text-gray-600">{{ $order->shipping_address }}</p>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg">
                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Résumé</h3>
                    <div class="flex justify-between py-2 border-b border-gray-200">
                        <span class="text-gray-600">Sous-total</span>
                        <span class="font-medium">{{ number_format($order->subtotal, 2) }}€</span>
                    </div>
                    <div class="flex justify-between py-2 border-b border-gray-200">
                        <span class="text-gray-600">Livraison</span>
                        <span class="font-medium">{{ number_format($order->shipping_cost, 2) }}€</span>
                    </div>
                    <div class="flex justify-between py-2">
                        <span class="text-gray-600 font-semibold">Total</span>
                        <span class="text-blue-600 font-bold text-lg">{{ number_format($order->total, 2) }}€</span>
                    </div>
                </div>
            </div>
        </div>

    
        <div class="p-6">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">Articles commandés</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Produit</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prix unitaire</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantité</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($order->items as $item)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-16 w-16">
                                        <img class="h-16 w-16 rounded-md object-cover" 
                                        src="{{ $item->tenue->images->isNotEmpty() ? asset('storage/'.$item->tenue->images->first()->image_path) : asset('images/default-product.jpg') }}" 
                                        alt="{{ $item->tenue->nom }}">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $item->tenue->nom }}</div>
                                        <div class="text-sm text-gray-500">Réf: {{ $item->tenue->reference }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ number_format($item->tenue->prix, 2) }}€
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $item->quantity }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ number_format($item->tenue->prix * $item->quantity, 2) }}€
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    
        <div class="bg-gray-500 px-6 py-4 flex justify-end space-x-4">
            <a href="{{ route('commandes.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Retour aux commandes
            </a>
            
        </div>
    </div>
</div>
@endsection
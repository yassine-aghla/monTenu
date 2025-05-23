@extends('layouts.app')

@section('content')

<header class="bg-white shadow-sm mb-6 p-6 flex justify-between items-center rounded-lg">
    <h1 class="text-2xl font-bold text-gray-800">Tableau de bord</h1>
    <div class="flex space-x-4">
        <select class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg px-4 py-2 focus:ring-blue-500 focus:border-blue-500">
            <option>Aujourd'hui</option>
            <option>Cette semaine</option>
            <option>Ce mois</option>
            <option>Cette année</option>
        </select>
        <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
            </svg>
            Exporter
        </button>
    </div>
</header>


<main class="space-y-6">
   

<div class="container mx-auto px-4 py-8">


    <!-- Cartes de Statistiques -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Revenu Total -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="bg-blue-100 rounded-full p-3 mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Revenu total</p>
                        <h2 class="text-2xl font-bold">{{ number_format($totalRevenue, 2) }} €</h2>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Nouveaux Clients -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="bg-purple-100 rounded-full p-3 mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Nouveaux clients (30j)</p>
                        <h2 class="text-2xl font-bold">{{ $newCustomers }}</h2>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Commandes en Attente -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="bg-yellow-100 rounded-full p-3 mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Commandes en attente</p>
                        <h2 class="text-2xl font-bold">{{ $pendingOrders }}</h2>
                    </div>
                </div>
            </div>
        </div>
           <!-- Total Tenues -->
       <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="p-6">
            <div class="flex items-center">
                <div class="bg-green-100 rounded-full p-3 mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <div>
                    <p class="text-gray-500 text-sm">Total Tenues</p>
                    <h2 class="text-2xl font-bold">{{ $stats['total_tenues'] }}</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Catégories -->
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="p-6">
            <div class="flex items-center">
                <div class="bg-red-100 rounded-full p-3 mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" />
                    </svg>
                </div>
                <div>
                    <p class="text-gray-500 text-sm">Total Catégories</p>
                    <h2 class="text-2xl font-bold">{{ $stats['total_categories'] }}</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Marques -->
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="p-6">
            <div class="flex items-center">
                <div class="bg-indigo-100 rounded-full p-3 mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
                <div>
                    <p class="text-gray-500 text-sm">Total Marques</p>
                    <h2 class="text-2xl font-bold">{{ $stats['total_brands'] }}</h2>
                </div>
            </div>
        </div>
    </div>
    </div>

    


    <!-- Tableau des dernières transactions -->
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-bold text-gray-800">Dernières transactions</h3>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Client</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Produit</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Montant</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($recentOrders as $order)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-500">
                                        {{ substr($order->user->name, 0, 1) }}
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $order->user->name }}</div>
                                        <div class="text-sm text-gray-500">{{ $order->user->email }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">
                                    @foreach($order->items as $item)
                                        {{ $item->tenue->nom }}@if(!$loop->last), @endif
                                    @endforeach
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $order->created_at->format('d M Y') }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{ number_format($order->total, 2) }} €</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @php
                                    $statusClasses = [
                                        'pending' => 'bg-yellow-100 text-yellow-800',
                                        'completed' => 'bg-green-100 text-green-800',
                                        'failed' => 'bg-red-100 text-red-800',
                                        'refunded' => 'bg-blue-100 text-blue-800'
                                    ];
                                @endphp
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $statusClasses[$order->status] }}">
                                    {{ $order->status }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

      
        
</main>
@endsection



                                
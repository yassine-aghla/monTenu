@extends('layouts.app')

@section('content')
<!-- Header avec titre et filtres -->
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

<!-- Main Content -->
<main class="space-y-6">
    <!-- Cartes de statistiques -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Carte de statistique 1 -->
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
                        <h2 class="text-2xl font-bold">€24,568</h2>
                    </div>
                </div>
                <div class="mt-4">
                    <div class="flex items-center">
                        <span class="text-green-500 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                            </svg>
                            <span class="ml-1">8.2%</span>
                        </span>
                        <span class="text-gray-500 text-sm ml-2">vs mois précédent</span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Carte de statistique 2 -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="bg-purple-100 rounded-full p-3 mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Nouveaux clients</p>
                        <h2 class="text-2xl font-bold">842</h2>
                    </div>
                </div>
                <div class="mt-4">
                    <div class="flex items-center">
                        <span class="text-green-500 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                            </svg>
                            <span class="ml-1">12.5%</span>
                        </span>
                        <span class="text-gray-500 text-sm ml-2">vs mois précédent</span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Carte de statistique 3 -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="bg-green-100 rounded-full p-3 mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Taux de conversion</p>
                        <h2 class="text-2xl font-bold">3.6%</h2>
                    </div>
                </div>
                <div class="mt-4">
                    <div class="flex items-center">
                        <span class="text-red-500 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                            </svg>
                            <span class="ml-1">1.8%</span>
                        </span>
                        <span class="text-gray-500 text-sm ml-2">vs mois précédent</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <!-- Tableau des dernières ventes -->
  <div class="bg-white shadow-md rounded-lg overflow-hidden">
    <div class="p-6">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-bold text-gray-800">Dernières transactions</h3>
            <button class="text-blue-600 text-sm font-medium">Voir tout</button>
        </div>
       
    </div>
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
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-500">ML</div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">Marie Lemaire</div>
                                <div class="text-sm text-gray-500">marie@example.com</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">Tenu Real Madrid</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">12 Feb 2025</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">€899.00</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Complété</span>
                    </td>
                </tr>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-500">JD</div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">Jean Dupont</div>
                                <div class="text-sm text-gray-500">jean@example.com</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">Tenu GalataSaray</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">10 Feb 2025</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">€129.00</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">En attente</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <!-- Graphiques -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Graphique des ventes -->
       <!-- Conteneur pour la courbe statique -->
<div class="bg-white shadow-md rounded-lg overflow-hidden">
    <div class="p-6">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-bold text-gray-800">Statistiques mensuelles</h3>
        </div>
        <!-- Conteneur du graphique de la même hauteur que demographyChart -->
        <div class="w-full" style="height: 256px;">
            <canvas id="courbeStatique"></canvas>
        </div>
    </div>
</div>

        <!-- Graphique de démographie -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold text-gray-800">Démographie des clients</h3>
                    <select class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg px-2 py-1 text-sm">
                        <option>Par âge</option>
                        <option>Par genre</option>
                        <option>Par région</option>
                    </select>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <canvas id="demographyChart" class="w-full h-64"></canvas>
                    </div>
                    <div class="flex flex-col justify-center space-y-4">
                        <div class="flex items-center">
                            <div class="w-4 h-4 rounded-full bg-blue-500 mr-2"></div>
                            <div>
                                <p class="text-gray-700">Hommes</p>
                                <p class="text-xl font-bold">60%</p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <div class="w-4 h-4 rounded-full bg-pink-500 mr-2"></div>
                            <div>
                                <p class="text-gray-700">Femmes</p>
                                <p class="text-xl font-bold">40%</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

  
</main>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Graphique des ventes avec période plus courte
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('courbeStatique').getContext('2d');
        const courbeStatique = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Août', 'Sep', 'Oct', 'Nov', 'Déc'],
                datasets: [{
                    label: 'Données 2025',
                    data: [12, 19, 15, 17, 22, 24, 20, 18, 24, 25, 22, 28],
                    borderColor: 'rgb(79, 70, 229)',
                    backgroundColor: 'rgba(79, 70, 229, 0.1)',
                    borderWidth: 2,
                    tension: 0.4,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            drawBorder: false
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });
    });

    // Graphique de démographie
    const demographyCtx = document.getElementById('demographyChart').getContext('2d');
    const demographyChart = new Chart(demographyCtx, {
        type: 'doughnut',
        data: {
            labels: ['Hommes', 'Femmes'],
            datasets: [{
                data: [60, 40],
                backgroundColor: [
                    'rgb(59, 130, 246)',
                    'rgb(236, 72, 153)'
                ],
                borderWidth: 0,
                hoverOffset: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '70%',
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });
</script>
@endsection
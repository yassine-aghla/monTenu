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
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Dashboard' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    @if (!isset($isAuthPage) || !$isAuthPage)
        <div class="min-h-screen flex">
            
            <aside class="w-64 bg-white shadow-md p-4">
                <h2 class="text-xl font-bold mb-4">Dashboard</h2>
                <nav>
                    <ul class="space-y-2">
                        <li><a href="{{ route('dashboard') }}" class="block p-2 bg-gray-200 rounded">Dashboard</a></li>
                        <li><a href="{{ route('tenues.index') }}" class="block p-2 bg-gray-100 rounded">Manage Tenues</a></li>
                        <li>
                            <a href="{{ route('clients.create') }}" class="block p-2 hover:bg-gray-100 rounded">Manage Clients</a>
                        </li>
                        <li><a href="{{ route('categories.index') }}" class="block p-2 hover:bg-gray-100 rounded">Manage Categories</a></li>
                        <li><a href="{{ route('commandes.create') }}" class="block p-2 hover:bg-gray-100 rounded">Manage Commandes</a></li>
                        <li>
                            <a href="{{ route('paniers.create') }}" class="block p-2 hover:bg-gray-100 rounded">Manage Panier</a>
                        </li>
                        <li>
                            <a href="{{ route('logout.submit') }}" class="block p-2 hover:bg-gray-100 rounded">logout</a>
                        </li>
                    </ul>
                </nav>
            </aside>
            
            <div class="flex-1 flex flex-col">
                
                <header class="bg-white shadow-md p-4 flex justify-between items-center">
                    <input type="text" placeholder="Rechercher..." class="border p-2 rounded w-1/3">
                    <div class="flex items-center space-x-4">
                        <button class="relative">
                            <span class="absolute top-0 right-0 bg-red-500 text-white text-xs rounded-full px-1">3</span>
                            🔔
                        </button>
                        <img src="{{ asset('images/image.png') }}" alt="Admin" class="w-10 h-10 rounded-full">
                    </div>
                </header>
                
                
                <main class="p-6">
                    @yield('content')
                </main>
            </div>
        </div>
    @else
        <!-- Si c'est une page d'authentification, afficher uniquement le contenu -->
        <main class="min-h-screen flex items-center justify-center">
            @yield('content')
        </main>
    @endif
    
    @yield('scripts')
</body>
</html>
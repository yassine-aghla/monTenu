<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Dashboard' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-gray-100">

    @if (!isset($isAuthPage) || !$isAuthPage)
        <div class="min-h-screen flex">
            
            <aside class="w-64 bg-white shadow-md p-4">
                <h2 class="text-xl font-bold mb-4">Dashboard</h2>
                <nav>
                    <ul class="space-y-2">
                        <li><a href="{{ route('dashboard') }}" class="block p-2 bg-gray-200 rounded">Dashboard</a></li>
                        <li><a href="{{ route('tenues.index') }}" class="block p-2 hover:bg-gray-100 rounded">Manage Tenues</a></li>
                        <li>
                            <a href="{{ route('clients.index') }}" class="block p-2 hover:bg-gray-100 rounded">Manage Clients</a>
                        </li>
                        <li><a href="{{ route('categories.index') }}" class="block p-2 hover:bg-gray-100 rounded">Manage Categories</a></li>
                        <li><a href="{{ route('commandes.index') }}" class="block p-2 hover:bg-gray-100 rounded">Manage Commandes</a></li>
                      
                        <li>
                            <a href="{{ route('roles.index') }}" class="block p-2 hover:bg-gray-100 rounded">Manage Roles</a>
                        </li>
                        <li>
                            <a href="{{ route('permissions.index') }}" class="block p-2 hover:bg-gray-100 rounded">Manage Permissions</a>
                        </li>
                        <li>
                            <a href="{{ route('brands.index') }}" class="block p-2 hover:bg-gray-100 rounded">Manage Brands</a>
                        </li>
                        <li>
                            <a href="{{ route('hero-sections.index') }}" class="block p-2 hover:bg-gray-100 rounded">Manage Sliders</a>
                        </li>
                        <li>
                            <a href="{{ route('logout.submit') }}" class="block p-2 hover:bg-gray-100 rounded">logout</a>
                        </li>

                    </ul>
                </nav>
            </aside>
            
            <div class="flex-1 flex flex-col">
                
                <header class="bg-white shadow-md p-4 flex justify-end items-center">
                   
                    <div class="flex items-end space-x-4">
                       
                        <img src="{{ asset('images/image.png') }}" alt="Admin" class="w-10 h-10 rounded-full">
                    </div>
                </header>
                
                
                <main class="p-6">
                    @yield('content')
                </main>
            </div>
        </div>
    @else
        
        <main class="min-h-screen flex items-center justify-center">
            @yield('content')
        </main>
    @endif
    
    @yield('scripts')
</body>
</html>
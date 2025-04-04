<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Football Marketplace - Tenues de Football Premium</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Montserrat', sans-serif;
            scroll-behavior: smooth;
        }
        
        .hero-gradient {
            background: linear-gradient(135deg, rgba(0,35,89,0.9) 0%, rgba(0,61,153,0.8) 100%);
        }
        
        .product-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        
        .animated-button {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        
        .animated-button:before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: all 0.6s ease;
        }
        
        .animated-button:hover:before {
            left: 100%;
        }
        
        .testimonial-card {
            transition: transform 0.3s ease;
        }
        
        .testimonial-card:hover {
            transform: scale(1.03);
        }
        
        .accordion-item {
            transition: all 0.3s ease;
        }
        
        .accordion-item:hover {
            background-color: #f3f4f6;
        }
        
        .nav-link {
            position: relative;
        }
        
        .nav-link:after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -2px;
            left: 0;
            background-color: white;
            transition: width 0.3s ease;
        }
        
        .nav-link:hover:after {
            width: 100%;
        }
    </style>
</head>
<body class="bg-gray-50">
  
    <header class="bg-gradient-to-r from-blue-900 to-blue-700 text-white py-4 sticky top-0 z-50 shadow-lg">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <div class="flex items-center">
                <i class="fas fa-futbol text-2xl mr-3 animate-bounce"></i>
                <h1 class="text-2xl font-bold">Football Marketplace</h1>
            </div>
            <nav class="hidden md:block">
                <ul class="flex space-x-6">
                    <li><a href="{{ route('home') }}" class="nav-link font-medium">Accueil</a></li>
                    <li><a href="{{ route('shop.index') }}" class="nav-link font-medium">Boutique</a></li>
                    <li>
                        <a href="{{ route('wishlist.index') }}" class="nav-link font-medium flex items-center">
                            <i class="far fa-heart mr-1"></i> Wishlist
                            @auth
                                <span class="ml-1 bg-blue-500 text-white text-xs px-2 py-1 rounded-full">
                                    {{ auth()->user()->wishlistTenues->count() }}
                                </span>
                            @endauth
                        </a>
                    </li>
                    <li><a href="" class="nav-link font-medium">À propos</a></li>
                    <li><a href="" class="nav-link font-medium">Contact</a></li>
                </ul>
            </nav>
            <div class="flex items-center space-x-4">
                <a href="{{ route('login') }}" class="bg-white text-blue-800 px-4 py-2 rounded-full font-medium hover:bg-blue-100 transition">
                    <i class="fas fa-user mr-2"></i>Connexion
                </a>
                <button class="md:hidden text-white focus:outline-none">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </div>
    </header>
    
<div class="container mx-auto px-4 py-8">
    <div class="flex flex-col md:flex-row gap-8">
      
        <div class="md:w-1/4 bg-white p-6 rounded-lg shadow">
            <h2 class="text-xl font-bold mb-4">Filtrer</h2>
            
           
            <form action="{{ route('shop.index') }}" method="GET" id="filter-form">
                
              
                <div class="mb-6">
                    <input type="text" name="search" placeholder="Rechercher..." 
                           class="w-full px-4 py-2 border rounded-lg" 
                           value="{{ request('search') }}"
                           onchange="document.getElementById('filter-form').submit()">
                </div>

                
                <div class="mb-6">
                    <h3 class="font-semibold mb-2">Marque</h3>
                    <select name="brand" class="w-full px-4 py-2 border rounded-lg"
                            onchange="document.getElementById('filter-form').submit()">
                        <option value="">Toutes les marques</option>
                        @foreach($brands as $brand)
                        <option value="{{ $brand->id }}" 
                            {{ request('brand') == $brand->id ? 'selected' : '' }}>
                            {{ $brand->nom }}
                        </option>
                        @endforeach
                    </select>
                </div>

                
                <div class="mb-6">
                    <h3 class="font-semibold mb-2">Catégorie</h3>
                    <select name="category" class="w-full px-4 py-2 border rounded-lg"
                            onchange="document.getElementById('filter-form').submit()">
                        <option value="">Toutes les catégories</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>
                </div>

               
                <div class="mb-6">
                    <h3 class="font-semibold mb-2">Équipe</h3>
                    <input type="text" name="equipe" placeholder="Filtrer par équipe..."
                           class="w-full px-4 py-2 border rounded-lg"
                           value="{{ request('equipe') }}"
                           onchange="document.getElementById('filter-form').submit()">
                </div>

               
                <a href="{{ route('shop.index') }}" class="text-blue-600 hover:text-blue-800 text-sm">
                    Réinitialiser les filtres
                </a>
            </form>
        </div>

        <!-- Liste des produits -->
        <div class="md:w-3/4">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold">Boutique</h1>
                <div>
                    {{ $tenues->total() }} produits trouvés
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($tenues as $tenue)
                <div class="bg-white rounded-lg shadow overflow-hidden relative">
                   
                    @auth
        @if(auth()->user()->wishlistTenues->contains($tenue->id))
            <form action="{{ route('wishlist.destroy', $tenue) }}" method="POST" class="absolute top-2 right-2">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-500 hover:text-red-700">
                    <i class="fas fa-heart"></i>
                </button>
            </form>
        @else
            <form action="{{ route('wishlist.store', $tenue) }}" method="POST" class="absolute top-2 right-2">
                @csrf
                <button type="submit" class="text-gray-400 hover:text-red-500">
                    <i class="far fa-heart"></i>
                </button>
            </form>
        @endif
    @endauth

                    
                    
                        <img src="{{ $tenue->images->first() ? asset('storage/'.$tenue->images->first()->image_path) : asset('images/placeholder.jpg') }}" 
                             alt="{{ $tenue->nom }}" 
                             class="w-full h-48 object-cover">
                   
                    <div class="p-4">
                        <h3 class="font-bold text-lg">{{ $tenue->nom }}</h3>
                        <p class="text-gray-600">{{ $tenue->brand->nom }}</p>
                        <p class="text-blue-800 font-bold mt-2">€{{ number_format($tenue->prix, 2) }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="mt-8">
                {{ $tenues->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    const filterForm = document.querySelector('form[method="GET"]');
    document.querySelectorAll('input[name], select[name]').forEach(element => {
        element.addEventListener('change', function() {
            filterForm.submit();
        });
    });
});
</script>

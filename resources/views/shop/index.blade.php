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
    
        .fa-heart, .fa-spinner {
    transition: all 0.3s ease;
}

.wishlist-btn {
    background: none;
    border: none;
    cursor: pointer;
    font-size: 1.2rem;
    outline: none;
}
    .prev-btn, .next-btn {
        z-index: 5;
        width: 24px;
        height: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .prev-btn {
        left: 8px;
    }
    
    .next-btn {
        right: 8px;
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
                    @auth
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
                    <li>
                        <a href="{{ route('cart.index') }}" class="nav-link font-medium flex items-center">
                            <i class="fas fa-shopping-cart mr-1"></i> Panier
                            @auth
                                <span class="ml-1 bg-blue-500 text-white text-xs px-2 py-1 rounded-full">
                                    {{ auth()->user()->cart ? auth()->user()->cart->items->count() : 0 }}
                                </span>
                            @endauth
                        </a>
                    </li>
                    <li><a href="{{ route('orders.index') }}" class="nav-link font-medium">Mes Commandes</a></li>
                    @endauth
                    <li><a href="{{ route('about') }}" class="nav-link font-medium">À propos</a></li>
                    <li><a href="{{ route('contact') }}" class="nav-link font-medium">Contact</a></li>
                </ul>
            </nav>
            <div class="flex items-center space-x-4">
                @guest
                  
                    <a href="{{ route('login') }}" class="bg-white text-blue-800 px-4 py-2 rounded-full font-medium hover:bg-blue-100 transition">
                        <i class="fas fa-user mr-2"></i>Connexion
                    </a>
                @else
                   
                    <div class="relative group">
       
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="bg-white text-blue-800 px-4 py-2 rounded-full font-medium hover:bg-blue-100 transition">
                                    <i class="fas fa-sign-out-alt mr-2"></i>Logout
                                </button>
                            </form>
                   
                    </div>
                @endguest
            
               
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


                <div class="mb-6">
                    <h3 class="font-semibold mb-2">number</h3>
                    <input type="number" name="number" placeholder="Filtrer par number..."
                           class="w-full px-4 py-2 border rounded-lg"
                           value="{{ request('number') }}"
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
                            <button onclick="toggleWishlist({{ $tenue->id }}, false)" 
                                    class="absolute top-2 right-2 z-10 text-red-500 hover:text-red-700 wishlist-btn-{{ $tenue->id }}"
                                    title="Retirer de la wishlist">
                                <i class="fas fa-heart"></i>
                            </button>
                        @else
                            <button onclick="toggleWishlist({{ $tenue->id }}, true)" 
                                    class="absolute top-2 right-2 z-10 text-gray-400 hover:text-red-500 wishlist-btn-{{ $tenue->id }}"
                                    title="Ajouter à la wishlist">
                                <i class="far fa-heart"></i>
                            </button>
                        @endif
                    @endauth
                    
                  
                    <div class="relative h-48 overflow-hidden">
                        @php
                            $images = $tenue->images;
                         
                        @endphp
        
                        @foreach($images as $index => $image)
                            <img src="{{ asset('storage/'.$image->image_path) }}" 
                                 alt="{{ $tenue->nom }} - Image {{ $index + 1 }}" 
                                 class="w-full h-48 object-cover absolute transition-opacity duration-300 {{ $index === 0 ? 'opacity-100' : 'opacity-0' }}"
                                 data-index="{{ $index }}">
                        @endforeach
        
                        @if($images->count() > 1)
                            <button class="absolute left-2 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 text-white p-1 rounded-full hover:bg-opacity-75 transition prev-btn"
                                    onclick="changeImage(this, -1)">
                                <i class="fas fa-chevron-left text-xs"></i>
                            </button>
                            <button class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 text-white p-1 rounded-full hover:bg-opacity-75 transition next-btn"
                                    onclick="changeImage(this, 1)">
                                <i class="fas fa-chevron-right text-xs"></i>
                            </button>
                        @endif
                    </div>
        
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
<!-- Footer -->
<footer class="bg-blue-900 text-white pt-12 pb-6">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">
            <!-- Colonne 1 - À propos -->
            <div>
                <div class="flex items-center mb-4">
                    <i class="fas fa-futbol text-2xl mr-3"></i>
                    <h3 class="text-xl font-bold">Football Marketplace</h3>
                </div>
                <p class="text-blue-200 mb-4">Votre boutique en ligne de référence pour tous les maillots de football authentiques. Qualité et passion depuis 2015.</p>
                <div class="flex space-x-4">
                    <a href="#" class="w-10 h-10 rounded-full bg-blue-800 flex items-center justify-center hover:bg-blue-700">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full bg-blue-800 flex items-center justify-center hover:bg-blue-700">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full bg-blue-800 flex items-center justify-center hover:bg-blue-700">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full bg-blue-800 flex items-center justify-center hover:bg-blue-700">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
            
            <!-- Colonne 2 - Liens rapides -->
            <div>
                <h3 class="text-lg font-bold mb-4">Liens rapides</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="text-blue-200 hover:text-white transition">Accueil</a></li>
                    <li><a href="#" class="text-blue-200 hover:text-white transition">Nouveautés</a></li>
                    <li><a href="#" class="text-blue-200 hover:text-white transition">Promotions</a></li>
                    <li><a href="#" class="text-blue-200 hover:text-white transition">Maillots de clubs</a></li>
                    <li><a href="#" class="text-blue-200 hover:text-white transition">Équipes nationales</a></li>
                    <li><a href="#" class="text-blue-200 hover:text-white transition">Collection vintage</a></li>
                </ul>
            </div>
            
            <!-- Colonne 3 - Service client -->
            <div>
                <h3 class="text-lg font-bold mb-4">Service client</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="text-blue-200 hover:text-white transition">Mon compte</a></li>
                    <li><a href="#" class="text-blue-200 hover:text-white transition">Suivi de commande</a></li>
                    <li><a href="#" class="text-blue-200 hover:text-white transition">Guide des tailles</a></li>
                    <li><a href="#" class="text-blue-200 hover:text-white transition">Politique de retour</a></li>
                    <li><a href="#" class="text-blue-200 hover:text-white transition">Livraison & Expédition</a></li>
                    <li><a href="#" class="text-blue-200 hover:text-white transition">FAQ</a></li>
                </ul>
            </div>
            
            <!-- Colonne 4 - Contact -->
            <div>
                <h3 class="text-lg font-bold mb-4">Contactez-nous</h3>
                <ul class="space-y-3">
                    <li class="flex items-start">
                        <i class="fas fa-map-marker-alt mt-1 mr-3 text-blue-300"></i>
                        <span class="text-blue-200">123 Avenue du Football, 75001 Paris, France</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-phone mr-3 text-blue-300"></i>
                        <span class="text-blue-200">+212 6 53 68 77 51</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-envelope mr-3 text-blue-300"></i>
                        <span class="text-blue-200">contact@footballmarketplace.fr</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-clock mr-3 text-blue-300"></i>
                        <span class="text-blue-200">Lun-Ven: 9h-18h | Sam: 10h-16h</span>
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="border-t border-blue-800 pt-6">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <p class="text-blue-300 text-sm mb-4 md:mb-0">&copy; 2025 Football Marketplace. Tous droits réservés.</p>
                <div>
                    <div class="flex flex-wrap justify-center space-x-4">
                        <a href="#" class="text-blue-300 hover:text-white text-sm transition mb-2 md:mb-0">Conditions générales</a>
                        <a href="#" class="text-blue-300 hover:text-white text-sm transition mb-2 md:mb-0">Politique de confidentialité</a>
                        <a href="#" class="text-blue-300 hover:text-white text-sm transition mb-2 md:mb-0">Mentions légales</a>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</footer>

    
<script>

    document.addEventListener('DOMContentLoaded', function() {
    const filterForm = document.querySelector('form[method="GET"]');
    document.querySelectorAll('input[name], select[name]').forEach(element => {
        element.addEventListener('change', function() {
            filterForm.submit();
        });
    });
});
function changeImage(button, direction) {
                const carousel = button.closest('.relative');
                const images = carousel.querySelectorAll('img');
                const currentIndex = Array.from(images).findIndex(img => img.classList.contains('opacity-100'));
                
                let newIndex = currentIndex + direction;
                
              
                if (newIndex < 0) {
                    newIndex = images.length - 1;
                } else if (newIndex >= images.length) {
                    newIndex = 0;
                }
                
                
                images[currentIndex].classList.remove('opacity-100');
                images[currentIndex].classList.add('opacity-0');
                
                
                images[newIndex].classList.remove('opacity-0');
                images[newIndex].classList.add('opacity-100');
            }
        
function toggleWishlist(tenueId, addToWishlist) {
    const url = addToWishlist 
        ? `/wishlist/${tenueId}`
        : `/wishlist/${tenueId}`;
    
    const method = addToWishlist ? 'POST' : 'DELETE';
    const btn = document.querySelector(`.wishlist-btn-${tenueId}`);
    
    
    btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
    btn.disabled = true;

    
    fetch(url, {
        method: method,
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
    })
    .then(response => {
        if (!response.ok) throw new Error('Erreur réseau');
        return response.json();
    })
    .then(data => {
    
        if (addToWishlist) {
            btn.innerHTML = '<i class="fas fa-heart"></i>';
            btn.classList.remove('text-gray-400');
            btn.classList.add('text-red-500');
            btn.onclick = () => toggleWishlist(tenueId, false);
        } else {
            btn.innerHTML = '<i class="far fa-heart"></i>';
            btn.classList.remove('text-red-500');
            btn.classList.add('text-gray-400');
            btn.onclick = () => toggleWishlist(tenueId, true);
        }
        
       
        if (data.wishlistCount !== undefined) {
            const wishlistCounter = document.querySelector('.wishlist-counter');
            if (wishlistCounter) {
                wishlistCounter.textContent = data.wishlistCount;
            }
        }
    })
    .catch(error => {
        console.error('Error:', error);
        btn.innerHTML = '<i class="far fa-heart"></i>';
        alert('Une erreur est survenue');
    })
    .finally(() => {
        btn.disabled = false;
    });
}
</script>

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
<div class="container mx-auto px-4 py-8 text-center">
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-8" role="alert">
        <h1 class="text-2xl font-bold mb-2">Paiement réussi!</h1>
        <p>Merci pour votre commande .</p>
        <p>Nous avons envoyé un email de confirmation à {{ auth()->user()->email }}.</p>
    </div>
    
    <a href="{{ route('home') }}" class="bg-blue-800 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
        Retour à l'accueil
    </a>
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
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
     
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-gray-900 mb-4">Contactez-nous</h1>
                <p class="text-xl text-gray-600">Nous sommes là pour répondre à toutes vos questions</p>
            </div>
    
            <div class="flex flex-col lg:flex-row gap-12">
                <div class="lg:w-1/2">
                    <div class="bg-white p-8 rounded-xl shadow-md">
                        <h2 class="text-2xl font-bold mb-6">Envoyez-nous un message</h2>
                        
                        <form action="" method="POST" class="space-y-6">
                            @csrf
                            <div>
                                <label for="name" class="block text-gray-700 mb-2">Votre nom</label>
                                <input type="text" id="name" name="name" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            
                            <div>
                                <label for="email" class="block text-gray-700 mb-2">Votre email</label>
                                <input type="email" id="email" name="email" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            
                            <div>
                                <label for="subject" class="block text-gray-700 mb-2">Sujet</label>
                                <select id="subject" name="subject" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="question">Question sur un produit</option>
                                    <option value="order">Suivi de commande</option>
                                    <option value="return">Retour/Réclamation</option>
                                    <option value="other">Autre demande</option>
                                </select>
                            </div>
                            
                            <div>
                                <label for="message" class="block text-gray-700 mb-2">Votre message</label>
                                <textarea id="message" name="message" rows="5" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                            </div>
                            
                            <button type="submit" class="w-full bg-blue-800 text-white py-3 px-6 rounded-lg font-bold hover:bg-blue-700 transition">
                                Envoyer le message
                            </button>
                        </form>
                    </div>
                </div>
                
                <div class="lg:w-1/2">
                    <div class="bg-blue-50 rounded-xl p-8 h-full">
                        <h2 class="text-2xl font-bold mb-6">Nos coordonnées</h2>
                        
                        <div class="space-y-6">
                            <div class="flex items-start">
                                <div class="bg-blue-100 p-3 rounded-full mr-4">
                                    <i class="fas fa-map-marker-alt text-blue-800"></i>
                                </div>
                                <div>
                                    <h3 class="font-bold text-gray-900 mb-1">Adresse</h3>
                                    <p class="text-gray-700">123 Avenue du Football<br>75001 Paris, France</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <div class="bg-blue-100 p-3 rounded-full mr-4">
                                    <i class="fas fa-phone text-blue-800"></i>
                                </div>
                                <div>
                                    <h3 class="font-bold text-gray-900 mb-1">Téléphone</h3>
                                    <p class="text-gray-700">+212 6 53 68 77 51<br>Lun-Ven: 9h-18h</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <div class="bg-blue-100 p-3 rounded-full mr-4">
                                    <i class="fas fa-envelope text-blue-800"></i>
                                </div>
                                <div>
                                    <h3 class="font-bold text-gray-900 mb-1">Email</h3>
                                    <p class="text-gray-700">contact@footballmarketplace.fr<br>Support: support@footballmarketplace.fr</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <div class="bg-blue-100 p-3 rounded-full mr-4">
                                    <i class="fas fa-clock text-blue-800"></i>
                                </div>
                                <div>
                                    <h3 class="font-bold text-gray-900 mb-1">Horaires d'ouverture</h3>
                                    <p class="text-gray-700">Lundi - Vendredi: 9h00 - 18h00<br>Samedi: 10h00 - 16h00<br>Dimanche: Fermé</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-8">
                            <h3 class="font-bold text-gray-900 mb-4">Suivez-nous</h3>
                            <div class="flex space-x-4">
                                <a href="#" class="w-12 h-12 rounded-full bg-blue-800 text-white flex items-center justify-center hover:bg-blue-700 transition">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#" class="w-12 h-12 rounded-full bg-blue-800 text-white flex items-center justify-center hover:bg-blue-700 transition">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#" class="w-12 h-12 rounded-full bg-blue-800 text-white flex items-center justify-center hover:bg-blue-700 transition">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="#" class="w-12 h-12 rounded-full bg-blue-800 text-white flex items-center justify-center hover:bg-blue-700 transition">
                                    <i class="fab fa-youtube"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="mt-16">
                <h2 class="text-2xl font-bold mb-6 text-center">Trouvez-nous</h2>
                <div class="h-96 w-full rounded-xl overflow-hidden">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3325.238944175654!2d-7.396679924174437!3d33.5578989733376!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda62d4471dfbd13%3A0x4a8d1a6a6a1f3e7a!2sMohammedia%2C%20Maroc!5e0!3m2!1sfr!2sfr!4v1719256784891!5m2!1sfr!2sfr" 
                        width="100%" 
                        height="100%" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </section>
   

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
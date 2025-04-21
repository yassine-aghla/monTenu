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
                                    {{ auth()->user()->carts->count() }}
                                </span>
                            @endauth
                        </a>
                    </li>
                    <li><a href="{{ route('orders.index') }}" class="nav-link font-medium">Mes Commandes</a></li>
                    <li><a href="" class="nav-link font-medium">À propos</a></li>
                    <li><a href="" class="nav-link font-medium">Contact</a></li>
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

  

    @php
    $hero = App\Models\HeroSection::active();
@endphp

@if($hero)
<section class="hero-gradient relative py-20">
    <div class="container mx-auto px-4 flex flex-col md:flex-row items-center justify-between">
        <div class="md:w-1/2 text-white z-10 mb-10 md:mb-0">
            <h2 class="text-4xl md:text-5xl font-bold mb-4">{{ $hero->name }}</h2>
            <p class="text-xl mb-8 opacity-90">{{ $hero->description }}</p>
            <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                <a href="#nouveautes" class="animated-button bg-white text-blue-800 px-8 py-3 rounded-full font-bold text-center hover:bg-blue-50 shadow-lg">
                    Voir les nouveautés
                </a>
                <a href="#categories" class="animated-button bg-transparent border-2 border-white text-white px-8 py-3 rounded-full font-bold text-center hover:bg-white hover:bg-opacity-10 shadow-lg">
                    Nos catégories
                </a>
            </div>
        </div>
        <div class="md:w-1/2 relative">
            <div class="w-full h-80 md:h-96 rounded-lg overflow-hidden shadow-2xl relative">
                <img src="{{ asset('storage/' . $hero->thumbnail_url) }}" alt="{{ $hero->name }}" class="w-full h-full object-contain">
                <div class="absolute inset-0 bg-gradient-to-t from-blue-900 to-transparent opacity-30"></div>
            </div>
            <div class="absolute -bottom-5 -left-5 bg-yellow-500 text-blue-900 py-2 px-4 rounded-full font-bold shadow-lg">
                Jusqu'à -30% sur les maillots
            </div>
        </div>
    </div>
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -bottom-10 right-10 w-40 h-40 bg-blue-600 rounded-full opacity-20"></div>
        <div class="absolute top-20 left-10 w-20 h-20 bg-white rounded-full opacity-10"></div>
    </div>
</section>
@endif

    
    <section class="bg-white py-6 shadow-md">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-center">
                <div class="p-4">
                    <span class="block text-3xl font-bold text-blue-800">500+</span>
                    <span class="text-gray-600">Maillots disponibles</span>
                </div>
                <div class="p-4">
                    <span class="block text-3xl font-bold text-blue-800">150+</span>
                    <span class="text-gray-600">Clubs représentés</span>
                </div>
                <div class="p-4">
                    <span class="block text-3xl font-bold text-blue-800">10k+</span>
                    <span class="text-gray-600">Clients satisfaits</span>
                </div>
                <div class="p-4">
                    <span class="block text-3xl font-bold text-blue-800">24h</span>
                    <span class="text-gray-600">Expédition rapide</span>
                </div>
            </div>
        </div>
    </section>



   
    <section id="nouveautes" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-end mb-10">
                <div>
                    <span class="text-blue-600 font-semibold uppercase tracking-wider">Découvrez</span>
                    <h2 class="text-3xl font-bold text-gray-900">Nouveautés & Meilleures Ventes</h2>
                </div>
                <a href="{{ route('shop.index') }}" class="text-blue-600 font-medium hover:text-blue-800 flex items-center">
                    Voir tout le catalogue
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($featuredTenues as $tenue)
                <div class="product-card bg-white rounded-xl overflow-hidden shadow-md">
                    <div class="relative">
              @if($tenue->images->first())
                            <img src="{{ asset('storage/'.$tenue->images->first()->image_path) }}" 
                                 alt="{{ $tenue->nom }}" 
                                 class="w-full h-64 object-cover">
                        @else
                            <img src="{{ asset('images/placeholder.jpg') }}" 
                                 alt="Placeholder" 
                                 class="w-full h-64 object-cover">
                        @endif
                        
                        @if($tenue->promotion > 0)
                            <span class="absolute top-3 right-3 bg-red-500 text-white text-xs font-bold px-3 py-1 rounded-full">
                                -{{ $tenue->promotion }}%
                            </span>
                        @elseif($tenue->created_at->diffInDays() < 30)
                            <span class="absolute top-3 right-3 bg-blue-500 text-white text-xs font-bold px-3 py-1 rounded-full">
                                Nouveau
                            </span>
                        @endif
                    </div>
                    <div class="p-6">
                        <span class="text-sm text-blue-600 font-medium">{{ $tenue->brand->nom ?? 'Marque inconnue' }}</span>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">{{ $tenue->nom }}</h3>
                        <div class="flex justify-between items-center">
                            <div>
                                @if($tenue->promotion > 0)
                                    <span class="text-gray-400 line-through text-sm">€{{ number_format($tenue->prix, 2) }}</span>
                                    <span class="text-blue-800 font-bold text-xl">
                                        €{{ number_format($tenue->prix * (1 - $tenue->promotion/100), 2) }}
                                    </span>
                                @else
                                    <span class="text-blue-800 font-bold text-xl">€{{ number_format($tenue->prix, 2) }}</span>
                                @endif
                            </div>
                            <div class="flex items-center">
                                
                                <div class="flex text-yellow-400 mr-2">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                            </div>
                        </div>
                        <form action="{{ route('cart.add', $tenue->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="mt-4 animated-button bg-blue-800 text-white px-4 py-2 rounded-lg hover:bg-blue-700 w-full flex items-center justify-center">
                                <i class="fas fa-shopping-cart mr-2"></i>Ajouter au panier
                            </button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
  
    <section class="py-10 bg-gradient-to-r from-blue-900 to-blue-700 text-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <div class="mb-6 md:mb-0">
                    <h3 class="text-2xl font-bold mb-2">Inscrivez-vous à notre newsletter</h3>
                    <p class="text-blue-100">Recevez 10% de réduction sur votre première commande et nos dernières offres</p>
                </div>
                <div class="w-full md:w-auto">
                    <div class="flex flex-col sm:flex-row">
                        <input type="email" placeholder="Votre adresse email" class="px-4 py-3 w-full sm:w-64 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                        <button class="animated-button mt-2 sm:mt-0 bg-yellow-500 text-blue-900 font-bold px-6 py-3 rounded-r-lg hover:bg-yellow-400 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2">
                            S'inscrire
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

   
    <section id="avis" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Ce que nos clients disent</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Découvrez pourquoi des milliers de fans de football nous font confiance pour leurs tenues préférées.</p>
            </div>
            
            <div class="relative">
                <div id="avis-container" class="flex space-x-4 overflow-x-auto scroll-smooth pb-8 px-4 -mx-4">
                    <!-- Avis 1 -->
                    <div class="testimonial-card bg-white p-6 rounded-xl shadow-md w-80 shrink-0 border-l-4 border-blue-600">
                        <div class="flex text-yellow-400 mb-4">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="text-gray-700 mb-4">"Super boutique, j'adore les maillots ! La qualité est au rendez-vous et la livraison a été plus rapide que prévu."</p>
                        <div class="flex items-center">
                            <div class="w-12 h-12 rounded-full bg-blue-200 flex items-center justify-center mr-4">
                                <span class="text-blue-800 font-bold">JD</span>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900">Jean Dupont</h4>
                                <p class="text-gray-500 text-sm">Client depuis 2023</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Avis 2 -->
                    <div class="testimonial-card bg-white p-6 rounded-xl shadow-md w-80 shrink-0 border-l-4 border-blue-600">
                        <div class="flex text-yellow-400 mb-4">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="text-gray-700 mb-4">"Livraison rapide et produits de qualité. J'ai commandé un maillot pour mon fils et il est ravi. Service client très réactif."</p>
                        <div class="flex items-center">
                            <div class="w-12 h-12 rounded-full bg-blue-200 flex items-center justify-center mr-4">
                                <span class="text-blue-800 font-bold">MC</span>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900">Marie Curie</h4>
                                <p class="text-gray-500 text-sm">Client fidèle</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Avis 3 -->
                    <div class="testimonial-card bg-white p-6 rounded-xl shadow-md w-80 shrink-0 border-l-4 border-blue-600">
                        <div class="flex text-yellow-400 mb-4">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <p class="text-gray-700 mb-4">"J'ai trouvé un maillot rare ici ! Je cherchais depuis longtemps et leur collection est vraiment impressionnante. Merci !"</p>
                        <div class="flex items-center">
                            <div class="w-12 h-12 rounded-full bg-blue-200 flex items-center justify-center mr-4">
                                <span class="text-blue-800 font-bold">PP</span>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900">Paul Pogba</h4>
                                <p class="text-gray-500 text-sm">Collectionneur</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Avis 4 -->
                    <div class="testimonial-card bg-white p-6 rounded-xl shadow-md w-80 shrink-0 border-l-4 border-blue-600">
                        <div class="flex text-yellow-400 mb-4">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="text-gray-700 mb-4">"Les prix sont compétitifs et la qualité est excellente. Je recommande vivement à tous les amateurs de football."</p>
                        <div class="flex items-center">
                            <div class="w-12 h-12 rounded-full bg-blue-200 flex items-center justify-center mr-4">
                                <span class="text-blue-800 font-bold">LM</span>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900">Lucas Martin</h4>
                                <p class="text-gray-500 text-sm">Client depuis 2022</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Avis 5 -->
                    <div class="testimonial-card bg-white p-6 rounded-xl shadow-md w-80 shrink-0 border-l-4 border-blue-600">
                        <div class="flex text-yellow-400 mb-4">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="text-gray-700 mb-4">"J'ai commandé plusieurs maillots et je suis très satisfait. Le site est facile à utiliser et les livraisons sont rapides."</p>
                        <div class="flex items-center">
                            <div class="w-12 h-12 rounded-full bg-blue-200 flex items-center justify-center mr-4">
                                <span class="text-blue-800 font-bold">SD</span>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900">Sophie Dubois</h4>
                                <p class="text-gray-500 text-sm">Fan de football</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <button id="scroll-left" class="absolute top-1/2 left-0 transform -translate-y-1/2 bg-blue-800 text-white w-10 h-10 rounded-full flex items-center justify-center shadow-lg z-10 hover:bg-blue-700 focus:outline-none">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button id="scroll-right" class="absolute top-1/2 right-0 transform -translate-y-1/2 bg-blue-800 text-white w-10 h-10 rounded-full flex items-center justify-center shadow-lg z-10 hover:bg-blue-700 focus:outline-none">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
            
            <div class="flex justify-center mt-6">
                <a href="#" class="text-blue-600 font-medium hover:text-blue-800 flex items-center">
                    Voir tous les avis
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>

   
  <!-- FAQ Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Questions fréquentes</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Tout ce que vous devez savoir sur nos produits et services.</p>
        </div>
        
        <div class="max-w-3xl mx-auto">
            <!-- Question 1 -->
            <div class="accordion-item mb-4 border border-gray-200 rounded-lg overflow-hidden">
                <button class="w-full p-4 text-left bg-gray-50 hover:bg-gray-100 focus:outline-none flex justify-between items-center">
                    <span class="font-semibold text-gray-900">Comment savoir quelle taille de maillot me convient ?</span>
                    <i class="fas fa-chevron-down text-blue-600"></i>
                </button>
                <div class="p-4 bg-white">
                    <p class="text-gray-700">Nous vous recommandons de consulter notre guide des tailles disponible sur chaque page produit. Pour les maillots de football, ils ont généralement une coupe ajustée. Si vous préférez un style plus ample, nous vous conseillons de prendre une taille au-dessus de votre taille habituelle.</p>
                </div>
            </div>
            
            <!-- Question 2 -->
            <div class="accordion-item mb-4 border border-gray-200 rounded-lg overflow-hidden">
                <button class="w-full p-4 text-left bg-gray-50 hover:bg-gray-100 focus:outline-none flex justify-between items-center">
                    <span class="font-semibold text-gray-900">Quelle est votre politique de retour ?</span>
                    <i class="fas fa-chevron-down text-blue-600"></i>
                </button>
                <div class="p-4 bg-white">
                    <p class="text-gray-700">Vous avez 30 jours à compter de la réception de votre commande pour retourner un article. Les articles doivent être dans leur état d'origine, non portés et avec toutes les étiquettes attachées. Les frais de retour sont à la charge du client, sauf en cas d'article défectueux.</p>
                </div>
            </div>
            
            <!-- Question 3 -->
            <div class="accordion-item mb-4 border border-gray-200 rounded-lg overflow-hidden">
                <button class="w-full p-4 text-left bg-gray-50 hover:bg-gray-100 focus:outline-none flex justify-between items-center">
                    <span class="font-semibold text-gray-900">Vos maillots sont-ils authentiques ?</span>
                    <i class="fas fa-chevron-down text-blue-600"></i>
                </button>
                <div class="p-4 bg-white">
                    <p class="text-gray-700">Oui, tous nos maillots sont 100% authentiques et officiels. Nous travaillons directement avec les fabricants et les clubs pour garantir l'authenticité de tous nos produits. Chaque maillot est fourni avec les étiquettes officielles et les hologrammes d'authenticité.</p>
                </div>
            </div>
            
            <!-- Question 4 -->
            <div class="accordion-item mb-4 border border-gray-200 rounded-lg overflow-hidden">
                <button class="w-full p-4 text-left bg-gray-50 hover:bg-gray-100 focus:outline-none flex justify-between items-center">
                    <span class="font-semibold text-gray-900">Combien de temps prend la livraison ?</span>
                    <i class="fas fa-chevron-down text-blue-600"></i>
                </button>
                <div class="p-4 bg-white">
                    <p class="text-gray-700">Pour la France métropolitaine, la livraison standard prend généralement 2-4 jours ouvrables. Pour les livraisons internationales, le délai est de 5-10 jours ouvrables selon la destination. Nous proposons également des options de livraison express qui peuvent réduire ces délais à 24-48h (selon disponibilité).</p>
                </div>
            </div>
            
            <!-- Question 5 -->
            <div class="accordion-item mb-4 border border-gray-200 rounded-lg overflow-hidden">
                <button class="w-full p-4 text-left bg-gray-50 hover:bg-gray-100 focus:outline-none flex justify-between items-center">
                    <span class="font-semibold text-gray-900">Proposez-vous un service de flocage personnalisé ?</span>
                    <i class="fas fa-chevron-down text-blue-600"></i>
                </button>
                <div class="p-4 bg-white">
                    <p class="text-gray-700">Oui, nous proposons un service de flocage personnalisé sur la plupart de nos maillots. Vous pouvez ajouter un nom, un numéro et même des badges officiels. Notre flocage est réalisé avec des matériaux de haute qualité conformes aux normes des ligues officielles.</p>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-8">
            <p class="text-gray-600 mb-4">Vous avez d'autres questions ?</p>
            <a href="contact.html" class="animated-button inline-block bg-blue-800 text-white px-6 py-3 rounded-lg hover:bg-blue-700">
                Contactez-nous
            </a>
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
     
        const accordionButtons = document.querySelectorAll('.accordion-item button');
        
        accordionButtons.forEach(button => {
            button.addEventListener('click', () => {
                const content = button.nextElementSibling;
                const icon = button.querySelector('i');
                
            
                if (content.style.maxHeight) {
                    content.style.maxHeight = null;
                    icon.classList.remove('fa-chevron-up');
                    console.log(icon)
                    icon.classList.add('fa-chevron-down');
                } else {
                    content.style.maxHeight = content.scrollHeight + 'px';
                    icon.classList.remove('fa-chevron-down');
                    icon.classList.add('fa-chevron-up');
                }
            });
        });
        
       
        const scrollContainer = document.getElementById('avis-container');
        const scrollLeftBtn = document.getElementById('scroll-left');
        const scrollRightBtn = document.getElementById('scroll-right');
        
        if (scrollContainer && scrollLeftBtn && scrollRightBtn) {
            scrollLeftBtn.addEventListener('click', () => {
                scrollContainer.scrollBy({ left: -300, behavior: 'smooth' });
            });
            
            scrollRightBtn.addEventListener('click', () => {
                scrollContainer.scrollBy({ left: 300, behavior: 'smooth' });
            });
        }
    });

    document.addEventListener("DOMContentLoaded", function () {
    const faqItems = document.querySelectorAll(".accordion-item");
    
    faqItems.forEach(item => {
        const button = item.querySelector("button");
        const content = item.querySelector("div");
        const icon = button.querySelector("i"); 
        
  
        if (content) content.style.display = "none";
        
        button.addEventListener("click", function () {
            const isOpen = content.style.display === "block";
            
            
            faqItems.forEach(otherItem => {
                if (otherItem !== item) {
                    const otherContent = otherItem.querySelector("div");
                    const otherIcon = otherItem.querySelector("button i");
                    if (otherContent) otherContent.style.display = "none";
                    if (otherIcon) {
                        // otherIcon.classList.remove("fa-chevron-up");
                        otherIcon.classList.add("fa-chevron-down");
                    }
                }
            });
            
         
            if (content) {
                content.style.display = isOpen ? "none" : "block";
            }
            if (icon) {
                icon.classList.toggle("fa-chevron-down", isOpen);
                icon.classList.toggle("fa-chevron-up", !isOpen);
            }
        });
    });
});
</script>
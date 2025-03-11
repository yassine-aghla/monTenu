<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketplace - Tenues de Football</title>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    
</head>
<body class="bg-gray-100">
    <!-- Header -->
    <header class="bg-blue-800 text-white p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold">Football Marketplace</h1>
            <nav>
                <ul class="flex space-x-4">
                    <li><a href="#" class="hover:underline">Accueil</a></li>
                    <li><a href="#" class="hover:underline">Catalogue</a></li>
                    <li><a href="panier.html" class="hover:underline">Panier</a></li>
                    <li><a href="contact.html" class="hover:underline">Contact Us</a></li>
                    <a href="{{ route('login') }}" class="hover:underline">Connexion</a>
                    <a href="{{ route('register') }}" class="hover:underline">Inscription</a>
                    
                    <a href="{{ route('password.request') }}" class="hover:underline">Mot de passe oublié ?</a>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="bg-contain bg-center h-64 flex items-center justify-center text-white text-3xl font-bold" style="background-image: url({{ asset('images/tenus.jpg') }}); ">
        <div class="bg-black bg-opacity-30 p-6 rounded-lg">
            Trouvez la tenue parfaite pour votre club favori !
        </div>
    </section>
    

    <!-- Produits en vedette -->
    <section class="container mx-auto my-10 p-4">
        <h2 class="text-2xl font-bold mb-4">Produits en vedette</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <div class="bg-white shadow-md rounded-lg p-4">
                <img src="{{ asset('images/sevilla.webp') }}" class="w-full h-40 object-cover rounded-lg">
                <h3 class="mt-2 text-lg font-semibold">Maillot de Club XYZ</h3>
                <p class="text-gray-600">Édition spéciale 2024</p>
                <p class="text-blue-800 font-bold mt-2">€79.99</p>
                <button class="mt-2 bg-blue-800 text-white px-4 py-2 rounded hover:bg-blue-600 w-full">Ajouter au panier</button>
            </div>
            <div class="bg-white shadow-md rounded-lg p-4">
                <img src="{{ asset('images/milan maldini.webp') }}" class="w-full h-40 object-cover rounded-lg">
                <h3 class="mt-2 text-lg font-semibold">Maillot de Club XYZ</h3>
                <p class="text-gray-600">Édition spéciale 2024</p>
                <p class="text-blue-800 font-bold mt-2">€79.99</p>
                <button class="mt-2 bg-blue-800 text-white px-4 py-2 rounded hover:bg-blue-600 w-full">Ajouter au panier</button>
            </div>
            <div class="bg-white shadow-md rounded-lg p-4">
                <img src="{{ asset('images/man utd.webp') }}" class="w-full h-40 object-cover rounded-lg">
                <h3 class="mt-2 text-lg font-semibold">Maillot de Club XYZ</h3>
                <p class="text-gray-600">Édition spéciale 2024</p>
                <p class="text-blue-800 font-bold mt-2">€79.99</p>
                <button class="mt-2 bg-blue-800 text-white px-4 py-2 rounded hover:bg-blue-600 w-full">Ajouter au panier</button>
            </div>
            <div class="bg-white shadow-md rounded-lg p-4">
                <img src="{{ asset('images/guegon.webp') }}" class="w-full h-40 object-cover rounded-lg">
                <h3 class="mt-2 text-lg font-semibold">Maillot de Club XYZ</h3>
                <p class="text-gray-600">Édition spéciale 2024</p>
                <p class="text-blue-800 font-bold mt-2">€79.99</p>
                <button class="mt-2 bg-blue-800 text-white px-4 py-2 rounded hover:bg-blue-600 w-full">Ajouter au panier</button>
            </div>
            <div class="bg-white shadow-md rounded-lg p-4">
                <img src="{{ asset('images/ecuadeur valencia.webp') }}" class="w-full h-40 object-cover rounded-lg">
                <h3 class="mt-2 text-lg font-semibold">Maillot de Club XYZ</h3>
                <p class="text-gray-600">Édition spéciale 2024</p>
                <p class="text-blue-800 font-bold mt-2">€79.99</p>
                <button class="mt-2 bg-blue-800 text-white px-4 py-2 rounded hover:bg-blue-600 w-full">Ajouter au panier</button>
            </div>
            <div class="bg-white shadow-md rounded-lg p-4">
                <img src="{{ asset('images/burussia dortmund.webp') }}" class="w-full h-40 object-cover rounded-lg">
                <h3 class="mt-2 text-lg font-semibold">Maillot de Club XYZ</h3>
                <p class="text-gray-600">Édition spéciale 2024</p>
                <p class="text-blue-800 font-bold mt-2">€79.99</p>
                <button class="mt-2 bg-blue-800 text-white px-4 py-2 rounded hover:bg-blue-600 w-full">Ajouter au panier</button>
            </div>
            <div class="bg-white shadow-md rounded-lg p-4">
                <img src="{{ asset('images/man utd new.webp') }}" class="w-full h-40 object-cover rounded-lg">
                <h3 class="mt-2 text-lg font-semibold">Maillot de Club XYZ</h3>
                <p class="text-gray-600">Édition spéciale 2024</p>
                <p class="text-blue-800 font-bold mt-2">€79.99</p>
                <button class="mt-2 bg-blue-800 text-white px-4 py-2 rounded hover:bg-blue-600 w-full">Ajouter au panier</button>
            </div>
            <div class="bg-white shadow-md rounded-lg p-4">
                <img src="{{ asset('images/bursia monsulgeleka.webp') }}" class="w-full h-40 object-cover rounded-lg">
                <h3 class="mt-2 text-lg font-semibold">Maillot de Club XYZ</h3>
                <p class="text-gray-600">Édition spéciale 2024</p>
                <p class="text-blue-800 font-bold mt-2">€79.99</p>
                <button class="mt-2 bg-blue-800 text-white px-4 py-2 rounded hover:bg-blue-600 w-full">Ajouter au panier</button>
            </div>
            <!-- Répéter cette carte pour d'autres produits -->
        </div>
    </section>

      <!-- Section Avis -->
      <section id="avis" class="container mx-auto my-10 p-4 bg-white shadow-md rounded-lg">
        <h2 class="text-2xl font-bold mb-4">Avis des Clients</h2>
        <div class="relative overflow-hidden">
            <div id="avis-container" class="flex space-x-4 overflow-x-auto scroll-smooth p-2">
                <div class="p-4 bg-gray-100 rounded w-80 shrink-0"> <strong>Jean Dupont:</strong> Super boutique, j'adore les maillots !</div>
                <div class="p-4 bg-gray-100 rounded w-80 shrink-0"> <strong>Marie Curie:</strong> Livraison rapide et produits de qualité.</div>
                <div class="p-4 bg-gray-100 rounded w-80 shrink-0"> <strong>Paul Pogba:</strong> J'ai trouvé un maillot rare ici !</div>
                <div class="p-4 bg-gray-100 rounded w-80 shrink-0"> <strong>Jean Dupont:</strong> Super boutique, j'adore les maillots !</div>
                <div class="p-4 bg-gray-100 rounded w-80 shrink-0"> <strong>Marie Curie:</strong> Livraison rapide et produits de qualité.</div>
                <div class="p-4 bg-gray-100 rounded w-80 shrink-0"> <strong>Paul Pogba:</strong> J'ai trouvé un maillot rare ici !</div>
                <div class="p-4 bg-gray-100 rounded w-80 shrink-0"> <strong>Jean Dupont:</strong> Super boutique, j'adore les maillots !</div>
                <div class="p-4 bg-gray-100 rounded w-80 shrink-0"> <strong>Marie Curie:</strong> Livraison rapide et produits de qualité.</div>
                <div class="p-4 bg-gray-100 rounded w-80 shrink-0"> <strong>Paul Pogba:</strong> J'ai trouvé un maillot rare ici !</div>
            </div>
            <button id="scroll-right" class="absolute top-1/2 right-2 bg-blue-800 text-white p-2 rounded-full transform -translate-y-1/2">→</button>
            <button id="scroll-left" class="absolute top-1/2 left bg-blue-800 text-white p-2 rounded-full transform -translate-y-1/2">←</button>
        </div>
    </section>

    <!-- Main Section (FAQ) -->
    <section class="container mx-auto my-10 p-8 bg-white shadow-lg rounded-lg">
        <h2 class="text-3xl font-semibold text-center mb-8">Questions Fréquentes (FAQ)</h2>

        <!-- Accordion for FAQ -->
        <div class="space-y-4">
            <!-- Question 1 -->
            <div class="bg-gray-100 p-4 rounded-md shadow-sm">
                <button class="w-full text-left font-semibold text-lg text-blue-800 focus:outline-none" onclick="toggleAnswer(1)">
                    Comment puis-je commander un maillot ?
                </button>
                <div id="answer-1" class="hidden p-4 text-gray-700">
                    Pour commander un maillot, il vous suffit de naviguer dans notre catalogue, sélectionner le produit de votre choix et cliquer sur "Ajouter au panier". Vous pouvez ensuite passer à la caisse pour finaliser votre commande.
                </div>
            </div>

            <!-- Question 2 -->
            <div class="bg-gray-100 p-4 rounded-md shadow-sm">
                <button class="w-full text-left font-semibold text-lg text-blue-800 focus:outline-none" onclick="toggleAnswer(2)">
                    Quels sont les modes de paiement acceptés ?
                </button>
                <div id="answer-2" class="hidden p-4 text-gray-700">
                    Nous acceptons les paiements par carte bancaire (Visa, MasterCard), PayPal, et virement bancaire. Tous les paiements sont sécurisés.
                </div>
            </div>

            <!-- Question 3 -->
            <div class="bg-gray-100 p-4 rounded-md shadow-sm">
                <button class="w-full text-left font-semibold text-lg text-blue-800 focus:outline-none" onclick="toggleAnswer(3)">
                    Comment puis-je suivre ma commande ?
                </button>
                <div id="answer-3" class="hidden p-4 text-gray-700">
                    Une fois votre commande expédiée, vous recevrez un e-mail contenant un numéro de suivi. Vous pouvez utiliser ce numéro pour suivre votre colis directement sur le site du transporteur.
                </div>
            </div>

            <!-- Question 4 -->
            <div class="bg-gray-100 p-4 rounded-md shadow-sm">
                <button class="w-full text-left font-semibold text-lg text-blue-800 focus:outline-none" onclick="toggleAnswer(4)">
                    Quels sont vos délais de livraison ?
                </button>
                <div id="answer-4" class="hidden p-4 text-gray-700">
                    Nos délais de livraison varient en fonction de votre emplacement. En général, la livraison prend entre 5 et 10 jours ouvrés.
                </div>
            </div>

            <!-- Question 5 -->
            <div class="bg-gray-100 p-4 rounded-md shadow-sm">
                <button class="w-full text-left font-semibold text-lg text-blue-800 focus:outline-none" onclick="toggleAnswer(5)">
                    Puis-je retourner un article ?
                </button>
                <div id="answer-5" class="hidden p-4 text-gray-700">
                    Oui, vous pouvez retourner un article dans les 30 jours suivant la réception. Assurez-vous que l'article soit dans son état d'origine et n'ait pas été utilisé.
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white p-8">
        <div class="container mx-auto text-center md:text-left">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                <!-- Section 1: About Us -->
                <div>
                    <h3 class="text-xl font-semibold mb-4">À propos</h3>
                    <p class="text-gray-400 text-sm">Football Marketplace est votre destination en ligne pour découvrir et acheter les meilleures tenues de football, anciennes et tendance.</p>
                </div>
    
                <!-- Section 2: Quick Links -->
                <div>
                    <h3 class="text-xl font-semibold mb-4">Liens rapides</h3>
                    <ul class="space-y-2 text-gray-400 text-sm">
                        <li><a href="#" class="hover:text-blue-500">Accueil</a></li>
                        <li><a href="catalogue.html" class="hover:text-blue-500">Catalogue</a></li>
                        <li><a href="panier.html" class="hover:text-blue-500">Panier</a></li>
                        <li><a href="contact.html" class="hover:text-blue-500">Contactez-nous</a></li>
                        <li><a href="faq.html" class="hover:text-blue-500">FAQ</a></li>
                    </ul>
                </div>
    
                <!-- Section 3: Contact Information -->
                <div>
                    <h3 class="text-xl font-semibold mb-4">Contact</h3>
                    <p class="text-gray-400 text-sm">Vous avez des questions ? N'hésitez pas à nous contacter !</p>
                    <ul class="space-y-2 text-gray-400 text-sm">
                        <li>Email: <a href="mailto:contact@footballmarketplace.com" class="hover:text-blue-500">contact@footballmarketplace.com</a></li>
                        <li>Téléphone: <a href="tel:+123456789" class="hover:text-blue-500">+123 456 789</a></li>
                        <li>Adresse: 123 Rue du Football, Paris, France</li>
                    </ul>
                </div>
    
                <!-- Section 4: Follow Us -->
                <div>
                    <h3 class="text-xl font-semibold mb-4">Suivez-nous</h3>
                    <ul class="flex justify-center space-x-4">
                        <li><a href="#" class="text-gray-400 hover:text-blue-500"><i class="fab fa-facebook-f"></i> Facebook</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-blue-500"><i class="fab fa-twitter"></i> Twitter</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-blue-500"><i class="fab fa-instagram"></i> Instagram</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-blue-500"><i class="fab fa-youtube"></i> YouTube</a></li>
                    </ul>
                </div>
            </div>
    
            <!-- Bottom Row -->
            <div class="mt-8 border-t border-gray-700 pt-4">
                <p class="text-gray-400 text-sm">© 2024 Football Marketplace. Tous droits réservés.</p>
            </div>
        </div>
    </footer>
    
    <script>
        document.getElementById("scroll-right").addEventListener("click", function() {
            document.getElementById("avis-container").scrollBy({ left: 200, behavior: 'smooth' });
        });
        document.getElementById("scroll-left").addEventListener("click", function() {
            document.getElementById("avis-container").scrollBy({ left: -200, behavior: 'smooth' });
        });
        function toggleAnswer(questionNumber) {
            const answer = document.getElementById(`answer-${questionNumber}`);
            answer.classList.toggle('hidden');
        }
    </script>
</body>
</html>

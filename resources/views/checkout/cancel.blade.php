
<div class="container mx-auto px-4 py-8 text-center">
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-8" role="alert">
        <h1 class="text-2xl font-bold mb-2">Paiement annulé</h1>
        <p>Votre paiement a été annulé. Vous pouvez réessayer ou modifier votre panier.</p>
    </div>
    
    <div class="flex justify-center gap-4">
        <a href="{{ route('cart.index') }}" class="bg-blue-800 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
            Voir mon panier
        </a>
        {{-- <a href="{{ route('') }}" class="bg-gray-800 text-white px-4 py-2 rounded-lg hover:bg-gray-700">
            Retour à l'accueil
        </a> --}}
    </div>
</div>

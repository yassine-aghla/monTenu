
<div class="container mx-auto px-4 py-8 text-center">
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-8" role="alert">
        <h1 class="text-2xl font-bold mb-2">Paiement réussi!</h1>
        <p>Merci pour votre commande #{{ $order->id }}.</p>
        <p>Nous avons envoyé un email de confirmation à {{ auth()->user()->email }}.</p>
    </div>
    
    <a href="{{ route('home') }}" class="bg-blue-800 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
        Retour à l'accueil
    </a>
</div>

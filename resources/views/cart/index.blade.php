
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-8">Votre Panier</h1>
    
    @if($cartItems->isEmpty())
        <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative" role="alert">
            <p>Votre panier est vide.</p>
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="md:col-span-2">
                @foreach($cartItems as $item)
                <div class="bg-white rounded-lg shadow-md p-6 mb-4 flex flex-col md:flex-row">
                    <div class="w-full md:w-1/4 mb-4 md:mb-0">
                        <img src="{{ $item->tenue->images->first() ? asset('storage/'.$item->tenue->images->first()->image_path) : asset('images/placeholder.jpg') }}" >
                    </div>
                    <div class="w-full md:w-3/4 md:pl-6">
                        <h2 class="text-xl font-semibold">{{ $item->tenue->nom }}</h2>
                        <p class="text-gray-600 mb-2">{{ $item->tenue->description }}</p>
                        <p class="text-gray-800 font-bold mb-2">{{ $item->tenue->prix }} €</p>
                        
                        <div class="flex items-center mb-4">
                            <span class="mr-2">Quantité:</span>
                            <form action="{{ route('cart.update', $item) }}" method="POST" class="flex items-center">
                                @csrf
                                <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="w-16 border rounded px-2 py-1">
                                <button type="submit" class="ml-2 bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Mettre à jour</button>
                            </form>
                        </div>
                        
                        <form action="{{ route('cart.remove', $item) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700">
                                <i class="fas fa-trash mr-1"></i> Supprimer
                            </button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="md:col-span-1">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-xl font-semibold mb-4">Récapitulatif</h2>
                    <div class="flex justify-between mb-2">
                        <span>Sous-total</span>
                        <span>{{ $total }} €</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span>Livraison</span>
                        <span>Gratuite</span>
                    </div>
                    <div class="border-t my-4"></div>
                    <div class="flex justify-between font-bold text-lg">
                        <span>Total</span>
                        <span>{{ $total }} €</span>
                    </div>
                    
                    <a href="{{ route('checkout.index') }}" class="mt-4 block w-full bg-blue-800 text-white text-center px-4 py-2 rounded-lg hover:bg-blue-700">
                        Passer la commande
                    </a>
                </div>
            </div>
        </div>
    @endif
</div>

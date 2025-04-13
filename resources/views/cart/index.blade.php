
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-8">Votre Panier</h1>
    
    @if($cartItems->isEmpty())
        <div class="bg-blue-50 p-6 rounded-lg text-center">
            <p class="text-blue-800">Votre panier est vide</p>
            <a href="{{ route('shop.index') }}" class="text-blue-600 hover:underline mt-2 inline-block">
                Parcourir la boutique
            </a>
        </div>
    @else
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2">
                @foreach($cartItems as $item)
                <div class="bg-white rounded-lg shadow p-6 mb-4 flex flex-col sm:flex-row">
                    <img src="{{ $item->tenue->images->first() ? asset('storage/'.$item->tenue->images->first()->image_path) : asset('images/placeholder.jpg') }}" 
                         alt="{{ $item->tenue->nom }}" 
                         class="w-full sm:w-32 h-32 object-cover mb-4 sm:mb-0">
                    
                    <div class="sm:ml-6 flex-grow">
                        <h3 class="font-bold text-lg">{{ $item->tenue->nom }}</h3>
                        <p class="text-gray-600">{{ $item->tenue->brand->nom }}</p>
                        <p class="text-blue-800 font-bold mt-2">€{{ number_format($item->tenue->prix, 2) }}</p>
                        
                        <div class="mt-4 flex items-center">
                            <form action="{{ route('cart.update', $item) }}" method="POST" class="flex items-center">
                                @csrf
                                @method('PATCH')
                                <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" 
                                       class="w-16 px-2 py-1 border rounded">
                                <button type="submit" class="ml-2 text-blue-600 hover:text-blue-800">
                                    <i class="fas fa-sync-alt"></i>
                                </button>
                            </form>
                            
                            <form action="{{ route('cart.destroy', $item) }}" method="POST" class="ml-4">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div>
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="font-bold text-lg mb-4">Récapitulatif</h3>
                    <div class="flex justify-between mb-2">
                        <span>Sous-total</span>
                        <span>€{{ number_format($total, 2) }}</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span>Livraison</span>
                        <span>Gratuite</span>
                    </div>
                    <div class="border-t my-4"></div>
                    <div class="flex justify-between font-bold text-lg">
                        <span>Total</span>
                        <span>€{{ number_format($total, 2) }}</span>
                    </div>
                    
                    <a href="{{ route('checkout.index') }}" class="mt-6 block w-full bg-blue-600 text-white text-center py-2 rounded-lg hover:bg-blue-700">
                        Passer la commande
                    </a>
                </div>
            </div>
        </div>
    @endif
</div>

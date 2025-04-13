
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-8">Finaliser la commande</h1>
    
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <div>
            <h2 class="text-xl font-bold mb-4">Informations de livraison</h2>
            
            <form action="{{ route('checkout.store') }}" method="POST">
                @csrf
                
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Nom complet</label>
                    <input type="text" name="nom" value="{{ auth()->user()->nom }}" 
                           class="w-full px-4 py-2 border rounded-lg" required>
                </div>
                
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Email</label>
                    <input type="email" name="email" value="{{ auth()->user()->email }}" 
                           class="w-full px-4 py-2 border rounded-lg" required>
                </div>
                
        
                
                
                
              
                
                <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">
                    Payer €{{ number_format($total, 2) }}
                </button>
            </form>
        </div>
        
        <div>
            <h2 class="text-xl font-bold mb-4">Votre commande</h2>
            
            <div class="bg-white rounded-lg shadow p-6">
                @foreach($cartItems as $item)
                <div class="flex justify-between mb-4 pb-4 border-b">
                    <div>
                        <h3 class="font-medium">{{ $item->tenue->nom }}</h3>
                        <p class="text-gray-600 text-sm">Quantité: {{ $item->quantity }}</p>
                    </div>
                    <span>€{{ number_format($item->tenue->prix * $item->quantity, 2) }}</span>
                </div>
                @endforeach
                
                <div class="border-t my-4"></div>
                
                <div class="flex justify-between font-bold text-lg">
                    <span>Total</span>
                    <span>€{{ number_format($total, 2) }}</span>
                </div>
            </div>
        </div>
    </div>
</div>

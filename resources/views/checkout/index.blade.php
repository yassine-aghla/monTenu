
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-8">Finaliser la commande</h1>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="md:col-span-2">
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <h2 class="text-xl font-semibold mb-4">Informations de livraison</h2>
                
                <form id="checkout-form" action="{{ route('checkout.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-4">
                        <label for="shipping_address" class="block text-gray-700 mb-2">Adresse de livraison</label>
                        <textarea id="shipping_address" name="shipping_address" class="w-full border rounded px-3 py-2" rows="3" required></textarea>
                    </div>
                    
                    <div class="mb-4">
                        <label for="billing_address" class="block text-gray-700 mb-2">Adresse de facturation</label>
                        <textarea id="billing_address" name="billing_address" class="w-full border rounded px-3 py-2" rows="3" required></textarea>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="md:col-span-1">
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold mb-4">Votre commande</h2>
                
                @foreach($cartItems as $item)
                <div class="flex justify-between mb-2">
                    <span>{{ $item->tenue->nom }} (x{{ $item->quantity }})</span>
                    <span>{{ $item->tenue->prix * $item->quantity }} €</span>
                </div>
                @endforeach
                
                <div class="border-t my-4"></div>
                <div class="flex justify-between font-bold text-lg mb-4">
                    <span>Total</span>
                    <span>{{ $total }} €</span>
                </div>
                
                <button type="submit" form="checkout-form" class="w-full bg-blue-800 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                    Payer maintenant
                </button>
            </div>
        </div>
    </div>
</div>

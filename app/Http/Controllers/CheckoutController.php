<?php
 namespace App\Http\Controllers;
 
 use App\Models\Cart;
 use App\Models\Order;
 use App\Models\OrderItem;
 use App\Models\Payment;
 use Illuminate\Http\Request;
 use Stripe\Stripe;
 use Stripe\Checkout\Session;
 use Illuminate\Support\Facades\Auth;
 
 class CheckoutController extends Controller
 {
     public function index()
 {
     $cart = Auth::user()->cart;
     
     if (!$cart || $cart->items->isEmpty()) {
         return redirect()->route('cart.index')->with('error', 'Votre panier est vide');
     }
 
     $cartItems = $cart->items()->with('tenue')->get();
     $total = $cartItems->sum(function ($item) {
         return $item->tenue->prix * $item->quantity;
     });
 
     return view('checkout.index', compact('cartItems', 'total'));
 }
    public function store(Request $request)
    {
     try {
              $validatedData = $request->validate([
            'shipping_address' => 'required|string|min:10|max:255',
            'billing_address' => 'required|string|min:10|max:255',]
            , [
            'shipping_address.required' => 'L\'adresse de livraison est obligatoire.',
            'shipping_address.min' => 'L\'adresse de livraison doit contenir au moins 10 caractères.',
            'billing_address.required' => 'L\'adresse de facturation est obligatoire.',
            'billing_address.min' => 'L\'adresse de facturation doit contenir au moins 10 caractères.',
        ]);
         Stripe::setApiKey(config('services.stripe.secret'));
 
         $cart = Auth::user()->cart;
         $cartItems = $cart->items()->with('tenue')->get();
 
         if ($cartItems->isEmpty()) {
             return back()->with('error', 'Votre panier est vide.');
         }
 
         $total = $cartItems->sum(function ($item) {
             return $item->tenue->prix * $item->quantity;
         }) * 100; 
 
         $lineItems = $cartItems->map(function ($item) {
             return [
                 'price_data' => [
                     'currency' => 'eur',
                     'product_data' => [
                         'name' => $item->tenue->nom,
                     ],
                     'unit_amount' => $item->tenue->prix * 100,
                 ],
                 'quantity' => $item->quantity,
             ];
         })->toArray();
 
         $session = Session::create([
             'payment_method_types' => ['card'],
             'line_items' => $lineItems,
             'mode' => 'payment',
             'success_url' => route('checkout.success') . '?session_id={CHECKOUT_SESSION_ID}',
             'cancel_url' => route('checkout.cancel'),
         ]);
 
         $order = Order::create([
             'user_id' => Auth::id(),
             'total' => $total / 100, 
             'status' => 'pending',
             'payment_id' => $session->id,
             'shipping_address' => $validatedData['shipping_address'],
             'billing_address' => $validatedData['billing_address']
         ]);

         Payment::create([
            'order_id' => $order->id,
            'payment_id' => $session->id,
            'payment_method' => 'stripe',
            'amount' => $total / 100,
            'currency' => 'eur',
            'status' => 'pending'
            
        ]); 
 
         foreach ($cartItems as $item) {
             OrderItem::create([
                 'order_id' => $order->id,
                 'tenue_id' => $item->tenue_id,
                 'quantity' => $item->quantity,
                 'price' => $item->tenue->prix
             ]);
         }
 
         $cart->items()->delete();
 
         return redirect($session->url);
 
     } catch (\Stripe\Exception\ApiErrorException $e) {
         
         return back()->with('error', 'Erreur Stripe : ' . $e->getMessage());
     } catch (\Exception $e) {
         
         return back()->with('error', 'Erreur lors du traitement de la commande : ' . $e->getMessage());
     }
 }
 
 public function success(Request $request)
 {
     $sessionId = $request->get('session_id');
 
     if (!$sessionId) {
         return redirect()->route('checkout.cancel')->with('error', 'Session ID manquant');
     }
 
     try {
         Stripe::setApiKey(config('services.stripe.secret'));
         $session = Session::retrieve($sessionId);
 
         
         if ($session->payment_status !== 'paid') {
             return redirect()->route('checkout.cancel')->with('error', 'Paiement non confirmé');
         }
 
         $payment = Payment::where('payment_id', $session->id)->first();
 
         if (!$payment) {
             return redirect()->route('checkout.cancel')->with('error', 'Paiement introuvable');
         }
 
         
         $payment->update([
             'status' => 'succeeded',
             
         ]);
 
        
         $order = $payment->order;
         $order->update(['status' => 'completed']);
 
        
         Auth::user()->cart->items()->delete();
 
         return view('checkout.success', [
             'order' => $order
         ]);
 
     } catch (\Exception $e) {
         \Log::error('Erreur checkout success: '.$e->getMessage());
         return redirect()->route('checkout.cancel')->with('error', 'Erreur lors de la confirmation du paiement: '.$e->getMessage());
     }
 }
    
     public function cancel()
     {
         return view('checkout.cancel');
     }
 }

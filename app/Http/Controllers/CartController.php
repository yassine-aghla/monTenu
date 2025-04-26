<?php
 namespace App\Http\Controllers;
 
 use App\Models\Cart;
 use App\Models\CartItem;
 use App\Models\Tenue;
 use Illuminate\Http\Request;
 use Illuminate\Support\Facades\Auth;
 
 class CartController extends Controller
 {
     public function index()
     {
         if (!Auth::check()) {
             return redirect()->route('login');
         }
 
         $cart = Auth::user()->cart ?? Cart::create(['user_id' => Auth::id()]);
         $cartItems = $cart->items()->with('tenue')->get();
         
         $total = $cartItems->sum(function ($item) {
             return $item->tenue->prix * $item->quantity;
         });
         
         return view('cart.index', compact('cartItems', 'total'));
     }
 
     public function add(Tenue $tenue, Request $request)
     {
         if (!Auth::check()) {
             return redirect()->route('login');
         }
         
         $cart = Auth::user()->cart ?? Cart::create(['user_id' => Auth::id()]);
         
         $cartItem = $cart->items()->where('tenue_id', $tenue->id)->first();
 
         if ($cartItem) {
             $cartItem->increment('quantity');
         } else {
             CartItem::create([
                 'cart_id' => $cart->id,
                 'tenue_id' => $tenue->id,
                 'quantity' => 1
             ]);
         }
 
         return redirect()->back()->with('success', 'Produit ajouté au panier');
     }
 
     public function update(CartItem $cartItem, Request $request)
     {
       
         $request->validate([
             'quantity' => 'required|numeric|min:1'
         ]);
     
         $cartItem->update(['quantity' => $request->quantity]);
     
         return redirect()->back()->with('success', 'Panier mis à jour');
     }
 
     
 
     public function remove(CartItem $cartItem)
     {
         $cartItem->delete();
         return redirect()->back()->with('success', 'Produit retiré du panier');
     }
 }

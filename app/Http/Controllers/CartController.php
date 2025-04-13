<?php
namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Tenue;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = auth()->user()->carts()->with('tenue.images')->get();
        $total = $cartItems->sum(function($item) {
            return $item->tenue->prix * $item->quantity;
        });
        
        return view('cart.index', compact('cartItems', 'total'));
    }

    public function store(Tenue $tenue, Request $request)
    {
        $cartItem = auth()->user()->carts()->where('tenue_id', $tenue->id)->first();
        
        if ($cartItem) {
            $cartItem->increment('quantity');
        } else {
            auth()->user()->carts()->create([
                'tenue_id' => $tenue->id,
                'quantity' => $request->quantity ?? 1
            ]);
        }
        
        return back()->with('success', 'Produit ajouté au panier');
    }

    public function update(Cart $cart, Request $request)
    {
        $cart->update(['quantity' => $request->quantity]);
        return back()->with('success', 'Panier mis à jour');
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();
        return back()->with('success', 'Produit retiré du panier');
    }
}

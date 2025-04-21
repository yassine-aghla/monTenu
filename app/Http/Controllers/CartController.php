<?php
namespace App\Http\Controllers;

use App\Models\Cart;
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
        $cartItems = Auth::user()->carts()->with('tenue')->get();
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
        
        $cartItem = Cart::where('user_id', auth()->id())
                        ->where('tenue_id', $tenue->id)
                        ->first();

        if ($cartItem) {
            $cartItem->increment('quantity');
        } else {
            Cart::create([
                'user_id' => auth()->id(),
                'tenue_id' => $tenue->id,
                'quantity' => 1
            ]);
        }

        return redirect()->back()->with('success', 'Produit ajouté au panier');
    }

    public function update(Cart $cart, Request $request)
    {
        $request->validate([
            'quantity' => 'required|numeric|min:1'
        ]);

        $cart->update(['quantity' => $request->quantity]);

        return redirect()->back()->with('success', 'Panier mis à jour');
    }

    public function remove(Cart $cart)
    {
        $cart->delete();
        return redirect()->back()->with('success', 'Produit retiré du panier');
    }
}
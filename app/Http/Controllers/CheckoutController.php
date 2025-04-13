<?php
namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $cartItems = auth()->user()->carts()->with('tenue')->get();
        $total = $cartItems->sum(function($item) {
            return $item->tenue->prix * $item->quantity;
        });
        
        return view('checkout.index', compact('cartItems', 'total'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'email' => 'required|email',
           
        ]);
        
        
        auth()->user()->update($request->only([
            'nom', 'email'
        ]));
        
        return redirect()->route('payment.create');
    }
}
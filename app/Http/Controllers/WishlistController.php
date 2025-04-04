<?php

namespace App\Http\Controllers;

use App\Models\Tenue;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlistItems = Auth::user()->wishlistTenues()
                               ->with('brand', 'images')
                               ->get();
        
        return view('wishlist.index', compact('wishlistItems'));
    }

    public function store(Tenue $tenue)
    {
        Auth::user()->wishlistTenues()->attach($tenue->id);
        
        return back()->with('success', 'Produit ajouté à votre wishlist');
    }

    public function destroy(Tenue $tenue)
    {
        Auth::user()->wishlistTenues()->detach($tenue->id);
        
        return back()->with('success', 'Produit retiré de votre wishlist');
    }
}

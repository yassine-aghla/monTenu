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
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $wishlistItems = Auth::user()->wishlistTenues()
                               ->with('brand', 'images')
                               ->get();
        
        return view('wishlist.index', compact('wishlistItems'));
    }

   
public function store(Tenue $tenue)
{
    if (auth()->user()->wishlistTenues()->where('tenue_id', $tenue->id)->exists()) {
        return response()->json(['message' => 'Déjà dans la wishlist']);
    }

    auth()->user()->wishlistTenues()->attach($tenue->id);
    
    return response()->json([
        'message' => 'Ajouté à la wishlist',
        'wishlistCount' => auth()->user()->wishlistTenues()->count()
    ]);
}

public function destroy(Tenue $tenue)
{
    auth()->user()->wishlistTenues()->detach($tenue->id);
    return back()->with('success', 'Produit retiré de votre wishlist');
}
}

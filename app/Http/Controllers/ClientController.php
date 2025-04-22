<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = User::withCount('orders')->get();
        return view('clients.index', compact('clients'));
    }

    public function ban(User $user)
    {
        
       $user->update(['is_banned' => true]);
        return back()->with('success', 'Client banni avec succès');
    }
     
    public function Active(User $user)
    {
        
        $user->update(['is_banned' => false]);
        return back()->with('success', 'Client Active avec succès');
    }


    
}

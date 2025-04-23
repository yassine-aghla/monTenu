<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
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


    public function destroy(User $user)
    {
        
        $user->delete();
        return back()->with('success', 'Client supprimé avec succès');
    }

   public function assignRole(Request $request, User $user)
{
    $request->validate([
        'role' => 'required|in:admin,client'
    ]);
    
    
    $user->roles()->detach();
    
 
    $role = Role::where('name', $request->role)->first();
    $user->roles()->attach($role);
    
    return back()->with('success', 'Rôle attribué avec succès');
}
}

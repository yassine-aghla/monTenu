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
        try {
            $user->update(['is_banned' => true]);
            return back()->with('success', 'Client banni avec succès');
        } catch (\Exception $e) {
            return back()->with('error', 'Erreur lors du bannissement : ' . $e->getMessage());
        }
    }
    
    public function active(User $user)
    {
        try {
            $user->update(['is_banned' => false]);
            return back()->with('success', 'Client activé avec succès');
        } catch (\Exception $e) {
            return back()->with('error', 'Erreur lors de l’activation : ' . $e->getMessage());
        }
    }
    
    public function destroy(User $user)
    {
        try {
            $user->delete();
            return back()->with('success', 'Client supprimé avec succès');
        } catch (\Exception $e) {
            return back()->with('error', 'Erreur lors de la suppression : ' . $e->getMessage());
        }
    }
    
    public function assignRole(Request $request, User $user)
    {
        try {
            $request->validate([
                'role' => 'required|in:admin,client'
            ]);
    
            $user->roles()->detach();
    
            $role = Role::where('name', $request->role)->first();
    
            if (!$role) {
                return back()->with('error', 'Rôle introuvable');
            }
    
            $user->roles()->attach($role);
    
            return back()->with('success', 'Rôle attribué avec succès');
        } catch (\Exception $e) {
            return back()->with('error', 'Erreur lors de l\'attribution du rôle : ' . $e->getMessage());
        }
    }
    
}

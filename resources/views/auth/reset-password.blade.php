@extends('layouts.app')

@section('title', 'Réinitialisation du mot de passe - Football Marketplace')

@php
    $isAuthPage = true; 
@endphp

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-900 to-blue-700 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full bg-white rounded-xl shadow-2xl overflow-hidden">
        
        <div class="h-32 bg-cover bg-center" style="background-image: url('/api/placeholder/800/300')">
            <div class="h-full w-full bg-gradient-to-b from-blue-900/30 to-blue-900/90 flex items-end">
                <div class="p-4 flex items-center">
                    <i class="fas fa-futbol text-white text-xl mr-3"></i>
                    <h1 class="text-xl font-bold text-white">Football Marketplace</h1>
                </div>
            </div>
        </div>
     
        <div class="p-8">
            <div class="text-center mb-8">
                <h2 class="text-2xl font-extrabold text-gray-800">Réinitialisation du mot de passe</h2>
                <p class="mt-2 text-sm text-gray-600">
                    Créez votre nouveau mot de passe
                </p>
            </div>
            
            <form method="POST" action="{{ route('password.update') }}" class="space-y-6">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                
             
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">
                        Adresse email
                    </label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-envelope text-gray-400"></i>
                        </div>
                        <input type="email" id="email" name="email" required value="{{ $email ?? old('email') }}"
                            class="pl-10 block w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="votre@email.com">
                    </div>
                </div>
               
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">
                        Nouveau mot de passe
                    </label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        <input type="password" id="password" name="password" required
                            class="pl-10 block w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="••••••••">
                    </div>
                </div>
                
              
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">
                        Confirmer le mot de passe
                    </label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        <input type="password" id="password_confirmation" name="password_confirmation" required
                            class="pl-10 block w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="••••••••">
                    </div>
                </div>
                
               
                <div>
                    <button type="submit" 
                        class="relative w-full bg-gradient-to-r from-blue-800 to-blue-600 text-white py-3 px-4 rounded-lg
                        hover:from-blue-700 hover:to-blue-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500
                        font-medium transition-all duration-300 overflow-hidden group">
                        <span class="absolute w-0 h-0 transition-all duration-300 ease-out bg-white rounded-full group-hover:w-full group-hover:h-56 opacity-10"></span>
                        <span class="relative flex items-center justify-center">
                            <i class="fas fa-key mr-2"></i>
                            Réinitialiser le mot de passe
                        </span>
                    </button>
                </div>
            </form>
           
            <div class="mt-8 text-center">
                <p class="text-sm text-gray-600">
                    <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:text-blue-500 flex items-center justify-center">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Retour à la connexion
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
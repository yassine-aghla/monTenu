@extends('layouts.app')

@section('title', 'Inscription - Football Marketplace')

@php
    $isAuthPage = true; 
@endphp

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-900 to-blue-700 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-lg w-full bg-white rounded-xl shadow-2xl overflow-hidden">
        
        <div class="h-32 bg-cover bg-center" style="background-image: url('/api/placeholder/800/300')">
            <div class="h-full w-full bg-gradient-to-b from-blue-900/30 to-blue-900/90 flex items-end">
                <div class="p-4 flex items-center">
                    <i class="fas fa-futbol text-white text-xl mr-3"></i>
                    <h1 class="text-xl font-bold text-white">Football Marketplace</h1>
                </div>
            </div>
        </div>
        
        
        <div class="p-8">
            <div class="text-center mb-6">
                <h2 class="text-2xl font-extrabold text-gray-800">Créez votre compte</h2>
                <p class="mt-2 text-sm text-gray-600">
                    Rejoignez notre communauté de passionnés de football
                </p>
            </div>
            
            <form method="POST" action="{{ route('register.submit') }}" class="space-y-5">
                @csrf
                
               
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">
                        Nom complet
                    </label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-user text-gray-400"></i>
                        </div>
                        <input type="text" id="name" name="name" 
                            class="pl-10 block w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Votre nom">
                            @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
               
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">
                        Adresse email
                    </label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-envelope text-gray-400"></i>
                        </div>
                        <input type="email" id="email" name="email" 
                            class="pl-10 block w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="votre@email.com">
                            @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror

                    </div>
                </div>
                
              
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">
                        Mot de passe
                    </label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        <input type="password" id="password" name="password" 
                            class="pl-10 block w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="••••••••">
                            @error('password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <p class="mt-1 text-xs text-gray-500">
                        Minimum 8 caractères, incluant lettres et chiffres
                    </p>
                </div>
                
               
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">
                        Confirmer le mot de passe
                    </label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        <input type="password" id="password_confirmation" name="password_confirmation" 
                            class="pl-10 block w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="••••••••">
                            @error('password_confirmation')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                

                <div>
                    <button type="submit" 
                        class="relative w-full bg-gradient-to-r from-blue-700 to-blue-500 text-white py-3 px-4 rounded-lg
                        hover:from-blue-600 hover:to-blue-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500
                        font-medium transition-all duration-300 overflow-hidden group">
                        <span class="absolute w-0 h-0 transition-all duration-300 ease-out bg-white rounded-full group-hover:w-full group-hover:h-56 opacity-10"></span>
                        <span class="relative flex items-center justify-center">
                            <i class="fas fa-user-plus mr-2"></i>
                            Créer mon compte
                        </span>
                    </button>
                </div>
            </form>

            <div class="mt-6 text-center">
                <p class="text-sm text-gray-600">
                    Déjà membre ?
                    <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:text-blue-500">
                        Connectez-vous ici
                    </a>
                </p>
            </div>
        </div>
    </div>
    
  
</div>
@endsection
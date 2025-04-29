@extends('layouts.app')

@section('title', 'Connexion - Football Marketplace')

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
                <h2 class="text-2xl font-extrabold text-gray-800">Connexion à votre compte</h2>
                <p class="mt-2 text-sm text-gray-600">
                    Accédez à votre collection de maillots préférés
                </p>
            </div>
            
            <form method="POST" action="{{ route('login.submit') }}" class="space-y-6">
                @csrf
                
                
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">
                        Adresse email
                    </label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-envelope text-gray-400"></i>
                        </div>
                        <input type="email" id="email" name="email" required
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
                        <input type="password" id="password" name="password" required
                            class="pl-10 block w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="••••••••">
                            @error('password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember_me" name="remember" type="checkbox" 
                            class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <label for="remember_me" class="ml-2 block text-sm text-gray-700">
                            Se souvenir de moi
                        </label>
                    </div>
                    
                    <div class="text-sm">
                        <a href="{{ route('password.request') }}" class="font-medium text-blue-600 hover:text-blue-500">
                            Mot de passe oublié ?
                        </a>
                    </div>
                </div>
                
               
                <div>
                    <button type="submit" 
                        class="relative w-full bg-gradient-to-r from-blue-800 to-blue-600 text-white py-3 px-4 rounded-lg
                        hover:from-blue-700 hover:to-blue-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500
                        font-medium transition-all duration-300 overflow-hidden group">
                        <span class="absolute w-0 h-0 transition-all duration-300 ease-out bg-white rounded-full group-hover:w-full group-hover:h-56 opacity-10"></span>
                        <span class="relative flex items-center justify-center">
                            <i class="fas fa-sign-in-alt mr-2"></i>
                            Se connecter
                        </span>
                    </button>
                </div>
            </form>

            <input type="hidden" id="email" name="email">
                        @error('error')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
            
            
            <div class="mt-8 relative">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-300"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-4 bg-white text-gray-500">ou continuez avec</span>
                </div>
            </div>
      
            <div class="mt-6 grid grid-cols-3 gap-3">
                <div>
                    <a href="#" class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                        <i class="fab fa-google text-red-500"></i>
                    </a>
                </div>
                <div>
                    <a href="#" class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                        <i class="fab fa-facebook-f text-blue-600"></i>
                    </a>
                </div>
                <div>
                    <a href="#" class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                        <i class="fab fa-twitter text-blue-400"></i>
                    </a>
                </div>
            </div>
            
            
            <div class="mt-8 text-center">
                <p class="text-sm text-gray-600">
                    Vous n'avez pas encore de compte ?
                    <a href="{{ route('register') }}" class="font-medium text-blue-600 hover:text-blue-500">
                        Inscrivez-vous maintenant
                    </a>
                </p>
            </div>
        </div>
    </div>
    

@endsection
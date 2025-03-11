@extends('layouts.app')

@section('title', 'Connexion')

@php
    $isAuthPage = true; // Masquer la sidebar et le header
@endphp

@section('content')
<div class="bg-white p-8 rounded-lg shadow-lg w-96">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Connexion</h1>
    <form>
        <div class="mb-4">
            <label for="email" class="block text-gray-700">Email :</label>
            <input type="email" id="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div class="mb-6">
            <label for="password" class="block text-gray-700">Mot de passe :</label>
            <input type="password" id="password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-300">Se connecter</button>
    </form>
    <div class="mt-4 text-center">
        <a href="{{ route('password.request') }}" class="text-blue-500 hover:underline">Mot de passe oublié ?</a>
    </div>
    <div class="mt-4 text-center">
        <a href="{{ route('register') }}" class="text-blue-500 hover:underline">j'ai pas un compte</a>
    </div>
</div>
@endsection
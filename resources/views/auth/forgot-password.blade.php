@extends('layouts.app')

@section('title', 'Mot de passe oublié')

@php
    $isAuthPage = true; // Masquer la sidebar et le header
@endphp

@section('content')
<div class="bg-white p-8 rounded-lg shadow-lg w-96">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Mot de passe oublié</h1>
    <form>
        <div class="mb-6">
            <label for="email" class="block text-gray-700">Email :</label>
            <input type="email" id="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-300">Envoyer le lien de réinitialisation</button>
    </form>
    <div class="mt-4 text-center">
        <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Retour à la connexion</a>
    </div>
</div>
@endsection
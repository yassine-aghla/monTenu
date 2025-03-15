@extends('layouts.app')

@section('title', 'Réinitialisation du mot de passe')

@php
    $isAuthPage = true; 
@endphp

@section('content')
@extends('layouts.app')

@section('title', 'Réinitialisation du mot de passe')

@php
    $isAuthPage = true;
@endphp

@section('content')
<div class="bg-white p-8 rounded-lg shadow-lg w-96">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Réinitialisation du mot de passe</h1>
    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="mb-4">
            <label for="email" class="block text-gray-700">Email :</label>
            <input type="email" id="email" name="email" value="{{ $email }}" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>
        <div class="mb-4">
            <label for="password" class="block text-gray-700">Nouveau mot de passe :</label>
            <input type="password" id="password" name="password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>
        <div class="mb-6">
            <label for="password_confirmation" class="block text-gray-700">Confirmer le mot de passe :</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>
        <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-300">Réinitialiser le mot de passe</button>
    </form>
</div>
@endsection
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Détails de la Permission : {{ $permission->name }}</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Nom de la Permission</h5>
            <p class="card-text">{{ $permission->name }}</p>
            <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-warning">Éditer</a>
            <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </div>
    </div>
</div>
@endsection
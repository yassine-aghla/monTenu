@extends('layouts.app')

@section('content')

@if(session('succes'))
    <div class="alert alert-success">
        {{ session('succes') }}
    </div>
@endif
<div class="bg-white p-6 rounded-lg shadow-md mb-6">
    <h2 class="text-xl font-semibold mb-4">Manage categorie</h2>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Id</th>
                    <th class="py-2 px-4 border-b">name</th>
                    <th class="py-2 px-4 border-b">description</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            @foreach ($categorie as $cat )
            <tbody>
                <tr>
                    <td class="py-2 px-4 border-b">{{$cat->id}}</td>
                    <td class="py-2 px-4 border-b">{{$cat->name}}</td>
                    <td class="py-2 px-4 border-b">{{$cat->description}}</td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('categories.show', $cat) }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">Voir</a>
                        <a href="{{ route('categories.edit', $cat) }}" class="bg-green-500 text-white px-4 py-2 rounded-md">Modifier</a>
                        <form action="{{ route('categories.destroy',$cat) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded">Supprimer</button>
                    </form>
                    </td>
                </tr>
            </tbody>
            
        @endforeach
        </table>
    </div>
</div>
@endsection
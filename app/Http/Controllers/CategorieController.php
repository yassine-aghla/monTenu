<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Http\Requests\categorieRequest;

class categorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorie=Categorie::all();
        return view('categories.index',compact('categorie'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(categorieRequest $request)
    {
        
        Categorie::create($request->validated());
        redirect()->route('categories.index')->with('succes','categorie creé avec succes');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categorie  $categorie)
    {
        return view('categories.show',compact('categorie'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categorie  $categorie)
    {
        return view('categories.edit',compact('categorie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(categorieRequest $request, Categorie $categorie)
    {
        $categorie->update($request->validated());
        return redirect()->route('categories.index')->with('succes','la categorie update avec succes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categorie $categorie)
    {
       
        $categorie->delete();
        return redirect()->route('categories.index')->with('succes','la categorie supprime avec succes');
    }
}

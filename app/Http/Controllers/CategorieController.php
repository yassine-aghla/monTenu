<?php

namespace App\Http\Controllers;

use App\Http\Requests\categorieRequest;
use App\Models\Category;

use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(CategorieRequest $request)
    {
        Category::create($request->validated());
        return redirect()->route('categories.index')->with('success', 'Catégorie créée avec succès.');
    }

    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(CategorieRequest $request, Category $category)
    {
        $category->update($request->validated());
        return redirect()->route('categories.index')->with('success', 'Catégorie mise à jour avec succès.');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Catégorie supprimée avec succès.');
    }
}
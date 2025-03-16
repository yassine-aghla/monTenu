<?php
namespace App\Http\Controllers;

use App\Models\Tenue;
use App\Models\Categorie;
use App\Http\Requests\TenueRequest;

use Illuminate\Http\Request;

class TenueController extends Controller
{
    public function index()
    {
        $tenues = Tenue::with('categorie')->get();
        return view('tenues.index', compact('tenues'));
    }

    public function create()
    {
        $categories = Categorie::all();
        return view('tenues.create', compact('categories'));
    }

    public function store(TenueRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }
        Tenue::create($data);
        return redirect()->route('tenues.index')->with('success', 'Tenue créée avec succès.');
    }

    public function show(Tenue $tenue)
    {
        return view('tenues.show', compact('tenue'));
    }

    public function edit(Tenue $tenue)
    {
        $categories = Categorie::all();
        return view('tenues.edit', compact('tenue', 'categories'));
    }

    public function update(TenueRequest $request, Tenue $tenue)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }
        $tenue->update($data);
        return redirect()->route('tenues.index')->with('success', 'Tenue mise à jour avec succès.');
    }

    public function destroy(Tenue $tenue)
    {
        $tenue->delete();
        return redirect()->route('tenues.index')->with('success', 'Tenue supprimée avec succès.');
    }
}
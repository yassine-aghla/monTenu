<?php
namespace App\Http\Controllers;

use App\Models\Tenue;
use App\Models\Category;
use App\Models\TenueImage;
use App\Http\Requests\TenueRequest;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class TenueController extends Controller
{
    public function index()
    {
        if (!auth()->user()->hasPermission('Gérer les produits')) {
            abort(403, 'Accès interdit');
        }
        $tenues = Tenue::with('category')->get();
        return view('tenues.index', compact('tenues'));
    }

    public function create()
    {
        if (!auth()->user()->hasPermission('Gérer les produits')) {
            abort(403, 'Accès interdit');
        }
        $categories = Category::all();
        return view('tenues.create', compact('categories'));
    }

    public function store(TenueRequest $request)
    {
        if (!auth()->user()->hasPermission('Gérer les produits')) {
            abort(403, 'Accès interdit');
        }
    
        $data = $request->validated();
        $tenue = Tenue::create($data);
    
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('images', 'public');
                $tenue->images()->create([
                    'image_path' => $path,
                    
                    
                ]);
            }
        }
    
        return redirect()->route('tenues.index')->with('success', 'Tenue créée avec succès.');
    }

    public function show(Tenue $tenue)
    {
        if (!auth()->user()->hasPermission('Gérer les produits')) {
            abort(403, 'Accès interdit');
        }
        return view('tenues.show', compact('tenue'));
    }

    public function edit(Tenue $tenue)
    {
        if (!auth()->user()->hasPermission('Gérer les produits')) {
            abort(403, 'Accès interdit');
        }
        $categories = Category::all();
        return view('tenues.edit', compact('tenue', 'categories'));
    }

    public function update(TenueRequest $request, Tenue $tenue)
    {
        if (!auth()->user()->hasPermission('Gérer les produits')) {
            abort(403, 'Accès interdit');
        }
    
        $data = $request->validated();
        $tenue->update($data);
    
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('images', 'public');
                $tenue->images()->create([
                    'image_path' => $path,
                   
                ]);
            }
        }
    
        return redirect()->route('tenues.index')->with('success', 'Tenue mise à jour avec succès.');
    }

    public function destroy(Tenue $tenue)
    {
        if (!auth()->user()->hasPermission('Gérer les produits')) {
            abort(403, 'Accès interdit');
        }
        $tenue->delete();
        return redirect()->route('tenues.index')->with('success', 'Tenue supprimée avec succès.');
    }

    public function destroyImage(TenueImage $image)
{
    if (!auth()->user()->hasPermission('Gérer les produits')) {
        abort(403, 'Accès interdit');
    }

    Storage::disk('public')->delete($image->image_path);
    $image->delete();

    return back()->with('success', 'Image supprimée avec succès.');
}
}
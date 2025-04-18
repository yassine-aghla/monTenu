<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Requests\BrandRequest;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('brands.index', compact('brands'));
    }

    public function create()
    {
        return view('brands.create');
    }

    public function store(BrandRequest $request)
    {
     $data = $request->validated();
    
    if ($request->hasFile('logo')) {
        $data['logo'] = $request->file('logo')->store('brands', 'public');
    }
    
    Brand::create($data);
    return redirect()->route('brands.index')->with('success', 'Marque créée !');
    }

    public function edit(Brand $brand)
    {
        return view('brands.edit', compact('brand'));
    }

    public function update(BrandRequest $request, Brand $brand)
    {
        $data = $request->validated();
    
        if ($request->hasFile('logo')) {
            
            if ($brand->logo) {
                Storage::disk('public')->delete($brand->logo);
            }
            $data['logo'] = $request->file('logo')->store('brands', 'public');
        }
        
        $brand->update($data);
        return redirect()->route('brands.index')->with('success', 'Marque mise à jour !');
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->route('brands.index')->with('success', 'Marque supprimée !');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\HeroSection;
use App\Http\Requests\HeroSectionRequest;
use Illuminate\Support\Facades\Storage;

class HeroSectionController extends Controller
{
    public function index()
    {
        $heroSections = HeroSection::all();
        return view('hero-sections.index', compact('heroSections'));
    }

    public function create()
    {
        return view('hero-sections.create');
    }

    public function store(HeroSectionRequest $request)
    {
        $validated = $request->validated();
        
        $path = $request->file('thumbnail')->store('hero-images', 'public');

        HeroSection::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'thumbnail_url' => $path,
        ]);

        return redirect()->route('hero-sections.index')->with('success', 'Hero section créée');
    }

    public function edit(HeroSection $heroSection)
    {
        return view('hero-sections.edit', compact('heroSection'));
    }

    public function update(HeroSectionRequest $request, HeroSection $heroSection)
    {
        $validated = $request->validated();

        $data = [
            'name' => $validated['name'],
            'description' => $validated['description'],
        ];

        if ($request->hasFile('thumbnail')) {
            Storage::disk('public')->delete($heroSection->thumbnail_url);
            $data['thumbnail_url'] = $request->file('thumbnail')->store('hero-images', 'public');
        }

        $heroSection->update($data);

        return redirect()->route('hero-sections.index')->with('success', 'Hero section mise à jour');
    }

    public function destroy(HeroSection $heroSection)
    {
        Storage::disk('public')->delete($heroSection->thumbnail_url);
        $heroSection->delete();
        return back()->with('success', 'Hero section supprimée');
    }

    public function setActive(HeroSection $heroSection)
    {
        HeroSection::query()->update(['is_active' => false]);
        $heroSection->update(['is_active' => true]);
        return back()->with('success', 'Hero section activée');
    }
}
<?php
namespace App\Http\Controllers;

use App\Models\HeroSection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'thumbnail' => 'required|image|max:2048',
        ]);

        $path = $request->file('thumbnail')->store('hero-images', 'public');

        HeroSection::create([
            'name' => $request->name,
            'description' => $request->description,
            'thumbnail_url' => $path,
        ]);

        return redirect()->route('hero-sections.index')->with('success', 'Hero section créée');
    }

    public function edit(HeroSection $heroSection)
    {
        return view('hero-sections.edit', compact('heroSection'));
    }

    public function update(Request $request, HeroSection $heroSection)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'thumbnail' => 'nullable|image|max:2048',
        ]);

        $data = [
            'name' => $request->name,
            'description' => $request->description,
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
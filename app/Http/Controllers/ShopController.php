<?php
namespace App\Http\Controllers;

use App\Models\Tenue;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $query = Tenue::query()->where('disponible', true);

       
        if ($request->filled('brand')) {
            $query->where('brand_id', $request->brand);
        }

        
        if ($request->filled('category')) {
            $query->where('categorie_id', $request->category);
        }

       
        if ($request->filled('equipe')) {
            $query->where('equipe', 'like', '%'.$request->equipe.'%');
        }

        if ($request->filled('number')) {
            $query->where('number', 'like', '%'.$request->number.'%');
        }

       
        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('nom', 'like', '%'.$request->search.'%')
                  ->orWhere('description', 'like', '%'.$request->search.'%');
            });
        }

        $tenues = $query->with('brand', 'category', 'images')->paginate(12);
        $brands = Brand::orderBy('nom')->get();
        $categories = Category::orderBy('name')->get();

        return view('shop.index', compact('tenues', 'brands', 'categories'));
    }
}
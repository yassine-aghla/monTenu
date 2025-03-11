<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PanierController extends Controller
{
    
    public function create()
    {
        return view('paniers.create');
    }
}

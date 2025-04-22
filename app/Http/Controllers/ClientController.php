<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = User::withCount('orders')->get();
        return view('clients.index', compact('clients'));
    }


}

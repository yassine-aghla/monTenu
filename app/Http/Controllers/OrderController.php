<?php
namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $orders = auth()->user()->orders()
                    ->with('items.tenue')
                    ->orderBy('created_at', 'desc')
                    ->paginate(10);
                   
       

        return view('orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        
        if ($order->user_id !== auth()->id()) {
            abort(403);
        }

        $order->load('items.tenue');
        

        return view('orders.show', compact('order'));
    }

    public function display()
    {
        $orders = Order::with(['user', 'items.tenue'])
                    ->orderBy('created_at', 'desc')
                    ->paginate(10);

        return view('commandes.index', compact('orders'));
    }

   
public function showBack(Order $order) 
{
    $order->load(['user', 'items.tenue']);
    return view('commandes.show', compact('order')); 
}
}
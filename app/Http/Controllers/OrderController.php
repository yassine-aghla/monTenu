<?php
namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
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
}

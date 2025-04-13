<?php
namespace App\Http\Controllers;

use Stripe\Stripe;
use Stripe\Charge;
use App\Models\Cart;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function create()
    {
        $cartItems = auth()->user()->carts()->with('tenue')->get();
        $total = $cartItems->sum(function($item) {
            return $item->tenue->prix * $item->quantity;
        });
        
        return view('payment.create', [
            'total' => $total,
            'intent' => auth()->user()->createSetupIntent()
        ]);
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $cartItems = $user->carts()->with('tenue')->get();
        $total = $cartItems->sum(function($item) {
            return $item->tenue->prix * $item->quantity;
        });
        
        try {
            $payment = $user->charge(
                $total * 100, // Convertir en centimes
                $request->payment_method
            );
            
            // Créer la commande
            $order = $user->orders()->create([
                'total' => $total,
                'payment_id' => $payment->id,
                'status' => 'completed'
            ]);
            
            // Ajouter les produits à la commande
            foreach ($cartItems as $item) {
                $order->items()->create([
                    'tenue_id' => $item->tenue_id,
                    'quantity' => $item->quantity,
                    'price' => $item->tenue->prix
                ]);
            }
            
            // Vider le panier
            $user->carts()->delete();
            
            return redirect()->route('payment.success');
        } catch (\Exception $e) {
            return redirect()->route('payment.cancel');
        }
    }

    public function success()
    {
        return view('payment.success');
    }

    public function cancel()
    {
        return view('payment.cancel');
    }
}

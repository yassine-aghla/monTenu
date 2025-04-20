<?php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Tenue;
use App\Models\Category;
use App\Models\Brand;

class DashboardController extends Controller
{
    public function index()
    {
     
        $totalRevenue = Order::where('status', 'completed')->sum('total');
        $newCustomers = User::where('created_at', '>=', now()->subDays(30))->count();
        $totalOrders = Order::count();
        $pendingOrders = Order::where('status', 'pending')->count();
        $stats = [
            'total_tenues' => Tenue::count(),
            'total_categories' => Category::count(),
            'total_brands' => Brand::count()
        ];

        
        $recentOrders = Order::with(['user', 'items.tenue'])
                            ->latest()
                            ->take(5)
                            ->get();

        return view('dashboard', compact(
            'totalRevenue',
            'newCustomers',
            'totalOrders',
            'pendingOrders',
            'recentOrders',
            'stats'
        ));
    }
}

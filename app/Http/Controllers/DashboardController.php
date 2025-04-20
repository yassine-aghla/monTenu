<?php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
     
        $totalRevenue = Order::where('status', 'completed')->sum('total');
        $newCustomers = User::where('created_at', '>=', now()->subDays(30))->count();
        
    }
}

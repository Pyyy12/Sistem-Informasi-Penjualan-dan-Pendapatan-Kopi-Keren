<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Expense;
use App\Models\Sale;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalRevenue = Sale::sum('total_revenue');
        $totalExpenses = Expense::sum('amount');
        $netProfit = $totalRevenue - $totalExpenses;

        $carts = Cart::withCount('sales')->get();

        // Data Grafik 7 Hari Terakhir
        $chartDates = collect(range(6, 0))->map(fn($day) => now()->subDays($day)->format('Y-m-d'));

        $chartRevenue = [];
        $chartExpense = [];

        foreach ($chartDates as $date) {
            $chartRevenue[] = Sale::whereDate('date', $date)->sum('total_revenue');
            $chartExpense[] = Expense::whereDate('date', $date)->sum('amount');
        }

        return view('dashboard', compact(
            'totalRevenue',
            'totalExpenses',
            'netProfit',
            'carts',
            'chartDates',
            'chartRevenue',
            'chartExpense'
        ));
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function create()
    {
        $carts = Cart::all();
        return view('expenses.create', compact('carts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cart_id' => 'required|exists:carts,id',
            'date' => 'required|date',
            'title' => 'required|string|max:255',
            'amount' => 'required|numeric|min:500',
        ]);

        Expense::create($request->all());

        return redirect()->route('dashboard')->with('success', 'Pengeluaran operasional berhasil dicatat!');
    }
}
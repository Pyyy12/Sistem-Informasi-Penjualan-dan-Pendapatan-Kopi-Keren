<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    public function create()
    {
        $carts = Cart::all();
        $products = Product::all();
        return view('sales.create', compact('carts', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cart_id' => 'required|exists:carts,id',
            'date' => 'required|date',
            'items' => 'required|array',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.qty' => 'required|integer|min:0',
        ]);

        $totalQty = collect($request->items)->sum('qty');

        // Validasi batasan muatan per gerobak (80 pcs)
        if ($totalQty > 80) {
            return back()->withInput()->withErrors(['error' => 'Total cup terjual (' . $totalQty . ') melebihi kapasitas gerobak (maks 80 pcs)!']);
        }

        DB::transaction(function () use ($request, $totalQty) {
            $sale = Sale::create([
                'cart_id' => $request->cart_id,
                'date' => $request->date,
                'total_qty' => $totalQty,
                'total_revenue' => 0,
            ]);

            $totalRevenue = 0;

            foreach ($request->items as $item) {
                if ($item['qty'] > 0) {
                    $product = Product::findOrFail($item['product_id']);
                    $subtotal = $product->price * $item['qty'];
                    $totalRevenue += $subtotal;

                    SaleDetail::create([
                        'sale_id' => $sale->id,
                        'product_id' => $product->id,
                        'qty' => $item['qty'],
                        'subtotal' => $subtotal,
                    ]);
                }
            }

            $sale->update(['total_revenue' => $totalRevenue]);
        });

        return redirect()->route('dashboard')->with('success', 'Penjualan gerobak berhasil dicatat!');
    }
}
@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded-xl shadow border border-amber-100">
    <h2 class="text-xl font-bold mb-4 text-amber-950">Catat Penjualan Harian Gerobak</h2>
    <p class="text-sm text-gray-500 mb-6">Maksimal stok bawaan per gerobak adalah <strong>80 pcs</strong>.</p>

    <form action="{{ route('sales.store') }}" method="POST">
        @csrf
        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-sm font-medium mb-1">Pilih Gerobak</label>
                <select name="cart_id" class="w-full border rounded-lg p-2" required>
                    @foreach($carts as $cart)
                        <option value="{{ $cart->id }}">{{ $cart->name }} ({{ $cart->driver_name }})</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Tanggal</label>
                <input type="date" name="date" value="{{ date('Y-m-d') }}" class="w-full border rounded-lg p-2" required>
            </div>
        </div>

        <h3 class="font-bold text-sm text-gray-700 mt-6 mb-2">Penjualan 8 Menu Kopi:</h3>
        <div class="space-y-3">
            @foreach($products as $index => $product)
                <div class="flex items-center justify-between border-b pb-2">
                    <div>
                        <div class="font-medium">{{ $product->name }}</div>
                        <div class="text-xs text-gray-400">Rp {{ number_format($product->price, 0, ',', '.') }} / pcs</div>
                    </div>
                    <input type="hidden" name="items[{{ $index }}][product_id]" value="{{ $product->id }}">
                    <div class="w-24">
                        <input type="number" name="items[{{ $index }}][qty]" value="0" min="0" class="w-full border rounded p-1 text-center" placeholder="0">
                    </div>
                </div>
            @endforeach
        </div>

        <button type="submit" class="w-full mt-6 bg-amber-800 hover:bg-amber-900 text-white font-semibold py-2 rounded-lg">
            Simpan Data Penjualan
        </button>
    </form>
</div>
@endsection
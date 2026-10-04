@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white p-6 rounded-xl shadow border border-amber-100">
    <h2 class="text-xl font-bold mb-4 text-amber-950">Catat Pengeluaran Operasional</h2>

    <form action="{{ route('expenses.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Pilih Gerobak</label>
            <select name="cart_id" class="w-full border rounded-lg p-2" required>
                @foreach($carts as $cart)
                    <option value="{{ $cart->id }}">{{ $cart->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Tanggal</label>
            <input type="date" name="date" value="{{ date('Y-m-d') }}" class="w-full border rounded-lg p-2" required>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Keterangan Pengeluaran</label>
            <input type="text" name="title" placeholder="cth: Es batu kristal, bensin, sedotan" class="w-full border rounded-lg p-2" required>
        </div>

        <div class="mb-6">
            <label class="block text-sm font-medium mb-1">Nominal (Rp)</label>
            <input type="number" name="amount" min="500" placeholder="15000" class="w-full border rounded-lg p-2" required>
        </div>

        <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-semibold py-2 rounded-lg">
            Simpan Pengeluaran
        </button>
    </form>
</div>
@endsection
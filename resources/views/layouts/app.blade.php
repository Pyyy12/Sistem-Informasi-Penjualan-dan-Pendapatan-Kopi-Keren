<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kopi Keren - Operasional Gerobak</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-amber-50 text-gray-800">
    <nav class="bg-amber-900 text-white shadow-md">
        <div class="max-w-6xl mx-auto px-4 py-4 flex justify-between items-center">
            <a href="{{ route('dashboard') }}" class="text-2xl font-bold tracking-wider">☕ KOPI KEREN</a>
            <div class="space-x-3">
                <a href="{{ route('sales.create') }}" class="bg-amber-600 hover:bg-amber-700 px-3 py-2 rounded text-sm font-semibold">+ Catat Penjualan</a>
                <a href="{{ route('expenses.create') }}" class="bg-red-600 hover:bg-red-700 px-3 py-2 rounded text-sm font-semibold">+ Catat Pengeluaran</a>
            </div>
        </div>
    </nav>

    <div class="max-w-6xl mx-auto px-4 py-6">
        @if(session('success'))
            <div class="p-4 mb-4 text-sm text-green-800 bg-green-200 rounded-lg">{{ session('success') }}</div>
        @endif
        @if($errors->any())
            <div class="p-4 mb-4 text-sm text-red-800 bg-red-200 rounded-lg">{{ $errors->first() }}</div>
        @endif

        @yield('content')
    </div>
</body>
</html>
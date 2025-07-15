@extends('layouts.main')
@section('title', 'Admin Order')
@section('content')
<section class="container mx-auto py-12">
    <h2 class="text-2xl font-bold mb-6 text-[#4CAF50]">Daftar Pesanan</h2>
    <div class="flex flex-wrap gap-2 mb-4">
        <a href="{{ route('admin.orders.export') }}" class="bg-blue-500 text-white px-4 py-2 rounded font-bold hover:bg-blue-600 transition">Export Excel</a>
        <a href="{{ route('admin.orders.exportCsv') }}" class="bg-green-500 text-white px-4 py-2 rounded font-bold hover:bg-green-600 transition">Export CSV</a>
        <a href="{{ route('admin.orders.template') }}" class="bg-gray-500 text-white px-4 py-2 rounded font-bold hover:bg-gray-600 transition">Download Template</a>
    </div>
    <form action="{{ route('admin.orders.import') }}" method="POST" enctype="multipart/form-data" class="flex items-center gap-2">
        @csrf
        <input type="file" name="file" accept=".xlsx,.csv" required class="border rounded px-2 py-1">
        <button class="bg-purple-500 text-white px-4 py-2 rounded font-bold hover:bg-purple-600 transition">Import</button>
    </form>
    @if(session('import_errors'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <strong>Beberapa data gagal diimport:</strong>
            <ul class="list-disc ml-6">
                @foreach(session('import_errors') as $failure)
                    <li>Baris {{ $failure->row() }}: @foreach($failure->errors() as $error) {{ $error }} @endforeach</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="GET" action="" class="mb-4 flex flex-wrap gap-2 items-center">
        <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari nama pembeli..." class="border rounded px-3 py-2 w-48">
        <select name="status" class="border rounded px-3 py-2">
            <option value="">Semua Status</option>
            <option value="Diproses" @if(request('status')=='Diproses') selected @endif>Diproses</option>
            <option value="Selesai" @if(request('status')=='Selesai') selected @endif>Selesai</option>
            <option value="Dibatalkan" @if(request('status')=='Dibatalkan') selected @endif>Dibatalkan</option>
        </select>
        <button class="bg-[#4CAF50] text-white px-4 py-2 rounded font-bold hover:bg-green-600 transition">Cari</button>
        @if(request('q') || request('status'))
            <a href="{{ route('admin.orders.index') }}" class="text-[#4CAF50] underline ml-2">Reset</a>
        @endif
    </form>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded shadow border border-[#e0e0e0]">
            <thead>
                <tr class="bg-[#4CAF50] text-white">
                    <th class="py-2 px-4">Nama Pembeli</th>
                    <th class="py-2 px-4">Alamat</th>
                    <th class="py-2 px-4">Produk</th>
                    <th class="py-2 px-4">Jumlah</th>
                    <th class="py-2 px-4">Status</th>
                    <th class="py-2 px-4">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                <tr class="hover:bg-[#f6fff6] border-b border-[#e0e0e0]">
                    <td class="py-2 px-4">{{ $order->customer_name }}</td>
                    <td class="py-2 px-4">{{ $order->address }}</td>
                    <td class="py-2 px-4">{{ $order->product }}</td>
                    <td class="py-2 px-4">{{ $order->quantity }}</td>
                    <td class="py-2 px-4">{{ $order->status }}</td>
                    <td class="py-2 px-4 space-x-1">
                        <a href="{{ route('admin.orders.edit', $order) }}" class="inline-block bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500 transition">Edit</a>
                        <form action="{{ route('admin.orders.destroy', $order) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-block bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition" onclick="return confirm('Yakin hapus pesanan?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="text-center py-4">Belum ada pesanan.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>
@endsection 
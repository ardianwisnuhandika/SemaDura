@extends('layouts.main')
@section('title', 'Log Aktivitas Admin')
@section('content')
<section class="container mx-auto py-12">
    <h2 class="text-2xl font-bold mb-6 text-[#4CAF50]">Log Aktivitas Admin</h2>
    <form method="GET" action="" class="mb-4 flex flex-wrap gap-2 items-center">
        <input type="text" name="admin" value="{{ request('admin') }}" placeholder="Cari admin..." class="border rounded px-3 py-2">
        <select name="action" class="border rounded px-3 py-2">
            <option value="">Semua Aksi</option>
            <option value="create" @if(request('action')=='create') selected @endif>Tambah</option>
            <option value="update" @if(request('action')=='update') selected @endif>Edit</option>
            <option value="delete" @if(request('action')=='delete') selected @endif>Hapus</option>
            <option value="import" @if(request('action')=='import') selected @endif>Import</option>
        </select>
        <select name="table" class="border rounded px-3 py-2">
            <option value="">Semua Tabel</option>
            <option value="products" @if(request('table')=='products') selected @endif>Produk</option>
            <option value="orders" @if(request('table')=='orders') selected @endif>Pesanan</option>
        </select>
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari kata kunci..." class="border rounded px-3 py-2">
        <button class="bg-[#4CAF50] text-white px-4 py-2 rounded font-bold hover:bg-green-600 transition">Filter</button>
        @if(request('admin') || request('action') || request('table'))
            <a href="{{ route('admin.logs.index') }}" class="text-[#4CAF50] underline ml-2">Reset</a>
        @endif
    </form>
    <div class="flex flex-wrap gap-2 mb-4">
        <a href="{{ route('admin.logs.export', request()->only(['admin','action','table'])) }}" class="bg-blue-500 text-white px-4 py-2 rounded font-bold hover:bg-blue-600 transition">Export Excel</a>
        <a href="{{ route('admin.logs.exportCsv', request()->only(['admin','action','table'])) }}" class="bg-green-500 text-white px-4 py-2 rounded font-bold hover:bg-green-600 transition">Export CSV</a>
        <a href="{{ route('admin.logs.exportPdf', request()->only(['admin','action','table','search'])) }}" class="bg-red-500 text-white px-4 py-2 rounded font-bold hover:bg-red-600 transition">Export PDF</a>
    </div>
    <div class="overflow-x-auto mb-6">
        <table class="min-w-full bg-white rounded shadow border border-[#e0e0e0]">
            <thead>
                <tr class="bg-[#4CAF50] text-white">
                    <th class="py-2 px-4">Waktu</th>
                    <th class="py-2 px-4">Admin</th>
                    <th class="py-2 px-4">Aksi</th>
                    <th class="py-2 px-4">Tabel</th>
                    <th class="py-2 px-4">Data</th>
                </tr>
            </thead>
            <tbody>
                @forelse($logs as $log)
                <tr class="hover:bg-[#f6fff6] border-b border-[#e0e0e0]">
                    <td class="py-2 px-4 text-xs">{{ $log->created_at->format('d-m-Y H:i') }}</td>
                    <td class="py-2 px-4">{{ $log->admin }}</td>
                    <td class="py-2 px-4">{{ $log->action }}</td>
                    <td class="py-2 px-4">{{ $log->table }}</td>
                    <td class="py-2 px-4 text-xs">{{ $log->data }}</td>
                </tr>
                @empty
                <tr><td colspan="5" class="text-center py-4">Belum ada log aktivitas.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div>
        {{ $logs->links() }}
    </div>
</section>
@endsection 
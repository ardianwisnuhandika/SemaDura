@extends('layouts.main')
@section('title', 'Detail Pesanan')
@section('content')
<section class="container mx-auto py-12">
    <h2 class="text-2xl font-bold mb-6 text-[#4CAF50]">Detail Pesanan</h2>
    <div class="bg-white rounded-xl shadow-lg p-8 max-w-4xl mx-auto">
        @if($orders->isEmpty())
            <div class="flex flex-col items-center justify-center py-12">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 text-gray-300 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18M3 17h18" />
                </svg>
                <div class="text-gray-500 text-lg mb-4">Belum ada pesanan.<br>Silakan tambah pesanan baru!</div>
                <a href="{{ route('order.create') }}" class="mt-2 bg-[#4CAF50] text-white px-8 py-3 rounded-full font-bold text-lg shadow hover:bg-green-700 transition">Tambah Pesanan</a>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($orders as $order)
                    <div class="border rounded-xl shadow p-6 flex flex-col gap-2 hover:scale-105 transition-transform bg-gradient-to-br from-[#e0f7fa] via-[#e8f5e9] to-[#f1f8e9]">
                        <div class="font-bold text-xl text-[#4CAF50] mb-2">Pesanan #{{ $order->id }}</div>
                        <div><span class="font-bold">Nama Pembeli:</span> {{ $order->customer_name }}</div>
                        <div><span class="font-bold">Alamat:</span> {{ $order->address }}</div>
                        <div><span class="font-bold">Produk:</span> {{ $order->product }}</div>
                        <div><span class="font-bold">Jumlah:</span> {{ $order->quantity }}</div>
                        <div><span class="font-bold">Status:</span> <span class="px-2 py-1 rounded text-xs font-bold {{ $order->status == 'Selesai' ? 'bg-green-100 text-green-700' : ($order->status == 'Diproses' ? 'bg-yellow-100 text-yellow-700' : 'bg-red-100 text-red-700') }}">{{ $order->status }}</span></div>
                        <div class="flex gap-2 mt-4">
                            <a href="{{ route('order.edit', $order->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded font-bold hover:bg-yellow-600 transition">Edit</a>
                            <form action="{{ route('order.destroy', $order->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pesanan ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded font-bold hover:bg-red-700 transition">Hapus</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="flex justify-center mt-8">
                <a href="{{ route('order.create') }}" class="bg-[#4CAF50] text-white px-8 py-3 rounded-full font-bold text-lg shadow hover:bg-green-700 transition">Tambah Pesanan</a>
            </div>
        @endif
    </div>
</section>
@endsection 
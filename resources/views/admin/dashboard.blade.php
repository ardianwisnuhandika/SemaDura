@extends('layouts.main')
@section('title', 'Dashboard Admin')
@section('content')
<section class="py-12 min-h-screen relative overflow-hidden" style="background: radial-gradient(ellipse at 80% 10%, #b2f7ef 0%, transparent 60%), radial-gradient(ellipse at 10% 90%, #e0c3fc 0%, transparent 70%), linear-gradient(135deg, #e8f5e9 0%, #f1f8e9 50%, #e3f2fd 100%);">
    <!-- SVG Wave Atas -->
    <svg class="absolute top-0 left-0 w-full h-24 md:h-32 lg:h-40" viewBox="0 0 1440 320" fill="none" xmlns="http://www.w3.org/2000/svg" style="z-index:1"><path fill="#4CAF50" fill-opacity="0.12" d="M0,64L48,80C96,96,192,128,288,133.3C384,139,480,117,576,117.3C672,117,768,139,864,154.7C960,171,1056,181,1152,165.3C1248,149,1344,107,1392,85.3L1440,64L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>
    <!-- SVG Wave Bawah -->
    <svg class="absolute bottom-0 left-0 w-full h-24 md:h-32 lg:h-40" viewBox="0 0 1440 320" fill="none" xmlns="http://www.w3.org/2000/svg" style="z-index:1"><path fill="#2196F3" fill-opacity="0.10" d="M0,224L48,202.7C96,181,192,139,288,128C384,117,480,139,576,170.7C672,203,768,245,864,229.3C960,213,1056,139,1152,128C1248,117,1344,171,1392,197.3L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
    <div class="container mx-auto px-4 relative z-10">
        <h2 class="text-3xl font-bold mb-8 text-center text-[#4CAF50]">Dashboard Admin</h2>
        <div class="bg-gradient-to-br from-[#e0f7fa] via-[#e8f5e9] to-[#f1f8e9] rounded-2xl shadow-2xl p-8 text-center max-w-xl mx-auto mb-8 transition-transform hover:scale-105 duration-300">
            <div class="flex flex-col items-center mb-4">
                <div class="w-24 h-24 rounded-full bg-[#2196F3]/10 flex items-center justify-center mb-2 border-4 border-[#2196F3] shadow-lg text-4xl font-bold text-[#2196F3] uppercase transition-transform hover:scale-110 duration-300">
                    {{ strtoupper(substr(Auth::guard('admin')->user()->name ?? 'A',0,1)) }}
                </div>
                <h3 class="text-2xl font-bold mb-1">{{ Auth::guard('admin')->user()->name ?? 'Admin' }}</h3>
                <span class="inline-block bg-gradient-to-r from-[#43e97b] to-[#38f9d7] text-white px-4 py-1 rounded-full text-xs font-bold mb-2 shadow">Admin Aktif</span>
                <button class="mt-2 px-4 py-1 bg-[#2196F3] text-white rounded-full text-xs font-semibold shadow hover:bg-blue-700 transition">Edit Profil</button>
            </div>
            <div class="mb-4 text-left">
                <div class="mb-2"><span class="font-bold">Nama:</span> {{ Auth::guard('admin')->user()->name ?? '-' }}</div>
                <div class="mb-2"><span class="font-bold">Email:</span> <span class="bg-[#e3fcec] text-[#388e3c] px-2 py-1 rounded text-xs">{{ Auth::guard('admin')->user()->email ?? '-' }}</span></div>
            </div>
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700 transition w-full font-bold">Logout</button>
            </form>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-10">
            <div class="bg-white rounded-lg shadow p-6 text-center">
                <div class="text-3xl font-bold text-[#4CAF50] mb-2">12</div>
                <div class="font-semibold">Total Produk</div>
            </div>
            <div class="bg-white rounded-lg shadow p-6 text-center">
                <div class="text-3xl font-bold text-[#FFD600] mb-2">8</div>
                <div class="font-semibold">Total Order</div>
            </div>
            <div class="bg-white rounded-lg shadow p-6 text-center">
                <div class="text-3xl font-bold text-[#2196F3] mb-2">5</div>
                <div class="font-semibold">Total Admin</div>
            </div>
        </div>
        <!-- Grafik Dummy -->
        <div class="bg-white rounded-lg shadow p-8 mb-10">
            <h3 class="text-xl font-bold mb-4 text-[#4CAF50]">Statistik Order Bulanan</h3>
            <div class="w-full h-48 bg-gray-100 flex items-center justify-center rounded">
                <span class="text-gray-400">[Grafik Dummy]</span>
            </div>
        </div>
        <!-- Tabel Order Terbaru Dinamis -->
        <div class="bg-white rounded-lg shadow p-8">
            <h3 class="text-xl font-bold mb-4 text-[#4CAF50]">Order Terbaru</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full text-left">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b">ID</th>
                            <th class="py-2 px-4 border-b">Nama</th>
                            <th class="py-2 px-4 border-b">Produk</th>
                            <th class="py-2 px-4 border-b">Status</th>
                            <th class="py-2 px-4 border-b">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($latestOrders as $order)
                        <tr>
                            <td class="py-2 px-4 border-b">#{{ $order->id }}</td>
                            <td class="py-2 px-4 border-b">{{ $order->customer_name }}</td>
                            <td class="py-2 px-4 border-b">{{ $order->product }}</td>
                            <td class="py-2 px-4 border-b">
                                <span class="px-2 py-1 rounded text-xs font-bold {{ $order->status == 'Selesai' ? 'bg-green-100 text-green-700' : ($order->status == 'Diproses' ? 'bg-yellow-100 text-yellow-700' : 'bg-red-100 text-red-700') }}">{{ $order->status }}</span>
                            </td>
                            <td class="py-2 px-4 border-b">
                                <a href="{{ route('admin.orders.show', $order->id) }}" class="bg-[#4CAF50] text-white px-3 py-1 rounded text-xs font-bold hover:bg-green-700 transition">Detail</a>
                            </td>
                        </tr>
                        @endforeach
                        @if($latestOrders->isEmpty())
                        <tr><td colspan="5" class="text-center py-4">Belum ada pesanan.</td></tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection 
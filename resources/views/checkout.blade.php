@extends('layouts.main')
@section('title', 'Checkout')
@section('content')
<section class="container mx-auto py-12">
    <h2 class="text-2xl font-bold mb-6 text-[#4CAF50]">Checkout</h2>
    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">{{ session('success') }}</div>
    @endif
    <form action="{{ route('checkout.store') }}" method="POST" class="bg-white rounded shadow p-8 max-w-lg mx-auto space-y-4">
        @csrf
        <input type="text" name="customer_name" placeholder="Nama Lengkap" class="w-full border rounded px-3 py-2" required>
        <input type="text" name="address" placeholder="Alamat Lengkap" class="w-full border rounded px-3 py-2" required>
        <input type="text" name="product" placeholder="Produk" class="w-full border rounded px-3 py-2" required>
        <input type="number" name="quantity" placeholder="Jumlah" class="w-full border rounded px-3 py-2" required>
        <button class="bg-[#FFD600] text-[#4CAF50] px-6 py-2 rounded font-bold hover:bg-yellow-400 transition">Pesan Sekarang</button>
    </form>
</section>
@endsection 
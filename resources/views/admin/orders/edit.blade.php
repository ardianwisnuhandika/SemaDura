@extends('layouts.main')
@section('title', 'Edit Pesanan')
@section('content')
<section class="container mx-auto py-12">
    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">{{ session('success') }}</div>
    @endif
    @if($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h2 class="text-2xl font-bold mb-6 text-[#4CAF50]">Edit Pesanan</h2>
    <form action="{{ route('order.update', $order) }}" method="POST" class="bg-white rounded shadow p-8 max-w-lg mx-auto space-y-4">
        @csrf
        @method('PUT')
        <input type="text" name="customer_name" value="{{ old('customer_name', $order->customer_name) }}" placeholder="Nama Pembeli" class="w-full border rounded px-3 py-2" required>
        <input type="text" name="address" value="{{ old('address', $order->address) }}" placeholder="Alamat" class="w-full border rounded px-3 py-2" required>
        <input type="text" name="product" value="{{ old('product', $order->product) }}" placeholder="Produk" class="w-full border rounded px-3 py-2" required>
        <input type="number" name="quantity" value="{{ old('quantity', $order->quantity) }}" placeholder="Jumlah" class="w-full border rounded px-3 py-2" required>
        <select name="status" class="w-full border rounded px-3 py-2" required>
            <option value="Diproses" @if(old('status', $order->status)=='Diproses') selected @endif>Diproses</option>
            <option value="Selesai" @if(old('status', $order->status)=='Selesai') selected @endif>Selesai</option>
            <option value="Dibatalkan" @if(old('status', $order->status)=='Dibatalkan') selected @endif>Dibatalkan</option>
        </select>
        <button class="bg-[#4CAF50] text-white px-6 py-2 rounded font-bold hover:bg-green-600 transition">Update</button>
        <a href="/custom" class="ml-2 text-[#4CAF50] hover:underline">Batal</a>
    </form>
</section>
@endsection 
@extends('layouts.main')
@section('title', 'Edit Produk')
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
    <h2 class="text-2xl font-bold mb-6 text-[#4CAF50]">Edit Produk</h2>
    <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data" class="bg-white rounded shadow p-8 max-w-lg mx-auto space-y-4">
        @csrf
        @method('PUT')
        <input type="text" name="name" value="{{ old('name', $product->name) }}" placeholder="Nama Produk" class="w-full border rounded px-3 py-2" required>
        <textarea name="description" placeholder="Deskripsi" class="w-full border rounded px-3 py-2">{{ old('description', $product->description) }}</textarea>
        <input type="number" name="price" value="{{ old('price', $product->price) }}" placeholder="Harga" class="w-full border rounded px-3 py-2" required>
        <input type="number" name="stock" value="{{ old('stock', $product->stock) }}" placeholder="Stok" class="w-full border rounded px-3 py-2" required>
        @if($product->image)
            <img src="{{ asset('storage/'.$product->image) }}" alt="Gambar Produk" class="h-24 mb-2">
        @endif
        <input type="file" name="image" accept="image/*" class="w-full border rounded px-3 py-2">
        <button class="bg-[#4CAF50] text-white px-6 py-2 rounded font-bold hover:bg-green-600 transition">Update</button>
        <a href="{{ route('admin.products.index') }}" class="ml-2 text-[#4CAF50] hover:underline">Batal</a>
    </form>
</section>
@endsection 
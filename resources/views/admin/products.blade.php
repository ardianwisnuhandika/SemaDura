@extends('layouts.main')
@section('title', 'Admin Produk')
@section('content')
<section class="container mx-auto py-12">
    <h2 class="text-2xl font-bold mb-6 text-[#4CAF50]">Manajemen Produk</h2>
    <table class="min-w-full bg-white rounded shadow">
        <thead>
            <tr class="bg-[#4CAF50] text-white">
                <th class="py-2 px-4">Nama</th>
                <th class="py-2 px-4">Harga</th>
                <th class="py-2 px-4">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="py-2 px-4">Beras Madura</td>
                <td class="py-2 px-4">Rp 12.000/kg</td>
                <td class="py-2 px-4">
                    <button class="bg-yellow-400 text-white px-2 py-1 rounded hover:bg-yellow-500">Edit</button>
                    <button class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">Hapus</button>
                </td>
            </tr>
        </tbody>
    </table>
</section>
@endsection 
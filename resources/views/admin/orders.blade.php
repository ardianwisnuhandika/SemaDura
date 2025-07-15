@extends('layouts.main')
@section('title', 'Admin Order')
@section('content')
<section class="container mx-auto py-12">
    <h2 class="text-2xl font-bold mb-6 text-[#4CAF50]">Daftar Pesanan</h2>
    <table class="min-w-full bg-white rounded shadow">
        <thead>
            <tr class="bg-[#4CAF50] text-white">
                <th class="py-2 px-4">Nama Pembeli</th>
                <th class="py-2 px-4">Produk</th>
                <th class="py-2 px-4">Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="py-2 px-4">Ahmad</td>
                <td class="py-2 px-4">Beras Madura</td>
                <td class="py-2 px-4">Diproses</td>
            </tr>
        </tbody>
    </table>
</section>
@endsection 
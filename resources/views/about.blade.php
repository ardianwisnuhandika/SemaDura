@extends('layouts.main')
@section('title', 'Tentang Kami')
@section('content')
<section class="py-12 min-h-screen relative overflow-hidden" style="background: radial-gradient(ellipse at 80% 10%, #b2f7ef 0%, transparent 60%), radial-gradient(ellipse at 10% 90%, #e0c3fc 0%, transparent 70%), linear-gradient(135deg, #e8f5e9 0%, #f1f8e9 50%, #e3f2fd 100%);">
    <!-- SVG Wave Atas -->
    <svg class="absolute top-0 left-0 w-full h-24 md:h-32 lg:h-40" viewBox="0 0 1440 320" fill="none" xmlns="http://www.w3.org/2000/svg" style="z-index:1"><path fill="#4CAF50" fill-opacity="0.12" d="M0,64L48,80C96,96,192,128,288,133.3C384,139,480,117,576,117.3C672,117,768,139,864,154.7C960,171,1056,181,1152,165.3C1248,149,1344,107,1392,85.3L1440,64L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>
    <!-- SVG Wave Bawah -->
    <svg class="absolute bottom-0 left-0 w-full h-24 md:h-32 lg:h-40" viewBox="0 0 1440 320" fill="none" xmlns="http://www.w3.org/2000/svg" style="z-index:1"><path fill="#2196F3" fill-opacity="0.10" d="M0,224L48,202.7C96,181,192,139,288,128C384,117,480,139,576,170.7C672,203,768,245,864,229.3C960,213,1056,139,1152,128C1248,117,1344,171,1392,197.3L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
    <div class="container mx-auto px-4 max-w-3xl relative z-10">
        <h1 class="text-3xl font-bold text-center mb-4">Tentang SemaDura</h1>
        <p class="text-center mb-8">SemaDura adalah toko sembako online yang berfokus pada produk segar, aman, dan terpercaya langsung dari Madura. Kami hadir untuk memenuhi kebutuhan dapur dan pangan Anda dengan pelayanan terbaik.</p>
        <div class="mb-8 bg-white rounded-xl shadow-lg p-6">
            <h2 class="text-xl font-bold mb-2">Sejarah Singkat</h2>
            <p>SemaDura berdiri sejak 2025, berawal dari usaha keluarga di Madura yang ingin memperluas jangkauan distribusi sembako segar ke seluruh Indonesia. Dengan pengalaman dan jaringan lokal, kami memastikan setiap produk sampai ke tangan pelanggan dalam kondisi terbaik.</p>
        </div>
        <div class="mb-8 bg-white rounded-xl shadow-lg p-6">
            <h2 class="text-xl font-bold mb-2">Visi & Misi</h2>
            <ul class="list-disc pl-6 text-gray-700">
                <li>Menjadi toko sembako online terpercaya di Indonesia.</li>
                <li>Menyediakan produk segar, aman, dan harga bersaing.</li>
                <li>Mendukung petani dan produsen lokal Madura.</li>
            </ul>
        </div>
        <div class="bg-white rounded-xl shadow-lg p-6">
            <h2 class="text-xl font-bold mb-2">Keunggulan Kami</h2>
            <ul class="list-disc pl-6 text-gray-700">
                <li>Produk selalu segar, langsung dari Madura.</li>
                <li>Pengiriman cepat dan aman.</li>
                <li>Harga bersaing dan banyak promo.</li>
                <li>Pelanggan adalah prioritas utama kami.</li>
            </ul>
        </div>
    </div>
</section>
@endsection 
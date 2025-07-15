@extends('layouts.main')
@section('title', 'Produk')
@section('content')
<section class="py-12 min-h-screen relative overflow-hidden" style="background: radial-gradient(ellipse at 80% 10%, #b2f7ef 0%, transparent 60%), radial-gradient(ellipse at 10% 90%, #e0c3fc 0%, transparent 70%), linear-gradient(135deg, #e8f5e9 0%, #f1f8e9 50%, #e3f2fd 100%);">
    <!-- SVG Wave Atas -->
    <svg class="absolute top-0 left-0 w-full h-24 md:h-32 lg:h-40" viewBox="0 0 1440 320" fill="none" xmlns="http://www.w3.org/2000/svg" style="z-index:1"><path fill="#4CAF50" fill-opacity="0.12" d="M0,64L48,80C96,96,192,128,288,133.3C384,139,480,117,576,117.3C672,117,768,139,864,154.7C960,171,1056,181,1152,165.3C1248,149,1344,107,1392,85.3L1440,64L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>
    <!-- SVG Wave Bawah -->
    <svg class="absolute bottom-0 left-0 w-full h-24 md:h-32 lg:h-40" viewBox="0 0 1440 320" fill="none" xmlns="http://www.w3.org/2000/svg" style="z-index:1"><path fill="#2196F3" fill-opacity="0.10" d="M0,224L48,202.7C96,181,192,139,288,128C384,117,480,139,576,170.7C672,203,768,245,864,229.3C960,213,1056,139,1152,128C1248,117,1344,171,1392,197.3L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
    <div class="container mx-auto px-4 relative z-10">
        <h1 class="text-3xl font-bold text-center mb-4 text-[#4CAF50]">Produk SemaDura</h1>
        <div class="bg-gradient-to-r from-[#4CAF50]/90 to-[#2196F3]/80 text-white rounded-xl p-8 mb-10 text-center shadow-lg flex flex-col items-center">
            <div class="flex items-center justify-center mb-2">
                <svg class="w-8 h-8 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 8v4l3 3" stroke-linecap="round" stroke-linejoin="round"/></svg>
                <h2 class="text-xl font-bold">Promo Spesial Hari Ini!</h2>
            </div>
            <p class="text-lg">Dapatkan diskon hingga <span class="font-bold">30%</span> untuk produk pilihan. Buruan sebelum kehabisan!</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 mb-12">
            @php
                $productImages = ['beras.png','minyakgoreng.png','tepungterigu.png','keju.png','indomiepedas.png','chitatos.png','qtela.png','marlong.png'];
                $productNames = ['Beras 5 kg','Minyak Goreng 1 L','Tepung Terigu 1 kg','Keju Cheddar 160 g','Indomie Hype Abis','Chitato Lite','Qtela Singkong','Marlboro Bolong 16 Batang'];
                $productPrices = [95000,20000,15000,16000,3000,6500,6000,35000];
            @endphp
            @for($i = 1; $i <= 8; $i++)
            <div class="bg-white rounded-2xl shadow-lg p-4 flex flex-col items-center group relative hover:shadow-2xl transition">
                @if($i % 2 == 0)
                    <span class="absolute top-3 left-3 bg-[#FFD600] text-[#4CAF50] text-xs font-bold px-3 py-1 rounded-full shadow">Promo</span>
                @endif
                <img src="{{ asset('images/assets/'.$productImages[$i-1]) }}" alt="{{ $productNames[$i-1] }}" class="mb-3 rounded-xl h-32 object-cover group-hover:scale-105 transition">
                <h3 class="font-bold text-lg mb-1 text-center group-hover:text-[#4CAF50] transition">{{ $productNames[$i-1] }}</h3>
                <p class="text-[#4CAF50] font-bold mb-2 text-lg">Rp{{ number_format($productPrices[$i-1], 0, ',', '.') }}</p>
                <button class="bg-[#4CAF50] text-white px-4 py-2 rounded-lg shadow hover:bg-green-700 transition font-bold w-full">Beli Sekarang</button>
            </div>
            @endfor
        </div>
        <!-- Section Testimoni -->
        <div class="mb-12">
            <h2 class="text-2xl font-bold text-center mb-6 text-gray-800">Testimoni Pelanggan</h2>
            <div class="flex flex-col md:flex-row gap-8 justify-center">
                <div class="bg-white rounded-2xl shadow-lg p-8 text-center flex-1 border border-[#4CAF50]/10">
                    <div class="flex justify-center mb-3">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" class="w-14 h-14 rounded-full border-2 border-[#4CAF50] mx-auto" alt="Budi">
                    </div>
                    <p class="italic mb-2 text-gray-700">"Produk selalu segar dan pengiriman cepat!"</p>
                    <span class="font-bold text-[#4CAF50]">Budi, Sumenep</span>
                </div>
                <div class="bg-white rounded-2xl shadow-lg p-8 text-center flex-1 border border-[#FFD600]/10">
                    <div class="flex justify-center mb-3">
                        <img src="https://randomuser.me/api/portraits/women/44.jpg" class="w-14 h-14 rounded-full border-2 border-[#FFD600] mx-auto" alt="Siti">
                    </div>
                    <p class="italic mb-2 text-gray-700">"Harga bersaing, pelayanan ramah."</p>
                    <span class="font-bold text-[#FFD600]">Siti, Bangkalan</span>
                </div>
                <div class="bg-white rounded-2xl shadow-lg p-8 text-center flex-1 border border-[#2196F3]/10">
                    <div class="flex justify-center mb-3">
                        <img src="https://randomuser.me/api/portraits/men/54.jpg" class="w-14 h-14 rounded-full border-2 border-[#2196F3] mx-auto" alt="Ahmad">
                    </div>
                    <p class="italic mb-2 text-gray-700">"Belanja di SemaDura selalu puas!"</p>
                    <span class="font-bold text-[#2196F3]">Ahmad, Pamekasan</span>
                </div>
            </div>
        </div>
        <!-- Section FAQ -->
        <div class="mb-4">
            <h2 class="text-2xl font-bold text-center mb-6 text-gray-800">FAQ</h2>
            <div class="max-w-2xl mx-auto space-y-4">
                <div class="bg-white rounded-xl shadow p-4">
                    <button class="w-full text-left font-bold text-[#4CAF50] flex items-center gap-2" onclick="this.nextElementSibling.classList.toggle('hidden')">
                        <svg class="w-5 h-5 inline-block" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        Bagaimana cara memesan produk?
                    </button>
                    <div class="hidden mt-2 text-gray-700">Pilih produk, klik "Beli Sekarang", lalu ikuti instruksi checkout.</div>
                </div>
                <div class="bg-white rounded-xl shadow p-4">
                    <button class="w-full text-left font-bold text-[#4CAF50] flex items-center gap-2" onclick="this.nextElementSibling.classList.toggle('hidden')">
                        <svg class="w-5 h-5 inline-block" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        Apakah produk dijamin segar?
                    </button>
                    <div class="hidden mt-2 text-gray-700">Ya, semua produk dikirim langsung dari Madura dan dijamin segar.</div>
                </div>
                <div class="bg-white rounded-xl shadow p-4">
                    <button class="w-full text-left font-bold text-[#4CAF50] flex items-center gap-2" onclick="this.nextElementSibling.classList.toggle('hidden')">
                        <svg class="w-5 h-5 inline-block" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        Bagaimana metode pembayarannya?
                    </button>
                    <div class="hidden mt-2 text-gray-700">Kami menerima transfer bank, e-wallet, dan pembayaran COD.</div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection 
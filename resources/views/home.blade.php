@extends('layouts.main')
@section('title', 'Home')
@section('content')
<div x-data="{ showPopup: false }" x-init="setTimeout(() => showPopup = true, 3000)">
    <!-- Popup Newsletter -->
    <div x-show="showPopup" x-transition class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-40">
        <div class="bg-white rounded-lg shadow-lg p-8 max-w-md w-full relative">
            <button @click="showPopup = false" class="absolute top-2 right-2 text-gray-400 hover:text-gray-700 text-2xl font-bold">&times;</button>
            <div class="text-center">
                <img src="https://cdn-icons-png.flaticon.com/512/561/561127.png" alt="Newsletter" class="mx-auto mb-4 w-16 h-16">
                <h2 class="text-2xl font-bold mb-2 text-[#4CAF50]">Gabung Newsletter SemaDura</h2>
                <p class="mb-4 text-gray-600">Dapatkan info promo & produk terbaru langsung ke email Anda!</p>
                <form class="flex flex-col sm:flex-row gap-2 justify-center">
                    <input type="email" placeholder="Email Anda" class="px-4 py-2 rounded border flex-1" required>
                    <button type="submit" class="bg-[#4CAF50] text-white px-4 py-2 rounded font-bold hover:bg-green-700 transition">Daftar</button>
                </form>
            </div>
        </div>
    </div>
    <section class="py-16 min-h-screen relative overflow-hidden flex flex-col items-center justify-center text-center" style="background: radial-gradient(ellipse at 80% 10%, #b2f7ef 0%, transparent 60%), radial-gradient(ellipse at 10% 90%, #e0c3fc 0%, transparent 70%), linear-gradient(135deg, #e8f5e9 0%, #f1f8e9 50%, #e3f2fd 100%);">
        <!-- SVG Wave Atas -->
        <svg class="absolute top-0 left-0 w-full h-24 md:h-32 lg:h-40" viewBox="0 0 1440 320" fill="none" xmlns="http://www.w3.org/2000/svg" style="z-index:1"><path fill="#4CAF50" fill-opacity="0.12" d="M0,64L48,80C96,96,192,128,288,133.3C384,139,480,117,576,117.3C672,117,768,139,864,154.7C960,171,1056,181,1152,165.3C1248,149,1344,107,1392,85.3L1440,64L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>
        <!-- SVG Wave Bawah -->
        <svg class="absolute bottom-0 left-0 w-full h-24 md:h-32 lg:h-40" viewBox="0 0 1440 320" fill="none" xmlns="http://www.w3.org/2000/svg" style="z-index:1"><path fill="#2196F3" fill-opacity="0.10" d="M0,224L48,202.7C96,181,192,139,288,128C384,117,480,139,576,170.7C672,203,768,245,864,229.3C960,213,1056,139,1152,128C1248,117,1344,171,1392,197.3L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
        <div class="relative z-10 w-full flex flex-col items-center justify-center">
            <h1 class="text-4xl md:text-6xl font-extrabold mb-4 text-gray-900 drop-shadow-lg">
                Selamat Datang di <span class="text-[#43a047]">SemaDura</span>
            </h1>
            <p class="text-lg md:text-2xl text-gray-700 mb-8 max-w-2xl mx-auto">Toko Sembako Madura Online, kebutuhan dapur & pangan segar, aman, dan terpercaya!</p>
            <a href="/products" class="inline-block bg-[#43a047] text-white px-8 py-4 rounded-full font-semibold text-lg shadow hover:bg-green-700 transition">Belanja Sekarang</a>
        </div>
    </section>
    <!-- Keunggulan -->
    <section class="py-14">
        <h2 class="text-3xl font-bold text-center mb-10 text-gray-800">Kenapa Pilih SemaDura?</h2>
        <div class="flex flex-col md:flex-row justify-center gap-8">
            <div class="bg-white p-8 rounded-2xl shadow-lg text-center border border-[#4CAF50]/10 hover:shadow-2xl transition group">
                <div class="flex justify-center mb-3">
                    <div class="bg-[#4CAF50]/10 rounded-full p-3 mb-2">
                        <svg class="w-8 h-8 text-[#4CAF50]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 8v4l3 3" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </div>
                </div>
                <h3 class="font-bold text-xl mb-2 group-hover:text-[#4CAF50] transition">Segar & Aman</h3>
                <p class="text-gray-600">Produk selalu segar, dikirim langsung dari Madura.</p>
            </div>
            <div class="bg-white p-8 rounded-2xl shadow-lg text-center border border-[#4CAF50]/10 hover:shadow-2xl transition group">
                <div class="flex justify-center mb-3">
                    <div class="bg-[#FFD600]/20 rounded-full p-3 mb-2">
                        <svg class="w-8 h-8 text-[#FFD600]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 8v4l3 3" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </div>
                </div>
                <h3 class="font-bold text-xl mb-2 group-hover:text-[#FFD600] transition">Harga Terbaik</h3>
                <p class="text-gray-600">Harga bersaing, banyak promo menarik setiap hari.</p>
            </div>
            <div class="bg-white p-8 rounded-2xl shadow-lg text-center border border-[#4CAF50]/10 hover:shadow-2xl transition group">
                <div class="flex justify-center mb-3">
                    <div class="bg-[#2196F3]/20 rounded-full p-3 mb-2">
                        <svg class="w-8 h-8 text-[#2196F3]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 8v4l3 3" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </div>
                </div>
                <h3 class="font-bold text-xl mb-2 group-hover:text-[#2196F3] transition">Pengiriman Cepat</h3>
                <p class="text-gray-600">Pesanan Anda dikirim dengan cepat & aman.</p>
            </div>
        </div>
    </section>
    <!-- Testimoni -->
    <section class="py-14 bg-[#f9fafb]">
        <h2 class="text-2xl font-bold text-center mb-8 text-gray-800">Testimoni Pelanggan</h2>
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
    </section>
    <!-- FAQ -->
    <section class="py-14">
        <h2 class="text-2xl font-bold text-center mb-8 text-gray-800">FAQ</h2>
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
    </section>
</div>
@endsection 
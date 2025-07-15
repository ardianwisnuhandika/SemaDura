@extends('layouts.main')
@section('title', 'Custom Order')
@section('content')
<section class="py-12 min-h-screen relative overflow-hidden" style="background: radial-gradient(ellipse at 80% 10%, #b2f7ef 0%, transparent 60%), radial-gradient(ellipse at 10% 90%, #e0c3fc 0%, transparent 70%), linear-gradient(135deg, #e8f5e9 0%, #f1f8e9 50%, #e3f2fd 100%);">
    <!-- SVG Wave Atas -->
    <svg class="absolute top-0 left-0 w-full h-24 md:h-32 lg:h-40" viewBox="0 0 1440 320" fill="none" xmlns="http://www.w3.org/2000/svg" style="z-index:1"><path fill="#4CAF50" fill-opacity="0.12" d="M0,64L48,80C96,96,192,128,288,133.3C384,139,480,117,576,117.3C672,117,768,139,864,154.7C960,171,1056,181,1152,165.3C1248,149,1344,107,1392,85.3L1440,64L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>
    <!-- SVG Wave Bawah -->
    <svg class="absolute bottom-0 left-0 w-full h-24 md:h-32 lg:h-40" viewBox="0 0 1440 320" fill="none" xmlns="http://www.w3.org/2000/svg" style="z-index:1"><path fill="#2196F3" fill-opacity="0.10" d="M0,224L48,202.7C96,181,192,139,288,128C384,117,480,139,576,170.7C672,203,768,245,864,229.3C960,213,1056,139,1152,128C1248,117,1344,171,1392,197.3L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
    <div class="container mx-auto px-4 relative z-10">
        <h1 class="text-3xl font-bold text-center mb-4 text-[#4CAF50]">Custom Order SemaDura</h1>
        <p class="text-center mb-8 text-gray-600">Punya kebutuhan khusus atau ingin paket sembako sesuai permintaan? Isi form di bawah, kami siap membantu!</p>
        <form class="bg-white rounded-xl shadow-lg p-8 mb-8" method="POST" action="#">
            <div class="mb-4">
                <label class="block font-bold mb-1">Nama Lengkap</label>
                <input type="text" class="w-full px-4 py-2 rounded border focus:ring-2 focus:ring-[#4CAF50] focus:border-[#4CAF50] transition" placeholder="Nama Anda" required>
            </div>
            <div class="mb-4">
                <label class="block font-bold mb-1">Nomor HP</label>
                <input type="tel" class="w-full px-4 py-2 rounded border focus:ring-2 focus:ring-[#4CAF50] focus:border-[#4CAF50] transition" placeholder="08xxxxxxxxxx" required>
            </div>
            <div class="mb-4">
                <label class="block font-bold mb-1">Detail Permintaan</label>
                <textarea class="w-full px-4 py-2 rounded border focus:ring-2 focus:ring-[#4CAF50] focus:border-[#4CAF50] transition" rows="4" placeholder="Tulis kebutuhan custom Anda..." required></textarea>
            </div>
            <button type="submit" class="bg-[#4CAF50] text-white px-6 py-3 rounded-lg w-full font-bold text-lg shadow hover:bg-green-700 transition">Kirim Permintaan</button>
        </form>
        <!-- Section FAQ -->
        <div class="mb-4">
            <h2 class="text-2xl font-bold text-center mb-6 text-[#4CAF50]">FAQ Custom Order</h2>
            <div class="max-w-xl mx-auto space-y-4">
                <div class="bg-white rounded-xl shadow p-4">
                    <button class="w-full text-left font-bold text-[#4CAF50] flex items-center gap-2" onclick="this.nextElementSibling.classList.toggle('hidden')">
                        <svg class="w-5 h-5 inline-block" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        Apa saja yang bisa di-custom?
                    </button>
                    <div class="hidden mt-2 text-gray-700">Anda bisa request paket sembako, jumlah, atau produk tertentu sesuai kebutuhan.</div>
                </div>
                <div class="bg-white rounded-xl shadow p-4">
                    <button class="w-full text-left font-bold text-[#4CAF50] flex items-center gap-2" onclick="this.nextElementSibling.classList.toggle('hidden')">
                        <svg class="w-5 h-5 inline-block" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        Berapa lama proses custom order?
                    </button>
                    <div class="hidden mt-2 text-gray-700">Biasanya 1-2 hari kerja, tergantung permintaan dan stok.</div>
                </div>
                <div class="bg-white rounded-xl shadow p-4">
                    <button class="w-full text-left font-bold text-[#4CAF50] flex items-center gap-2" onclick="this.nextElementSibling.classList.toggle('hidden')">
                        <svg class="w-5 h-5 inline-block" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        Bagaimana cara pembayaran?
                    </button>
                    <div class="hidden mt-2 text-gray-700">Pembayaran bisa dilakukan setelah konfirmasi dari tim kami.</div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection 
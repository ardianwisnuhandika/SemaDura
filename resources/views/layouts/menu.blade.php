<nav class="bg-white border-b border-[#9E9E9E]">
    <div class="container mx-auto flex justify-between items-center px-4">
        <ul class="flex space-x-6 nav font-semibold text-[#4CAF50]">
            <li><a href="{{ route('home') }}" class="hover:text-[#FFD600]">Home</a></li>
            <li><a href="{{ route('products') }}" class="hover:text-[#FFD600]">Produk</a></li>
            <li><a href="{{ route('custom') }}" class="hover:text-[#FFD600]">Custom</a></li>
            <li><a href="{{ route('about') }}" class="hover:text-[#FFD600]">Tentang</a></li>
            <li><a href="{{ route('contact') }}" class="hover:text-[#FFD600]">Kontak</a></li>
        </ul>
        <a href="/admin/dashboard" class="text-sm text-[#666] hover:text-[#4CAF50]">Admin</a>
    </div>
</nav> 
<header class="bg-white/80 backdrop-blur shadow-lg sticky top-0 z-50 rounded-b-xl">
    <div class="container mx-auto flex items-center py-4 px-6">
        <span class="text-2xl font-bold text-[#4CAF50] font-pacifico tracking-wide">SemaDura</span>
        <!-- Mobile menu button -->
        <div class="ml-auto flex md:hidden" x-data="{ open: false }">
            <button @click="open = !open" class="text-[#4CAF50] focus:outline-none transition-transform duration-200" :class="{'rotate-90': open}">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path :class="{'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    <path :class="{'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
            <!-- Mobile menu -->
            <div x-show="open" x-transition @click.away="open = false" class="absolute top-16 right-4 bg-white/95 shadow-xl rounded-xl py-3 w-60 z-50 flex flex-col gap-2 md:hidden border border-[#4CAF50]/20">
                <a href="/" class="px-5 py-2 rounded hover:bg-[#4CAF50]/10 hover:text-[#4CAF50] transition font-semibold">Home</a>
                <a href="/products" class="px-5 py-2 rounded hover:bg-[#4CAF50]/10 hover:text-[#4CAF50] transition font-semibold">Produk</a>
                <a href="/custom" class="px-5 py-2 rounded hover:bg-[#4CAF50]/10 hover:text-[#4CAF50] transition font-semibold">Custom</a>
                <a href="/about" class="px-5 py-2 rounded hover:bg-[#4CAF50]/10 hover:text-[#4CAF50] transition font-semibold">Tentang</a>
                <a href="/contact" class="px-5 py-2 rounded hover:bg-[#4CAF50]/10 hover:text-[#4CAF50] transition font-semibold">Kontak</a>
                @auth('web')
                    <a href="{{ route('user.dashboard') }}" class="px-5 py-2 font-bold text-[#4CAF50] hover:underline">Dashboard ({{ Auth::user()->name }})</a>
                    <form method="POST" action="{{ route('user.logout') }}" class="px-5 py-2">
                        @csrf
                        <button type="submit" class="text-red-500 hover:underline bg-transparent border-none cursor-pointer">Logout</button>
                    </form>
                @endauth
                @auth('admin')
                    <a href="{{ route('admin.dashboard') }}" class="px-5 py-2 font-bold text-[#4CAF50] hover:underline">Dashboard Admin ({{ Auth::guard('admin')->user()->name }})</a>
                    <form method="POST" action="{{ route('admin.logout') }}" class="px-5 py-2">
                        @csrf
                        <button type="submit" class="text-red-500 hover:underline bg-transparent border-none cursor-pointer">Logout</button>
                    </form>
                @endauth
                @guest
                    <div x-data="{ openLogin: false }" class="relative">
                        <button @click="openLogin = !openLogin" class="px-5 py-2 w-full text-left hover:text-[#4CAF50] font-semibold">Login ▼</button>
                        <div x-show="openLogin" x-transition @click.away="openLogin = false" class="absolute left-0 w-full bg-white shadow rounded-xl z-50 flex flex-col border border-[#4CAF50]/10">
                            <a href="{{ route('user.login') }}" class="px-5 py-2 hover:bg-[#4CAF50]/10">Login User</a>
                            <a href="{{ route('admin.login') }}" class="px-5 py-2 hover:bg-[#4CAF50]/10">Login Admin</a>
                        </div>
                    </div>
                    <div x-data="{ openReg: false }" class="relative">
                        <button @click="openReg = !openReg" class="px-5 py-2 w-full text-left hover:text-[#4CAF50] font-semibold">Register ▼</button>
                        <div x-show="openReg" x-transition @click.away="openReg = false" class="absolute left-0 w-full bg-white shadow rounded-xl z-50 flex flex-col border border-[#4CAF50]/10">
                            <a href="{{ route('user.register') }}" class="px-5 py-2 hover:bg-[#4CAF50]/10">Register User</a>
                            <a href="{{ route('admin.register') }}" class="px-5 py-2 hover:bg-[#4CAF50]/10">Register Admin</a>
                        </div>
                    </div>
                @endguest
            </div>
        </div>
        <!-- Desktop menu -->
        <nav class="ml-auto gap-2 hidden md:flex items-center">
            <a href="/" class="relative px-4 py-2 rounded-lg font-semibold hover:text-[#4CAF50] transition group">
                Home
                <span class="absolute left-1/2 -bottom-1 w-0 h-0.5 bg-[#4CAF50] transition-all group-hover:w-1/2"></span>
            </a>
            <a href="/products" class="relative px-4 py-2 rounded-lg font-semibold hover:text-[#4CAF50] transition group">
                Produk
                <span class="absolute left-1/2 -bottom-1 w-0 h-0.5 bg-[#4CAF50] transition-all group-hover:w-1/2"></span>
            </a>
            <a href="/custom" class="relative px-4 py-2 rounded-lg font-semibold hover:text-[#4CAF50] transition group">
                Detail Pesanan
                <span class="absolute left-1/2 -bottom-1 w-0 h-0.5 bg-[#4CAF50] transition-all group-hover:w-1/2"></span>
            </a>
            <a href="/about" class="relative px-4 py-2 rounded-lg font-semibold hover:text-[#4CAF50] transition group">
                Tentang
                <span class="absolute left-1/2 -bottom-1 w-0 h-0.5 bg-[#4CAF50] transition-all group-hover:w-1/2"></span>
            </a>
            <a href="/contact" class="relative px-4 py-2 rounded-lg font-semibold hover:text-[#4CAF50] transition group">
                Kontak
                <span class="absolute left-1/2 -bottom-1 w-0 h-0.5 bg-[#4CAF50] transition-all group-hover:w-1/2"></span>
            </a>
            @auth('web')
                <div class="flex items-center gap-3 ml-6 px-3 py-1 rounded-lg bg-[#f6fff6] border border-[#4CAF50]/20 shadow-sm">
                    <div class="w-8 h-8 rounded-full bg-[#4CAF50]/20 flex items-center justify-center font-bold text-[#4CAF50] text-lg">
                        {{ strtoupper(substr(Auth::user()->name,0,1)) }}
                    </div>
                    <div class="flex flex-col items-start justify-center">
                        <a href="{{ route('user.dashboard') }}" class="font-bold text-[#4CAF50] hover:underline leading-tight">Dashboard</a>
                        <span class="text-xs text-[#4CAF50] font-semibold">({{ Auth::user()->name }})</span>
                    </div>
                    <form method="POST" action="{{ route('user.logout') }}" class="ml-2">
                        @csrf
                        <button type="submit" class="text-red-500 hover:underline bg-transparent border-none cursor-pointer font-semibold">Logout</button>
                    </form>
                </div>
            @endauth
            @auth('admin')
                <div class="flex items-center gap-3 ml-6 px-3 py-1 rounded-lg bg-[#f6fff6] border border-[#4CAF50]/20 shadow-sm">
                    <div class="w-8 h-8 rounded-full bg-[#4CAF50]/20 flex items-center justify-center font-bold text-[#4CAF50] text-lg">
                        {{ strtoupper(substr(Auth::guard('admin')->user()->name,0,1)) }}
                    </div>
                    <div class="flex flex-col items-start justify-center">
                        <a href="{{ route('admin.dashboard') }}" class="font-bold text-[#4CAF50] hover:underline leading-tight">Admin</a>
                        <span class="text-xs text-[#4CAF50] font-semibold">({{ Auth::guard('admin')->user()->name }})</span>
                    </div>
                    <form method="POST" action="{{ route('admin.logout') }}" class="ml-2">
                        @csrf
                        <button type="submit" class="text-red-500 hover:underline bg-transparent border-none cursor-pointer font-semibold">Logout</button>
                    </form>
                </div>
            @endauth
            @guest
                <div x-data="{ openLogin: false }" class="relative">
                    <button @click="openLogin = !openLogin" class="hover:text-[#4CAF50] transition px-4 py-2 rounded-lg font-semibold">Login ▼</button>
                    <div x-show="openLogin" x-transition @click.away="openLogin = false" class="absolute right-0 mt-2 w-44 bg-white shadow-xl rounded-xl z-50 flex flex-col border border-[#4CAF50]/10">
                        <a href="{{ route('user.login') }}" class="px-5 py-2 hover:bg-[#4CAF50]/10">Login User</a>
                        <a href="{{ route('admin.login') }}" class="px-5 py-2 hover:bg-[#4CAF50]/10">Login Admin</a>
                    </div>
                </div>
                <div x-data="{ openReg: false }" class="relative">
                    <button @click="openReg = !openReg" class="hover:text-[#4CAF50] transition px-4 py-2 rounded-lg font-semibold">Register ▼</button>
                    <div x-show="openReg" x-transition @click.away="openReg = false" class="absolute right-0 mt-2 w-44 bg-white shadow-xl rounded-xl z-50 flex flex-col border border-[#4CAF50]/10">
                        <a href="{{ route('user.register') }}" class="px-5 py-2 hover:bg-[#4CAF50]/10">Register User</a>
                        <a href="{{ route('admin.register') }}" class="px-5 py-2 hover:bg-[#4CAF50]/10">Register Admin</a>
                    </div>
                </div>
            @endguest
        </nav>
    </div>
</header> 

<script src="//unpkg.com/alpinejs" defer></script> 
@extends('layouts.main')
@section('title', 'Dashboard User')
@section('content')
<section class="py-12 min-h-screen relative overflow-hidden" style="background: radial-gradient(ellipse at 80% 10%, #b2f7ef 0%, transparent 60%), radial-gradient(ellipse at 10% 90%, #e0c3fc 0%, transparent 70%), linear-gradient(135deg, #e8f5e9 0%, #f1f8e9 50%, #e3f2fd 100%);">
    <!-- SVG Wave Atas -->
    <svg class="absolute top-0 left-0 w-full h-24 md:h-32 lg:h-40" viewBox="0 0 1440 320" fill="none" xmlns="http://www.w3.org/2000/svg" style="z-index:1"><path fill="#4CAF50" fill-opacity="0.12" d="M0,64L48,80C96,96,192,128,288,133.3C384,139,480,117,576,117.3C672,117,768,139,864,154.7C960,171,1056,181,1152,165.3C1248,149,1344,107,1392,85.3L1440,64L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>
    <!-- SVG Wave Bawah -->
    <svg class="absolute bottom-0 left-0 w-full h-24 md:h-32 lg:h-40" viewBox="0 0 1440 320" fill="none" xmlns="http://www.w3.org/2000/svg" style="z-index:1"><path fill="#2196F3" fill-opacity="0.10" d="M0,224L48,202.7C96,181,192,139,288,128C384,117,480,139,576,170.7C672,203,768,245,864,229.3C960,213,1056,139,1152,128C1248,117,1344,171,1392,197.3L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
    <div class="container mx-auto px-4 relative z-10">
        <h2 class="text-3xl font-bold mb-8 text-center text-[#4CAF50]">Dashboard User</h2>
        <div class="bg-gradient-to-br from-[#e0f7fa] via-[#e8f5e9] to-[#f1f8e9] rounded-2xl shadow-2xl p-8 text-center max-w-xl mx-auto transition-transform hover:scale-105 duration-300">
            <div class="flex flex-col items-center mb-4">
                <div class="w-24 h-24 rounded-full bg-[#4CAF50]/10 flex items-center justify-center mb-2 border-4 border-[#4CAF50] shadow-lg text-4xl font-bold text-[#4CAF50] uppercase transition-transform hover:scale-110 duration-300">
                    {{ strtoupper(substr(Auth::user()->name ?? 'U',0,1)) }}
                </div>
                <h3 class="text-2xl font-bold mb-1">{{ Auth::user()->name ?? 'User' }}</h3>
                <span class="inline-block bg-gradient-to-r from-[#43e97b] to-[#38f9d7] text-white px-4 py-1 rounded-full text-xs font-bold mb-2 shadow">User Aktif</span>
                <button class="mt-2 px-4 py-1 bg-[#4CAF50] text-white rounded-full text-xs font-semibold shadow hover:bg-green-700 transition">Edit Profil</button>
            </div>
            <div class="mb-4 text-left">
                <div class="mb-2"><span class="font-bold">Nama:</span> {{ Auth::user()->name ?? '-' }}</div>
                <div class="mb-2"><span class="font-bold">Email:</span> <span class="bg-[#e3fcec] text-[#388e3c] px-2 py-1 rounded text-xs">{{ Auth::user()->email ?? '-' }}</span></div>
            </div>
            <form method="POST" action="{{ route('user.logout') }}">
                @csrf
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700 transition w-full font-bold">Logout</button>
            </form>
        </div>
    </div>
</section>
@endsection 
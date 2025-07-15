@extends('layouts.main')
@section('title', 'Registrasi User')
@section('content')
<section class="flex items-center justify-center min-h-screen relative overflow-hidden" style="background: radial-gradient(ellipse at 80% 10%, #b2f7ef 0%, transparent 60%), radial-gradient(ellipse at 10% 90%, #e0c3fc 0%, transparent 70%), linear-gradient(135deg, #e8f5e9 0%, #f1f8e9 50%, #e3f2fd 100%);">
    <!-- SVG Wave Atas -->
    <svg class="absolute top-0 left-0 w-full h-24 md:h-32 lg:h-40" viewBox="0 0 1440 320" fill="none" xmlns="http://www.w3.org/2000/svg" style="z-index:1"><path fill="#4CAF50" fill-opacity="0.12" d="M0,64L48,80C96,96,192,128,288,133.3C384,139,480,117,576,117.3C672,117,768,139,864,154.7C960,171,1056,181,1152,165.3C1248,149,1344,107,1392,85.3L1440,64L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>
    <!-- SVG Wave Bawah -->
    <svg class="absolute bottom-0 left-0 w-full h-24 md:h-32 lg:h-40" viewBox="0 0 1440 320" fill="none" xmlns="http://www.w3.org/2000/svg" style="z-index:1"><path fill="#2196F3" fill-opacity="0.10" d="M0,224L48,202.7C96,181,192,139,288,128C384,117,480,139,576,170.7C672,203,768,245,864,229.3C960,213,1056,139,1152,128C1248,117,1344,171,1392,197.3L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-md relative z-10">
        <h2 class="text-2xl font-bold mb-6 text-center text-[#4CAF50]">Registrasi User</h2>
        <form method="POST" action="{{ route('user.register.submit') }}">
            @csrf
            <div class="mb-4">
                <label class="block font-bold mb-1">Nama</label>
                <input type="text" name="name" class="w-full px-4 py-2 rounded border focus:ring-2 focus:ring-[#4CAF50] focus:border-[#4CAF50] transition" required>
            </div>
            <div class="mb-4">
                <label class="block font-bold mb-1">Email</label>
                <input type="email" name="email" class="w-full px-4 py-2 rounded border focus:ring-2 focus:ring-[#4CAF50] focus:border-[#4CAF50] transition" required>
            </div>
            <div class="mb-4">
                <label class="block font-bold mb-1">Password</label>
                <input type="password" name="password" class="w-full px-4 py-2 rounded border focus:ring-2 focus:ring-[#4CAF50] focus:border-[#4CAF50] transition" required>
            </div>
            <div class="mb-6">
                <label class="block font-bold mb-1">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="w-full px-4 py-2 rounded border focus:ring-2 focus:ring-[#4CAF50] focus:border-[#4CAF50] transition" required>
            </div>
            <button type="submit" class="bg-[#4CAF50] text-white px-6 py-3 rounded-lg w-full font-bold text-lg shadow hover:bg-green-700 transition">Daftar</button>
        </form>
        <div class="mt-4 text-center">
            <a href="{{ route('user.login') }}" class="text-[#4CAF50] hover:underline">Sudah punya akun? Login di sini</a>
        </div>
    </div>
</section>
@endsection 
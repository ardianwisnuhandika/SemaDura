<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SemaDura - Toko Madura Online')</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:700|Montserrat:600|Open+Sans:400|Roboto:400|Pacifico&display=swap" rel="stylesheet">
    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Alpine.js -->
    <script src="//unpkg.com/alpinejs" defer></script>
    <style>
        body { font-family: 'Open Sans', Roboto, Arial, sans-serif; }
        h1, h2, h3, .nav { font-family: 'Poppins', 'Montserrat', sans-serif; }
        .font-pacifico { font-family: 'Pacifico', cursive; }
    </style>
</head>
<body class="min-h-screen flex flex-col relative" style="background: linear-gradient(120deg, #fbc2eb 0%, #a6c1ee 30%, #f9f586 60%, #b2f7ef 100%);">
    <!-- SVG Wave Atas -->
    <svg class="absolute top-0 left-0 w-full h-24 md:h-32 lg:h-40 pointer-events-none" viewBox="0 0 1440 320" fill="none" xmlns="http://www.w3.org/2000/svg" style="z-index:1"><path fill="#4CAF50" fill-opacity="0.10" d="M0,64L48,80C96,96,192,128,288,133.3C384,139,480,117,576,117.3C672,117,768,139,864,154.7C960,171,1056,181,1152,165.3C1248,149,1344,107,1392,85.3L1440,64L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>
    <!-- Konten utama -->
    <div class="relative flex-1 flex flex-col">
        @include('layouts.header')
        <main class="min-h-[70vh]">
            @yield('content')
        </main>
        @include('layouts.footer')
    </div>
    <!-- SVG Wave Bawah -->
    <svg class="absolute bottom-0 left-0 w-full h-24 md:h-32 lg:h-40 pointer-events-none" viewBox="0 0 1440 320" fill="none" xmlns="http://www.w3.org/2000/svg" style="z-index:1"><path fill="#2196F3" fill-opacity="0.08" d="M0,224L48,202.7C96,181,192,139,288,128C384,117,480,139,576,170.7C672,203,768,245,864,229.3C960,213,1056,139,1152,128C1248,117,1344,171,1392,197.3L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
</body>
</html> 
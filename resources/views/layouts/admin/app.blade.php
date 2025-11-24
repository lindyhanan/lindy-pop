<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.admin.css') {{-- CSS + Tailwind/Bootstrap --}}
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

    {{-- Container utama --}}
    <div class="flex flex-1">


        {{-- Pastikan sidebar punya kelas w-64 atau lebar tetap --}}

        {{-- Konten utama --}}
        <main class="flex-1 p-6 overflow-auto">
            @include('layouts.admin.header') {{-- Header di atas konten --}}
            @yield('content') {{-- Konten halaman --}}
        </main>

    </div>

    {{-- Footer + JS --}}
    @include('layouts.admin.footer')
    @include('layouts.admin.js')

</body>
</html>

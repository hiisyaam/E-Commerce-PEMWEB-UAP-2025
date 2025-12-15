<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Panel - @yield('title')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-[#fdf7f7] text-[#8BAE8E] font-roboto antialiased">

<div x-data="{ open: true }" class="flex min-h-screen">

    {{-- SIDEBAR --}}
    <aside 
        x-bind:class="open ? 'w-64' : 'w-20'"
        class="transition-all duration-300 bg-white border-r border-gray-200 flex flex-col py-8 shadow-sm"
    >

        {{-- LOGO --}}
        <div class="flex justify-center items-center px-6 mb-10 space-x-3">
            <img 
                src="{{ asset('assets/images/logo.png') }}" 
                class="w-16 h-16 rounded-xl object-cover"
                alt="Logo"
            >
        </div>

        {{-- NAV --}}
        <nav class="flex-1 px-4 space-y-1">

            {{-- Dashboard --}}
            <a href="{{ route('seller.dashboard') }}"
               class="flex items-center gap-4 px-4 py-3 rounded-lg font-medium transition
               {{ request()->routeIs('seller.dashboard') 
                    ? 'bg-[#8BAE8E] text-white shadow-sm'
                    : 'hover:bg-gray-100 text-gray-700' }}">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3"/>
                </svg>
                <span x-show="open">Dashboard</span>
            </a>

            {{-- Profil Toko --}}
            <a href="{{ route('seller.store.profile') }}"
               class="flex items-center gap-4 px-4 py-3 rounded-lg font-medium transition
               {{ request()->routeIs('seller.store.profile') 
                    ? 'bg-[#8BAE8E] text-white shadow-sm' 
                    : 'hover:bg-gray-100 text-gray-700' }}">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                          d="M5.121 17.804A4 4 0 007 21h10a4 4 0 001.879-3.196M15 11a3 3 
                          0 11-6 0 3 3 0 016 0z"/>
                </svg>
                <span x-show="open">Profil Toko</span>
            </a>

            {{-- Kategori --}}
            <a href="{{ route('seller.categories.index') }}"
               class="flex items-center gap-4 px-4 py-3 rounded-lg font-medium transition
               {{ request()->routeIs('seller.categories.*') 
                    ? 'bg-[#8BAE8E] text-white shadow-sm' 
                    : 'hover:bg-gray-100 text-gray-700' }}">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                          d="M4 6h16M4 12h16M4 18h7"/>
                </svg>
                <span x-show="open">Kategori</span>
            </a>

            {{-- Produk --}}
            <a href="{{ route('seller.products.index') }}"
               class="flex items-center gap-4 px-4 py-3 rounded-lg font-medium transition
               {{ request()->routeIs('seller.products.*') 
                    ? 'bg-[#8BAE8E] text-white shadow-sm' 
                    : 'hover:bg-gray-100 text-gray-700' }}">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                          d="M20 13V6a2 2 0 00-2-2h-3l-2-2-2 2H6a2 2 0 00-2 2v7"/>
                    <rect x="3" y="13" width="18" height="8" rx="2" ry="2"/>
                </svg>
                <span x-show="open">Produk</span>
            </a>

            {{-- Pesanan --}}
            <a href="{{ route('seller.orders.index') }}"
               class="flex items-center gap-4 px-4 py-3 rounded-lg font-medium transition
               {{ request()->routeIs('seller.orders.*') 
                    ? 'bg-[#8BAE8E] text-white shadow-sm' 
                    : 'hover:bg-gray-100 text-gray-700' }}">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                          d="M3 3h18l-1 9H4L3 3zm3 12a3 3 0 106 0H6zm9 0a3 3 0 106 0h-6z"/>
                </svg>
                <span x-show="open">Pesanan</span>
            </a>

            {{-- Saldo --}}
            <a href="{{ route('seller.balance.index') }}"
               class="flex items-center gap-4 px-4 py-3 rounded-lg font-medium transition
               {{ request()->routeIs('seller.balance.*') 
                    ? 'bg-[#8BAE8E] text-white shadow-sm' 
                    : 'hover:bg-gray-100 text-gray-700' }}">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 8c-1.657 0-3 .895-3 2v4c0 1.105 1.343 2 3 2s3-.895 3-2v-4c0-1.105-1.343-2-3-2zm0 0V6m0 10v2"/>
                </svg>
                <span x-show="open">Saldo</span>
            </a>

            {{-- Penarikan Dana --}}
            <a href="{{ route('seller.withdrawals.index') }}"
               class="flex items-center gap-4 px-4 py-3 rounded-lg font-medium transition
               {{ request()->routeIs('seller.withdrawals.*') 
                    ? 'bg-[#8BAE8E] text-white shadow-sm' 
                    : 'hover:bg-gray-100 text-gray-700' }}">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 8V4m0 4l-4-4m4 4l4-4M6 12h12v8a2 2 0 01-2 2H8a2 2 0 01-2-2v-8z"/>
                </svg>
                <span x-show="open">Penarikan Dana</span>
            </a>

        </nav>

        {{-- LOGOUT --}}
        <form action="{{ route('logout') }}" method="POST" class="px-4 mt-6">
            @csrf
            <button
                class="flex items-center gap-3 w-full px-4 py-3 text-red-600 rounded-lg hover:bg-red-50 transition">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                          d="M17 16l4-4m0 0l-4-4m4 4H7"/>
                </svg>
                <span x-show="open">Logout</span>
            </button>
        </form>

    </aside>

    {{-- MAIN WRAPPER --}}
    <div class="flex-1 flex flex-col">

        {{-- TOP BAR --}}
        <header class="bg-white border-b border-gray-200 px-8 py-4 flex justify-between items-center">

            {{-- Toggle Sidebar --}}
            <button x-on:click="open = !open"
                    class="p-2 rounded-lg hover:bg-gray-100 transition">
                <svg class="h-6 w-6 text-gray-700" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M3 5h14M3 10h14M3 15h14"/>
                </svg>
            </button>

            {{-- User Info --}}
            <div class="flex items-center gap-3">
                <div class="text-right">
                    <p class="font-semibold">{{ Auth::user()->name }}</p>
                    <p class="text-sm text-gray-500">{{ Auth::user()->email }}</p>
                </div>

                <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}"
                     class="w-10 h-10 rounded-full border shadow-sm" />
            </div>
        </header>

        {{-- MAIN CONTENT SLOT --}}
        <main class="flex-1 p-10">
            @yield('content')
        </main>

    </div>

</div>

</body>
</html>

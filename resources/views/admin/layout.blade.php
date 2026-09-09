<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') — SI-KAWU Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Inter', 'sans-serif'] },
                    colors: {
                        primary: '#059669',
                        'primary-dark': '#047857',
                    }
                }
            }
        }
    </script>
    <style type="text/tailwindcss">
        html { scroll-behavior: smooth; }
        .sidebar-link { @apply flex items-center gap-3 px-4 py-3 rounded-xl text-slate-300 hover:bg-white/10 hover:text-white transition-all duration-200 font-medium text-sm; }
        .sidebar-link.active { @apply bg-primary text-white shadow-lg shadow-emerald-900/50; }
        .card { @apply bg-white rounded-2xl shadow-sm border border-slate-100 p-6; }
        .btn-primary { @apply inline-flex items-center gap-2 bg-primary text-white font-semibold px-5 py-2.5 rounded-xl hover:bg-primary-dark transition-all shadow-lg shadow-emerald-500/25 hover:-translate-y-0.5; }
        .btn-secondary { @apply inline-flex items-center gap-2 bg-slate-100 text-slate-700 font-semibold px-5 py-2.5 rounded-xl hover:bg-slate-200 transition-all; }
        .btn-danger { @apply inline-flex items-center gap-2 bg-red-500 text-white font-semibold px-5 py-2.5 rounded-xl hover:bg-red-600 transition-all; }
        .badge { @apply inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold; }
        .form-input { @apply w-full border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary transition-all; }
        .form-label { @apply block text-sm font-semibold text-slate-700 mb-2; }
    </style>
    @yield('head')
</head>
<body class="font-sans bg-slate-50 antialiased" x-data="{ sidebarOpen: false }">

<div class="flex h-screen overflow-hidden">
    <!-- Mobile Sidebar Overlay -->
    <div x-show="sidebarOpen" 
         x-transition.opacity 
         class="fixed inset-0 bg-slate-900/50 z-20 md:hidden backdrop-blur-sm" 
         @click="sidebarOpen = false" style="display: none;"></div>

    <!-- Sidebar -->
    <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
           class="fixed inset-y-0 left-0 z-30 w-64 bg-slate-900 flex flex-col overflow-y-auto transform transition-transform duration-300 md:relative md:translate-x-0">
        <!-- Logo -->
        <div class="p-6 border-b border-slate-800">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">
                <div class="w-10 h-10 bg-primary rounded-xl flex items-center justify-center text-white font-bold text-lg shadow-lg shadow-emerald-900/50">SK</div>
                <div>
                    <div class="text-white font-bold text-base leading-tight">SI-KAWU</div>
                    <div class="text-slate-400 text-xs">Panel Admin</div>
                </div>
            </a>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 p-4 space-y-1">
            <div class="text-slate-500 text-xs font-semibold uppercase tracking-wider px-4 mb-3">Menu Utama</div>

            <a href="{{ route('admin.dashboard') }}"
               class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2 2V7zm0 0V5a2 2 0 012-2h6l2 2h6a2 2 0 012 2v2H3z"/>
                </svg>
                Dashboard
            </a>

            <a href="{{ route('admin.pengumuman.index') }}"
               class="sidebar-link {{ request()->routeIs('admin.pengumuman*') ? 'active' : '' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/>
                </svg>
                Pengumuman
            </a>

            <a href="{{ route('admin.laporan.index') }}"
               class="sidebar-link {{ request()->routeIs('admin.laporan*') ? 'active' : '' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                Laporan Masuk
            </a>

            <div class="border-t border-slate-800 my-4"></div>
            <div class="text-slate-500 text-xs font-semibold uppercase tracking-wider px-4 mb-3">Lainnya</div>

            <a href="{{ route('home') }}" target="_blank"
               class="sidebar-link">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                Lihat Website
            </a>
        </nav>

        <!-- User Info -->
        <div class="p-4 border-t border-slate-800">
            <div class="flex items-center gap-3 mb-3">
                <div class="w-9 h-9 bg-primary/20 rounded-full flex items-center justify-center text-primary font-bold text-sm">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
                <div class="flex-1 min-w-0">
                    <div class="text-white text-sm font-semibold truncate">{{ auth()->user()->name }}</div>
                    <div class="text-slate-400 text-xs truncate">{{ auth()->user()->email }}</div>
                </div>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full flex items-center gap-2 px-4 py-2 text-red-400 hover:text-red-300 hover:bg-red-500/10 rounded-xl transition-all text-sm font-medium">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                    Keluar
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col overflow-hidden min-w-0">
        <!-- Top Bar -->
        <header class="bg-white border-b border-slate-100 px-4 md:px-8 py-4 flex items-center justify-between shrink-0">
            <div class="flex items-center gap-4">
                <button @click="sidebarOpen = true" class="md:hidden text-slate-500 hover:text-slate-700 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
                <div>
                    <h1 class="text-lg md:text-xl font-bold text-slate-900">@yield('page-title', 'Dashboard')</h1>
                    <p class="hidden sm:block text-sm text-slate-500 mt-0.5">@yield('page-subtitle', 'Selamat datang di panel admin SI-KAWU')</p>
                </div>
            </div>
            <div class="flex items-center gap-3">
                <span class="hidden sm:block text-sm text-slate-500">{{ now()->isoFormat('dddd, D MMMM Y') }}</span>
            </div>
        </header>

        <!-- Page Content -->
        <main class="flex-1 overflow-y-auto p-4 md:p-8">
            @if(session('success'))
                <div class="mb-6 flex items-start gap-3 bg-emerald-50 border border-emerald-200 text-emerald-800 px-5 py-4 rounded-xl">
                    <svg class="w-5 h-5 mt-0.5 shrink-0 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 flex items-start gap-3 bg-red-50 border border-red-200 text-red-800 px-5 py-4 rounded-xl">
                    <svg class="w-5 h-5 mt-0.5 shrink-0 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span class="font-medium">{{ session('error') }}</span>
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</div>

@yield('scripts')
</body>
</html>

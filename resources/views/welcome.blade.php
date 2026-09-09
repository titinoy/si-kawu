<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SI-KAWU - Sistem Informasi Desa Kawu</title>
    <meta name="description" content="Portal layanan masyarakat Desa Kawu, Kedunggalar, Ngawi. Sistem pengumuman digital dan pelaporan warga.">
    <!-- Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        primary: '#059669', // Emerald 600
                        'primary-dark': '#047857', // Emerald 700
                        secondary: '#2563EB', // Blue 600
                        'secondary-dark': '#1D4ED8', // Blue 700
                    }
                }
            }
        }
    </script>
    <style>
        /* Smooth scrolling */
        html { scroll-behavior: smooth; }
        
        /* Subtle fade-in animation for cards */
        .fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
            opacity: 0;
            transform: translateY(20px);
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .delay-100 { animation-delay: 100ms; }
        .delay-200 { animation-delay: 200ms; }
        .delay-300 { animation-delay: 300ms; }
        
        /* Micro-interactions */
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="font-sans text-slate-800 bg-slate-50 antialiased">

    <!-- 1. NAVBAR -->
    <nav class="fixed w-full z-50 top-0 start-0 border-b border-gray-200 bg-white/90 backdrop-blur-md shadow-sm">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
                <!-- Logo Placeholder / SVG -->
                <div class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center text-white font-bold text-xl shadow-md">
                    SK
                </div>
                <div>
                    <span class="self-center text-xl font-bold whitespace-nowrap text-slate-900 block leading-tight">SI-KAWU</span>
                    <span class="block text-xs font-medium text-slate-500">Sistem Informasi Desa Kawu</span>
                </div>
            </a>
            <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <a href="{{ url('layanan') }}" class="hidden md:inline-flex text-white bg-primary hover:bg-primary-dark focus:ring-4 focus:outline-none focus:ring-emerald-300 font-semibold rounded-lg text-sm px-5 py-2.5 text-center shadow-lg shadow-emerald-500/30 transition-all duration-300 transform hover:scale-105">
                    Masuk ke Layanan
                </a>
                <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-sticky" aria-expanded="false" id="mobile-menu-btn">
                    <span class="sr-only">Buka menu utama</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                    </svg>
                </button>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-transparent">
                    <li>
                        <a href="#" class="block py-2 px-3 text-primary rounded md:bg-transparent md:text-primary md:p-0 font-semibold" aria-current="page">Beranda</a>
                    </li>
                    <li>
                        <a href="#tentang" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-primary md:p-0 transition-colors">Tentang Desa</a>
                    </li>
                    <li>
                        <a href="#layanan" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-primary md:p-0 transition-colors">Layanan</a>
                    </li>
                    <li>
                        <a href="#kontak" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-primary md:p-0 transition-colors">Kontak</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- 2. HERO SECTION -->
    <section class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 overflow-hidden">
        <!-- Background Pattern / Image with Overlay -->
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1596541604085-f55a1532cbaf?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80" alt="Pemandangan Desa Kawu" class="w-full h-full object-cover object-center" />
            <div class="absolute inset-0 bg-gradient-to-r from-slate-900/90 via-slate-900/70 to-slate-900/40"></div>
        </div>

        <div class="relative z-10 max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl fade-in-up">
                <div class="inline-flex items-center px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-300 border border-emerald-500/30 text-sm font-medium mb-6">
                    <span class="flex w-2 h-2 rounded-full bg-emerald-400 mr-2 animate-pulse"></span>
                    Portal Digital Resmi
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white leading-tight mb-6 tracking-tight">
                    SI-KAWU <br/>
                    <span class="text-emerald-400">Sistem Informasi Desa Kawu</span>
                </h1>
                <p class="text-lg md:text-xl text-gray-200 mb-8 leading-relaxed font-light">
                    Portal digital pengumuman dan pelaporan masalah Desa Kawu, Kecamatan Kedunggalar, Kabupaten Ngawi — cepat, mudah, dan transparan.
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ url('layanan') }}" class="inline-flex justify-center items-center py-3 px-8 text-base font-semibold text-center text-white bg-primary rounded-lg hover:bg-primary-dark focus:ring-4 focus:ring-emerald-300 shadow-lg shadow-emerald-500/30 transition-transform transform hover:-translate-y-1">
                        Masuk ke Layanan
                        <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </a>
                    <a href="#tentang" class="inline-flex justify-center items-center py-3 px-8 text-base font-semibold text-center text-white border-2 border-white/30 rounded-lg hover:bg-white/10 focus:ring-4 focus:ring-gray-100 transition-colors backdrop-blur-sm">
                        Pelajari Lebih Lanjut
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Decorative bottom shape -->
        <div class="absolute bottom-0 left-0 right-0 h-16 bg-gradient-to-t from-slate-50 to-transparent z-10"></div>
    </section>

    <!-- 3. SEKSI TENTANG DESA -->
    <section id="tentang" class="py-20 bg-slate-50">
        <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16 fade-in-up">
                <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-4">Mengenal Desa Kawu</h2>
                <div class="w-24 h-1.5 bg-primary mx-auto rounded-full mb-6"></div>
                <p class="text-lg text-slate-600">Terletak di jalur strategis nasional, Desa Kawu adalah perpaduan antara kearifan lokal agraris dan warisan sejarah dunia.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Info Card 1 -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 card-hover fade-in-up delay-100">
                    <div class="w-12 h-12 bg-emerald-100 text-emerald-600 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-2">Wilayah Administratif</h3>
                    <ul class="space-y-2 text-slate-600 text-sm">
                        <li><span class="font-semibold">Desa:</span> Kawu</li>
                        <li><span class="font-semibold">Kecamatan:</span> Kedunggalar</li>
                        <li><span class="font-semibold">Kabupaten:</span> Ngawi, Jawa Timur</li>
                        <li><span class="font-semibold">Kode Pos:</span> 63254</li>
                    </ul>
                </div>

                <!-- Info Card 2 -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 card-hover fade-in-up delay-200">
                    <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-2">Demografi</h3>
                    <ul class="space-y-2 text-slate-600 text-sm">
                        <li><span class="font-semibold">Penduduk:</span> [ISI DATA RESMI] Jiwa</li>
                        <li><span class="font-semibold">Luas Wilayah:</span> [ISI DATA RESMI] Ha</li>
                        <li><span class="font-semibold">Mata Pencaharian:</span> Petani & Pedagang</li>
                        <li><span class="font-semibold">Aksesibilitas:</span> Dilintasi jalur nasional Sby-Jkt</li>
                    </ul>
                </div>

                <!-- Info Card 3 -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 card-hover fade-in-up delay-300 md:col-span-2 lg:col-span-1">
                    <div class="w-12 h-12 bg-amber-100 text-amber-600 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-2">Potensi & Sejarah</h3>
                    <p class="text-slate-600 text-sm leading-relaxed">
                        Desa Kawu memiliki Dukuh Trinil, rumah bagi Museum Trinil — situs purbakala nasional tempat ditemukannya fosil <i>Pithecanthropus erectus</i>. Sebuah nilai sejarah dan wisata edukasi berkelas dunia.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. SEKSI FITUR LAYANAN SI-KAWU -->
    <section id="layanan" class="py-20 bg-white">
        <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-4">Layanan Unggulan SI-KAWU</h2>
                <p class="text-lg text-slate-600">Akses layanan publik desa secara cepat dan efisien melalui portal digital kami.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 lg:gap-16 items-center">
                
                <!-- Feature 1 -->
                <div class="group relative rounded-3xl overflow-hidden bg-gradient-to-br from-blue-50 to-indigo-50 border border-blue-100 p-8 md:p-10 transition-all hover:shadow-xl hover:shadow-blue-500/10">
                    <div class="absolute right-0 top-0 w-64 h-64 bg-blue-500/5 rounded-full blur-3xl -mr-20 -mt-20 transition-transform group-hover:scale-110"></div>
                    
                    <div class="relative z-10">
                        <div class="w-16 h-16 bg-blue-600 rounded-2xl shadow-lg shadow-blue-600/30 flex items-center justify-center text-white mb-8 group-hover:-translate-y-2 transition-transform duration-300">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path></svg>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-4">Papan Pengumuman Digital</h3>
                        <p class="text-slate-600 mb-8 leading-relaxed">
                            Dapatkan informasi terbaru, undangan desa, dan berita resmi dari balai desa secara <i>real-time</i> tanpa harus keluar rumah.
                        </p>
                        <a href="{{ url('layanan') }}" class="inline-flex items-center text-blue-600 font-semibold hover:text-blue-800 transition-colors">
                            Lihat Pengumuman
                            <svg class="w-4 h-4 ml-2 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    </div>
                </div>

                <!-- Feature 2 -->
                <div class="group relative rounded-3xl overflow-hidden bg-gradient-to-br from-emerald-50 to-teal-50 border border-emerald-100 p-8 md:p-10 transition-all hover:shadow-xl hover:shadow-emerald-500/10">
                    <div class="absolute right-0 top-0 w-64 h-64 bg-emerald-500/5 rounded-full blur-3xl -mr-20 -mt-20 transition-transform group-hover:scale-110"></div>
                    
                    <div class="relative z-10">
                        <div class="w-16 h-16 bg-primary rounded-2xl shadow-lg shadow-emerald-600/30 flex items-center justify-center text-white mb-8 group-hover:-translate-y-2 transition-transform duration-300">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path></svg>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-4">Lapor Masalah Desa</h3>
                        <p class="text-slate-600 mb-8 leading-relaxed">
                            Laporkan fasilitas rusak, jalan berlubang, atau masalah lingkungan langsung ke perangkat desa. Lengkap dengan foto, lokasi, dan pelacakan status.
                        </p>
                        <a href="{{ url('layanan') }}" class="inline-flex items-center text-primary font-semibold hover:text-primary-dark transition-colors">
                            Buat Laporan Baru
                            <svg class="w-4 h-4 ml-2 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- 5. SEKSI HIGHLIGHT WISATA/SEJARAH -->
    <section class="py-16 bg-slate-50">
        <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-slate-900 rounded-3xl overflow-hidden shadow-2xl flex flex-col md:flex-row relative">
                <!-- Background Decoration -->
                <div class="absolute inset-0 opacity-10 bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-white via-slate-900 to-slate-900"></div>
                
                <div class="md:w-1/2 p-10 md:p-14 flex flex-col justify-center relative z-10">
                    <div class="inline-block px-3 py-1 bg-amber-500/20 text-amber-400 rounded-full text-sm font-semibold mb-4 w-max border border-amber-500/30">
                        Identitas Desa Kawu
                    </div>
                    <h2 class="text-3xl md:text-4xl font-bold text-white mb-6 leading-tight">Jejak Prasejarah di Museum Trinil</h2>
                    <p class="text-slate-300 text-lg leading-relaxed mb-0">
                        Desa Kawu bangga menjadi rumah bagi Museum Trinil, situs penemuan fosil manusia purba yang mengubah sejarah dunia. Jelajahi peninggalan masa lampau dan dukung pelestarian wisata edukasi kebanggaan Ngawi.
                    </p>
                </div>
                <div class="md:w-1/2 min-h-[300px] md:min-h-full relative">
                    <!-- Placeholder Image for Museum Trinil -->
                    <img src="https://images.unsplash.com/photo-1599946347371-68eb71b16afc?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" alt="Museum Trinil" class="absolute inset-0 w-full h-full object-cover" />
                    <!-- Gradient mask to blend with left content -->
                    <div class="absolute inset-0 bg-gradient-to-t md:bg-gradient-to-r from-slate-900 via-slate-900/60 md:via-slate-900/40 to-transparent"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- 6. SEKSI STATISTIK SINGKAT -->
    <section class="py-16 bg-white border-b border-slate-100">
        <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center divide-y md:divide-y-0 md:divide-x divide-gray-100">
                <div class="p-4 py-8 md:py-4">
                    <div class="text-4xl md:text-5xl font-extrabold text-secondary mb-2">{{ $stats['pengumuman_aktif'] ?? 0 }}</div>
                    <div class="text-slate-500 font-medium text-lg">Pengumuman Aktif</div>
                </div>
                <div class="p-4 py-8 md:py-4">
                    <div class="text-4xl md:text-5xl font-extrabold text-primary mb-2">{{ $stats['laporan_bulan_ini'] ?? 0 }}</div>
                    <div class="text-slate-500 font-medium text-lg">Laporan Masuk Bulan Ini</div>
                </div>
                <div class="p-4 py-8 md:py-4">
                    <div class="text-4xl md:text-5xl font-extrabold text-emerald-500 mb-2">{{ $stats['laporan_selesai'] ?? 0 }}</div>
                    <div class="text-slate-500 font-medium text-lg">Laporan Selesai Ditangani</div>
                </div>
            </div>
        </div>
    </section>

    <!-- 7. FOOTER -->
    <footer id="kontak" class="bg-slate-900 text-slate-300 pt-16 pb-8 border-t border-slate-800">
        <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">
                <!-- Brand Info -->
                <div class="col-span-1 md:col-span-2 lg:col-span-1">
                    <a href="#" class="flex items-center space-x-3 mb-6">
                        <div class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center text-white font-bold text-xl">
                            SK
                        </div>
                        <div>
                            <span class="text-xl font-bold text-white block leading-tight">SI-KAWU</span>
                        </div>
                    </a>
                    <p class="text-slate-400 text-sm leading-relaxed mb-6">
                        Sistem Informasi Desa Kawu. Portal digital transparan dan terpadu untuk pelayanan masyarakat desa yang lebih baik.
                    </p>
                </div>

                <!-- Kontak Desa -->
                <div>
                    <h4 class="text-white font-semibold mb-6 uppercase tracking-wider text-sm">Hubungi Kami</h4>
                    <ul class="space-y-4 text-sm">
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-emerald-500 mr-3 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <span>Kantor Desa Kawu<br/>[ISI DATA ALAMAT LENGKAP]</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-emerald-500 mr-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            <span>[ISI DATA TELEPON/WA]</span>
                        </li>
                    </ul>
                </div>

                <!-- Jam Pelayanan -->
                <div>
                    <h4 class="text-white font-semibold mb-6 uppercase tracking-wider text-sm">Jam Pelayanan</h4>
                    <ul class="space-y-4 text-sm">
                        <li class="flex items-center justify-between border-b border-slate-800 pb-2">
                            <span>Senin - Kamis</span>
                            <span class="text-white">[ISI JAM]</span>
                        </li>
                        <li class="flex items-center justify-between border-b border-slate-800 pb-2">
                            <span>Jumat</span>
                            <span class="text-white">[ISI JAM]</span>
                        </li>
                        <li class="flex items-center justify-between">
                            <span>Sabtu - Minggu</span>
                            <span class="text-red-400 font-medium">Tutup</span>
                        </li>
                    </ul>
                </div>

                <!-- Link Cepat & Sosial -->
                <div>
                    <h4 class="text-white font-semibold mb-6 uppercase tracking-wider text-sm">Tautan Bantuan</h4>
                    <ul class="space-y-3 text-sm mb-6">
                        <li><a href="{{ url('layanan') }}" class="hover:text-white transition-colors">Masuk ke Dashboard</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Panduan Penggunaan</a></li>
                    </ul>
                    
                    <!-- Social Icons -->
                    <div class="flex space-x-4">
                        <a href="[ISI DATA]" class="text-slate-400 hover:text-white transition-colors">
                            <span class="sr-only">Facebook</span>
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"></path></svg>
                        </a>
                        <a href="[ISI DATA]" class="text-slate-400 hover:text-white transition-colors">
                            <span class="sr-only">Instagram</span>
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd"></path></svg>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-slate-800 pt-8 flex flex-col md:flex-row justify-between items-center text-sm">
                <p>&copy; <script>document.write(new Date().getFullYear())</script> SI-KAWU — Pemerintah Desa Kawu. Hak cipta dilindungi.</p>
                <p class="mt-2 md:mt-0">Dibuat untuk pelayanan masyarakat.</p>
            </div>
        </div>
    </footer>

    <!-- Mobile Menu Toggle Script -->
    <script>
        document.getElementById('mobile-menu-btn').addEventListener('click', function() {
            var menu = document.getElementById('navbar-sticky');
            if(menu.classList.contains('hidden')) {
                menu.classList.remove('hidden');
            } else {
                menu.classList.add('hidden');
            }
        });
    </script>
</body>
</html>

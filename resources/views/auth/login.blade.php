<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin — SI-KAWU</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: { extend: { fontFamily: { sans: ['Inter', 'sans-serif'] }, colors: { primary: '#059669', 'primary-dark': '#047857' } } }
        }
    </script>
    <style>
        .glass { backdrop-filter: blur(20px); }
        @keyframes float { 0%,100% { transform: translateY(0); } 50% { transform: translateY(-10px); } }
        .float { animation: float 4s ease-in-out infinite; }
    </style>
</head>
<body class="font-sans min-h-screen bg-slate-900 flex items-center justify-center p-4 relative overflow-hidden">

    <!-- Background Gradients -->
    <div class="absolute inset-0 z-0">
        <div class="absolute top-0 left-0 w-96 h-96 bg-emerald-500/20 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-blue-500/20 rounded-full blur-3xl translate-x-1/2 translate-y-1/2"></div>
        <div class="absolute top-1/2 left-1/2 w-64 h-64 bg-teal-500/10 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2"></div>
    </div>

    <!-- Card -->
    <div class="relative z-10 w-full max-w-md">
        <!-- Logo -->
        <div class="text-center mb-8 float">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-primary rounded-2xl shadow-2xl shadow-emerald-500/30 mb-4">
                <span class="text-2xl font-black text-white">SK</span>
            </div>
            <h1 class="text-2xl font-bold text-white">SI-KAWU</h1>
            <p class="text-slate-400 text-sm mt-1">Sistem Informasi Desa Kawu</p>
        </div>

        <!-- Form Card -->
        <div class="glass bg-white/5 border border-white/10 rounded-3xl p-8 shadow-2xl">
            <h2 class="text-xl font-bold text-white mb-2">Masuk ke Panel Admin</h2>
            <p class="text-slate-400 text-sm mb-8">Hanya untuk perangkat desa yang berwenang.</p>

            @if(session('success'))
            <div class="mb-6 bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 px-4 py-3 rounded-xl text-sm">
                {{ session('success') }}
            </div>
            @endif

            <form action="{{ route('login.post') }}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label class="block text-sm font-semibold text-slate-300 mb-2">Alamat Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus
                           placeholder="admin@kawu.desa.id"
                           class="w-full bg-white/5 border {{ $errors->has('email') ? 'border-red-500/50' : 'border-white/10' }} text-white rounded-xl px-4 py-3 placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary/50 transition-all">
                    @error('email')
                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-300 mb-2">Password</label>
                    <input type="password" name="password" required
                           placeholder="••••••••"
                           class="w-full bg-white/5 border border-white/10 text-white rounded-xl px-4 py-3 placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary/50 transition-all">
                </div>

                <div class="flex items-center">
                    <input type="checkbox" id="remember" name="remember" class="w-4 h-4 rounded text-primary">
                    <label for="remember" class="ml-2 text-sm text-slate-400">Ingat saya</label>
                </div>

                <button type="submit"
                        class="w-full bg-primary hover:bg-primary-dark text-white font-bold py-3.5 rounded-xl transition-all shadow-lg shadow-emerald-500/25 hover:shadow-emerald-500/40 hover:-translate-y-0.5 active:translate-y-0">
                    Masuk ke Dashboard
                </button>
            </form>

            <div class="mt-8 pt-6 border-t border-white/5 text-center">
                <a href="{{ route('home') }}" class="text-sm text-slate-500 hover:text-slate-300 transition-colors">
                    ← Kembali ke Website Publik
                </a>
            </div>
        </div>

        <p class="text-center text-slate-600 text-xs mt-6">
            © {{ date('Y') }} SI-KAWU — Pemerintah Desa Kawu
        </p>
    </div>

</body>
</html>

<x-guest-layout>
    @vite(['resources/css/login.css'])

    <div class="login-wrapper flex min-h-screen w-full">
        <!-- Kiri -->
        <div class="login-left hidden md:flex flex-col justify-center items-center w-1/2 bg-cover bg-[position:80%_center] relative text-white"
            style="background-image: url('{{ asset('img/gedung_kemnaker.jpg') }}');">
            <div class="overlay"></div>
            <div class="relative z-10 text-center px-10">
                <img src="{{ asset('img/logo_kemnaker.png') }}" alt="Logo Kemnaker" class="mx-auto w-50 mb-4">
                <h1 class="text-3xl font-bold mb-3">Kementerian Ketenagakerjaan RI</h1>
                <p class="text-lg font-light">Sistem Manajemen Arsip</p>
            </div>
        </div>

        <!-- Kanan -->
        <div class="login-right flex justify-center items-center w-full md:w-1/2 p-6 sm:p-10 bg-white">
            <div class="login-card">
                <div class="text-center mb-6">
                    <img src="{{ asset('img/kemnaker_logo.png') }}" alt="Logo" class="mx-auto w-16 mb-3">
                    <h2 class="text-xl font-semibold text-gray-800">Sistem Manajemen Arsip</h2>
                    <p class="text-sm text-gray-600">Kementerian Ketenagakerjaan RI</p>
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email -->
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input id="email" name="email" type="email" value="{{ old('email') }}" required
                            autofocus
                            class="w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-700">Kata Sandi</label>
                        <div class="relative">
                            <input id="password" name="password" type="password" required
                                class="w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pr-10">
                            <button type="button" onclick="togglePassword()"
                                class="absolute inset-y-0 right-3 flex items-center">
                                👁️
                            </button>
                        </div>
                    </div>

                    <!-- Remember Me & Forgot -->
                    <div class="flex items-center justify-between mb-4">
                        <label class="flex items-center">
                            <input type="checkbox" name="remember"
                                class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                            <span class="ml-2 text-sm text-gray-600">Ingat saya</span>
                        </label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:underline">
                                Lupa password?
                            </a>
                        @endif
                    </div>

                    <!-- reCAPTCHA -->
                    <div class="mb-4">
                        <div class="g-recaptcha" data-sitekey="ISI_SITE_KEY_KAMU_DI_SINI"></div>
                    </div>

                    <!-- Login Button -->
                    <button type="submit" class="login-btn">
                        Masuk
                    </button>

                    <div class="mt-4 text-center text-gray-500 text-sm">atau</div>

                    <!-- Google Button -->
                    <a href="{{ route('google.login') }}" class="mt-3 google-btn">
                        <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google">
                        Masuk dengan Google
                    </a>

                    <!-- Register -->
                    <p class="mt-6 text-center text-sm text-gray-600">
                        Belum punya akun?
                        <a href="{{ route('register') }}" class="text-blue-600 font-medium hover:underline">
                            Daftar di sini
                        </a>
                    </p>
                </form>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const password = document.getElementById('password');
            password.type = password.type === 'password' ? 'text' : 'password';
        }
    </script>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</x-guest-layout>

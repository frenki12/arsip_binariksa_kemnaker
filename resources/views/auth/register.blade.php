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
                    <h2 class="text-xl font-semibold text-gray-800">Buat Akun Baru</h2>
                    <p class="text-sm text-gray-600">Sistem Manajemen Arsip - Kemnaker RI</p>
                </div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                        <input id="name" name="name" type="text" value="{{ old('name') }}" required autofocus
                            class="w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input id="email" name="email" type="email" value="{{ old('email') }}" required
                            class="w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-700">Kata Sandi</label>
                        <div class="relative">
                            <input id="password" name="password" type="password" required
                                class="w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pr-10">
                            <button type="button" onclick="togglePassword('password')"
                                class="absolute inset-y-0 right-3 flex items-center">
                                👁️
                            </button>
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-4">
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Kata Sandi</label>
                        <div class="relative">
                            <input id="password_confirmation" name="password_confirmation" type="password" required
                                class="w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pr-10">
                            <button type="button" onclick="togglePassword('password_confirmation')"
                                class="absolute inset-y-0 right-3 flex items-center">
                                👁️
                            </button>
                        </div>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <!-- reCAPTCHA -->
                    <div class="mb-4">
                        <div class="g-recaptcha" data-sitekey="ISI_SITE_KEY_KAMU_DI_SINI"></div>
                    </div>

                    <!-- Tombol Register -->
                    <button type="submit" class="login-btn">
                        Daftar
                    </button>

                    <div class="mt-4 text-center text-gray-500 text-sm">atau</div>

                    <!-- Google Button -->
                    <a href="#" class="mt-3 google-btn">
                        <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google">
                        Daftar dengan Google
                    </a>

                    <!-- Login -->
                    <p class="mt-6 text-center text-sm text-gray-600">
                        Sudah punya akun?
                        <a href="{{ route('login') }}" class="text-blue-600 font-medium hover:underline">
                            Masuk di sini
                        </a>
                    </p>
                </form>
            </div>
        </div>
    </div>

    <script>
        function togglePassword(id) {
            const field = document.getElementById(id);
            field.type = field.type === 'password' ? 'text' : 'password';
        }
    </script>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</x-guest-layout>

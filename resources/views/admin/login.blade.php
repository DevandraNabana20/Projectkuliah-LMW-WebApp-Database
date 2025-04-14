<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Lapor Mas Wapres!</title>
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/favicon">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #F9FAFB;
        }

        .bg-image {
            background-image: url('{{ asset('assets/images/lmw.jpeg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .overlay {
            background-color: rgba(44, 28, 17, 0.5);
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .card-border {
            border: 2px solid rgba(44, 28, 17, 0.7);
            border-radius: 0.5rem;
        }
    </style>
</head>

<body>
    <!-- Background Image with Overlay -->
    <div class="bg-image"></div>
    <div class="overlay"></div>

    <!-- Centered Login Card -->
    <div class="min-h-screen flex items-center justify-center relative z-10 px-4 py-6">
        <div class="w-full max-w-md">
            <div class="bg-white p-8 rounded-lg shadow-lg card-border">
                <!-- Logo -->
                <div class="text-center mb-6">
                    <img class="h-16 mx-auto mb-2" src="{{ asset('assets/images/LaporMasWapres.webp') }}"
                        alt="Logo Lapor Mas Wapres!">
                    <h1 class="text-2xl font-bold text-[#2C1C11]">MASUK</h1>
                    <p class="text-gray-600 mt-2">Selamat Datang di Panel Admin<br>LaporMasWapres!</p>
                </div>

                @if ($errors->any())
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
                        <p>{{ $errors->first() }}</p>
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.login.submit') }}" class="space-y-6">
                    @csrf
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input id="email" name="email" type="email" autocomplete="email" required
                            value="{{ old('email') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#2C1C11]/50 placeholder-gray-400 text-gray-700 bg-white">
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <div class="relative">
                            <input id="password" name="password" type="password" autocomplete="current-password"
                                required
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#2C1C11]/50 placeholder-gray-400 text-gray-700 bg-white">
                            <button type="button" id="togglePassword"
                                class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-600 cursor-pointer">
                                <!-- Icon for Eye (Password Hidden) -->
                                <svg xmlns="http://www.w3.org/2000/svg" id="eyeIcon" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                <!-- Icon for Eye Slash (Password Shown) - Initially Hidden -->
                                <svg xmlns="http://www.w3.org/2000/svg" id="eyeSlashIcon" class="h-5 w-5 hidden"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                </svg>
                            </button>
                        </div>
                        @error('password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Centered "Ingat Saya" -->
                    <div class="flex  items-center">
                        <input id="remember" name="remember" type="checkbox"
                            class="h-4 w-4 text-[#2C1C11] focus:ring-[#2C1C11] border-gray-300 rounded">
                        <label for="remember" class="ml-2 block text-sm text-gray-700">
                            Remember me
                        </label>
                    </div>

                    <div>
                        <button type="submit"
                            class="w-full py-3 px-6 bg-gradient-to-r from-[#2C1C11] to-[#9A7B7B] text-white rounded-lg font-medium shadow-md transition-all duration-300 hover:shadow-xl hover:scale-105 text-center">
                            LOGIN
                        </button>
                    </div>
                </form>

                <!-- Copyright moved inside card -->
                <div class="text-center mt-6 text-sm text-gray-600 pt-4 border-t border-gray-200">
                    <p>© {{ date('Y') }} IT Setwapres | All Rights Reserved</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Script untuk Toggle Password -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const togglePassword = document.getElementById('togglePassword');
            const password = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');
            const eyeSlashIcon = document.getElementById('eyeSlashIcon');

            togglePassword.addEventListener('click', function() {
                // Toggle tipe input
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);

                // Toggle ikon
                if (type === 'text') {
                    eyeIcon.classList.add('hidden');
                    eyeSlashIcon.classList.remove('hidden');
                } else {
                    eyeIcon.classList.remove('hidden');
                    eyeSlashIcon.classList.add('hidden');
                }
            });
        });
    </script>
</body>

</html>

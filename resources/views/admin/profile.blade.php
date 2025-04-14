@extends('layouts.admin')

@section('title', 'Profile Admin')

@section('head')
    <style>
        .input-field {
            @apply w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#2C1C11]/50 placeholder-gray-400 text-gray-700 bg-white;
        }

        .btn-primary {
            @apply w-full py-3 px-6 bg-gradient-to-r from-[#2C1C11] to-[#9A7B7B] text-white rounded-lg font-medium shadow-md transition-all duration-300 hover:shadow-xl hover:scale-105 text-center;
        }
    </style>
@endsection

@section('content')
    <div class="container mx-auto">
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-[#2C1C11] mb-2">Profile Admin</h1>
            <p class="text-gray-600">Kelola informasi akun Anda</p>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Profile Card -->
            <div class="md:col-span-1">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="flex flex-col items-center">
                        <div
                            class="w-32 h-32 rounded-full bg-[#9A7B7B] flex items-center justify-center text-white text-5xl font-bold mb-4">
                            {{ substr(Auth::guard('admin')->user()->name, 0, 1) }}
                        </div>
                        <h2 class="text-xl font-semibold text-[#2C1C11]">{{ Auth::guard('admin')->user()->name }}</h2>
                        <p class="text-gray-600">{{ Auth::guard('admin')->user()->email }}</p>

                        <div class="mt-6 w-full text-center">
                            <p class="text-sm text-gray-500 mb-2">Member since</p>
                            <p class="text-gray-700">{{ Auth::guard('admin')->user()->created_at->format('d M Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit Profile Form -->
            <div class="md:col-span-2">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-lg font-semibold text-[#2C1C11] mb-4">Update Profile</h2>

                    <form method="POST" action="{{ route('admin.profile.update') }}" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <!-- Name -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                            <input id="name" name="name" type="text"
                                value="{{ Auth::guard('admin')->user()->name }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#2C1C11]/50 placeholder-gray-400 text-gray-700 bg-white"
                                required>
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input id="email" name="email" type="email"
                                value="{{ Auth::guard('admin')->user()->email }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#2C1C11]/50 placeholder-gray-400 text-gray-700 bg-white"
                                required>
                        </div>

                        <div class="pt-4 border-t border-gray-200">
                            <h3 class="text-md font-medium text-[#2C1C11] mb-3">Change Password</h3>

                            <!-- New Password -->
                            <div class="mb-3">
                                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                                    Password Baru
                                </label>
                                <div class="relative">
                                    <input id="password" name="password" type="password"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#2C1C11]/50 placeholder-gray-400 text-gray-700 bg-white pr-10">
                                    <button type="button" id="togglePassword"
                                        class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-600 cursor-pointer">
                                        <!-- Icon for Eye (Password Hidden) -->
                                        <svg xmlns="http://www.w3.org/2000/svg" id="eyeIcon" class="h-5 w-5"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
                                <p class="text-xs text-gray-500 mt-1">Biarkan kosong jika tidak ingin mengubah password</p>
                            </div>

                            <!-- Confirm Password -->
                            <div>
                                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">
                                    Konfirmasi Password Baru
                                </label>
                                <div class="relative">
                                    <input id="password_confirmation" name="password_confirmation" type="password"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#2C1C11]/50 placeholder-gray-400 text-gray-700 bg-white pr-10">
                                    <button type="button" id="toggleConfirmPassword"
                                        class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-600 cursor-pointer">
                                        <!-- Icon for Eye (Password Hidden) -->
                                        <svg xmlns="http://www.w3.org/2000/svg" id="eyeIconConfirm" class="h-5 w-5"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        <!-- Icon for Eye Slash (Password Shown) - Initially Hidden -->
                                        <svg xmlns="http://www.w3.org/2000/svg" id="eyeSlashIconConfirm"
                                            class="h-5 w-5 hidden" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                        </svg>
                                    </button>
                                </div>
                                <p id="passwordMatch" class="text-xs text-gray-500 mt-1 hidden"></p>
                            </div>
                        </div>

                        <div class="flex justify-end mt-6">
                            <button type="submit" id="updateBtn"
                                class="w-full py-3 px-6 bg-gradient-to-r from-[#2C1C11] to-[#9A7B7B] text-white rounded-lg font-medium shadow-md transition-all duration-300 hover:shadow-xl hover:scale-105 text-center">
                                Update Profile
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Toggle password visibility for new password
            const togglePassword = document.getElementById('togglePassword');
            const password = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');
            const eyeSlashIcon = document.getElementById('eyeSlashIcon');

            togglePassword.addEventListener('click', function() {
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);

                if (type === 'text') {
                    eyeIcon.classList.add('hidden');
                    eyeSlashIcon.classList.remove('hidden');
                } else {
                    eyeIcon.classList.remove('hidden');
                    eyeSlashIcon.classList.add('hidden');
                }
            });

            // Toggle password visibility for confirmation password
            const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
            const passwordConfirm = document.getElementById('password_confirmation');
            const eyeIconConfirm = document.getElementById('eyeIconConfirm');
            const eyeSlashIconConfirm = document.getElementById('eyeSlashIconConfirm');

            toggleConfirmPassword.addEventListener('click', function() {
                const type = passwordConfirm.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordConfirm.setAttribute('type', type);

                if (type === 'text') {
                    eyeIconConfirm.classList.add('hidden');
                    eyeSlashIconConfirm.classList.remove('hidden');
                } else {
                    eyeIconConfirm.classList.remove('hidden');
                    eyeSlashIconConfirm.classList.add('hidden');
                }
            });

            // Password match validation
            const passwordMatchMessage = document.getElementById('passwordMatch');
            const updateBtn = document.getElementById('updateBtn');

            function checkPasswordMatch() {
                const passwordValue = password.value;
                const confirmValue = passwordConfirm.value;

                // Only validate if both fields have values
                if (passwordValue || confirmValue) {
                    passwordMatchMessage.classList.remove('hidden');

                    if (passwordValue === confirmValue) {
                        passwordMatchMessage.textContent = 'Password cocok';
                        passwordMatchMessage.classList.remove('text-red-500');
                        passwordMatchMessage.classList.add('text-green-500');
                        return true;
                    } else {
                        passwordMatchMessage.textContent = 'Password tidak cocok';
                        passwordMatchMessage.classList.remove('text-green-500');
                        passwordMatchMessage.classList.add('text-red-500');
                        return false;
                    }
                } else {
                    passwordMatchMessage.classList.add('hidden');
                    return true; // No password change attempted
                }
            }

            // Check password match on input
            password.addEventListener('input', checkPasswordMatch);
            passwordConfirm.addEventListener('input', checkPasswordMatch);

            // Form submit validation
            document.querySelector('form').addEventListener('submit', function(e) {
                if (!checkPasswordMatch()) {
                    e.preventDefault();
                    alert('Password dan konfirmasi password tidak cocok');
                }
            });
        });
    </script>
@endsection

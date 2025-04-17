@extends('layouts.admin')

@section('title', 'Tambah Pengaduan')

@section('head')
    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <style>
        /* Custom flatpickr styling to match your theme */
        .flatpickr-day.selected,
        .flatpickr-day.startRange,
        .flatpickr-day.endRange,
        .flatpickr-day.selected.inRange,
        .flatpickr-day.startRange.inRange,
        .flatpickr-day.endRange.inRange,
        .flatpickr-day.selected:focus,
        .flatpickr-day.startRange:focus,
        .flatpickr-day.endRange:focus,
        .flatpickr-day.selected:hover,
        .flatpickr-day.startRange:hover,
        .flatpickr-day.endRange:hover,
        .flatpickr-day.selected.prevMonthDay,
        .flatpickr-day.startRange.prevMonthDay,
        .flatpickr-day.endRange.prevMonthDay,
        .flatpickr-day.selected.nextMonthDay,
        .flatpickr-day.startRange.nextMonthDay,
        .flatpickr-day.endRange.nextMonthDay {
            background: #2C1C11;
            border-color: #2C1C11;
        }
    </style>
@endsection

@section('content')
    <div class="container mx-auto px-4">
        <!-- Header Section with Back Button -->
        <div class="mb-8 flex flex-col md:flex-row justify-between items-start md:items-center">
            <div class="mb-4 md:mb-0">
                <h1 class="text-2xl font-bold text-[#2C1C11] mb-2">Tambah Pengaduan Baru</h1>
                <p class="text-gray-600">Masukkan data pengaduan baru</p>
            </div>
            <div class="w-full flex justify-start md:justify-end md:w-auto">
                <a href="{{ route('admin.complaints') }}"
                    class="py-2 px-4 bg-gray-100 text-gray-700 rounded-lg font-medium shadow-md transition-all duration-300 hover:bg-gray-200 flex items-center justify-center">
                    <i class="fas fa-arrow-left mr-1"></i> Kembali
                </a>
            </div>
        </div>

        @if ($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Add Form -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <form id="addForm" method="POST" action="{{ route('admin.complaints.store') }}" class="space-y-6"
                enctype="multipart/form-data">
                @csrf
                <!-- Hidden field for status -->
                <input type="hidden" name="status" value="process">

                <!-- Form Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Left Column -->
                    <div class="space-y-6">
                        <div>
                            <h3 class="text-md font-semibold text-[#2C1C11] mb-4 pb-2 border-b">Data Pribadi</h3>
                        </div>

                        <!-- Nama -->
                        <div>
                            <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                            <input type="text" id="nama" name="nama" value="{{ old('nama') }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#2C1C11]/50 placeholder-gray-400 text-gray-700 bg-white"
                                required>
                            <div class="text-red-500 text-sm hidden mt-1" id="nama-error"></div>
                        </div>

                        <!-- NIK -->
                        <div>
                            <label for="nik" class="block text-sm font-medium text-gray-700 mb-1">NIK</label>
                            <input type="text" id="nik" name="nik" maxlength="16" value="{{ old('nik') }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#2C1C11]/50 placeholder-gray-400 text-gray-700 bg-white"
                                required>
                            <div class="text-red-500 text-sm hidden mt-1" id="nik-error"></div>
                        </div>

                        <!-- Gender -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Kelamin</label>
                            <div class="flex flex-col sm:flex-row gap-2 sm:space-x-4 mt-2">
                                <label class="inline-flex items-center px-3 py-2 border rounded-md hover:bg-gray-50">
                                    <input type="radio" id="gender-male" name="gender" value="laki-laki"
                                        class="text-[#2C1C11] focus:ring-[#2C1C11] h-4 w-4"
                                        {{ old('gender') == 'laki-laki' ? 'checked' : '' }} required>
                                    <span class="ml-2 text-gray-700">Laki-laki</span>
                                </label>
                                <label class="inline-flex items-center px-3 py-2 border rounded-md hover:bg-gray-50">
                                    <input type="radio" id="gender-female" name="gender" value="perempuan"
                                        class="text-[#2C1C11] focus:ring-[#2C1C11] h-4 w-4"
                                        {{ old('gender') == 'perempuan' ? 'checked' : '' }} required>
                                    <span class="ml-2 text-gray-700">Perempuan</span>
                                </label>
                            </div>
                            <div class="text-red-500 text-sm hidden mt-1" id="gender-error"></div>
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#2C1C11]/50 placeholder-gray-400 text-gray-700 bg-white">
                            <p class="text-xs text-gray-500 mt-1">Opsional</p>
                            <div class="text-red-500 text-sm hidden mt-1" id="email-error"></div>
                        </div>

                        <!-- No HP -->
                        <div>
                            <label for="no_hp" class="block text-sm font-medium text-gray-700 mb-1">Nomor Telepon</label>
                            <input type="text" id="no_hp" name="no_hp" value="{{ old('no_hp') }}" maxlength="13"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#2C1C11]/50 placeholder-gray-400 text-gray-700 bg-white"
                                required>
                            <div class="text-red-500 text-sm hidden mt-1" id="no_hp-error"></div>
                        </div>

                        <!-- Companion -->
                        <div>
                            <label for="companion" class="block text-sm font-medium text-gray-700 mb-1">Nama
                                Pendamping</label>
                            <input type="text" id="companion" name="companion" value="{{ old('companion') }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#2C1C11]/50 placeholder-gray-400 text-gray-700 bg-white">
                            <p class="text-xs text-gray-500 mt-1">Opsional, untuk kelompok rentan/difabel</p>
                            <div class="text-red-500 text-sm hidden mt-1" id="companion-error"></div>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-6">
                        <div>
                            <h3 class="text-md font-semibold text-[#2C1C11] mb-4 pb-2 border-b">Detail Pengaduan</h3>
                        </div>

                        <!-- Alamat -->
                        <div>
                            <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                            <textarea id="alamat" name="alamat" rows="3"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#2C1C11]/50 placeholder-gray-400 text-gray-700 bg-white">{{ old('alamat') }}</textarea>
                            <div class="text-red-500 text-sm hidden mt-1" id="alamat-error"></div>
                        </div>

                        <!-- Tanggal Reservasi -->
                        <div>
                            <label for="tanggal_reservasi" class="block text-sm font-medium text-gray-700 mb-1">Tanggal
                                Reservasi</label>
                            <input type="text" id="tanggal_reservasi" name="tanggal_reservasi"
                                value="{{ old('tanggal_reservasi') }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#2C1C11]/50 placeholder-gray-400 text-gray-700 bg-white datepicker"
                                required autocomplete="off">
                            <div class="text-red-500 text-sm hidden mt-1" id="tanggal_reservasi-error"></div>
                        </div>

                        <!-- Waktu Reservasi -->
                        <div>
                            <label for="waktu_reservasi" class="block text-sm font-medium text-gray-700 mb-1">Waktu
                                Reservasi</label>
                            <select id="waktu_reservasi" name="waktu_reservasi"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#2C1C11]/50 placeholder-gray-400 text-gray-700 bg-white"
                                required>
                                <option value="" disabled selected>Pilih waktu</option>
                                <option value="09:00" {{ old('waktu_reservasi') == '09:00' ? 'selected' : '' }}>09:00 WIB
                                </option>
                                <option value="10:00" {{ old('waktu_reservasi') == '10:00' ? 'selected' : '' }}>10:00 WIB
                                </option>
                                <option value="11:00" {{ old('waktu_reservasi') == '11:00' ? 'selected' : '' }}>11:00 WIB
                                </option>
                            </select>
                            <div class="text-red-500 text-sm hidden mt-1" id="waktu_reservasi-error"></div>
                        </div>

                        <!-- Topik -->
                        <div>
                            <label for="topik" class="block text-sm font-medium text-gray-700 mb-1">Topik
                                Pengaduan</label>
                            <input type="text" id="topik" name="topik" value="{{ old('topik') }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#2C1C11]/50 placeholder-gray-400 text-gray-700 bg-white"
                                required>
                            <div class="text-red-500 text-sm hidden mt-1" id="topik-error"></div>
                        </div>

                        <!-- Detail Pengaduan -->
                        <div>
                            <label for="detail_pengaduan" class="block text-sm font-medium text-gray-700 mb-1">Detail
                                Pengaduan</label>
                            <textarea id="detail_pengaduan" name="detail_pengaduan" rows="4"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#2C1C11]/50 placeholder-gray-400 text-gray-700 bg-white">{{ old('detail_pengaduan') }}</textarea>
                            <div class="text-red-500 text-sm hidden mt-1" id="detail_pengaduan-error"></div>
                        </div>

                        <!-- File Pendukung -->
                        <div>
                            <label for="file_pendukung" class="block text-sm font-medium text-gray-700 mb-1">
                                File Pendukung (Opsional)
                            </label>
                            <input type="file" id="file_pendukung" name="file_pendukung"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#2C1C11]/50 placeholder-gray-400 text-gray-700 bg-white">
                            <p class="text-xs text-gray-500 mt-1">Format: PDF, ZIP, RAR, JPG, PNG (max. 4MB)</p>
                            <div class="text-red-500 text-sm hidden mt-1" id="file_pendukung-error"></div>
                        </div>
                    </div>
                </div>



                <!-- Action Buttons -->
                <div class="border-t pt-6 flex flex-col-reverse sm:flex-row justify-between items-center gap-3">
                    <a href="{{ route('admin.complaints') }}"
                        class="w-full sm:w-auto py-3 px-6 bg-gray-100 text-gray-700 rounded-lg font-medium shadow-md transition-all duration-300 hover:bg-gray-200 text-center flex items-center justify-center">
                        <i class="fas fa-times mr-1"></i> Batal
                    </a>
                    <button type="submit" id="submitBtn"
                        class="w-full sm:w-auto py-3 px-6 bg-gradient-to-r from-[#2C1C11] to-[#9A7B7B] text-white rounded-lg font-medium shadow-md transition-all duration-300 hover:shadow-xl hover:scale-105 text-center">
                        <i class="fas fa-save mr-2"></i> Tambah Pengaduan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/id.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Flatpickr for date picker
            const today = new Date();
            const tomorrow = new Date(today);
            tomorrow.setDate(tomorrow.getDate() + 1);
            const endOfYear = new Date(today.getFullYear(), 11, 31);

            // Check if tomorrow is a weekend, if so, move to next business day (Monday)
            let defaultDate = tomorrow;
            if (defaultDate.getDay() === 0) { // Sunday
                defaultDate.setDate(defaultDate.getDate() + 1); // Move to Monday
            } else if (defaultDate.getDay() === 6) { // Saturday
                defaultDate.setDate(defaultDate.getDate() + 2); // Move to Monday
            }

            // Apply consistent styling to datepicker field
            const datePickerInput = document.querySelector(".datepicker");
            if (datePickerInput) {
                // Ensure consistent font size and styling
                datePickerInput.style.fontSize = '0.875rem'; // 14px
                datePickerInput.style.lineHeight = '1.25rem'; // 20px
            }

            flatpickr(".datepicker", {
                dateFormat: "Y-m-d",
                locale: "id",
                allowInput: true,
                altInput: true,
                altFormat: "d F Y",
                disableMobile: "true",
                minDate: tomorrow, // Changed from "today" to tomorrow
                maxDate: endOfYear,
                defaultDate: defaultDate, // Use the adjusted default date
                disable: [
                    function(date) {
                        // Disable weekends (Sunday is 0, Saturday is 6)
                        return (date.getDay() === 0 || date.getDay() === 6);
                    }
                ],
                // Make sure the UI is also consistent
                onReady: function(selectedDates, dateStr, instance) {
                    // Apply consistent styling to the alt input that flatpickr creates
                    if (instance.altInput) {
                        instance.altInput.classList.add('w-full', 'px-4', 'py-2', 'border',
                            'border-gray-300', 'rounded-md', 'focus:outline-none', 'focus:ring-2',
                            'focus:ring-[#2C1C11]/50', 'placeholder-gray-400', 'text-gray-700',
                            'bg-white');
                        instance.altInput.style.fontSize = '0.875rem';
                    }
                }
            });

            // Form elements
            const form = document.getElementById('addForm');
            const namaField = document.getElementById('nama');
            const nikField = document.getElementById('nik');
            const emailField = document.getElementById('email');
            const no_hpField = document.getElementById('no_hp');
            const companionField = document.getElementById('companion');
            const alamatField = document.getElementById('alamat');
            const topikField = document.getElementById('topik');
            const detail_pengaduanField = document.getElementById('detail_pengaduan');
            const waktuReservasiField = document.getElementById('waktu_reservasi');

            // Helper functions for validation
            function showError(element, message) {
                element.textContent = message;
                element.classList.remove('hidden');
            }

            function hideError(element) {
                element.classList.add('hidden');
            }

            function applyValidationFeedback(field, isValid) {
                if (isValid) {
                    field.classList.remove('border-red-500');
                    field.classList.add('border-green-500');
                } else {
                    field.classList.remove('border-green-500');
                    field.classList.add('border-red-500');
                }
            }

            // Validation functions
            function validateNama() {
                const nama = namaField.value;
                const errorDiv = document.getElementById('nama-error');
                let isValid = false;

                if (nama.length === 0) {
                    showError(errorDiv, 'Nama tidak boleh kosong');
                } else if (nama.length < 3) {
                    showError(errorDiv, 'Nama terlalu pendek');
                } else if (/\d/.test(nama)) {
                    showError(errorDiv, 'Nama tidak boleh mengandung angka');
                } else {
                    hideError(errorDiv);
                    isValid = true;
                }

                applyValidationFeedback(namaField, isValid);
                return isValid;
            }

            function validateNIK() {
                const nik = nikField.value;
                const errorDiv = document.getElementById('nik-error');
                let isValid = false;

                if (nik.length === 0) {
                    showError(errorDiv, 'NIK tidak boleh kosong');
                } else if (nik.length !== 16) {
                    showError(errorDiv, 'NIK harus 16 digit');
                } else if (nik[0] === '0') {
                    showError(errorDiv, 'NIK tidak boleh diawali dengan angka 0');
                } else {
                    hideError(errorDiv);
                    isValid = true;
                }

                applyValidationFeedback(nikField, isValid);
                return isValid;
            }

            function validateGender() {
                const male = document.getElementById('gender-male').checked;
                const female = document.getElementById('gender-female').checked;
                const errorDiv = document.getElementById('gender-error');
                let isValid = false;

                if (!male && !female) {
                    showError(errorDiv, 'Pilih jenis kelamin');
                } else {
                    hideError(errorDiv);
                    isValid = true;
                }

                return isValid;
            }

            function validateEmail() {
                const email = emailField.value;
                const errorDiv = document.getElementById('email-error');
                let isValid = true; // Default true for optional field

                // Email is optional, so only validate if there's a value
                if (email.length > 0) {
                    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!emailPattern.test(email)) {
                        showError(errorDiv, 'Format email tidak valid');
                        isValid = false;
                    } else {
                        hideError(errorDiv);
                    }
                } else {
                    hideError(errorDiv);
                }

                applyValidationFeedback(emailField, isValid);
                return isValid;
            }

            function validateNoHP() {
                const noHP = no_hpField.value;
                const errorDiv = document.getElementById('no_hp-error');
                let isValid = false;

                if (noHP.length === 0) {
                    showError(errorDiv, 'Nomor telepon tidak boleh kosong');
                } else if (noHP.length < 10 || noHP.length > 13) {
                    showError(errorDiv, 'Nomor telepon harus 10-13 digit');
                } else if (!noHP.startsWith('08')) {
                    showError(errorDiv, 'Nomor telepon harus diawali dengan 08');
                } else {
                    hideError(errorDiv);
                    isValid = true;
                }

                applyValidationFeedback(no_hpField, isValid);
                return isValid;
            }

            function validateCompanion() {
                const companion = companionField.value;
                const errorDiv = document.getElementById('companion-error');
                let isValid = true; // Default to true for optional field

                if (companion.length > 0) {
                    if (companion.length < 3) {
                        showError(errorDiv, 'Nama pendamping terlalu pendek');
                        isValid = false;
                    } else if (/\d/.test(companion)) {
                        showError(errorDiv, 'Nama pendamping tidak boleh mengandung angka');
                        isValid = false;
                    } else {
                        hideError(errorDiv);
                    }
                } else {
                    hideError(errorDiv);
                }

                applyValidationFeedback(companionField, isValid);
                return isValid;
            }

            function validateAlamat() {
                const alamat = alamatField.value;
                const errorDiv = document.getElementById('alamat-error');
                let isValid = true; // Default to true for optional field

                if (alamat.length > 0 && alamat.length < 10) {
                    showError(errorDiv, 'Alamat terlalu pendek, minimal 10 karakter');
                    isValid = false;
                } else {
                    hideError(errorDiv);
                }

                applyValidationFeedback(alamatField, isValid);
                return isValid;
            }

            function validateTopik() {
                const topik = topikField.value;
                const errorDiv = document.getElementById('topik-error');
                let isValid = false;

                if (topik.length === 0) {
                    showError(errorDiv, 'Topik pengaduan tidak boleh kosong');
                } else if (topik.length < 10) {
                    showError(errorDiv, 'Topik pengaduan terlalu pendek, minimal 10 karakter');
                } else {
                    hideError(errorDiv);
                    isValid = true;
                }

                applyValidationFeedback(topikField, isValid);
                return isValid;
            }

            function validateDetailPengaduan() {
                const detail = detail_pengaduanField.value;
                const errorDiv = document.getElementById('detail_pengaduan-error');
                let isValid = true; // Default to true for optional field

                if (detail.length > 0 && detail.length < 10) {
                    showError(errorDiv, 'Detail pengaduan terlalu pendek, minimal 10 karakter');
                    isValid = false;
                } else {
                    hideError(errorDiv);
                }

                applyValidationFeedback(detail_pengaduanField, isValid);
                return isValid;
            }

            function validateWaktuReservasi() {
                const waktu = waktuReservasiField.value;
                const errorDiv = document.getElementById('waktu_reservasi-error');
                let isValid = false;

                if (!waktu) {
                    showError(errorDiv, 'Silakan pilih waktu reservasi');
                } else {
                    hideError(errorDiv);
                    isValid = true;
                }

                applyValidationFeedback(waktuReservasiField, isValid);
                return isValid;
            }

            // Validasi file pendukung
            function validateFilePendukung() {
                const fileInput = document.getElementById('file_pendukung');
                const errorDiv = document.getElementById('file_pendukung-error');
                let isValid = true;

                if (fileInput.files.length > 0) {
                    const file = fileInput.files[0];
                    const fileSize = file.size / 1024 / 1024; // Size in MB
                    const allowedExtensions = ['pdf', 'zip', 'rar', 'jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp'];
                    const fileExtension = file.name.split('.').pop().toLowerCase();

                    if (fileSize > 4) {
                        showError(errorDiv, 'Ukuran file terlalu besar (max 4MB)');
                        isValid = false;
                    } else if (!allowedExtensions.includes(fileExtension)) {
                        showError(errorDiv, 'Format file tidak didukung');
                        isValid = false;
                    } else {
                        hideError(errorDiv);
                    }
                } else {
                    hideError(errorDiv);
                }

                return isValid;
            }

            // Add event listener
            if (document.getElementById('file_pendukung')) {
                document.getElementById('file_pendukung').addEventListener('change', validateFilePendukung);
            }

            // Input event listeners for validation
            namaField.addEventListener('input', function() {
                this.value = this.value.replace(/[0-9]/g, '');
            });

            namaField.addEventListener('blur', validateNama);

            nikField.addEventListener('input', function() {
                this.value = this.value.replace(/[^0-9]/g, '');
            });

            nikField.addEventListener('blur', validateNIK);

            emailField.addEventListener('blur', validateEmail);

            no_hpField.addEventListener('input', function() {
                this.value = this.value.replace(/[^0-9]/g, '');
            });

            no_hpField.addEventListener('blur', validateNoHP);

            companionField.addEventListener('input', function() {
                this.value = this.value.replace(/[0-9]/g, '');
            });

            companionField.addEventListener('blur', validateCompanion);

            alamatField.addEventListener('blur', validateAlamat);

            topikField.addEventListener('blur', validateTopik);

            detail_pengaduanField.addEventListener('blur', validateDetailPengaduan);

            waktuReservasiField.addEventListener('change', validateWaktuReservasi);

            // Form submission
            form.addEventListener('submit', function(e) {
                // Always prevent default form submission first
                e.preventDefault();

                // Run all validations
                const isNamaValid = validateNama();
                const isNIKValid = validateNIK();
                const isGenderValid = validateGender();
                const isEmailValid = validateEmail();
                const isNoHPValid = validateNoHP();
                const isCompanionValid = validateCompanion();
                const isAlamatValid = validateAlamat();
                const isTopikValid = validateTopik();
                const isDetailValid = validateDetailPengaduan();
                const isWaktuValid = validateWaktuReservasi();
                const isFileValid = validateFilePendukung();

                // If any validation fails
                if (!isNamaValid || !isNIKValid || !isGenderValid || !isEmailValid ||
                    !isNoHPValid || !isCompanionValid || !isAlamatValid ||
                    !isTopikValid || !isDetailValid || !isWaktuValid || !isFileValid) {

                    // Scroll to the first error
                    const firstError = document.querySelector('.text-red-500:not(.hidden)');
                    if (firstError) {
                        firstError.scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });
                    }

                    // Show an alert about validation errors
                    Swal.fire({
                        icon: 'error',
                        title: 'Validasi Gagal',
                        text: 'Mohon periksa kembali data yang Anda masukkan.',
                        confirmButtonColor: '#2C1C11'
                    });
                    return;
                }

                // Get gender value
                const genderValue = document.getElementById('gender-male').checked ? 'Laki-laki' :
                    'Perempuan';

                // Get date value
                const dateValue = document.querySelector('.flatpickr-input.active') ?
                    document.querySelector('.flatpickr-input.active').value :
                    document.getElementById('tanggal_reservasi').value;

                // Get waktu reservasi
                const waktuText = document.getElementById('waktu_reservasi').options[document
                    .getElementById('waktu_reservasi').selectedIndex].text;

                // All validations pass, show confirmation dialog
                Swal.fire({
                    title: 'Konfirmasi Pengaduan',
                    html: `
                        <div class="text-left">
                            <p class="font-semibold mb-2">Pastikan data pengaduan berikut sudah benar:</p>
                            <div class="overflow-auto max-h-60 mb-2">
                                <table class="w-full text-sm">
                                    <tr>
                                        <td class="font-bold py-1 pr-3 align-top">Nama:</td>
                                        <td>${namaField.value}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold py-1 pr-3 align-top">NIK:</td>
                                        <td>${nikField.value}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold py-1 pr-3 align-top">Jenis Kelamin:</td>
                                        <td>${genderValue}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold py-1 pr-3 align-top">Email:</td>
                                        <td>${emailField.value || '-'}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold py-1 pr-3 align-top">No. HP:</td>
                                        <td>${no_hpField.value}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold py-1 pr-3 align-top">Pendamping:</td>
                                        <td>${companionField.value || '-'}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold py-1 pr-3 align-top">Status:</td>
                                        <td>Dalam Proses</td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold py-1 pr-3 align-top">Alamat:</td>
                                        <td class="break-words">${alamatField.value || '-'}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold py-1 pr-3 align-top">Tanggal:</td>
                                        <td>${dateValue}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold py-1 pr-3 align-top">Waktu:</td>
                                        <td>${waktuText}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold py-1 pr-3 align-top">Topik:</td>
                                        <td class="break-words">${topikField.value}</td>
                                    </tr>
                                </table>

                                <!-- Divider -->
                                <hr class="my-3 border-t border-gray-300">

                                <!-- Detail Pengaduan in a separate section -->
                                <div class="mt-2">
                                    <div class="text-sm font-bold py-1">Detail Pengaduan:</div>
                                    <div class="border p-2 rounded max-h-30 overflow-y-auto break-words bg-gray-50">
                                        ${detail_pengaduanField.value ? detail_pengaduanField.value.replace(/\n/g, '<br>') : '-'}
                                    </div>
                                </div>
                            </div>
                        </div>
                    `,
                    width: '32em', // Make the alert a bit wider
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#2C1C11',
                    cancelButtonColor: '#6B7280',
                    confirmButtonText: 'Ya, Tambahkan',
                    cancelButtonText: 'Periksa Kembali',
                    reverseButtons: true,
                    focusCancel: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Show saving indicator
                        Swal.fire({
                            title: 'Menyimpan Pengaduan',
                            text: 'Mohon tunggu sebentar...',
                            allowOutsideClick: false,
                            showConfirmButton: false,
                            willOpen: () => {
                                Swal.showLoading();
                            }
                        });

                        // Submit the form
                        form.submit();
                    }
                });
            });
        });
    </script>
@endsection

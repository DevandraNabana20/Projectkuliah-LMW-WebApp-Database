@extends('layouts.panel')

@section('head')
    <title>Registrasi - Lapor Mas Wapres!</title>
    <meta property="og:title" content="Registrasi - Lapor Mas Wapres!">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <style>
        /* Placeholder text wrap for mobile devices only */
        @media (max-width: 640px) {

            input::placeholder,
            textarea::placeholder {
                white-space: normal;
                overflow-wrap: break-word;
                word-wrap: break-word;
                text-overflow: unset;
            }

            /* Increase height for specific fields on mobile */
            #nama,
            #nik,
            #kontak,
            #topik {
                min-height: 80px;
                /* Increased height for better touch target */
                padding-top: 12px;
                padding-bottom: 65px;
            }

            /* Increase height for specific fields on mobile */
            #companion {
                min-height: 80px;
                /* Increased height for better touch target */
                padding-top: 12px;
                padding-bottom: 90px;
            }
        }
    </style>
@endsection

@section('pages')
    <!-- Main Content -->
    <div class="w-full max-w-4xl mx-auto px-4">
        <!-- Inner Card with Light Gray Background -->
        <div class="bg-[#D9D9D9]/40 rounded-xl p-4 md:p-6 shadow-md mb-8 mt-9">
            <!-- Title -->
            <div class="text-center mb-6">
                <h2 class="text-lg md:text-xl lg:text-2xl font-bold mb-1">SEKRETARIAT WAKIL PRESIDEN</h2>
                <h3 class="text-base md:text-lg font-semibold mb-1">Reservasi Layanan Pengaduan</h3>
                <h2 class="text-lg md:text-xl lg:text-2xl font-bold mb-2">LAPOR MAS WAPRES!</h2>
                <div class="w-full h-px bg-[#2C1C11]/50 my-2"></div>
            </div>

            <!-- Registration Form -->
            <form id="registrationForm" class="space-y-6">
                <!-- Personal Information -->
                <div class="space-y-4">
                    <div class="form-group">
                        <label for="nama" class="block text-sm font-medium mb-1">Nama Lengkap <span
                                class="text-red-500">*</span></label>
                        <input type="text" id="nama" name="nama"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#2C1C11]/50 placeholder-gray-400 text-gray-700 bg-white"
                            placeholder="Masukkan nama lengkap tanpa gelar sesuai KTP/SIM" required>
                        <div class="text-red-500 text-sm hidden mt-1" id="nama-error"></div>
                    </div>

                    <div class="form-group">
                        <label for="nik" class="block text-sm font-medium mb-1">Nomor Identitas <span
                                class="text-red-500">*</span></label>
                        <input type="text" id="nik" name="nik"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#2C1C11]/50 placeholder-gray-400 text-gray-700 bg-white"
                            placeholder="Masukkan NIK/Nomor KTP" maxlength="16" required>
                        <div class="text-red-500 text-sm hidden mt-1" id="nik-error"></div>
                    </div>

                    <div class="form-group">
                        <label for="kontak" class="block text-sm font-medium mb-1">Nomor Kontak <span
                                class="text-red-500">*</span></label>
                        <input type="text" id="kontak" name="kontak" maxlength="13"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#2C1C11]/50 placeholder-gray-400 text-gray-700 bg-white"
                            placeholder="Masukkan nomor kontak tanpa spasi" required>
                        <div class="text-red-500 text-sm hidden mt-1" id="kontak-error"></div>
                    </div>

                    <div class="form-group">
                        <label for="gender" class="block text-sm font-medium mb-1">Jenis Kelamin <span
                                class="text-red-500">*</span></label>
                        <select id="gender" name="gender"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#2C1C11]/50 text-gray-700 bg-white"
                            required>
                            <option value="" selected disabled>Pilih jenis kelamin</option>
                            <option value="laki-laki">Laki-laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                        <div class="text-red-500 text-sm hidden mt-1" id="gender-error"></div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="block text-sm font-medium mb-1">Email (Opsional)</label>
                        <input type="email" id="email" name="email"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#2C1C11]/50 placeholder-gray-400 text-gray-700 bg-white"
                            placeholder="nama@email.com">
                        <div class="text-red-500 text-sm hidden mt-1" id="email-error"></div>
                    </div>

                    <div class="form-group">
                        <label for="topik" class="block text-sm font-medium mb-1">Topik Aduan <span
                                class="text-red-500">*</span></label>
                        <textarea id="topik" name="topik"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#2C1C11]/50 placeholder-gray-400 resize-none text-gray-700 bg-white"
                            placeholder="Masukkan topik aduan maksimal 100 karakter" rows="3" maxlength="100" required></textarea>
                        <div class="flex justify-end">
                            <span id="charCount" class="text-xs text-gray-500">0/100</span>
                        </div>
                        <div class="text-red-500 text-sm hidden mt-1" id="topik-error"></div>
                    </div>

                    <!-- Kelompok Rentan/Difabel Checkbox - Center the entire section -->
                    <div class="form-group mt-4 flex flex-col items-center">
                        <div class="flex items-start">
                            <input type="checkbox" id="needsCompanion" name="needsCompanion" class="mt-1 mr-2 h-4 w-4">
                            <label for="needsCompanion" class="text-sm">
                                Saya adalah Kelompok Rentan/Difabel yang membutuhkan Pendamping
                            </label>
                        </div>
                    </div>

                    <!-- Companion Name (initially hidden) -->
                    <div id="companionField" class="form-group hidden">
                        <label for="companion" class="block text-sm font-medium mb-1">Nama Pendamping <span
                                class="companion-required text-red-500 hidden">*</span></label>
                        <input type="text" id="companion" name="companion"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#2C1C11]/50 placeholder-gray-400 text-gray-700 bg-white"
                            placeholder="Diisi khusus untuk Pendamping Kelompok Rentan/Difabel">
                        <div class="text-red-500 text-sm hidden mt-1" id="companion-error"></div>
                    </div>
                </div>

                <!-- Date and Time Reservation -->
                <div class="mt-6">
                    <h4 class="text-base font-bold mb-4">Tanggal dan Waktu Reservasi</h4>

                    <div class="grid grid-cols-1 gap-4">
                        <!-- Date Picker Column - Fixed styling -->
                        <div class="bg-white rounded-lg shadow-sm p-4 relative">
                            <div class="relative w-full">
                                <input type="text" id="datepicker"
                                    class="date-picker w-full text-black border-0 p-2 text-left cursor-pointer bg-white"
                                    readonly>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5 text-blue-600 absolute right-4 top-1/2 transform -translate-y-1/2"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        </div>

                        <!-- Time Picker Column - Update for responsiveness -->
                        <div class="bg-white rounded-lg shadow-sm p-4">
                            <div class="flex justify-between items-center mb-3">
                                <div id="selectedDateDisplay" class="font-medium text-gray-700">
                                    Pilih tanggal terlebih dahulu
                                </div>
                                <div id="quotaDisplay" class="text-sm font-medium bg-blue-100 px-2 py-1 rounded">
                                    Kuota: 0/50
                                </div>
                            </div>
                            <div id="timeSlots" class="grid grid-cols-1 sm:grid-cols-3 gap-2 mt-2">
                                <!-- Time slots will be generated here -->
                            </div>
                        </div>
                    </div>

                    <!-- Selected Time Info Card - Update for responsiveness -->
                    <div id="selectedTimeCard" class="hidden mt-6 bg-blue-100 rounded-lg shadow-sm p-4">
                        <div class="flex flex-col sm:flex-row items-start sm:items-center sm:justify-between">
                            <div class="flex items-center mb-3 sm:mb-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600 mr-2 flex-shrink-0"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <div>
                                    <span class="font-medium">Waktu Pilihan</span>
                                    <p id="selectedTimeInfo" class="text-sm text-gray-600"></p>
                                </div>
                            </div>
                            <button type="button" id="cancelTime"
                                class="w-full sm:w-auto px-3 py-1 bg-white border border-gray-300 rounded-md text-sm hover:bg-gray-100">
                                Batalkan Pilihan
                            </button>
                        </div>
                    </div>

                    <!-- Notes -->
                    <div class="mt-6">
                        <p class="font-medium">Catatan:</p>
                        <ol class="list-decimal pl-5 text-sm">
                            <li>Kouta online 50 orang/hari</li>
                            <li>Tanggal dan waktu otomatis tidak bisa dipilih jika kuota pada tanggal dan waktu tersebut
                                telah penuh.</li>
                        </ol>
                    </div>
                </div>

                <!-- Close the form and gray background div -->
            </form>
        </div>

        <!-- Submit Button - Moved outside the gray background -->
        <button type="submit" id="submitButton" form="registrationForm"
            class="w-full py-3 my-8 px-6 bg-gradient-to-r from-[#2C1C11] to-[#9A7B7B] text-white rounded-lg font-medium shadow-md transition-all duration-300 hover:shadow-xl hover:scale-105 text-center disabled:opacity-50 disabled:cursor-not-allowed">
            Selanjutnya
        </button>
    </div>
@endsection

@section('script')
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/id.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Variables
            const form = document.getElementById('registrationForm');
            const needsCompanionCheck = document.getElementById('needsCompanion');
            const companionField = document.getElementById('companionField');
            const topikField = document.getElementById('topik');
            const charCount = document.getElementById('charCount');
            const nikField = document.getElementById('nik');
            const kontakField = document.getElementById('kontak');
            const emailField = document.getElementById('email');
            const namaField = document.getElementById('nama');
            const genderField = document.getElementById('gender');
            const submitButton = document.getElementById('submitButton');

            // Selected date and time tracking
            let selectedDate = null;
            let selectedTime = null;

            // Add this near the beginning of your DOMContentLoaded event handler
            console.log("Timezone offset:", new Date().getTimezoneOffset());

            // Show/hide companion field based on checkbox
            needsCompanionCheck.addEventListener('change', function() {
                if (this.checked) {
                    companionField.classList.remove('hidden');
                    // Show the required asterisk
                    document.querySelector('.companion-required').classList.remove('hidden');
                    // Don't validate immediately - let user enter data first
                    document.getElementById('companion').classList.remove('border-red-500',
                        'border-green-500');
                    hideError(document.getElementById('companion-error'));
                } else {
                    companionField.classList.add('hidden');
                    document.getElementById('companion').value = '';
                    document.getElementById('companion').classList.remove('border-red-500',
                        'border-green-500');
                    hideError(document.getElementById('companion-error'));
                    // Hide the required asterisk
                    document.querySelector('.companion-required').classList.add('hidden');
                }
            });

            // Character counter for topik
            topikField.addEventListener('input', function() {
                const currentLength = this.value.length;
                charCount.textContent = `${currentLength}/100`;
            });

            // Allow only numbers for NIK
            nikField.addEventListener('input', function(e) {
                this.value = this.value.replace(/[^0-9]/g, '');
                validateNIK();
            });

            // Allow only numbers for kontak
            kontakField.addEventListener('input', function(e) {
                this.value = this.value.replace(/[^0-9]/g, '');
                validateKontak();
            });

            // Prevent numbers in name field
            namaField.addEventListener('input', function(e) {
                this.value = this.value.replace(/[0-9]/g, '');
                validateNama();
            });

            // Helper function to apply visual validation feedback
            function applyValidationFeedback(field, isValid) {
                if (isValid) {
                    field.classList.remove('border-red-500');
                    field.classList.add('border-green-500');
                } else {
                    field.classList.remove('border-green-500');
                    field.classList.add('border-red-500');
                }
            }

            // Field validation functions
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

            function validateKontak() {
                const kontak = kontakField.value;
                const errorDiv = document.getElementById('kontak-error');
                let isValid = false;

                if (kontak.length === 0) {
                    showError(errorDiv, 'Nomor kontak tidak boleh kosong');
                } else if (kontak.length < 10 || kontak.length > 13) {
                    showError(errorDiv, 'Nomor kontak harus 10-13 digit');
                } else if (!kontak.startsWith('08')) {
                    showError(errorDiv, 'Nomor kontak harus diawali dengan 08');
                } else {
                    hideError(errorDiv);
                    isValid = true;
                }

                applyValidationFeedback(kontakField, isValid);
                return isValid;
            }

            function validateEmail() {
                const email = emailField.value;
                const errorDiv = document.getElementById('email-error');
                let isValid = true;

                if (email.length > 0) {
                    // Only validate if email is provided (not required)
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

            function validateGender() {
                const gender = genderField.value;
                const errorDiv = document.getElementById('gender-error');
                let isValid = false;

                if (!gender) {
                    showError(errorDiv, 'Pilih jenis kelamin');
                } else {
                    hideError(errorDiv);
                    isValid = true;
                }

                applyValidationFeedback(genderField, isValid);
                return isValid;
            }

            function validateTopik() {
                const topik = topikField.value;
                const errorDiv = document.getElementById('topik-error');
                let isValid = false;

                if (topik.length === 0) {
                    showError(errorDiv, 'Topik aduan tidak boleh kosong');
                } else if (topik.length < 10) {
                    showError(errorDiv, 'Topik aduan terlalu pendek, minimal 10 karakter');
                } else {
                    hideError(errorDiv);
                    isValid = true;
                }

                applyValidationFeedback(topikField, isValid);
                return isValid;
            }

            function validateDateTime() {
                if (!selectedDate || !selectedTime) {
                    // Replace standard alert with SweetAlert
                    Swal.fire({
                        icon: 'warning',
                        title: 'Perhatian',
                        text: 'Silakan pilih tanggal dan waktu reservasi',
                        confirmButtonColor: '#2C1C11',
                    });
                    return false;
                }
                return true;
            }

            function validateCompanion() {
                // Only validate if the checkbox is checked
                if (!needsCompanionCheck.checked) {
                    // If checkbox not checked, no validation needed
                    hideError(document.getElementById('companion-error'));
                    document.getElementById('companion').classList.remove('border-red-500', 'border-green-500');
                    return true;
                }

                const companion = document.getElementById('companion').value;
                const errorDiv = document.getElementById('companion-error');
                let isValid = false;

                if (companion.length === 0) {
                    showError(errorDiv, 'Nama pendamping tidak boleh kosong');
                } else if (companion.length < 3) {
                    showError(errorDiv, 'Nama pendamping terlalu pendek');
                } else if (/\d/.test(companion)) {
                    showError(errorDiv, 'Nama pendamping tidak boleh mengandung angka');
                } else {
                    hideError(errorDiv);
                    isValid = true;
                }

                applyValidationFeedback(document.getElementById('companion'), isValid);
                return isValid;
            }

            // Helper functions for validation
            function showError(element, message) {
                element.textContent = message;
                element.classList.remove('hidden');
            }

            function hideError(element) {
                element.classList.add('hidden');
            }

            // Set up Date Picker with quota checking
            const today = new Date();
            const tomorrow = new Date(today);
            tomorrow.setDate(tomorrow.getDate() + 1);
            const endOfYear = new Date(today.getFullYear(), 11, 31);

            // Keep track of disabled dates
            let disabledDates = [];
            let nextAvailableDate = tomorrow;

            // Improved date formatting function
            function formatDateForServer(date) {
                // Format date as YYYY-MM-DD without timezone conversion
                const year = date.getFullYear();
                const month = String(date.getMonth() + 1).padStart(2, '0');
                const day = String(date.getDate()).padStart(2, '0');
                return `${year}-${month}-${day}`;
            }

            // Check availability for a date and update UI
            async function checkDateAvailability(date) {
                const dateStr = formatDateForServer(date);

                try {
                    const response = await fetch(`/check-date-availability/${dateStr}`);
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    const data = await response.json();

                    // Update quota display
                    document.getElementById('quotaDisplay').textContent = `Kuota: ${data.totalCount}/50`;

                    return {
                        totalCount: data.totalCount,
                        totalAvailable: data.totalAvailable,
                        isFull: data.isFull,
                        slots: data.slots
                    };
                } catch (error) {
                    console.error('Error checking date availability:', error);
                    // Return default values on error
                    return {
                        totalCount: 0,
                        totalAvailable: 50,
                        isFull: false,
                        slots: {
                            '09:00': {
                                count: 0,
                                available: 20,
                                isFull: false
                            },
                            '10:00': {
                                count: 0,
                                available: 20,
                                isFull: false
                            },
                            '11:00': {
                                count: 0,
                                available: 10,
                                isFull: false
                            }
                        }
                    };
                }
            }

            // Initialize datepicker after checking initial date
            async function initDatePicker() {
                let startDate = new Date(tomorrow);

                // First check if tomorrow is a weekend, if so, move to next business day (Monday)
                if (startDate.getDay() === 0) { // Sunday
                    startDate.setDate(startDate.getDate() + 1); // Move to Monday
                } else if (startDate.getDay() === 6) { // Saturday
                    startDate.setDate(startDate.getDate() + 2); // Move to Monday
                }

                // Now check availability for the business day
                const startDateCheck = await checkDateAvailability(startDate);

                // If the date is full, find the next available date
                if (startDateCheck.isFull) {
                    disabledDates.push(formatDateForServer(startDate));
                    await findNextAvailableDate(startDate);
                } else {
                    nextAvailableDate = startDate;
                }

                // Initialize flatpickr with the found date
                const datepicker = flatpickr('#datepicker', {
                    dateFormat: "Y-m-d",
                    minDate: tomorrow,
                    maxDate: endOfYear,
                    locale: "id",
                    defaultDate: nextAvailableDate,
                    disable: [
                        function(date) {
                            // Disable weekends
                            const isWeekend = (date.getDay() === 0 || date.getDay() === 6);

                            // Check if date is in disabled dates array
                            const dateStr = formatDateForServer(date);
                            const isDisabled = disabledDates.includes(dateStr);

                            return isWeekend || isDisabled;
                        }
                    ],
                    onChange: async function(selectedDates, dateStr) {
                        selectedDate = selectedDates[0];

                        // Reset time selection when date changes
                        selectedTime = null;
                        document.getElementById('selectedTimeCard').classList.add('hidden');

                        // Check availability when date changes
                        const availability = await checkDateAvailability(selectedDate);

                        // Update displays
                        updateSelectedDateDisplay();
                        generateTimeSlots();
                    }
                });

                // Call these functions to initialize with the available date
                selectedDate = nextAvailableDate;
                await checkDateAvailability(selectedDate);
                updateSelectedDateDisplay();
                generateTimeSlots();
            }

            // Find the next available date after a full date
            async function findNextAvailableDate(startDate) {
                let currentDate = new Date(startDate);
                let foundAvailableDate = false;
                let attempts = 0;

                while (!foundAvailableDate && attempts < 30) { // Try up to 30 days ahead
                    // Move to next day
                    currentDate.setDate(currentDate.getDate() + 1);

                    // Skip weekends
                    if (currentDate.getDay() === 0) { // Sunday
                        currentDate.setDate(currentDate.getDate() + 1); // Move to Monday
                        continue;
                    }
                    if (currentDate.getDay() === 6) { // Saturday
                        currentDate.setDate(currentDate.getDate() + 2); // Move to Monday
                        continue;
                    }

                    // Check availability
                    const availability = await checkDateAvailability(currentDate);
                    if (!availability.isFull) {
                        nextAvailableDate = new Date(currentDate);
                        foundAvailableDate = true;
                    } else {
                        disabledDates.push(formatDateForServer(currentDate));
                    }

                    attempts++;
                }

                return foundAvailableDate;
            }

            // Update date display
            function updateSelectedDateDisplay() {
                if (selectedDate) {
                    const options = {
                        weekday: 'long',
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric'
                    };
                    const dateString = selectedDate.toLocaleDateString('id-ID', options);
                    document.getElementById('selectedDateDisplay').textContent = dateString;
                }
            }

            // Call the init function instead of direct initialization
            initDatePicker();

            // Generate time slots based on availability
            async function generateTimeSlots() {
                if (!selectedDate) return;

                const timeSlotsContainer = document.getElementById('timeSlots');
                timeSlotsContainer.innerHTML = '';

                // Show loading state
                timeSlotsContainer.innerHTML = '<div class="col-span-full text-center py-2">Memuat...</div>';

                try {
                    // Get availability data from server using the improved format
                    const dateStr = formatDateForServer(selectedDate);
                    const response = await fetch(`/check-date-availability/${dateStr}`);

                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }

                    const data = await response.json();

                    // Clear loading message
                    timeSlotsContainer.innerHTML = '';

                    // Update total quota display
                    document.getElementById('quotaDisplay').textContent = `Kuota: ${data.totalCount}/50`;

                    // Time slots with their quotas
                    const timeSlots = [{
                            time: '09:00',
                            quota: 20,
                            count: data.slots['09:00'].count,
                            disabled: data.slots['09:00'].isFull
                        },
                        {
                            time: '10:00',
                            quota: 20,
                            count: data.slots['10:00'].count,
                            disabled: data.slots['10:00'].isFull
                        },
                        {
                            time: '11:00',
                            quota: 10,
                            count: data.slots['11:00'].count,
                            disabled: data.slots['11:00'].isFull
                        }
                    ];

                    // Create time slot buttons
                    timeSlots.forEach(slot => {
                        const button = document.createElement('button');
                        button.type = 'button';
                        button.textContent = slot.time;
                        button.dataset.disabled = slot.disabled;

                        // Add quota information below the time
                        const quotaText = document.createElement('div');
                        quotaText.className = 'text-xs mt-1';
                        quotaText.textContent = `${slot.count}/${slot.quota}`;

                        // Container for button and quota text
                        const container = document.createElement('div');
                        container.className = 'flex flex-col items-center';

                        if (slot.disabled) {
                            button.className =
                                'w-full py-2 px-3 bg-gray-200 text-gray-500 rounded cursor-not-allowed';
                            button.disabled = true;
                            quotaText.className += ' text-gray-500';
                        } else {
                            button.className =
                                'w-full py-2 px-3 bg-white border border-gray-300 hover:bg-gray-100 rounded';
                            // Check if this slot is currently selected
                            if (selectedTime === slot.time) {
                                button.classList.add('bg-blue-100', 'border-blue-500', 'text-blue-700');
                                button.classList.remove('bg-white', 'border-gray-300');
                            }
                            button.addEventListener('click', () => {
                                selectTimeSlot(slot.time);
                            });
                        }

                        container.appendChild(button);
                        container.appendChild(quotaText);
                        timeSlotsContainer.appendChild(container);
                    });

                    // Add current time display with timezone
                    const clockDiv = document.createElement('div');
                    clockDiv.className =
                        'col-span-full mt-4 flex flex-col sm:flex-row items-center justify-center text-sm text-gray-600';
                    clockDiv.innerHTML = `
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>Asia/Jakarta</span>
                    </div>
                    <span class="sm:ml-1">(<span id="current-time"></span>)</span>
                `;
                    timeSlotsContainer.appendChild(clockDiv);

                    // Start the clock
                    updateClock();

                } catch (error) {
                    console.error('Error generating time slots:', error);
                    timeSlotsContainer.innerHTML =
                        '<div class="col-span-full text-center py-2 text-red-500">Error loading time slots</div>';
                }
            }

            // Function to update clock every second
            function updateClock() {
                const now = new Date();
                const timeString = now.toLocaleTimeString('id-ID', {
                    hour: '2-digit',
                    minute: '2-digit',
                    second: '2-digit',
                    hour12: false
                });
                const clockElement = document.getElementById('current-time');
                if (clockElement) {
                    clockElement.textContent = timeString;
                }
                setTimeout(updateClock, 1000);
            }

            // Select time slot - fix to maintain disabled state
            function selectTimeSlot(time) {
                selectedTime = time;

                // Highlight the selected button while keeping disabled buttons as disabled
                const timeButtons = document.querySelectorAll('#timeSlots button');
                timeButtons.forEach(btn => {
                    // Skip disabled buttons - they should remain in disabled state
                    if (btn.disabled) return;

                    if (btn.textContent === time) {
                        btn.classList.add('bg-blue-100', 'border-blue-500', 'text-blue-700');
                        btn.classList.remove('bg-white', 'border-gray-300');
                    } else {
                        btn.classList.remove('bg-blue-100', 'border-blue-500', 'text-blue-700');
                        btn.classList.add('bg-white', 'border-gray-300');
                    }
                });

                // Show selected time card
                const selectedTimeCard = document.getElementById('selectedTimeCard');
                selectedTimeCard.classList.remove('hidden');

                // Update time info
                const options = {
                    weekday: 'long',
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                };
                const dateString = selectedDate.toLocaleDateString('id-ID', options);
                document.getElementById('selectedTimeInfo').textContent = `${selectedTime} ${dateString}`;
            }

            // Cancel time selection - fix to maintain disabled state
            document.getElementById('cancelTime').addEventListener('click', function() {
                selectedTime = null;
                document.getElementById('selectedTimeCard').classList.add('hidden');

                // Reset all non-disabled buttons
                const timeButtons = document.querySelectorAll('#timeSlots button:not([disabled])');
                timeButtons.forEach(btn => {
                    btn.classList.remove('bg-blue-100', 'border-blue-500', 'text-blue-700');
                    btn.classList.add('bg-white', 'border-gray-300');
                });
            });

            // Form submission with SweetAlert
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                // Check if the selected date still has quota using consistent formatting
                checkDateAvailability(selectedDate).then(availability => {
                    // Check if selected time slot is full
                    if (selectedTime && availability.slots[selectedTime].isFull) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Kuota Waktu Penuh',
                            text: `Maaf, kuota untuk waktu ${selectedTime} pada tanggal yang Anda pilih sudah penuh. Silakan pilih waktu lain.`,
                            confirmButtonColor: '#2C1C11',
                        });
                        return;
                    }

                    // Check if overall date is full
                    if (availability.isFull) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Kuota Penuh',
                            text: 'Maaf, kuota untuk tanggal yang Anda pilih sudah penuh. Silakan pilih tanggal lain.',
                            confirmButtonColor: '#2C1C11',
                        });
                        return;
                    }

                    // Continue with your existing validation
                    const isNamaValid = validateNama();
                    const isNIKValid = validateNIK();
                    const isKontakValid = validateKontak();
                    const isEmailValid = validateEmail();
                    const isGenderValid = validateGender();
                    const isTopikValid = validateTopik();
                    const isDateTimeValid = validateDateTime();
                    const isCompanionValid = validateCompanion(); // Add companion validation

                    // Proceed only if all validations pass
                    if (isNamaValid && isNIKValid && isKontakValid && isEmailValid &&
                        isGenderValid && isTopikValid && isDateTimeValid && isCompanionValid) {

                        // Replace confirm with SweetAlert
                        Swal.fire({
                            title: 'Konfirmasi Data',
                            text: 'Apakah data yang Anda masukkan sudah benar?',
                            icon: 'question',
                            showCancelButton: true,
                            confirmButtonColor: '#2C1C11',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Ya, Lanjutkan',
                            cancelButtonText: 'Batal'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Create form data with all fields
                                const formData = new FormData(form);

                                // Use the consistent date format function
                                formData.append('selectedDate', formatDateForServer(
                                    selectedDate));
                                formData.append('selectedTime', selectedTime);

                                // Explicitly add checkbox status and companion data
                                const needsCompanion = document.getElementById(
                                    'needsCompanion').checked;
                                formData.append('needsCompanion', needsCompanion ? '1' :
                                    '0');

                                // If companion field is visible and has a value, make sure it's included
                                if (needsCompanion && document.getElementById('companion')
                                    .value) {
                                    formData.append('companion', document.getElementById(
                                        'companion').value);
                                }

                                // Create CSRF token field
                                const csrfToken = document.querySelector(
                                    'meta[name="csrf-token"]').getAttribute('content');

                                // Show loading indicator
                                Swal.fire({
                                    title: 'Memproses...',
                                    text: 'Mohon tunggu sebentar',
                                    allowOutsideClick: false,
                                    allowEscapeKey: false,
                                    didOpen: () => {
                                        Swal.showLoading();
                                    }
                                });

                                // Use fetch to submit the form
                                fetch('{{ route('process-registrasi') }}', {
                                        method: 'POST',
                                        headers: {
                                            'X-CSRF-TOKEN': csrfToken,
                                        },
                                        body: formData
                                    })
                                    .then(response => {
                                        if (response.redirected) {
                                            window.location.href = response.url;
                                        }
                                    })
                                    .catch(error => {
                                        console.error('Error:', error);
                                        // Show error message
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Error',
                                            text: 'Terjadi kesalahan saat memproses data. Silakan coba lagi.',
                                            confirmButtonColor: '#2C1C11',
                                        });
                                    });
                            }
                        });
                    } else {
                        // Scroll to the first error
                        const firstError = document.querySelector('.text-red-500:not(.hidden)');
                        if (firstError) {
                            firstError.scrollIntoView({
                                behavior: 'smooth',
                                block: 'center'
                            });
                        }
                    }
                });
            });

            // Event listeners for validate as you type
            namaField.addEventListener('blur', validateNama);
            nikField.addEventListener('blur', validateNIK);
            kontakField.addEventListener('blur', validateKontak);
            emailField.addEventListener('blur', validateEmail);
            genderField.addEventListener('change', validateGender);
            topikField.addEventListener('blur', validateTopik);
            document.getElementById('companion').addEventListener('blur', validateCompanion);
        });
    </script>
@endsection

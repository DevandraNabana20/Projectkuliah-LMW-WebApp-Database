@extends('layouts.panel')

@section('head')
<title>Tata Tertib - Lapor Mas Wapres!</title>
<meta property="og:title" content="Tata Tertib - Lapor Mas Wapres!">
@endsection

@section('pages')
<!-- Main Content -->
<div class="w-full max-w-4xl mx-auto px-4">
    <!-- Inner Card with Light Gray Background -->
    <div class="bg-[#D9D9D9]/40 rounded-xl p-4 md:p-6 shadow-md mb-8 mt-9">
        <!-- Title -->
        <div class="text-center mb-9">
            <h2 class="text-lg md:text-xl lg:text-2xl font-semibold">Tata Tertib Pelayanan Program Lapor Mas Wapres!</h2>
        </div>

        <!-- Section A -->
        <div class="mb-6">
            <h3 class="font-semibold text-base md:text-lg mb-2">A. KETENTUAN UMUM</h3>
            <ol class="list-decimal pl-6 mb-4">
                <li class="mb-2">Pelayanan program Lapor Mas Wapres! diselenggarakan di Kantor Sekretariat Wakil Presiden, Jalan Kebon Sirih No. 14, Jakarta Pusat, pada hari kerja:
                    <ul class="list-disc pl-6 my-2">
                        <li class="mb-1">Senin s.d. Kamis, pukul 08.00 s.d. 14.00 WIB (istirahat, pukul 12.00 s.d. 13.00 WIB)</li>
                        <li class="mb-1">Jumat, pukul 08.00 s.d. 14.30 WIB (istirahat, pukul 11.00 s.d. 13.30 WIB)</li>
                    </ul>
                </li>
                <li class="mb-1">Pelapor memakai pakaian bebas rapi.</li>
                <li class="mb-1">Pelapor wajib membawa kartu identitas (KTP/SIM/Identitas lain yang tercantum NIK).</li>
                <li class="mb-1">Pengaduan yang dilayani berjumlah maksimal 50 orang/hari.</li>
            </ol>
        </div>

        <!-- Section B -->
        <div class="mb-6">
            <h3 class="font-semibold text-base md:text-lg mb-2">B. KETENTUAN PENGADUAN</h3>
            <ol class="list-decimal pl-6 mb-4">
                <li class="mb-1">Pelapor adalah orang yang langsung mengalami kejadian. Apabila pelapor bukan yang mengalami kejadian langsung, maka pelapor harus membawa surat kuasa bermaterai dari pihak yang diwakili.</li>
                <li class="mb-1">Substansi aduan tidak sedang atau telah menjadi objek peradilan.</li>
                <li class="mb-1">Substansi aduan belum pernah disampaikan oleh pelapor kepada Wakil Presiden.</li>
                <li class="mb-1">Pelapor wajib membawa dokumen pendukung pengaduan yang lengkap dan relevan.</li>
                <li class="mb-1">Petugas memverifikasi dokumen pengaduan. Apabila dokumen tidak lengkap, petugas akan meminta pelapor untuk mengirimkan kelengkapan dokumen melalui surel <a href="mailto:lapormaswapres@set.wapresri.go.id" class="text-blue-600 hover:text-blue-800 underline break-words" target="_blank" rel="nofollow">lapormaswapres@set.wapresri.go.id</a>. Pelaporan tidak diproses apabila pelapor tidak melengkapi dokumen tersebut dalam kurun waktu 10 hari.</li>
                <li class="mb-1">Pelapor wajib menyampaikan nomor kontak atau surel yang dapat dihubungi.</li>
            </ol>
        </div>

        <!-- Section C -->
        <div class="mb-6">
            <h3 class="font-semibold text-base md:text-lg mb-2">C. REGISTRASI DAN PROSES PENGADUAN</h3>
            <ol class="list-decimal pl-6 mb-4">
                <li class="mb-1">Pelapor melakukan registrasi secara online melalui <a href="{{ url('/') }}" class="text-blue-600 hover:text-blue-800 underline">lapormaswapres.id</a></li>
                <li class="mb-1">Pelapor yang telah berhasil melakukan registrasi online, harap hadir sesuai tanggal yang dipilih.</li>
                <li class="mb-1">Pelapor menunggu di ruang tunggu yang telah disediakan.</li>
                <li class="mb-1">Petugas memverifikasi dan memberikan nomor antrian pengaduan.</li>
                <li class="mb-1">Petugas mempersilahkan pelapor ke Ruang Pengaduan berdasarkan nomor antrian.</li>
            </ol>
        </div>

        <!-- Section D -->
        <div class="mb-6">
            <h3 class="font-semibold text-base md:text-lg mb-2">D. HAL - HAL LAIN</h3>
            <ol class="list-decimal pl-6 mb-4">
                <li class="mb-1">Pelapor menghormati tata tertib yang berlaku, menjaga etika dan kesopanan selama berada di lingkungan Sekretariat Wakil Presiden.</li>
                <li class="mb-1">Pelapor dilarang mengambil gambar/video dan membuat konten selama proses pelaporan.</li>
                <li class="mb-1">Pelapor harus menaati seluruh ketentuan dalam Tata Tertib Lapor Mas Wapres! dan ketentuan lain yang ditetapkan di kemudian hari.</li>
            </ol>
        </div>
    </div>

    <!-- Checkbox and Button - centered both components -->
    <div class="flex flex-col items-center my-8 max-w-5xl mx-auto">
        <div class="flex items-center mb-4 justify-center w-full">
            <input type="checkbox" id="agreement" name="agreement" required class="mr-2 h-5 w-5">
            <label for="agreement" class="text-sm md:text-base">
                Setuju, Saya telah membaca seluruh Syarat dan Ketentuan yang berlaku.
                <span class="text-red-500">*</span>
            </label>
        </div>

        <button id="nextButton" class="w-full py-3 my-8 px-6 bg-gradient-to-r from-[#2C1C11] to-[#9A7B7B] text-white rounded-lg font-medium shadow-md transition-all duration-300 hover:shadow-xl hover:scale-105 text-center disabled:opacity-50 disabled:cursor-not-allowed">
            Selanjutnya
        </button>
    </div>
</div>
@endsection

@section('script')
<script>
    // Update year automatically
    document.getElementById('currentYear').textContent = new Date().getFullYear();

    // Handle checkbox and button state
    const agreementCheckbox = document.getElementById('agreement');
    const nextButton = document.getElementById('nextButton');

    // Initially disable the button
    nextButton.disabled = true;

    // Enable button only when checkbox is checked
    agreementCheckbox.addEventListener('change', function() {
        nextButton.disabled = !this.checked;
    });

    // Button click redirects to registration
    nextButton.addEventListener('click', function() {
        if (agreementCheckbox.checked) {
            window.location.href = "{{ route('registrasi') }}";
        }
    });
</script>
@endsection
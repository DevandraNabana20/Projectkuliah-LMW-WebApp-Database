@extends('layouts.panel')

@section('head')
<title>Alur Pengaduan Tatap Muka - Lapor Mas Wapres!</title>
<meta property="og:title" content="Alur Pengaduan Tatap Muka - Lapor Mas Wapres!">
@endsection

@section('pages')
<!-- Main Content -->
<div class="w-full max-w-4xl mx-auto px-4">
    <!-- Title -->
    <div class="text-center my-9 ">
    <h2 class="text-base md:text-lg lg:text-xl font-semibold">Alur Pengaduan Tatap Muka</h2>
    <!-- Description -->
    <p class="text-center text-gray-600 opacity-85 italic mb-8">Panduan Langkah Demi Langkah Untuk Pengaduan Tatap Muka</p>
    </div>

    <!-- Cards Container - Changed from grid-cols-3 to grid-cols-2 for tablet and desktop -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6 justify-items-center items-stretch mb-8 md:mb-12 max-w-5xl mx-auto">
        <!-- Card 1 -->
        <div class="relative flex items-center border-2 border-black rounded-2xl p-3 md:p-4 shadow-md w-full bg-[#9A7B7B] h-auto">
            <span class="absolute top-0 left-0 mt-1 ml-1 h-full w-full rounded-2xl bg-[#D9D9D9] border border-black"></span>
            <div class="relative flex items-center w-full">
                <div class="w-8 h-8 md:w-11 md:h-11 lg:w-12 lg:h-12 mr-3 md:mr-4 flex-shrink-0 ml-4 bg-[#493A3A] text-white flex items-center justify-center rounded-md">1</div>
                <div class="flex-1 ml-1 sm:ml-2 md:ml-3 lg:ml-4">
                    <h3 class="font-semibold text-sm md:text-base lg:text-base">Registrasi <i>Online</i></h3>
                    <p class="font-normal text-xs md:text-sm lg:text-sm">
                        Pelapor melakukan registrasi <i>online</i> melalui website <i>lapormaswapres.id</i> sebelum datang ke lokasi.
                    </p>
                </div>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="relative flex items-center border-2 border-black rounded-2xl p-3 md:p-4 shadow-md w-full bg-[#9A7B7B] h-auto">
            <span class="absolute top-0 left-0 mt-1 ml-1 h-full w-full rounded-2xl bg-[#D9D9D9] border border-black"></span>
            <div class="relative flex items-center w-full">
                <div class="w-8 h-8 md:w-11 md:h-11 lg:w-12 lg:h-12 mr-3 md:mr-4 flex-shrink-0 ml-4 bg-[#493A3A] text-white flex items-center justify-center rounded-md">2</div>
                <div class="flex-1 ml-1 sm:ml-2 md:ml-3 lg:ml-4">
                    <h3 class="font-semibold text-sm md:text-base lg:text-base">Pelapor Datang</h3>
                    <p class="font-normal text-xs md:text-sm lg:text-sm">
                        Pelapor datang ke lokasi pengaduan di Kantor Sekretariat Wakil Presiden yang beralamat di Jln. Kebon Sirih No. 14, Jakarta Pusat.
                    </p>
                </div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="relative flex items-center border-2 border-black rounded-2xl p-3 md:p-4 shadow-md w-full bg-[#9A7B7B] h-auto">
            <span class="absolute top-0 left-0 mt-1 ml-1 h-full w-full rounded-2xl bg-[#D9D9D9] border border-black"></span>
            <div class="relative flex items-center w-full">
                <div class="w-8 h-8 md:w-11 md:h-11 lg:w-12 lg:h-12 mr-3 md:mr-4 flex-shrink-0 ml-4 bg-[#493A3A] text-white flex items-center justify-center rounded-md">3</div>
                <div class="flex-1 ml-1 sm:ml-2 md:ml-3 lg:ml-4">
                    <h3 class="font-semibold text-sm md:text-base lg:text-base">Pengecekan Bukti Registrasi <i>Online</i></h3>
                    <p class="font-normal text-xs md:text-sm lg:text-sm">
                        Petugas melakukan pengecekan bukti registrasi <i>online</i> pelapor.
                    </p>
                </div>
            </div>
        </div>

        <!-- Card 4 -->
        <div class="relative flex items-center border-2 border-black rounded-2xl p-3 md:p-4 shadow-md w-full bg-[#9A7B7B] h-auto">
            <span class="absolute top-0 left-0 mt-1 ml-1 h-full w-full rounded-2xl bg-[#D9D9D9] border border-black"></span>
            <div class="relative flex items-center w-full">
                <div class="w-8 h-8 md:w-11 md:h-11 lg:w-12 lg:h-12 mr-3 md:mr-4 flex-shrink-0 ml-4 bg-[#493A3A] text-white flex items-center justify-center rounded-md">4</div>
                <div class="flex-1 ml-1 sm:ml-2 md:ml-3 lg:ml-4">
                    <h3 class="font-semibold text-sm md:text-base lg:text-base">Penukaran Kartu Identitas</h3>
                    <p class="font-normal text-xs md:text-sm lg:text-sm">
                        Pelapor menukarkan kartu identitas (KTP/SIM) untuk mendapatkan kartu ID Tamu.
                    </p>
                </div>
            </div>
        </div>

        <!-- Card 5 -->
        <div class="relative flex items-center border-2 border-black rounded-2xl p-3 md:p-4 shadow-md w-full bg-[#9A7B7B] h-auto">
            <span class="absolute top-0 left-0 mt-1 ml-1 h-full w-full rounded-2xl bg-[#D9D9D9] border border-black"></span>
            <div class="relative flex items-center w-full">
                <div class="w-8 h-8 md:w-11 md:h-11 lg:w-12 lg:h-12 mr-3 md:mr-4 flex-shrink-0 ml-4 bg-[#493A3A] text-white flex items-center justify-center rounded-md">5</div>
                <div class="flex-1 ml-1 sm:ml-2 md:ml-3 lg:ml-4">
                    <h3 class="font-semibold text-sm md:text-base lg:text-base">Mengambil Antrian</h3>
                    <p class="font-normal text-xs md:text-sm lg:text-sm">
                        Pelapor mengambil nomor antrian di mesin antrian.
                    </p>
                </div>
            </div>
        </div>

        <!-- Card 6 -->
        <div class="relative flex items-center border-2 border-black rounded-2xl p-3 md:p-4 shadow-md w-full bg-[#9A7B7B] h-auto">
            <span class="absolute top-0 left-0 mt-1 ml-1 h-full w-full rounded-2xl bg-[#D9D9D9] border border-black"></span>
            <div class="relative flex items-center w-full">
                <div class="w-8 h-8 md:w-11 md:h-11 lg:w-12 lg:h-12 mr-3 md:mr-4 flex-shrink-0 ml-4 bg-[#493A3A] text-white flex items-center justify-center rounded-md">6</div>
                <div class="flex-1 ml-1 sm:ml-2 md:ml-3 lg:ml-4">
                    <h3 class="font-semibold text-sm md:text-base lg:text-base">Meja Registrasi</h3>
                    <p class="font-normal text-xs md:text-sm lg:text-sm">
                        Pelapor menuju meja registrasi untuk verifikasi data.
                    </p>
                </div>
            </div>
        </div>

        <!-- Card 7 -->
        <div class="relative flex items-center border-2 border-black rounded-2xl p-3 md:p-4 shadow-md w-full bg-[#9A7B7B] h-auto">
            <span class="absolute top-0 left-0 mt-1 ml-1 h-full w-full rounded-2xl bg-[#D9D9D9] border border-black"></span>
            <div class="relative flex items-center w-full">
                <div class="w-8 h-8 md:w-11 md:h-11 lg:w-12 lg:h-12 mr-3 md:mr-4 flex-shrink-0 ml-4 bg-[#493A3A] text-white flex items-center justify-center rounded-md">7</div>
                <div class="flex-1 ml-1 sm:ml-2 md:ml-3 lg:ml-4">
                    <h3 class="font-semibold text-sm md:text-base lg:text-base">Menunggu Antrian</h3>
                    <p class="font-normal text-xs md:text-sm lg:text-sm">
                        Pelapor menunggu di ruang tunggu hingga nomor antriannya dipanggil.
                    </p>
                </div>
            </div>
        </div>

        <!-- Card 8 -->
        <div class="relative flex items-center border-2 border-black rounded-2xl p-3 md:p-4 shadow-md w-full bg-[#9A7B7B] h-auto">
            <span class="absolute top-0 left-0 mt-1 ml-1 h-full w-full rounded-2xl bg-[#D9D9D9] border border-black"></span>
            <div class="relative flex items-center w-full">
                <div class="w-8 h-8 md:w-11 md:h-11 lg:w-12 lg:h-12 mr-3 md:mr-4 flex-shrink-0 ml-4 bg-[#493A3A] text-white flex items-center justify-center rounded-md">8</div>
                <div class="flex-1 ml-1 sm:ml-2 md:ml-3 lg:ml-4">
                    <h3 class="font-semibold text-sm md:text-base lg:text-base">Ruang Pengaduan</h3>
                    <p class="font-normal text-xs md:text-sm lg:text-sm">
                        Pelapor memasuki ke Ruang Pengaduan sesuai nomor panggilan.
                    </p>
                </div>
            </div>
        </div>

        <!-- Card 9 -->
        <div class="relative flex items-center border-2 border-black rounded-2xl p-3 md:p-4 shadow-md w-full bg-[#9A7B7B] h-auto">
            <span class="absolute top-0 left-0 mt-1 ml-1 h-full w-full rounded-2xl bg-[#D9D9D9] border border-black"></span>
            <div class="relative flex items-center w-full">
                <div class="w-8 h-8 md:w-11 md:h-11 lg:w-12 lg:h-12 mr-3 md:mr-4 flex-shrink-0 ml-4 bg-[#493A3A] text-white flex items-center justify-center rounded-md">9</div>
                <div class="flex-1 ml-1 sm:ml-2 md:ml-3 lg:ml-4">
                    <h3 class="font-semibold text-sm md:text-base lg:text-base">Menuju Loket sesuai Nomor Antrian</h3>
                    <p class="font-normal text-xs md:text-sm lg:text-sm">
                        Pelapor menuju loket yang sesuai dengan nomor panggilan di layar.
                    </p>
                </div>
            </div>
        </div>

        <!-- Card 10 -->
        <div class="relative flex items-center border-2 border-black rounded-2xl p-3 md:p-4 shadow-md w-full bg-[#9A7B7B] h-auto">
            <span class="absolute top-0 left-0 mt-1 ml-1 h-full w-full rounded-2xl bg-[#D9D9D9] border border-black"></span>
            <div class="relative flex items-center w-full">
                <div class="w-8 h-8 md:w-11 md:h-11 lg:w-12 lg:h-12 mr-3 md:mr-4 flex-shrink-0 ml-4 bg-[#493A3A] text-white flex items-center justify-center rounded-md">10</div>
                <div class="flex-1 ml-1 sm:ml-2 md:ml-3 lg:ml-4">
                    <h3 class="font-semibold text-sm md:text-base lg:text-base">Proses Pelayanan Pengaduan</h3>
                    <p class="font-normal text-xs md:text-sm lg:text-sm">
                        Petugas melakukan layanan pengaduan dan mencatat laporan pada sistem.
                    </p>
                </div>
            </div>
        </div>

        <!-- Card 11 -->
        <div class="relative flex items-center border-2 border-black rounded-2xl p-3 md:p-4 shadow-md w-full bg-[#9A7B7B] h-auto">
            <span class="absolute top-0 left-0 mt-1 ml-1 h-full w-full rounded-2xl bg-[#D9D9D9] border border-black"></span>
            <div class="relative flex items-center w-full">
                <div class="w-8 h-8 md:w-11 md:h-11 lg:w-12 lg:h-12 mr-3 md:mr-4 flex-shrink-0 ml-4 bg-[#493A3A] text-white flex items-center justify-center rounded-md">11</div>
                <div class="flex-1 ml-1 sm:ml-2 md:ml-3 lg:ml-4">
                    <h3 class="font-semibold text-sm md:text-base lg:text-base">Cetak Bukti Laporan</h3>
                    <p class="font-normal text-xs md:text-sm lg:text-sm">
                        Petugas memberikan lembar bukti laporan kepada pelapor.
                    </p>
                </div>
            </div>
        </div>

        <!-- Card 12 -->
        <div class="relative flex items-center border-2 border-black rounded-2xl p-3 md:p-4 shadow-md w-full bg-[#9A7B7B] h-auto">
            <span class="absolute top-0 left-0 mt-1 ml-1 h-full w-full rounded-2xl bg-[#D9D9D9] border border-black"></span>
            <div class="relative flex items-center w-full">
                <div class="w-8 h-8 md:w-11 md:h-11 lg:w-12 lg:h-12 mr-3 md:mr-4 flex-shrink-0 ml-4 bg-[#493A3A] text-white flex items-center justify-center rounded-md">12</div>
                <div class="flex-1 ml-1 sm:ml-2 md:ml-3 lg:ml-4">
                    <h3 class="font-semibold text-sm md:text-base lg:text-base">Meninggalkan Ruang Pengaduan</h3>
                    <p class="font-normal text-xs md:text-sm lg:text-sm">
                        Pelapor meninggalkan ruang pengaduan dan mengambil kembali kartu identitas dengan menukarkan kartu ID Tamu.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Registration Button - width aligned with cards -->
    <div class="flex justify-center my-12 max-w-5xl mx-auto">
        <a href="{{ route('tatatertib') }}" class="w-full py-3 px-6 bg-gradient-to-r from-[#2C1C11] to-[#9A7B7B] text-white rounded-lg font-medium shadow-md transition-all duration-300 hover:shadow-xl hover:scale-105 text-center">
            Registrasi Online (klik di sini)<br> (kuota <i>online</i> 50 orang/hari)
        </a>
    </div>
</div>
@endsection

@section('script')
<script>
    // Update year automatically
    document.getElementById('currentYear').textContent = new Date().getFullYear();
</script>
@endsection
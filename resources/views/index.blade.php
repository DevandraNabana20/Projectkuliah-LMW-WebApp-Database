@extends('layouts.panel')

@section('head')
<title>Lapor Mas Wapres! - Kanal Pengaduan Masyarakat</title>
<meta property="og:title" content="Lapor Mas Wapres! - Kanal Pengaduan Masyarakat">
@endsection

@section('pages')
<!-- Main Content -->
<div class="w-full max-w-4xl mx-auto px-4">
    <!-- Title -->
    <h2 class="text-center font-semibold my-9 text-base md:text-lg lg:text-xl">Sampaikan Laporan Anda melalui pilihan kanal berikut ini</h2>

    <!-- Cards Container -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6 justify-items-center items-stretch mb-8 md:mb-12 max-w-5xl mx-auto">
        <!-- Card 1: Tatap Muka -->
        <a href="{{ route('detail') }}" class="w-full">
            <div class="relative flex items-center border-2 border-black rounded-2xl p-3 md:p-4 shadow-md w-full bg-[#9A7B7B] transition-all duration-300 hover:-translate-y-1 hover:bg-[#9A7B7B] hover:text-gray-900 hover:shadow-xl group h-full md:h-38 lg:h-40">
                <span class="absolute top-0 left-0 mt-1 ml-1 h-full w-full rounded-2xl bg-[#D9D9D9] border border-black transition-all duration-300 group-hover:bg-[#ebe6e6]"></span>
                <div class="relative flex items-center w-full">
                    <img src="{{ asset('assets/images/TATAP-MUKA-LOGO.png') }}" alt="Tatap Muka Icon" class="w-8 h-8 md:w-11 md:h-11 lg:w-12 lg:h-12 mr-3 md:mr-4 flex-shrink-0 transition-transform duration-300 group-hover:scale-110 ml-4">
                    <div class="flex-1 ml-1 sm:ml-2 md:ml-3 lg:ml-4">
                        <h3 class="font-semibold text-sm md:text-base lg:text-base">Tatap Muka (Registrasi Online)</h3>
                        <p class="font-normal text-xs md:text-sm lg:text-sm">
                            Sampaikan langsung di Kantor Sekretariat Wakil Presiden Jln. Kebon Sirih No. 14, Jakarta Pusat
                        </p>
                    </div>
                </div>
            </div>
        </a>

        <!-- Card 2: WhatsApp -->
        <a href="https://wa.me/6281117042204/?text=Halo" target="_blank" class="w-full">
            <div class="relative flex items-center border-2 border-black rounded-2xl p-3 md:p-4 shadow-md w-full bg-[#9A7B7B] transition-all duration-300 hover:-translate-y-1 hover:bg-[#9A7B7B] hover:text-gray-900 hover:shadow-xl group h-full md:h-38 lg:h-40">
                <span class="absolute top-0 left-0 mt-1 ml-1 h-full w-full rounded-2xl bg-[#D9D9D9] border border-black transition-all duration-300 group-hover:bg-[#ebe6e6]"></span>
                <div class="relative flex items-center w-full">
                    <svg class="w-8 h-8 md:w-11 md:h-11 lg:w-12 lg:h-12 mr-3 md:mr-4 flex-shrink-0 transition-transform duration-300 group-hover:scale-110 text-green-600 ml-4" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                    </svg>
                    <div class="flex-1 ml-1 sm:ml-2 md:ml-3 lg:ml-4">
                        <h3 class="font-semibold text-sm md:text-base lg:text-base">WhatsApp</h3>
                        <p class="font-normal text-xs md:text-sm lg:text-sm">
                            Hubungi kami via WhatsApp
                        </p>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <!-- Catatan Section -->
    <div class="text-sm md:text-base space-y-4">
        <h3 class="font-semibold mb-2">Catatan:</h3>
        <ol class="list-decimal list-outside space-y-2 ml-4">
            <li class="pl-1">
                <p class=" hyphens-auto" style="-webkit-hyphens: auto; -ms-hyphens: auto; hyphens: auto; word-break: break-word; text-align-last: left;">
                    Untuk melakukan Pengaduan Tatap Muka, Anda harus terlebih dahulu melakukan Registrasi Online melalui <a href="{{ url('/') }}" class="text-blue-600 hover:text-blue-800 underline">lapormaswapres.id</a>. Cek Alur Pengaduan Tatap Muka <a href="{{ route('detail') }}" class="text-blue-600 hover:text-blue-800 underline">disini</a>.
                </p>
            </li>
            <li class="pl-1">
                <p class=" hyphens-auto" style="-webkit-hyphens: auto; -ms-hyphens: auto; hyphens: auto; word-break: break-word; text-align-last: left;">
                    Jika Anda tidak memiliki akses internet, Anda dapat datang langsung ke kantor Sekretariat Wakil Presiden untuk melakukan Registrasi Online dengan bantuan petugas.
                </p>
            </li>
        </ol>
    </div>
</div>
@endsection

@section('script')
<script>
    // Update year automatically
    document.getElementById('currentYear').textContent = new Date().getFullYear();
</script>
@endsection
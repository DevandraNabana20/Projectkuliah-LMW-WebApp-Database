@extends('layouts.panel')

@section('head')
<title>Registrasi Berhasil - Lapor Mas Wapres!</title>
<meta property="og:title" content="Registrasi Berhasil - Lapor Mas Wapres!">
<style>
    .pdf-card {
        transition: all 0.3s ease;
    }
    .pdf-card:hover {
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    }

    /* Base styles for all screen sizes */
    .filename-container {
        display: flex;
        align-items: center;
    }

    /* Fix for mobile display */
    @media (max-width: 640px) {
        .pdf-card {
            flex-direction: column;
            align-items: flex-start;
        }
        .pdf-card > div {
            margin-bottom: 1rem;
            width: 100%;
        }
        .filename-container {
            width: 100%;
        }
        .filename-text {
            word-break: break-word;
            hyphens: auto;
            font-size: 0.875rem;
        }
    }

    /* Additional fixes for very small screens */
    @media (max-width: 375px) {
        .pdf-icon {
            width: 36px;
            height: 36px;
            margin-right: 0.5rem;
        }
        .filename-text {
            font-size: 0.9rem;
        }
        .download-btn {
            padding-left: 0.75rem;
            padding-right: 0.75rem;
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

        <!-- Success Message -->
        <div class="text-center mb-6">
            <h3 class="text-xl font-bold text-green-600">Registrasi Berhasil</h3>
            <div class="w-full h-px bg-[#2C1C11]/50 my-4"></div>
        </div>

        <!-- Registration Details - Centered -->
        <div class="space-y-5 mx-auto mb-8 text-center max-w-lg">
            <div class="flex flex-col items-center">
                <span class="font-medium">Nama Lengkap:</span>
                <span>{{ $nama }}</span>
            </div>

            <div class="flex flex-col items-center">
                <span class="font-medium">NIK:</span>
                <span>{{ $nik }}</span>
            </div>

            <div class="flex flex-col items-center">
                <span class="font-medium">Nomor Kontak:</span>
                <span>{{ $kontak }}</span>
            </div>

            <div class="flex flex-col items-center">
                <span class="font-medium">Email:</span>
                <span>{{ $email ? $email : '-' }}</span>
            </div>

            <div class="flex flex-col items-center">
                <span class="font-medium">Jenis Kelamin:</span>
                <span>{{ ucfirst($gender) }}</span>
            </div>

            <div class="flex flex-col items-center">
                <span class="font-medium">Topik Aduan:</span>
                <span>{{ $topik }}</span>
            </div>

            <div class="flex flex-col items-center">
                <span class="font-medium">Waktu dan Tanggal Reservasi:</span>
                <span>{{ $tanggal_reservasi }}, Jam {{ $waktu_reservasi }}</span>
                <span class="text-sm text-gray-500">Asia/Jakarta</span>
            </div>

            @if($needs_companion)
            <div class="flex flex-col items-center">
                <span class="font-medium">Nama Pendamping:</span>
                <span>{{ $companion ?? '-' }}</span>
            </div>
            @endif
        </div>

        <div class="w-full h-px bg-[#2C1C11]/50 my-4"></div>

        <!-- PDF Download Card - Improved responsiveness with full filename -->
        <div class="pdf-card bg-white rounded-lg shadow p-4 mt-6 flex items-center justify-between sm:flex-row">
            <div class="filename-container">
                <img class="pdf-icon h-10 w-10 mr-3 flex-shrink-0" src="https://img.icons8.com/color/48/pdf.png" alt="pdf icon">
                <span class="filename-text">Lapor Mas Wapres - {{ $nama }}_{{ $nik }}.pdf</span>
            </div>
            <a href="{{ route('download-bukti-registrasi', ['id' => $registration_id]) }}" class="download-btn px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition mt-3 sm:mt-0 w-full sm:w-auto text-center flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
                Unduh Bukti Reservasi
            </a>
        </div>
    </div>
</div>
@endsection


@extends('layouts.admin')

@section('title', 'Kelola Pengaduan')

@section('head')
    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <style>
        /* Custom flatpickr styling */
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

        /* Hide spinner buttons on number inputs */
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type=number] {
            -moz-appearance: textfield;
        }

        /* Custom Pagination Styling */
        .pagination {
            display: flex;
            justify-content: center;
        }

        .pagination .page-item.active .page-link {
            background-color: #2C1C11 !important;
            border-color: #2C1C11 !important;
            color: white !important;
        }

        .pagination .page-link {
            color: #2C1C11;
            border: 1px solid #e5e7eb;
        }

        .pagination .page-link:hover {
            background-color: #9A7B7B;
            border-color: #9A7B7B;
            color: white;
        }

        .pagination .page-item.disabled .page-link {
            color: #9ca3af;
            background-color: #f9fafb;
            border-color: #e5e7eb;
        }

        /* Mobile-specific styles */
        @media (max-width: 768px) {
            .mobile-card {
                display: flex;
                flex-direction: column;
                margin-bottom: 1rem;
                border: 1px solid #e5e7eb;
                border-radius: 0.5rem;
                overflow: hidden;
            }

            .mobile-card-header {
                background-color: #f9fafb;
                padding: 0.75rem 1rem;
                border-bottom: 1px solid #e5e7eb;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .mobile-card-body {
                padding: 1rem;
                background-color: white;
            }

            .data-label {
                font-size: 0.75rem;
                font-weight: 600;
                color: #6b7280;
                text-transform: uppercase;
                margin-bottom: 0.25rem;
            }

            .data-value {
                font-size: 0.875rem;
                color: #1f2937;
                margin-bottom: 0.75rem;
            }

            .desktop-table {
                display: none;
            }

            .mobile-cards {
                display: block;
            }
        }

        @media (min-width: 769px) {
            .desktop-table {
                display: block;
            }

            .mobile-cards {
                display: none;
            }
        }

        /* More specific and forceful pagination styling */
        .pagination>nav>div>span,
        .pagination>nav>div>a,
        nav[role="navigation"] span[aria-current="page"]>span,
        nav[role="navigation"] a.relative,
        nav[role="navigation"] span.relative {
            position: relative;
            display: inline-flex;
            padding: 0.5rem 0.75rem;
            margin-left: -1px;
            line-height: 1.25;
            color: #2C1C11;
            background-color: #fff;
            border: 1px solid #e5e7eb;
        }

        /* Active page */
        nav[role="navigation"] span[aria-current="page"]>span {
            z-index: 3;
            color: #fff !important;
            background-color: #2C1C11 !important;
            border-color: #2C1C11 !important;
        }

        /* Hover state */
        nav[role="navigation"] a.relative:hover {
            z-index: 2;
            color: #fff !important;
            text-decoration: none;
            background-color: #9A7B7B !important;
            border-color: #9A7B7B !important;
        }

        /* Disabled state */
        nav[role="navigation"] span.relative[aria-disabled="true"] {
            color: #9ca3af !important;
            pointer-events: none;
            background-color: #f9fafb !important;
            border-color: #e5e7eb !important;
        }

        /* Pagination container */
        nav[role="navigation"] {
            display: flex;
            justify-content: center;
            width: 100%;
        }

        /* Complete replacement for mobile pagination styling */
        @media (max-width: 768px) {

            /* Target the specific Laravel pagination elements */
            nav[role="navigation"] span.relative,
            nav[role="navigation"] a.relative,
            .pagination nav span.relative,
            .pagination nav a.relative {
                font-size: 0.8rem !important;
                padding: 0.35rem 0.5rem !important;
                min-width: 2rem !important;
                height: 2rem !important;
                display: inline-flex !important;
                align-items: center;
                justify-content: center;
                margin: 0 2px;
            }

            /* Fix for SVG icons in pagination */
            nav[role="navigation"] svg,
            .pagination nav svg {
                width: 14px !important;
                height: 14px !important;
                < !-- Updated height to match width -->display: inline !important;
            }

            /* Make the pagination container well-structured */
            nav[role="navigation"] div:nth-child(2) {
                display: flex !important;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                gap: 4px;
                padding: 0.5rem;
                width: 100%;
            }

            /* Ensure all pagination elements are visible */
            nav[role="navigation"] div:nth-child(2)>span,
            nav[role="navigation"] div:nth-child(2)>a {
                display: inline-flex !important;
                visibility: visible !important;
            }

            /* Hide "showing x to y of z results" */
            nav[role="navigation"] div p,
            nav[role="navigation"] div:first-child {
                display: none !important;
            }

            /* Container spacing */
            nav[role="navigation"] {
                margin-top: 0.5rem !important;
                padding: 0 !important;
            }

            /* Force correct display for the nav wrapper element */
            .pagination nav {
                display: flex !important;
                width: 100% !important;
                justify-content: center !important;
            }
        }
    </style>
@endsection

@section('content')
    <div class="container mx-auto px-4">
        <!-- Header Section -->
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-[#2C1C11] mb-2">Kelola Pengaduan</h1>
            <p class="text-gray-600">Daftar semua pengaduan yang masuk</p>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <!-- Filters and Search -->
        <div class="bg-white rounded-lg shadow-md p-4 mb-6 w-full">
            <div class="flex flex-wrap justify-between items-center mb-4 border-b pb-3">
                <h2 class="text-lg font-semibold text-[#2C1C11]">
                    Filter Pengaduan
                </h2>
                @if (request('status') || request('date') || request('search') || request('gender') || request('id'))
                    <a href="{{ route('admin.complaints') }}"
                        class="text-gray-600 hover:text-gray-800 flex items-center mt-2 sm:mt-0">
                        <i class="fas fa-undo-alt mr-1"></i> Reset Filter
                    </a>
                @endif
            </div>

            <form action="{{ route('admin.complaints') }}" method="GET">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <!-- ID Filter -->
                    <div>
                        <label for="id" class="block text-sm font-medium text-gray-700 mb-1">ID</label>
                        <input type="number" id="id" name="id" value="{{ request('id') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#2C1C11]/50 placeholder-gray-400 text-gray-700 bg-white"
                            placeholder="ID Pengaduan">
                    </div>

                    <!-- Status Filter -->
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                        <select id="status" name="status"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#2C1C11]/50 placeholder-gray-400 text-gray-700 bg-white">
                            <option value="">Semua Status</option>
                            <option value="process" {{ request('status') == 'process' ? 'selected' : '' }}>Dalam Proses
                            </option>
                            <option value="done" {{ request('status') == 'done' ? 'selected' : '' }}>Selesai</option>
                        </select>
                    </div>

                    <!-- Gender Filter -->
                    <div>
                        <label for="gender" class="block text-sm font-medium text-gray-700 mb-1">Jenis Kelamin</label>
                        <select id="gender" name="gender"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#2C1C11]/50 placeholder-gray-400 text-gray-700 bg-white">
                            <option value="">Semua</option>
                            <option value="laki-laki" {{ request('gender') == 'laki-laki' ? 'selected' : '' }}>Laki-laki
                            </option>
                            <option value="perempuan" {{ request('gender') == 'perempuan' ? 'selected' : '' }}>Perempuan
                            </option>
                        </select>
                    </div>

                    <!-- Date Filter -->
                    <div>
                        <label for="date" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Reservasi</label>
                        <input type="text" id="date" name="date" value="{{ request('date') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#2C1C11]/50 placeholder-gray-400 text-gray-700 bg-white datepicker"
                            placeholder="Pilih tanggal" autocomplete="off">
                    </div>

                    <!-- Search Filter -->
                    <div>
                        <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Cari</label>
                        <input type="text" id="search" name="search" value="{{ request('search') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#2C1C11]/50 placeholder-gray-400 text-gray-700 bg-white"
                            placeholder="Nama, NIK, atau topik...">
                    </div>

                    <!-- Filter Button -->
                    <div class="flex items-end">
                        <button type="submit"
                            class="py-2 px-4 bg-gradient-to-r from-[#2C1C11] to-[#9A7B7B] text-white rounded-lg font-medium shadow-md transition-all duration-300 hover:shadow-xl hover:scale-105 text-center h-10 w-full">
                            <i class="fas fa-search mr-2"></i> Filter
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Results Summary -->
        <div class="bg-gray-50 rounded-lg p-3 mb-4 flex flex-wrap justify-between items-center">
            <div class="text-sm text-gray-600">
                Menampilkan {{ $complaints->firstItem() ?? 0 }} - {{ $complaints->lastItem() ?? 0 }} dari
                {{ $complaints->total() }} pengaduan
            </div>
            <div class="text-sm mt-2 sm:mt-0">
                @if (request('status') || request('date') || request('search') || request('gender') || request('id'))
                    <span class="italic text-gray-600">Hasil filter</span>
                @endif
            </div>
        </div>

        <!-- Desktop Table (Visible on tablets and larger) -->
        <div class="bg-white rounded-lg shadow-md w-full desktop-table">
            <div class="overflow-x-auto">
                <table class="w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                ID
                            </th>
                            <th scope="col"
                                class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nama
                            </th>
                            <th scope="col"
                                class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Gender
                            </th>
                            <th scope="col"
                                class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Topik
                            </th>
                            <th scope="col"
                                class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Tanggal
                            </th>
                            <th scope="col"
                                class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                            <th scope="col"
                                class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($complaints as $complaint)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ $complaint->id }}
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $complaint->nama }}</div>
                                    <div class="text-xs text-gray-500">{{ $complaint->email }}</div>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                    @if ($complaint->gender == 'laki-laki')
                                        <span class="inline-flex items-center">
                                            <i class="fas fa-male text-blue-500 mr-1"></i> L
                                        </span>
                                    @else
                                        <span class="inline-flex items-center">
                                            <i class="fas fa-female text-pink-500 mr-1"></i> P
                                        </span>
                                    @endif
                                </td>
                                <td class="px-4 py-3">
                                    <div class="text-sm text-gray-900 truncate max-w-[200px]">{{ $complaint->topik }}
                                    </div>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                    {{ $complaint->tanggal_reservasi->format('d/m/Y') }}
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap">
                                    @if ($complaint->status == 'done')
                                        <span
                                            class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            <i class="fas fa-check-circle mr-1"></i> Selesai
                                        </span>
                                    @else
                                        <span
                                            class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                            <i class="fas fa-clock mr-1"></i> Proses
                                        </span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm font-medium">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('admin.complaints.show', $complaint->id) }}"
                                            class="text-[#2C1C11] hover:text-[#9A7B7B]" title="Lihat Detail">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.complaints.edit', $complaint->id) }}"
                                            class="text-blue-600 hover:text-blue-800" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" onclick="confirmDelete({{ $complaint->id }})"
                                            class="text-red-600 hover:text-red-800" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                    <form id="delete-form-{{ $complaint->id }}"
                                        action="{{ route('admin.complaints.destroy', $complaint->id) }}" method="POST"
                                        class="hidden">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-4 py-6 text-center text-gray-500">
                                    <div class="flex flex-col items-center py-6">
                                        <i class="fas fa-inbox text-gray-400 text-4xl mb-3"></i>
                                        <p class="text-lg font-medium">Tidak ada data pengaduan</p>
                                        <p class="text-sm text-gray-500 mt-1">Belum ada pengaduan yang tercatat dalam
                                            sistem</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination for desktop -->
            @if ($complaints->total() > 5)
                <div class="px-6 py-4 border-t">
                    {{ $complaints->links() }}
                </div>
            @endif
        </div>

        <!-- Mobile Cards (Visible on mobile only) -->
        <div class="mobile-cards">
            @forelse($complaints as $complaint)
                <div class="mobile-card">
                    <div class="mobile-card-header">
                        <div class="flex items-center">
                            <span class="font-bold text-gray-900 mr-2">#{{ $complaint->id }}</span>
                            @if ($complaint->status == 'done')
                                <span
                                    class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    <i class="fas fa-check-circle mr-1"></i> Selesai
                                </span>
                            @else
                                <span
                                    class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                    <i class="fas fa-clock mr-1"></i> Proses
                                </span>
                            @endif
                        </div>
                        <div class="flex space-x-3">
                            <a href="{{ route('admin.complaints.show', $complaint->id) }}"
                                class="text-[#2C1C11] hover:text-[#9A7B7B]" title="Lihat Detail">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.complaints.edit', $complaint->id) }}"
                                class="text-blue-600 hover:text-blue-800" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button type="button" onclick="confirmDelete({{ $complaint->id }})"
                                class="text-red-600 hover:text-red-800" title="Hapus">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>

                    <div class="mobile-card-body">
                        <div>
                            <div class="data-label">Nama</div>
                            <div class="data-value">{{ $complaint->nama }}</div>
                        </div>
                        <div>
                            <div class="data-label">Gender</div>
                            <div class="data-value">
                                @if ($complaint->gender == 'laki-laki')
                                    <span class="inline-flex items-center">
                                        <i class="fas fa-male text-blue-500 mr-1"></i> Laki-laki
                                    </span>
                                @else
                                    <span class="inline-flex items-center">
                                        <i class="fas fa-female text-pink-500 mr-1"></i> Perempuan
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div>
                            <div class="data-label">Topik</div>
                            <div class="data-value">{{ $complaint->topik }}</div>
                        </div>
                        <div>
                            <div class="data-label">Tanggal</div>
                            <div class="data-value">{{ $complaint->tanggal_reservasi->format('d/m/Y') }}</div>
                        </div>
                        @if ($complaint->email)
                            <div>
                                <div class="data-label">Email</div>
                                <div class="data-value">{{ $complaint->email }}</div>
                            </div>
                        @endif
                    </div>
                </div>
            @empty
                <div class="bg-white rounded-lg shadow-md p-6 text-center text-gray-500">
                    <div class="flex flex-col items-center py-6">
                        <i class="fas fa-inbox text-gray-400 text-4xl mb-3"></i>
                        <p class="text-lg font-medium">Tidak ada data pengaduan</p>
                        <p class="text-sm text-gray-500 mt-1">Belum ada pengaduan yang tercatat dalam sistem</p>
                    </div>
                </div>
            @endforelse

            <!-- Pagination for mobile -->
            @if ($complaints->total() > 5)
                <div class="py-4 mt-4">
                    {{ $complaints->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/id.js"></script>
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Flatpickr for date picker
            flatpickr(".datepicker", {
                dateFormat: "Y-m-d",
                locale: "id",
                allowInput: true,
                altInput: true,
                altFormat: "d F Y",
                disableMobile: "true"
            });

            // Confirm delete function with SweetAlert2
            window.confirmDelete = function(id) {
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Pengaduan ini akan dihapus secara permanen!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#dc2626',
                    cancelButtonColor: '#6b7280',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete-form-' + id).submit();
                    }
                });
            }
        });
    </script>
@endsection

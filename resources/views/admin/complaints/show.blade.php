@extends('layouts.admin')

@section('title', 'Detail Pengaduan')

@section('head')
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <style>
        /* Keep existing styles */
        .info-label {
            font-size: 0.875rem;
            line-height: 1.25rem;
            font-weight: 600;
            color: #4b5563;
        }

        .info-value {
            font-size: 0.875rem;
            line-height: 1.25rem;
            font-weight: 400;
            color: #4b5563;
            background-color: white;
        }

        .info-group {
            padding-top: 0.75rem;
            padding-bottom: 0.75rem;
            border-bottom-width: 1px;
            border-color: #e5e7eb;
        }

        .info-group:last-child {
            border-bottom-width: 0;
        }

        .btn-primary {
            padding: 0.5rem 1rem;
            background-image: linear-gradient(to right, #2C1C11, #9A7B7B);
            color: white;
            border-radius: 0.5rem;
            font-weight: 500;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            transition-property: all;
            transition-duration: 300ms;
            text-align: center;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .btn-primary:hover {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            transform: scale(1.05);
        }

        /* Add button danger style */
        .btn-danger {
            padding: 0.5rem 1rem;
            background-color: #fee2e2;
            color: #dc2626;
            border-radius: 0.5rem;
            font-weight: 500;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            transition-property: all;
            transition-duration: 300ms;
            text-align: center;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .btn-danger:hover {
            background-color: #fecaca;
            transform: scale(1.05);
        }

        /* Keep existing button styles */
        .btn-edit {
            padding: 0.5rem 1rem;
            background-color: #fbbf24;
            color: #7c2d12;
            border-radius: 0.5rem;
            font-weight: 500;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            transition-property: all;
            transition-duration: 300ms;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .btn-edit:hover {
            background-color: #f59e0b;
            transform: scale(1.05);
        }

        .btn-secondary {
            padding: 0.5rem 1rem;
            background-color: #f3f4f6;
            color: #374151;
            border-radius: 0.5rem;
            font-weight: 500;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            transition-property: all;
            transition-duration: 300ms;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .btn-secondary:hover {
            background-color: #e5e7eb;
        }
    </style>
@endsection

@section('content')
    <div class="container mx-auto px-4">
        <!-- Header Section -->
        <div class="mb-8 flex flex-col md:flex-row justify-between items-start md:items-center">
            <div class="mb-4 md:mb-0">
                <h1 class="text-xl md:text-2xl font-bold text-[#2C1C11] mb-2">Detail Pengaduan</h1>
                <p class="text-sm md:text-base text-gray-600">Informasi lengkap pengaduan #{{ $complaint->id }}</p>
            </div>
            <div class="w-full flex justify-between md:justify-end md:space-x-3 md:w-auto">
                <a href="{{ route('admin.complaints') }}" class="btn-secondary">
                    <i class="fas fa-arrow-left mr-1"></i> Kembali
                </a>
                <a href="{{ route('admin.complaints.edit', $complaint->id) }}" class="btn-edit">
                    <i class="fas fa-edit mr-1"></i> Edit
                </a>
            </div>
        </div>

        <!-- Add the success alert here -->
        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <!-- Status Banner -->
        <div class="bg-white rounded-lg shadow-md p-4 mb-6 flex flex-col sm:flex-row justify-between items-center">
            <div
                class="flex flex-col items-center text-center sm:flex-row sm:text-left sm:items-start mb-5 sm:mb-0 w-full sm:w-auto">
                <div class="mb-2 sm:mb-0 sm:mr-4">
                    @if ($complaint->status == 'done')
                        <div class="w-12 h-12 rounded-full bg-green-100 flex items-center justify-center">
                            <i class="fas fa-check-circle text-xl md:text-2xl text-green-600"></i>
                        </div>
                    @else
                        <div class="w-12 h-12 rounded-full bg-yellow-100 flex items-center justify-center">
                            <i class="fas fa-clock text-xl md:text-2xl text-yellow-600"></i>
                        </div>
                    @endif
                </div>
                <div>
                    <h2 class="text-base md:text-lg font-medium text-black">Status Pengaduan</h2>
                    <p class="text-xs md:text-sm">
                        @if ($complaint->status == 'done')
                            <span class="text-green-600 font-medium">Selesai</span>
                        @else
                            <span class="text-yellow-600 font-medium">Dalam Proses</span>
                        @endif
                    </p>
                </div>
            </div>
            <div class="w-full sm:w-auto text-center sm:text-right">
                <p class="text-xs md:text-sm text-gray-500">Tanggal Reservasi</p>
                <p class="text-base md:text-lg font-semibold text-gray-800">
                    @php
                        // Use Carbon to handle date formatting in Indonesian
                        $carbonDate = \Carbon\Carbon::parse($complaint->tanggal_reservasi);
                        $carbonDate->locale('id');
                        $formattedDate = $carbonDate->isoFormat('D MMMM Y');
                    @endphp
                    {{ $formattedDate }}
                </p>
            </div>
        </div>

        <!-- Detail Pengaduan -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Informasi Pengadu -->
            <div class="md:col-span-1">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-base md:text-lg font-semibold text-[#2C1C11] mb-4">Informasi Pengadu</h2>

                    <div class="info-group">
                        <div class="info-label">ID</div>
                        <div class="info-value">{{ $complaint->id }}</div>
                    </div>
                    <div class="info-group">
                        <div class="info-label">Nama Lengkap</div>
                        <div class="info-value">{{ $complaint->nama }}</div>
                    </div>

                    <div class="info-group">
                        <div class="info-label">NIK</div>
                        <div class="info-value">{{ $complaint->nik }}</div>
                    </div>

                    <div class="info-group">
                        <div class="info-label">Jenis Kelamin</div>
                        <div class="info-value">
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

                    <div class="info-group">
                        <div class="info-label">Email</div>
                        <div class="info-value">{{ $complaint->email ?: '-' }}</div>
                    </div>

                    <div class="info-group">
                        <div class="info-label">Nomor Telepon</div>
                        <div class="info-value">{{ $complaint->kontak }}</div>
                    </div>

                    <div class="info-group">
                        <div class="info-label">Alamat</div>
                        <div class="info-value">{{ $complaint->alamat ?: '-' }}</div>
                    </div>

                    <div class="info-group">
                        <div class="info-label">Nama Pendamping</div>
                        <div class="info-value">{{ $complaint->companion ?? '-' }}</div>
                    </div>

                    <div class="info-group">
                        <div class="info-label">Ditambahkan Pada</div>
                        <div class="info-value">
                            @php
                                $createdDate = \Carbon\Carbon::parse($complaint->created_at);
                                $createdDate->locale('id');
                                $formattedCreatedDate = $createdDate->isoFormat('D MMMM Y, HH:mm');
                            @endphp
                            {{ $formattedCreatedDate }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detail Pengaduan -->
            <div class="md:col-span-2">
                <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                    <h2 class="text-base md:text-lg font-semibold text-[#2C1C11] mb-4">Detail Pengaduan</h2>

                    <div class="info-group">
                        <div class="info-label">Topik Pengaduan</div>
                        <div class="info-value">{{ $complaint->topik }}</div>
                    </div>

                    <div class="info-group">
                        <div class="info-label mb-2">Isi Pengaduan</div>
                        <div
                            class="bg-gray-50 p-5 rounded-lg text-sm text-gray-700 min-h-[160px] border border-gray-200 overflow-y-auto max-h-[400px]">
                            @if ($complaint->detail_pengaduan)
                                {!! nl2br(e($complaint->detail_pengaduan)) !!}
                            @else
                                <span class="text-gray-500">Tidak ada detail pengaduan.</span>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Status History & Actions -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-base md:text-lg font-semibold text-[#2C1C11] mb-4">Tindakan</h2>

                    <!-- Status Update Form - Only includes status field -->
                    <form action="{{ route('admin.complaints.update-status', $complaint->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Tidak perlu hidden fields karena hanya update status -->

                        <div class="mb-4">
                            <span class="info-label">Ubah Status:</span>

                            <div class="flex mt-2 space-x-4">
                                <label class="inline-flex items-center">
                                    <input type="radio" name="status" value="process"
                                        class="text-yellow-500 focus:ring-yellow-500 h-4 w-4"
                                        {{ $complaint->status == 'process' ? 'checked' : '' }}>
                                    <span class="ml-2 text-sm text-gray-700">Dalam Proses</span>
                                </label>

                                <label class="inline-flex items-center">
                                    <input type="radio" name="status" value="done"
                                        class="text-green-500 focus:ring-green-500 h-4 w-4"
                                        {{ $complaint->status == 'done' ? 'checked' : '' }}>
                                    <span class="ml-2 text-sm text-gray-700">Selesai</span>
                                </label>
                            </div>
                        </div>

                        <div class="flex flex-col-reverse sm:flex-row justify-between items-center gap-3 pt-4 border-t">
                            <button type="button" onclick="confirmDelete()" class="btn-danger w-full sm:w-auto text-sm">
                                <i class="fas fa-trash mr-2"></i> Hapus Pengaduan
                            </button>

                            <button type="submit" class="btn-primary w-full sm:w-auto text-sm">
                                <i class="fas fa-save mr-2"></i> Simpan Status
                            </button>
                        </div>
                    </form>

                    <!-- Delete Form -->
                    <form id="delete-form" action="{{ route('admin.complaints.destroy', $complaint->id) }}"
                        method="POST" class="hidden">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete() {
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
                    document.getElementById('delete-form').submit();
                }
            })
        }
    </script>
@endsection

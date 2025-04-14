@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="container mx-auto">
        <!-- Welcome Section -->
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-[#2C1C11] mb-2">Selamat Datang, {{ Auth::guard('admin')->user()->name }}!</h1>
            <p class="text-gray-600">Dashboard Admin LaporMasWapres!</p>
        </div>

        <!-- Stats Overview -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Total Pengaduan Card -->
            <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-[#2C1C11]">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-[#2C1C11]/10 mr-4">
                        <i class="fas fa-clipboard-list text-[#2C1C11] text-xl"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Total Pengaduan</p>
                        <p class="text-2xl font-bold text-gray-800">{{ $totalRegistrations }}</p>
                    </div>
                </div>
            </div>

            <!-- Pengaduan Berdasarkan Gender Card -->
            <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-[#9A7B7B]">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-[#9A7B7B]/10 mr-4">
                        <i class="fas fa-users text-[#9A7B7B] text-xl"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Berdasarkan Gender</p>
                        <div class="flex items-center space-x-4 mt-1">
                            <div class="flex items-center">
                                <i class="fas fa-male text-blue-500 mr-1"></i>
                                <p class="text-lg font-medium text-gray-800">{{ $maleCount }}</p>
                            </div>
                            <span class="text-gray-400">/</span>
                            <div class="flex items-center">
                                <i class="fas fa-female text-pink-500 mr-1"></i>
                                <p class="text-lg font-medium text-gray-800">{{ $femaleCount }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pengaduan Selesai Card -->
            <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-green-500">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-green-100 mr-4">
                        <i class="fas fa-check-circle text-green-500 text-xl"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Pengaduan Selesai</p>
                        <p class="text-2xl font-bold text-gray-800">{{ $doneCount }}</p>
                    </div>
                </div>
            </div>

            <!-- Pengaduan Dalam Proses Card -->
            <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-yellow-500">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-yellow-100 mr-4">
                        <i class="fas fa-hourglass-half text-yellow-500 text-xl"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Dalam Proses</p>
                        <p class="text-2xl font-bold text-gray-800">{{ $processCount }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Complaints and Calendar Section -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
            <!-- Recent Complaints -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-lg font-semibold text-[#2C1C11]">Pengaduan Terbaru</h2>
                    </div>

                    @if ($totalRegistrations > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white">
                                <thead>
                                    <tr>
                                        <th
                                            class="py-2 px-3 border-b text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            ID
                                        </th>
                                        <th
                                            class="py-2 px-3 border-b text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Nama
                                        </th>
                                        <th
                                            class="py-2 px-3 border-b text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Gender
                                        </th>
                                        <th
                                            class="py-2 px-3 border-b text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Topik
                                        </th>
                                        <th
                                            class="py-2 px-3 border-b text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Tanggal
                                        </th>
                                        <th
                                            class="py-2 px-3 border-b text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Status
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $rowsDisplayed = 0; @endphp

                                    @foreach ($recentRegistrations as $registration)
                                        <tr class="cursor-pointer hover:bg-gray-50"
                                            onclick="window.location='{{ route('admin.complaints.show', $registration->id) }}'">
                                            <td class="py-2 px-3 border-b text-gray-700 bg-white">{{ $registration->id }}
                                            </td>
                                            <td class="py-2 px-3 border-b text-gray-700 bg-white">{{ $registration->nama }}
                                            </td>
                                            <td class="py-2 px-3 border-b text-gray-700 bg-white">
                                                @if ($registration->gender == 'laki-laki')
                                                    <span class="inline-flex items-center">
                                                        <i class="fas fa-male text-blue-500 mr-1"></i> L
                                                    </span>
                                                @else
                                                    <span class="inline-flex items-center">
                                                        <i class="fas fa-female text-pink-500 mr-1"></i> P
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="py-2 px-3 border-b text-gray-700 bg-white">
                                                <span
                                                    class="inline-block max-w-xs truncate">{{ $registration->topik }}</span>
                                            </td>
                                            <td class="py-2 px-3 border-b text-gray-700 bg-white">
                                                {{ $registration->tanggal_reservasi->format('d/m/Y') }}
                                            </td>
                                            <td class="py-2 px-3 border-b">
                                                @if ($registration->status == 'done')
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
                                        </tr>
                                        @php $rowsDisplayed++; @endphp
                                    @endforeach

                                    @for ($i = $rowsDisplayed; $i < 5; $i++)
                                        <tr>
                                            <td class="py-2 px-3 border-b text-gray-500 italic text-center" colspan="6">
                                                Data tidak tersedia
                                            </td>
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>
                    @else
                        <!-- Empty state -->
                        <div class="text-center py-12">
                            <div class="mx-auto w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                                <i class="fas fa-inbox text-gray-400 text-2xl"></i>
                            </div>
                            <p class="text-gray-500 mb-2">Belum ada pengaduan terbaru</p>
                            <p class="text-sm text-gray-400">Pengaduan baru akan muncul di sini</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Calendar and Chart Column -->
            <div class="lg:col-span-1 flex flex-col h-full">
                <!-- Calendar card -->
                <div class="bg-white rounded-lg shadow-md p-6 w-full flex-grow flex flex-col">
                    <h2 class="text-lg font-semibold text-[#2C1C11] mb-4">Jadwal Hari Ini</h2>

                    <!-- Calendar with real data -->
                    <div class="bg-gray-50 rounded p-4 text-center flex-grow flex flex-col justify-center">
                        <p class="text-gray-500 font-medium">{{ Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</p>
                        <div class="my-4 border-b border-dashed border-gray-300"></div>

                        @if ($todayRegistrationsCount > 0)
                            <div class="flex items-center justify-center flex-grow">
                                <div class="p-3 rounded-full bg-[#2C1C11]/10 mr-3">
                                    <i class="fas fa-calendar-check text-[#2C1C11] text-xl"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Jumlah Pengadu</p>
                                    <p class="text-xl font-bold text-[#2C1C11]">{{ $todayRegistrationsCount }}</p>
                                </div>
                            </div>
                        @else
                            <div class="flex-grow flex items-center justify-center">
                                <p class="text-sm text-gray-500">Tidak ada janji temu yang dijadwalkan</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Row -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <!-- Monthly Registration Chart -->
            <div class="bg-white rounded-lg shadow-md p-6 w-full">
                <h2 class="text-lg font-semibold text-[#2C1C11] mb-4">Statistik Pengadu Bulanan</h2>
                <div class="h-64">
                    <canvas id="monthlyRegistrationChart"></canvas>
                </div>
            </div>

            <!-- Status Distribution Chart -->
            <div class="bg-white rounded-lg shadow-md p-6 w-full">
                <h2 class="text-lg font-semibold text-[#2C1C11] mb-4">Status Pengaduan</h2>
                <div class="h-64 flex items-center justify-center">
                    <canvas id="statusDistributionChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Additional Dashboard Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <!-- System Info -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-lg font-semibold text-[#2C1C11] mb-4">Informasi Sistem</h2>
                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span class="text-black">Versi Aplikasi:</span>
                        <span class="font-medium text-black">1.0.0</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-black">PHP Version:</span>
                        <span class="font-medium text-black">{{ phpversion() }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-black">Laravel Version:</span>
                        <span class="font-medium text-black">{{ app()->version() }}</span>
                    </div>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-lg font-semibold text-[#2C1C11] mb-4">Tautan Cepat</h2>
                <!-- Use CSS media queries for the most reliable solution -->
                <style>
                    @media (max-width: 375px) {
                        .quick-links-grid {
                            grid-template-columns: 1fr !important;
                        }
                    }
                </style>
                <div class="quick-links-grid grid grid-cols-2 gap-3">
                    <a href="{{ route('admin.complaints') }}"
                        class="flex items-center p-3 bg-[#2C1C11]/5 rounded-lg hover:bg-[#2C1C11]/10 transition">
                        <i class="fas fa-clipboard-list mr-2 text-[#2C1C11]"></i>
                        <span class="text-sm text-black">Kelola Pengaduan</span>
                    </a>
                    <a href="{{ route('admin.complaints') }}?status=process"
                        class="flex items-center p-3 bg-[#9A7B7B]/5 rounded-lg hover:bg-[#9A7B7B]/10 transition">
                        <i class="fas fa-search mr-2 text-[#9A7B7B]"></i>
                        <span class="text-sm text-black">Pengaduan Proses</span>
                    </a>
                    <a href="{{ route('admin.profile') }}"
                        class="flex items-center p-3 bg-[#2C1C11]/5 rounded-lg hover:bg-[#2C1C11]/10 transition">
                        <i class="fas fa-user-cog mr-2 text-[#2C1C11]"></i>
                        <span class="text-sm text-black">Pengaturan Profil</span>
                    </a>
                    <a href="{{ route('admin.complaints') }}?status=done"
                        class="flex items-center p-3 bg-[#9A7B7B]/5 rounded-lg hover:bg-[#9A7B7B]/10 transition">
                        <i class="fas fa-check-circle mr-2 text-[#9A7B7B]"></i>
                        <span class="text-sm text-black">Pengaduan Selesai</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Monthly Registration Chart (keep your existing code)
            const ctxMonthly = document.getElementById('monthlyRegistrationChart').getContext('2d');
            const monthlyData = @json($monthlyStats);
            const months = Object.keys(monthlyData);
            const counts = Object.values(monthlyData);

            // Create the monthly chart
            new Chart(ctxMonthly, {
                type: 'bar',
                data: {
                    labels: months,
                    datasets: [{
                        label: 'Jumlah Pengadu',
                        data: counts,
                        backgroundColor: 'rgba(154, 123, 123, 0.7)',
                        borderColor: '#2C1C11',
                        borderWidth: 1,
                        borderRadius: 4,
                        hoverBackgroundColor: '#2C1C11',
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            backgroundColor: 'rgba(44, 28, 17, 0.8)',
                            titleFont: {
                                family: 'Poppins'
                            },
                            bodyFont: {
                                family: 'Poppins'
                            },
                            callbacks: {
                                label: function(context) {
                                    return context.parsed.y + ' pengadu';
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                precision: 0,
                                font: {
                                    family: 'Poppins'
                                }
                            },
                            grid: {
                                display: true,
                                color: 'rgba(0, 0, 0, 0.05)'
                            }
                        },
                        x: {
                            ticks: {
                                font: {
                                    family: 'Poppins',
                                    size: 10
                                },
                                maxRotation: 45,
                                minRotation: 45
                            },
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });

            // Status Distribution Pie Chart
            const ctxStatus = document.getElementById('statusDistributionChart').getContext('2d');

            // Create the status distribution chart
            new Chart(ctxStatus, {
                type: 'pie',
                data: {
                    labels: ['Selesai', 'Dalam Proses'],
                    datasets: [{
                        data: [{{ $doneCount }}, {{ $processCount }}],
                        backgroundColor: [
                            'rgba(72, 187, 120, 0.7)', // Green for completed
                            'rgba(237, 137, 54, 0.7)' // Yellow/Orange for in process
                        ],
                        borderColor: [
                            '#2F855A',
                            '#C05621'
                        ],
                        borderWidth: 1,
                        hoverOffset: 4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                font: {
                                    family: 'Poppins'
                                },
                                usePointStyle: true,
                                padding: 20
                            }
                        },
                        tooltip: {
                            backgroundColor: 'rgba(44, 28, 17, 0.8)',
                            titleFont: {
                                family: 'Poppins'
                            },
                            bodyFont: {
                                family: 'Poppins'
                            },
                            callbacks: {
                                label: function(context) {
                                    const total = {{ $totalRegistrations }};
                                    const value = context.raw;
                                    const percentage = total > 0 ? Math.round((value / total) * 100) :
                                        0;
                                    return `${value} pengaduan (${percentage}%)`;
                                }
                            }
                        }
                    }
                }
            });
        });
    </script>
@endsection

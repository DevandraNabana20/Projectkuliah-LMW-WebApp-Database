<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Set locale for Indonesian date
        Carbon::setLocale('id');

        // Get total registrations count
        $totalRegistrations = Registration::count();

        // Get gender counts
        $genderCounts = Registration::select('gender', DB::raw('count(*) as total'))
            ->groupBy('gender')
            ->pluck('total', 'gender')
            ->toArray();

        // Set default values if no data exists
        $maleCount = $genderCounts['laki-laki'] ?? 0;
        $femaleCount = $genderCounts['perempuan'] ?? 0;

        // Get counts by status
        $processCount = Registration::where('status', 'process')->count();
        $doneCount = Registration::where('status', 'done')->count();

        // Get 5 most recent registrations
        $recentRegistrations = Registration::orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        // Get today's registrations count
        $today = Carbon::today()->format('Y-m-d');
        $todayRegistrationsCount = Registration::whereDate('tanggal_reservasi', $today)->count();

        // Get monthly registration counts for the past year - FIXED FOR SQLITE
        $yearAgo = Carbon::now()->subYear();

        // Use database-agnostic date extraction approach
        $connection = config('database.default');

        if ($connection === 'sqlite') {
            // For SQLite, use strftime
            $monthlyData = Registration::where('tanggal_reservasi', '>=', $yearAgo)
                ->select(
                    DB::raw("strftime('%m', tanggal_reservasi) as month"),
                    DB::raw("strftime('%Y', tanggal_reservasi) as year"),
                    DB::raw('count(*) as total')
                )
                ->groupBy('year', 'month')
                ->orderBy('year')
                ->orderBy('month')
                ->get();
        } else {
            // For MySQL and others
            $monthlyData = Registration::where('tanggal_reservasi', '>=', $yearAgo)
                ->select(
                    DB::raw('MONTH(tanggal_reservasi) as month'),
                    DB::raw('YEAR(tanggal_reservasi) as year'),
                    DB::raw('count(*) as total')
                )
                ->groupBy('year', 'month')
                ->orderBy('year')
                ->orderBy('month')
                ->get();
        }

        // Format the data for the chart
        $monthlyStats = [];
        $monthNames = [
            'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        ];

        // Initialize all months with zero counts
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        for ($i = 0; $i < 12; $i++) {
            $month = ($currentMonth - $i) <= 0 ? ($currentMonth - $i + 12) : ($currentMonth - $i);
            $year = ($currentMonth - $i) <= 0 ? ($currentYear - 1) : $currentYear;

            $monthIndex = $month - 1; // 0-based indexing for month names
            $monthlyStats[$monthNames[$monthIndex]] = 0;
        }

        // Fill in actual values from database
        foreach ($monthlyData as $data) {
            $monthIndex = (int)$data->month - 1; // Cast to integer for SQLite compatibility
            if ($monthIndex >= 0 && $monthIndex < 12) {
                $monthlyStats[$monthNames[$monthIndex]] = $data->total;
            }
        }

        // Reverse to show chronological order
        $monthlyStats = array_reverse($monthlyStats);

        return view('admin.dashboard', compact(
            'totalRegistrations',
            'maleCount',
            'femaleCount',
            'processCount',
            'doneCount',
            'recentRegistrations',
            'todayRegistrationsCount',
            'monthlyStats'
        ));
    }
}

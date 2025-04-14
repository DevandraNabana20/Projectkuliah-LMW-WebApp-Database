<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class RegistrasiController extends Controller
{
    public function showRegistrationForm()
    {
        return view('registrasi');
    }

    public function processRegistration(Request $request)
    {
        // Validate the request including date format
        $validated = $request->validate([
            'nama' => 'required|string|min:3',
            'nik' => 'required|string|size:16',
            'kontak' => 'required|string|min:10|max:13',
            'gender' => 'required|string|in:laki-laki,perempuan',
            'email' => 'nullable|email',
            'topik' => 'required|string|min:10|max:100',
            'needsCompanion' => 'nullable|boolean',
            'companion' => 'nullable|string',
            'selectedDate' => 'required|date_format:Y-m-d',
            'selectedTime' => 'required|in:09:00,10:00,11:00',
        ]);

        // Create registration with explicit date handling
        $registration = new Registration();
        $registration->nama = $validated['nama'];
        $registration->nik = $validated['nik'];
        $registration->kontak = $validated['kontak'];
        $registration->gender = $validated['gender'];
        $registration->email = $validated['email'];
        $registration->topik = $validated['topik'];
        $registration->needs_companion = isset($validated['needsCompanion']) && $validated['needsCompanion'] ? true : false;
        $registration->companion = $validated['companion'] ?? null;
        $registration->tanggal_reservasi = $validated['selectedDate'];
        $registration->waktu_reservasi = $validated['selectedTime'];
        $registration->status = 'process'; // Set default status to 'process'
        $registration->save();

        // Redirect to success page with session data
        return redirect()->route('berhasil-registrasi', [
            'id' => $registration->id,
        ]);
    }

    public function showSuccessPage(Request $request, $id)
    {
        // Find the registration
        $registration = Registration::findOrFail($id);

        // Set locale to Indonesian and format the date
        $dateObject = Carbon::parse($registration->tanggal_reservasi);
        $dateObject->locale('id');
        $formattedDate = $dateObject->translatedFormat('l, d F Y');

        // Pass data to view
        return view('berhasil-registrasi', [
            'registration_id' => $registration->id,
            'nama' => $registration->nama,
            'nik' => $registration->nik,
            'kontak' => $registration->kontak,
            'email' => $registration->email,
            'gender' => $registration->gender,
            'topik' => $registration->topik,
            'needs_companion' => $registration->needs_companion,
            'companion' => $registration->companion,
            'tanggal_reservasi' => $formattedDate,
            'waktu_reservasi' => $registration->waktu_reservasi,
        ]);
    }

    public function downloadPdf($id)
    {
        // Find the registration
        $registration = Registration::findOrFail($id);

        // Set locale to Indonesian and format the date
        $dateObject = Carbon::parse($registration->tanggal_reservasi);
        $dateObject->locale('id');
        $formattedDate = $dateObject->translatedFormat('l, d F Y');

        // Create PDF
        $data = [
            'nama' => $registration->nama,
            'nik' => $registration->nik,
            'kontak' => $registration->kontak,
            'email' => $registration->email,
            'gender' => $registration->gender,
            'topik' => $registration->topik,
            'needs_companion' => $registration->needs_companion,
            'companion' => $registration->companion,
            'tanggal_reservasi' => $formattedDate,
            'waktu_reservasi' => $registration->waktu_reservasi,
        ];

        $pdf = PDF::loadView('pdf.bukti-registrasi', $data);

        // Download the PDF with a specific filename
        return $pdf->download("Lapor Mas Wapres - {$registration->nama}_{$registration->nik}.pdf");
    }

    public function checkDateAvailability($date)
    {
        // Validate date format to ensure it's correctly formatted as Y-m-d
        if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)) {
            return response()->json([
                'error' => 'Invalid date format',
                'totalCount' => 0,
                'totalAvailable' => 50,
                'isFull' => false,
                'slots' => [
                    '09:00' => ['count' => 0, 'available' => 20, 'isFull' => false],
                    '10:00' => ['count' => 0, 'available' => 20, 'isFull' => false],
                    '11:00' => ['count' => 0, 'available' => 10, 'isFull' => false]
                ]
            ], 400);
        }

        // Get counts for each time slot with explicit date comparison
        $counts = [
            '09:00' => Registration::whereDate('tanggal_reservasi', '=', $date)
                ->where('waktu_reservasi', '=', '09:00')
                ->count(),
            '10:00' => Registration::whereDate('tanggal_reservasi', '=', $date)
                ->where('waktu_reservasi', '=', '10:00')
                ->count(),
            '11:00' => Registration::whereDate('tanggal_reservasi', '=', $date)
                ->where('waktu_reservasi', '=', '11:00')
                ->count(),
        ];

        // Calculate total registrations for this date
        $totalCount = array_sum($counts);

        // Calculate availability for each slot
        $slots = [
            '09:00' => [
                'quota' => 20,
                'count' => $counts['09:00'],
                'available' => 20 - $counts['09:00'],
                'isFull' => $counts['09:00'] >= 20
            ],
            '10:00' => [
                'quota' => 20,
                'count' => $counts['10:00'],
                'available' => 20 - $counts['10:00'],
                'isFull' => $counts['10:00'] >= 20
            ],
            '11:00' => [
                'quota' => 10,
                'count' => $counts['11:00'],
                'available' => 10 - $counts['11:00'],
                'isFull' => $counts['11:00'] >= 10
            ],
        ];

        return response()->json([
            'totalCount' => $totalCount,
            'totalAvailable' => 50 - $totalCount,
            'isFull' => $totalCount >= 50,
            'slots' => $slots
        ]);
    }
}

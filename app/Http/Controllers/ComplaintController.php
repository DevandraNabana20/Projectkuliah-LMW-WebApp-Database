<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Cloudinary\Cloudinary;

class ComplaintController extends Controller
{
    /**
     * Display a listing of all complaints with filtering and pagination.
     */
    public function index(Request $request)
    {
        $query = Registration::query();

        // Filter by ID
        if ($request->has('id') && !empty($request->id)) {
            $query->where('id', $request->id);
        }

        // Filter by status
        if ($request->has('status') && !empty($request->status)) {
            $query->where('status', $request->status);
        }

        // Filter by gender
        if ($request->has('gender') && !empty($request->gender)) {
            $query->where('gender', $request->gender);
        }

        // Filter by date
        if ($request->has('date') && !empty($request->date)) {
            $query->whereDate('tanggal_reservasi', $request->date);
        }

        // Filter by search term (name or topic)
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('nama', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('topik', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('nik', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('email', 'LIKE', "%{$searchTerm}%");
            });
        }

        // Order by latest by default
        $query->orderBy('created_at', 'desc');

        // Paginate results (5 per page)
        $complaints = $query->paginate(5)->appends(request()->query());

        return view('admin.complaints.index', compact('complaints'));
    }

    /**
     * Show complaint details.
     */
    public function show($id)
    {
        $complaint = Registration::findOrFail($id);
        return view('admin.complaints.show', compact('complaint'));
    }

    /**
     * Show the form for creating a new complaint.
     */
    public function create()
    {
        return view('admin.complaints.add');
    }

    /**
     * Show the form for editing the specified complaint.
     */
    public function edit($id)
    {
        $complaint = Registration::findOrFail($id);
        return view('admin.complaints.edit', compact('complaint'));
    }

    /**
     * Store a newly created complaint in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|size:16',
            'gender' => 'required|in:laki-laki,perempuan',
            'email' => 'nullable|email|max:255',
            'no_hp' => 'required|string|min:10|max:13',
            'alamat' => 'nullable|string',
            'topik' => 'required|string|max:255',
            'detail_pengaduan' => 'nullable|string',
            'tanggal_reservasi' => 'required|date',
            'waktu_reservasi' => 'required|in:09:00,10:00,11:00',
            'status' => 'required|in:process,done',
            'companion' => 'nullable|string|max:255',
            'file_pendukung' => 'nullable|file|max:4096|mimes:pdf,zip,rar,jpg,jpeg,png,gif,bmp,webp' // 4MB limit
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('admin.add-complaint')
                ->withErrors($validator)
                ->withInput();
        }

        // Cari ID terendah yang tersedia
        $nextId = $this->findLowestAvailableId();

        // Buat record baru dengan ID spesifik
        $complaint = new Registration();
        $complaint->id = $nextId; // Tetapkan ID secara manual
        $complaint->nama = $request->nama;
        $complaint->nik = $request->nik;
        $complaint->kontak = $request->no_hp;
        $complaint->gender = $request->gender;
        $complaint->email = $request->email;
        $complaint->topik = $request->topik;
        $complaint->companion = $request->companion;
        $complaint->tanggal_reservasi = $request->tanggal_reservasi;
        $complaint->waktu_reservasi = $request->waktu_reservasi;
        $complaint->status = $request->status;
        $complaint->alamat = $request->alamat;
        $complaint->detail_pengaduan = $request->detail_pengaduan;
        $complaint->needs_companion = !empty($request->companion);

        // Upload file jika ada
        if ($request->hasFile('file_pendukung')) {
            $file = $request->file('file_pendukung');
            $fileName = time() . '_' . $file->getClientOriginalName();

            // Upload ke Cloudinary
            $cloudinary = app('cloudinary')->uploadApi();
            $result = $cloudinary->upload($file->getRealPath(), [
                'folder' => 'lapor_mas_wapres/files',
                'resource_type' => 'auto', // Auto-detect file type
                'public_id' => $nextId . '_' . pathinfo($fileName, PATHINFO_FILENAME)
            ]);

            // Simpan URL dan nama file
            $complaint->file_url = $result['secure_url'];
            $complaint->file_name = $fileName;
        }

        $complaint->save();

        return redirect()
            ->route('admin.complaints')
            ->with('success', 'Pengaduan berhasil ditambahkan.');
    }

    /**
     * Find the lowest available ID by checking for gaps
     */
    private function findLowestAvailableId()
    {
        // Get all IDs in ascending order
        $ids = Registration::orderBy('id')->pluck('id')->toArray();

        // Start from 1 and find the first gap
        $counter = 1;

        foreach ($ids as $id) {
            if ($counter < $id) {
                // Found a gap
                return $counter;
            }
            $counter++;
        }

        // If no gaps, return next ID
        return $counter;
    }

    /**
     * Update the specified complaint in storage.
     */
    public function update(Request $request, $id)
    {
        $complaint = Registration::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|size:16',
            'gender' => 'required|in:laki-laki,perempuan',
            'email' => 'nullable|email|max:255',
            'no_hp' => 'required|string|min:10|max:13',
            'alamat' => 'nullable|string',
            'topik' => 'required|string|max:255',
            'detail_pengaduan' => 'nullable|string',
            'tanggal_reservasi' => 'required|date',
            /*    'waktu_reservasi' => 'required|in:09:00,10:00,11:00', */
            'status' => 'required|in:process,done',
            'companion' => 'nullable|string|max:255',
            'file_pendukung' => 'nullable|file|max:4096|mimes:pdf,zip,rar,jpg,jpeg,png,gif,bmp,webp'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('admin.complaints.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        // Upload file baru jika ada
        if ($request->hasFile('file_pendukung')) {
            // Hapus file lama di Cloudinary jika ada
            if ($complaint->file_url) {
                $publicId = $this->getPublicIdFromUrl($complaint->file_url);
                if ($publicId) {
                    app('cloudinary')->uploadApi()->destroy($publicId);
                }
            }

            $file = $request->file('file_pendukung');
            $fileName = time() . '_' . $file->getClientOriginalName();

            // Upload ke Cloudinary
            $cloudinary = app('cloudinary')->uploadApi();
            $result = $cloudinary->upload($file->getRealPath(), [
                'folder' => 'lapor_mas_wapres/files',
                'resource_type' => 'auto',
                'public_id' => $id . '_' . pathinfo($fileName, PATHINFO_FILENAME)
            ]);

            // Update langsung nilai file_url dan file_name
            $complaint->file_url = $result['secure_url'];
            $complaint->file_name = $fileName;
            $complaint->save();
        }

        // Update informasi complaint lainnya
        $complaint->nama = $request->nama;
        $complaint->nik = $request->nik;
        $complaint->kontak = $request->no_hp;
        $complaint->gender = $request->gender;
        $complaint->email = $request->email;
        $complaint->topik = $request->topik;
        $complaint->companion = $request->companion;
        $complaint->tanggal_reservasi = $request->tanggal_reservasi;
        /* $complaint->waktu_reservasi = $request->waktu_reservasi; */
        $complaint->status = $request->status;
        $complaint->alamat = $request->alamat;
        $complaint->detail_pengaduan = $request->detail_pengaduan;
        $complaint->needs_companion = !empty($request->companion);
        $complaint->save();

        return redirect()
            ->route('admin.complaints')
            ->with('success', 'Pengaduan berhasil diperbarui.');
    }

    // Helper method untuk mendapatkan public_id dari URL Cloudinary
    private function getPublicIdFromUrl($url)
    {
        if (strpos($url, 'cloudinary.com') !== false) {
            $parts = explode('/', $url);
            $filename = end($parts);
            // Hapus parameter query string jika ada
            $filename = explode('?', $filename)[0];
            $publicId = 'lapor_mas_wapres/files/' . pathinfo($filename, PATHINFO_FILENAME);
            return $publicId;
        }
        return null;
    }

    public function updateStatus(Request $request, $id)
    {
        $complaint = Registration::findOrFail($id);

        $validated = $request->validate([
            'status' => 'required|in:process,done',
        ]);

        $complaint->status = $request->status;
        $complaint->save();

        // This is the key part - redirecting back to the show page with a success message
        return redirect()
            ->route('admin.complaints.show', $id)
            ->with('success', 'Status pengaduan berhasil diperbarui.');
    }

    /**
     * Remove the specified complaint from storage.
     */
    public function destroy($id)
    {
        $complaint = Registration::findOrFail($id);
        $complaint->delete();

        return redirect()
            ->route('admin.complaints')
            ->with('success', 'Pengaduan berhasil dihapus.');
    }
}

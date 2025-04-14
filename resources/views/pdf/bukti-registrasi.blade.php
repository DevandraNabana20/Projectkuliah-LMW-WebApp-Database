<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bukti Registrasi Tatap Muka - Lapor Mas Wapres</title>
    <style>
        @page {
            margin: 2cm;
        }
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            font-size: 14px;
        }
        .header-container {
            width: 100%;
            margin-bottom: 20px; /* Reduced from 30px */
            text-align: center;
        }
        .header-table {
            width: auto;
            margin: 0 auto;
            border-collapse: collapse;
        }
        .logo-cell {
            vertical-align: middle;
            padding-right: 15px;
        }
        .title-cell {
            vertical-align: middle;
            padding-left: 15px;
        }
        .logo {
            width: 120px;
            height: auto;
        }
        .title {
            font-size: 24px;
            font-weight: bold;
        }
        .divider {
            border-top: 1px solid #ccc;
            margin: 15px 0; /* Reduced from 20px */
        }
        .content {
            margin-bottom: 20px; /* Reduced from 30px */
        }
        .detail-container {
            width: 80%;
            margin: 0 auto;
        }
        .row {
            margin-bottom: 8px; /* Reduced from 12px */
            text-align: center;
        }
        .label {
            font-weight: bold;
            font-size: 15px;
            margin-bottom: 3px;
        }
        .value {
            font-size: 15px;
        }
        .notes {
            margin: 20px 0; /* Reduced from 30px */
            padding: 12px; /* Reduced from 15px */
            background-color: #f8f8f8;
            border-left: 4px solid #ccc;
        }
        .notes h3 {
            margin-top: 0;
            margin-bottom: 6px; /* Added to reduce space */
            font-size: 16px;
        }
        .notes ul {
            padding-left: 20px;
            margin-bottom: 0;
        }
        .notes li {
            margin-bottom: 5px; /* Reduced from 8px */
        }
        .footer {
            text-align: center;
            font-size: 12px;
            margin-top: 30px; /* Reduced from 50px */
            color: #666;
        }

        /* Rules page styles - more compact */
        .rules-title {
            font-size: 18px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 15px;
        }
        .section-title {
            font-size: 16px;
            font-weight: bold;
            margin-top: 15px;
            margin-bottom: 8px;
        }
        ol {
            padding-left: 20px;
            margin-top: 5px;
            margin-bottom: 5px;
        }
        ol li {
            margin-bottom: 5px;
        }
        ul {
            padding-left: 20px;
            margin-top: 3px;
            margin-bottom: 3px;
        }
        ul li {
            margin-bottom: 3px;
        }
        .qrcode {
            text-align: center;
            margin-top: 20px;
        }
        .qrcode img {
            width: 120px;
        }
        /* Ensure page break works correctly */
        .page-break {
            page-break-before: always;
            margin-top: 0;
            padding-top: 0;
        }
    </style>
</head>
<body>
    <!-- Page 1: Registration Receipt -->
    <div class="header-container">
        <table class="header-table">
            <tr>
                <td class="logo-cell">
                    <img class="logo" src="{{ public_path('assets/images/LaporMasWapres.png') }}" alt="Logo Lapor Mas Wapres">
                </td>
                <td class="title-cell">
                    <div class="title">BUKTI REGISTRASI TATAP MUKA</div>
                </td>
            </tr>
        </table>
    </div>

    <div class="divider"></div>

    <div class="content">
        <div class="detail-container">
            <div class="row">
                <div class="label">Nama Lengkap:</div>
                <div class="value">{{ $nama }}</div>
            </div>

            <div class="row">
                <div class="label">NIK:</div>
                <div class="value">{{ $nik }}</div>
            </div>

            <div class="row">
                <div class="label">Nomor Kontak:</div>
                <div class="value">{{ $kontak }}</div>
            </div>

            <div class="row">
                <div class="label">Email:</div>
                <div class="value">{{ $email ?: '-' }}</div>
            </div>

            <div class="row">
                <div class="label">Jenis Kelamin:</div>
                <div class="value">{{ ucfirst($gender) }}</div>
            </div>

            <div class="row">
                <div class="label">Topik Aduan:</div>
                <div class="value">{{ $topik }}</div>
            </div>

            <div class="row">
                <div class="label">Waktu dan Tanggal Reservasi:</div>
                <div class="value">{{ $tanggal_reservasi }} , Jam {{ $waktu_reservasi }}</div>
                <div style="font-size: 13px; color: #666; text-align: center;">Asia/Jakarta</div>
            </div>

            @if($needs_companion)
            <div class="row">
                <div class="label">Nama Pendamping:</div>
                <div class="value">{{ $companion ?? '-' }}</div>
            </div>
            @endif
        </div>

        <div class="notes">
            <h3>Catatan:</h3>
            <ul>
                <li>Mohon hadir sesuai waktu reservasi yang Anda pilih.</li>
                <li>Tunjukkan bukti registrasi online ini kepada petugas.</li>
                <li>Siapkan dokumen pendukung yang relevan dengan pengaduan Anda.</li>
                <li>Jika tidak hadir pada waktu yang ditentukan, reservasi akan dibatalkan.</li>
            </ul>
        </div>
    </div>

    <div class="divider"></div>

    <div class="footer">
        <p>Dokumen ini merupakan bukti registrasi resmi Lapor Mas Wapres.</p>
        <p>Dicetak pada: {{ now()->timezone('Asia/Jakarta')->locale('id')->isoFormat('D MMMM Y, HH:mm') }} WIB</p>
    </div>

    <!-- Page Break - modified to ensure proper break -->
    <div class="page-break"></div>

    <!-- Page 2: Terms and Conditions - More compact -->
    <div class="rules-title">Tata Tertib Pelayanan Program Lapor Mas Wapres!</div>

    <div class="divider"></div>

    <!-- All sections combined more compactly -->
    <div>
        <div class="section-title">A. KETENTUAN UMUM</div>
        <ol>
            <li>Pelayanan program Lapor Mas Wapres! diselenggarakan di Kantor Sekretariat Wakil Presiden, Jalan Kebon Sirih No. 14, Jakarta Pusat, pada hari kerja:
                <ul>
                    <li>Senin s.d. Kamis, 08.00-14.00 WIB (istirahat 12.00-13.00 WIB)</li>
                    <li>Jumat, 08.00-14.30 WIB (istirahat 11.00-13.30 WIB)</li>
                </ul>
            </li>
            <li>Pelapor memakai pakaian bebas rapi.</li>
            <li>Pelapor wajib membawa kartu identitas (KTP/SIM/Identitas lain yang tercantum NIK).</li>
            <li>Pengaduan yang dilayani berjumlah maksimal 50 orang/hari.</li>
        </ol>

        <div class="section-title">B. KETENTUAN PENGADUAN</div>
        <ol>
            <li>Pelapor adalah orang yang langsung mengalami kejadian. Apabila pelapor bukan yang mengalami kejadian langsung, maka pelapor harus membawa surat kuasa bermaterai.</li>
            <li>Substansi aduan tidak sedang atau telah menjadi objek peradilan.</li>
            <li>Substansi aduan belum pernah disampaikan oleh pelapor kepada Wakil Presiden.</li>
            <li>Pelapor wajib membawa dokumen pendukung pengaduan yang lengkap dan relevan.</li>
            <li>Petugas memverifikasi dokumen pengaduan. Dokumen tidak lengkap akan diminta dikirim via email.</li>
        </ol>

        <div class="section-title">C. REGISTRASI DAN PROSES PENGADUAN</div>
        <ol>
            <li>Pelapor melakukan registrasi secara online melalui lapormaswapres.id</li>
            <li>Pelapor yang telah berhasil melakukan registrasi online, harap hadir sesuai tanggal yang dipilih.</li>
            <li>Pelapor menunggu di ruang tunggu yang telah disediakan.</li>
            <li>Petugas memverifikasi dan memberikan nomor antrian pengaduan.</li>
            <li>Petugas mempersilahkan pelapor ke Ruang Pengaduan berdasarkan nomor antrian.</li>
        </ol>

        <div class="section-title">D. HAL-HAL LAIN</div>
        <ol>
            <li>Pelapor menghormati tata tertib yang berlaku, menjaga etika dan kesopanan selama berada di lingkungan Sekretariat Wakil Presiden.</li>
            <li>Pelapor dilarang mengambil gambar/video dan membuat konten selama proses pelaporan.</li>
            <li>Pelapor harus menaati seluruh ketentuan dalam Tata Tertib Lapor Mas Wapres! dan ketentuan lain yang ditetapkan di kemudian hari.</li>
        </ol>
    </div>

    <div class="footer">
        <p>Email: lapormaswapres@set.wapresri.go.id | Website: lapormaswapres.id</p>
    </div>
</body>
</html>
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nik',
        'kontak',
        'gender',
        'email',
        'topik',
        'needs_companion',
        'companion',
        'tanggal_reservasi',
        'waktu_reservasi',
        'status',
        'alamat',         // Add this
        'detail_pengaduan' // Add this
    ];

    protected $casts = [
        'needs_companion' => 'boolean',
        'tanggal_reservasi' => 'date',
    ];
}

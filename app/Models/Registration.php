<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    // Add these lines to enable manual ID setting
    public $incrementing = false;

    protected $fillable = [
        'id', // Add this line to allow setting ID
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
        'alamat',
        'detail_pengaduan'
    ];

    protected $casts = [
        'needs_companion' => 'boolean',
        'tanggal_reservasi' => 'date',
    ];
}

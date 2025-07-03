<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'tbl_lokasi';

    // Primary key
    protected $primaryKey = 'id_lok';

    // Aktifkan timestamps
    public $timestamps = true;

    // Tidak gunakan kolom updated_at (jika tidak diperlukan)
    const UPDATED_AT = null;

    // Kolom yang bisa diisi massal
    protected $fillable = [
        'nama',
        'status',
        'ket',
    ];

    // Casting tipe data kolom status ke boolean
    protected $casts = [
        'status' => 'boolean',
    ];
}

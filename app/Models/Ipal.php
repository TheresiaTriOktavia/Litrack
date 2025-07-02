<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IPAL extends Model
{
    use HasFactory;

    protected $table = 'tbl_ipal'; // pastikan ini sesuai nama tabel kamu
    protected $primaryKey = 'id_ipal';

    public $timestamps = false; // karena created_at & updated_at NULL

    protected $fillable = [
        'nama',
        'lokasi',
        'status',
        'ket',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    // Relasi ke RegDev
    public function regdev()
    {
        return $this->hasMany(RegDev::class, 'id_ipal', 'id_ipal');
    }
}

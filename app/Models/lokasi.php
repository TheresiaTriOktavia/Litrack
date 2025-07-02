<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    use HasFactory;

    protected $table = 'tbl_lokasi'; // sesuaikan nama tabel
    protected $primaryKey = 'id_lok';

    public $timestamps = false;

    protected $fillable = [
        'nama_lok',
        'status',
        'ket',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    // Relasi ke RegDev
    public function regdev()
    {
        return $this->hasMany(RegDev::class, 'id_lok', 'id_lok');
    }
}

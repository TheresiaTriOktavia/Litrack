<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegDev extends Model
{
    use HasFactory;

    protected $table = 'tbl_regdev';
    protected $primaryKey = 'id_rd';
    public $timestamps = false;
    const UPDATED_AT = null;

    protected $fillable = [
        'nama_rd',
        'id_regDev',
        'id_dev',
        'id_ipal',
        'id_lok',
        'status',
        'ket',
    ];
    // Relasi ke Device
    public function device()
    {
        return $this->belongsTo(Device::class, 'id_dev', 'id_dev');
    }

    public function ipal()
    {
        return $this->belongsTo(Ipal::class, 'id_ipal', 'id_ipal');
    }

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'id_lok', 'id_lok');
    }
}

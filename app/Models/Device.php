<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;
    protected $table = 'tbl_device';
    protected $primaryKey = 'id_dev';

    public $timestamps = true;
    const UPDATED_AT = null;

    /**
     * Kolom yang boleh diisi melalui mass assignment.
     */
    protected $fillable = [
        'nama_dev',
        'status',
        'ket',
    ];

    /**
     * Konversi tipe data otomatis.
     */
    protected $casts = [
        'status' => 'boolean',
    ];
}

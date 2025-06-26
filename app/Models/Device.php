<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    protected $table = 'tbl_device';
    protected $primaryKey = 'id_dev';
    // protected $timestamps;


    protected $fillable = [
        'nama_dev',
        'status',
        'ket',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    
}
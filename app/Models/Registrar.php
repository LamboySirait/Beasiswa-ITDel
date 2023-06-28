<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registrar extends Model
{
    protected $table = 'registrar';
    protected $primaryKey = 'id';
    protected $fillable = [
        // Existing columns...
        'ktm', 'ktp', 'transkrip', 'suratPernyataan', 'lainnya',
        'ktm_filename', 'ktp_filename', 'transkrip_filename', 'suratPernyataan_filename', 'lainnya_filename',
        'created_at', 'updated_at', 'status_beasiswa', 'catatan'
    ];
}
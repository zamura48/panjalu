<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_LayananKejari extends Model
{
    use HasFactory;
    protected $table = 'pelayanan_kejari';
    protected $fillable = [
        'nama_lengkap',
        'email',
        'nohp',
        'alamat',
        'judul_pengaduan',
        'detail_masalah',
        'ktp'
    ];
}

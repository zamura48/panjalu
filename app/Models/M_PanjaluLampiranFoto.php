<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_PanjaluLampiranFoto extends Model
{
    use HasFactory;
    protected $table = 'panjalu_lampiran_foto';
    protected $primaryKey = 'id';
    protected $fillable = array('noregistrasi','filename','created_at','updated_at');
}

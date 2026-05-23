<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerima extends Model
{
    use HasFactory;

    protected $fillable = [
        'tahun',
        'kecamatan',
        'kelurahan',
        'jumlah_pkh',
        'jumlah_bpnt',
        'jumlah_keluarga',
    ];
}

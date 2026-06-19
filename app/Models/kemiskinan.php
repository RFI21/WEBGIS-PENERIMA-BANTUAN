<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kemiskinan extends Model
{
    protected $table = 'kemiskinan';

    protected $fillable = [
        'nama_kecamatan',
        'kelurahan',
        'desil',
        'jumlah_keluarga',
        'jumlah_jiwa',
        'geojson'
    ];
}

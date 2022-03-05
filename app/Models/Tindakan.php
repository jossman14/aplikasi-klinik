<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tindakan extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'tindakan';
    protected $primaryKey  = "id";
    protected $fillable = [
        "nama",
"jenis_tindakan",
"harga_total",
"jasa_dokter",
"jasa_perawat",
"jasa_klinik",
"alat",
"bahan",
"lainnya",

    ];
}

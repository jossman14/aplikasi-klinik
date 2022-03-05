<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DaftarPeriksa extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'daftar_periksa';
    protected $primaryKey  = "id";
    protected $fillable = [
        "waktu_daftar_periksa",
"id_pasien",
"id_dokter",
"id_poli",
"cara_bayar",
"rujukan",
"penanggungjawab",
"no_antrian"

    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SoapDokter extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'soap_dokter';
    protected $primaryKey  = "id";
    protected $fillable = [
        "id_daftar",
        "anamnesa",
        "diagnosa",
        "tindakan",
        "obat",
        "planning",
        "keluar",


    ];
}

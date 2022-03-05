<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SoapPerawat extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'soap_perawat';
    protected $primaryKey  = "id";
    protected $fillable = [
        "id_daftar",
        "anamnesa",
        "systolic",
        "diastolic",
        "nadi",
        "suhu",
        "pernafasan",
        "tinggi",
        "berat",
        "lila",
        "no_file_tracer",

    ];
}

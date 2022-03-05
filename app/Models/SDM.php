<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SDM extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'sdm';
    protected $primaryKey  = "sdm_id";
    protected $fillable = [
        "jenis_kelamin","nama_sdm" ,"alamat_sdm", "desa_sdm_id" ,"kecamatan_sdm_id" ,"kabupaten_sdm_id" ,"provinsi_sdm_id" ,"nik" ,"nomor_hp" ,"jobdesk" ,"tgl_lahir" ,"umur" ,"gol_darah_id" ,"agama_id" ,"isDokter",
        "status_nikah","tempat_lahir"
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Pasien extends Model
{
    use HasFactory;

    use SoftDeletes;
    protected $table = 'pasien';
    protected $fillable = [
        "nama", "alamat_tetap", "desa_tetap_id", "kecamatan_tetap_id", "kabupaten_tetap_id", "provinsi_tetap_id", "nama_keluarga", "nik", "tempat_lahir", "tgl_lahir", "jenis_kelamin", "agamaId", "alamat_sementara", "desa_smt_id", "kecamatan_smt_id", "kabupaten_smt_id", "provinsi_smt_id", "alamat_keluarga", "desa_klg_id", "kecamatan_klg_id", "kabupaten_klg_id", "provinsi_klg_id", "umur", "gol_dar_id", "tgl_reg", "pekerjaan", "nomor_telepon", "nomor_telepon_keluarga", "nomor_bpjs", "created_at", "updated_at", "deleted_at",
    ];

    public function allData(){
        $data = DB::table('pasien')->get();
        return $data;
    }

    public function singleData($id){
        $data = DB::table('pasien')->where("id",'=',$id)->get();
        return $data;
    }
}

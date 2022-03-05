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
        "norm","nama", "alamat_tetap", "desa_tetap_id", "kecamatan_tetap_id", "kabupaten_tetap_id", "provinsi_tetap_id", "nama_keluarga", "nik", "tempat_lahir", "tgl_lahir", "jenis_kelamin", "agamaId", "alamat_sementara", "desa_smt_id", "kecamatan_smt_id", "kabupaten_smt_id", "provinsi_smt_id", "alamat_keluarga", "desa_klg_id", "kecamatan_klg_id", "kabupaten_klg_id", "provinsi_klg_id", "umur", "gol_dar_id", "tgl_reg", "pekerjaan", "nomor_telepon", "nomor_telepon_keluarga", "nomor_bpjs", "created_at", "updated_at", "deleted_at","sapaan","status_nikah",
    ];

    public function allData(){
        // $data = DB::table('pasien')->limit(5)->get();
        $data = DB::table("pasien")->select("pasien.id as pasienId", "pasien.norm", "pasien.nama", "pasien.tgl_lahir", "pasien.umur", "pasien.desa_tetap_id", "villages.id", "villages.name as nama_desa")->join("villages", "villages.id", "=", "pasien.desa_tetap_id")->where("deleted_at","=",null)->latest()->limit(10)->get();

        // dd($data);
        return $data;
    }

    public function cariData($cari){

        // $data = DB::table('pasien')->where([["nama", "LIKE", "%"."Sa"."%"],["norm", "LIKE", "%"."2"."%"]])->get();
        $data = DB::table('pasien')->select("pasien.id as pasienId", "pasien.norm", "pasien.nama", "pasien.tgl_lahir", "pasien.umur", "pasien.desa_tetap_id", "villages.id", "villages.name as nama_desa")->join("villages", "villages.id", "=", "pasien.desa_tetap_id")->where([
            ["norm", "LIKE", "%".$cari["norm"]."%"],
            ["nama", "LIKE", "%".$cari["nama"]."%"],
            ["alamat_tetap", "LIKE", "%".$cari["alamat_tetap"]."%"],
            ["desa_tetap_id", "LIKE", "%".$cari["desa_tetap_id"]."%"],
            ["kecamatan_tetap_id", "LIKE", "%".$cari["kecamatan_tetap_id"]."%"],
            ["kabupaten_tetap_id", "LIKE", "%".$cari["kabupaten_tetap_id"]."%"],
            ["provinsi_tetap_id", "LIKE", "%".$cari["provinsi_tetap_id"]."%"],
            ["nik", "LIKE", "%".$cari["nik"]."%"],
            ["tgl_lahir", "LIKE", "%".$cari["tgl_lahir"]."%"],
            ["jenis_kelamin", "LIKE", "%".$cari["jenis_kelamin"]."%"],
            ["umur", "LIKE", "%".$cari["umur"]."%"],
            ["gol_dar_id", "LIKE", "%".$cari["gol_dar_id"]."%"],
        ])->where("deleted_at","=",null)->orderBy("pasien.tgl_reg","desc")->get();

        // dd($data);
        return $data;
    }

    public function singleData($id){
        $data = DB::table('pasien')->where("id",'=',$id)->where("deleted_at","=",null)->first();
        return $data;
    }

    public function insertData($data){
        $data = DB::table('pasien')->insert($data);
        return $data;
    }

    public function getLatestRM(){
        $data = DB::table('pasien')->select("id")->where("deleted_at","=",null)->latest('id')->first();
        return $data;
    }

    public function deleteData($id){
        $data = DB::table('pasien')->where("id",'=',$id)->delete();
        return $data;
    }

    public function updateData($id, $data){
        $data = DB::table('pasien')->where("id",'=',$id)->update($data);
        return $data;
    }


}

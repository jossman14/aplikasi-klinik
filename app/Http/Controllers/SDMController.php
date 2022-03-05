<?php

namespace App\Http\Controllers;

use App\Models\SDM;
use App\Models\Utils;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SDMController extends Controller
{

    public function __construct()
    {
        $this->utilsModel = new Utils();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            "sdm" => DB::table('sdm')->select("sdm.sdm_id", "sdm.nama_sdm", "sdm.jobdesk", "sdm.nomor_hp", "sdm.desa_sdm_id", "villages.id", "villages.name as nama_desa", "jabatan.nama as nama_jabatan")->join("villages", "villages.id", "=", "sdm.desa_sdm_id")->join("jabatan", "jabatan.id", "=", "sdm.jobdesk")->where("sdm.deleted_at","=",null)->orderBy("sdm.sdm_id","desc")->get(),
            "jenis_kelamin" => DB::table("jenis_kelamin")->where("deleted_at","=",null)->get(),
            "golongan_darah" => DB::table("golongan_darah")->where("deleted_at","=",null)->get(),
            "jabatan" => DB::table("jabatan")->where("deleted_at","=",null)->get(),
            "agama" => DB::table("agama")->where("deleted_at","=",null)->get(),
            "status_nikah" => DB::table("status_nikah")->where("deleted_at","=",null)->get(),
            "keterangan" => "Tabel ini hanya menampilkan 10 data SDM dengan  total data ". "<span class='green white-text p-l-10 p-r-10'>" . DB::table("sdm")->where("deleted_at","=",null)->count() . "</span>",
        ];

        // dd(DB::table('sdm')->get());



        // dd(DB::table("sdm")->select("tgl_reg")->orderBy("tgl_reg","asc")->first()->tgl_reg);


        return view("sdm.index", $data);
    }

        /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response
     */
    public function sdmFilter(Request $request)
    {
        $cari = [

            "nama_sdm" =>$request->nama_sdm == null ? "" : $request->nama_sdm,
            "alamat_sdm" =>$request->alamat_sdm == null ? "" : $request->alamat_sdm,
            "desa_sdm_id" =>$request->desa_sdm_id == null ? "" : $request->desa_sdm_id,
            "kecamatan_sdm_id" =>$request->kecamatan_sdm_id == null ? "" : $request->kecamatan_sdm_id,
            "kabupaten_sdm_id" =>$request->kabupaten_sdm_id == null ? "" : $request->kabupaten_sdm_id,
            "provinsi_sdm_id" =>$request->provinsi_sdm_id == null ? "" : $request->provinsi_sdm_id,
            "nik" =>$request->nik == null ? "" : $request->nik,
            "nomor_hp" =>$request->nomor_hp == null ? "" : $request->nomor_hp,
            "jobdesk" =>$request->jobdesk == null ? "" : $request->jobdesk,
            "tgl_lahir" =>$request->tgl_lahir == null ? "" : $request->tgl_lahir,
            "umur" =>$request->umur == null ? "" : $request->umur,
            "gol_darah_id" =>$request->gol_darah_id == null ? "" : $request->gol_darah_id,
            "agama_id" =>$request->agama_id == null ? "" : $request->agama_id,
            "isDokter" =>$request->isDokter == null ? "" : $request->isDokter,
            "jenis_kelamin" =>$request->jenis_kelamin == null ? "" : $request->jenis_kelamin,
            "status_nikah" =>$request->status_nikah == null ? "" : $request->status_nikah,
            "tempat_lahir" =>$request->tempat_lahir == null ? "" : $request->tempat_lahir,
        ];



        // $cariData = DB::table("sdm")->where("sdm","LIKE", "%". $cari["sdm"]."%")->where("deleted_at","=",null)->get()
        $cariData = DB::table('sdm')->select("sdm.sdm_id", "sdm.nama_sdm", "sdm.jobdesk", "sdm.nomor_hp", "sdm.desa_sdm_id", "villages.id", "villages.name as nama_desa", "jabatan.nama as nama_jabatan")->join("villages", "villages.id", "=", "sdm.desa_sdm_id")->join("jabatan", "jabatan.id", "=", "sdm.jobdesk")->where([
            ["nama_sdm", "LIKE", "%".$cari["nama_sdm"]."%"],
            ["alamat_sdm", "LIKE", "%".$cari["alamat_sdm"]."%"],
            ["desa_sdm_id", "LIKE", "%".$cari["desa_sdm_id"]."%"],
            ["kecamatan_sdm_id", "LIKE", "%".$cari["kecamatan_sdm_id"]."%"],
            ["kabupaten_sdm_id", "LIKE", "%".$cari["kabupaten_sdm_id"]."%"],
            ["provinsi_sdm_id", "LIKE", "%".$cari["provinsi_sdm_id"]."%"],
            ["nik", "LIKE", "%".$cari["nik"]."%"],
            ["nomor_hp", "LIKE", "%".$cari["nomor_hp"]."%"],
            ["jobdesk", "LIKE", "%".$cari["jobdesk"]."%"],
            ["tgl_lahir", "LIKE", "%".$cari["tgl_lahir"]."%"],
            ["umur", "LIKE", "%".$cari["umur"]."%"],
            ["jenis_kelamin", "LIKE", "%".$cari["jenis_kelamin"]."%"],
            ["gol_darah_id", "LIKE", "%".$cari["gol_darah_id"]."%"],
            ["agama_id", "LIKE", "%".$cari["agama_id"]."%"],
            ["isDokter", "LIKE", "%".$cari["isDokter"]."%"],
            ["jenis_kelamin", "LIKE", "%".$cari["jenis_kelamin"]."%"],
            ["status_nikah", "LIKE", "%".$cari["status_nikah"]."%"],
            ["tempat_lahir", "LIKE", "%".$cari["tempat_lahir"]."%"],
        ])->where("sdm.deleted_at","=",null)->orderBy("sdm.created_at","desc")->get();

        $data = [
            "sdm" => $cariData,
            "filter_pencarian" => $cari,
            "jenis_kelamin" => DB::table("jenis_kelamin")->where("deleted_at","=",null)->get(),
            "golongan_darah" => DB::table("golongan_darah")->where("deleted_at","=",null)->get(),
            "jabatan" => DB::table("jabatan")->where("deleted_at","=",null)->get(),
            "agama" => DB::table("agama")->where("deleted_at","=",null)->get(),
            "status_nikah" => DB::table("status_nikah")->where("deleted_at","=",null)->get(),
            "keterangan" => "Tabel menampilkan hasil pencarian " . count($cariData)." data dengan filter pencarian",
        ];

        // return redirect()
        //         ->route('sdm.index');


        return view("sdm.index", $data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $data = [
            "jenis_kelamin" => DB::table("jenis_kelamin")->where("deleted_at","=",null)->get(),
            "golongan_darah" => DB::table("golongan_darah")->where("deleted_at","=",null)->get(),
            "jabatan" => DB::table("jabatan")->where("deleted_at","=",null)->get(),
            "agama" => DB::table("agama")->where("deleted_at","=",null)->get(),
            "status_nikah" => DB::table("status_nikah")->where("deleted_at","=",null)->get(),

        ];
        return view("sdm.create", $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            "nama_sdm" =>$request->nama_sdm,
            "alamat_sdm" =>$request->alamat_sdm,
            "desa_sdm_id" =>$request->desa_sdm_id,
            "kecamatan_sdm_id" =>$request->kecamatan_sdm_id,
            "kabupaten_sdm_id" =>$request->kabupaten_sdm_id,
            "provinsi_sdm_id" =>$request->provinsi_sdm_id,
            "provinsi_sdm_id" =>$request->provinsi_sdm_id,
            "nik" =>$request->nik,
            "nomor_hp" =>$request->nomor_hp,
            "jobdesk" =>$request->jobdesk,
            "tgl_lahir" =>$request->tgl_lahir,
            "umur" =>$request->umur,
            "gol_darah_id" =>$request->gol_darah_id,
            "agama_id" =>$request->agama_id,
            "isDokter" =>$request->isDokter,
            "jenis_kelamin" =>$request->jenis_kelamin,
            "status_nikah" =>$request->status_nikah,
            "tempat_lahir" =>$request->tempat_lahir,

        ];

        // dd($data);

        DB::table('sdm')->insert($data);


        return redirect()
                ->route('sdm.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SDM  $sdm
     * @return \Illuminate\Http\Response
     */
    public function show(SDM $sdm)
    {
        // dd(DB::table("sdm")->join("regencies as r2","r2.id","=","sdm.tempat_lahir")->join("regencies as r1","r1.id","=","sdm.kabupaten_sdm_id")->select("sdm.nama_sdm as nama", "r1.name as kabupaten_asal", "r2.name as tempat_lahir_kabupaten")->where("sdm_id","=",17)->where("sdm.deleted_at","=",null)->orderBy("sdm.sdm_id","desc")->first());


        $singleSDM = DB::table('sdm')->join("regencies as r2","r2.id","=","sdm.tempat_lahir")->join("regencies as r1","r1.id","=","sdm.kabupaten_sdm_id");

        $singleSDM = $singleSDM->join("villages", "villages.id", "=", "sdm.desa_sdm_id");
        $singleSDM = $singleSDM->join("jabatan", "jabatan.id", "=", "sdm.jobdesk");
        $singleSDM = $singleSDM->join("jenis_kelamin", "jenis_kelamin.id", "=", "sdm.jenis_kelamin");
        $singleSDM = $singleSDM->join("districts", "districts.id", "=", "sdm.kecamatan_sdm_id");
        $singleSDM = $singleSDM->join("provinces", "provinces.id", "=", "sdm.provinsi_sdm_id");
        $singleSDM = $singleSDM->join("golongan_darah", "golongan_darah.gol_dar_id", "=", "sdm.gol_darah_id");
        $singleSDM = $singleSDM->join("agama", "agama.agamaId", "=", "sdm.agama_id");
        $singleSDM = $singleSDM->join("status_nikah", "status_nikah.id", "=", "sdm.status_nikah");
        $singleSDM = $singleSDM->select("sdm.sdm_id", "sdm.nama_sdm","sdm.tgl_lahir", "sdm.nik", "sdm.umur", "sdm.nomor_hp", "sdm.desa_sdm_id", "villages.id", "villages.name as nama_desa", "jabatan.nama as nama_jabatan", "jenis_kelamin.jenis_kelamin as nama_jenis_kelamin", "districts.name as nama_kecamatan",  "provinces.name as nama_provinsi", "status_nikah.nama as nama_status_nikah","golongan_darah.gol_dar_id as nama_golongan_darah", "agama.agama as nama_agama", DB::raw('(CASE
        WHEN sdm.isDokter = "1" THEN "Bukan Dokter"
        WHEN sdm.isDokter = "2" THEN "Dokter"

        END) AS isDokter'), "r1.name as nama_kabupaten", "r2.name as nama_tempat_lahir" );
        $singleSDM = $singleSDM->where("sdm_id","=",$sdm->sdm_id);
        $singleSDM = $singleSDM->where("sdm.deleted_at","=",null)->orderBy("sdm.sdm_id","desc")->first();

        // dd($singleSDM);
        $data = [
            "singleSDM" => $singleSDM
        ];

        return view("sdm.show",$data);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SDM  $sdm
     * @return \Illuminate\Http\Response
     */
    public function edit(SDM $sdm)
    {
        $singleSDM = DB::table("sdm")->where("sdm_id",'=', $sdm->sdm_id)->first();
        $data = [
            "singleSDM" => $singleSDM,
            "kabupaten_sdm" => $this->utilsModel->searchKotaSingle($singleSDM->kabupaten_sdm_id),
            "tempat_lahir" => $this->utilsModel->searchKotaSingle($singleSDM->tempat_lahir),
            "kecamatan_sdm" => $this->utilsModel->searchKecamatanSingle($singleSDM->kecamatan_sdm_id),
            "desa_sdm" => $this->utilsModel->searchDesaSingle($singleSDM->desa_sdm_id),
            "provinsi_sdm" => $this->utilsModel->searchProvinsiSingle($singleSDM->provinsi_sdm_id),
            "jenis_kelamin" => DB::table("jenis_kelamin")->where("deleted_at","=",null)->get(),
            "golongan_darah" => DB::table("golongan_darah")->where("deleted_at","=",null)->get(),
            "jabatan" => DB::table("jabatan")->where("deleted_at","=",null)->get(),
            "agama" => DB::table("agama")->where("deleted_at","=",null)->get(),
            "status_nikah" => DB::table("status_nikah")->where("deleted_at","=",null)->get(),

        ];

        return view('sdm.edit', $data);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SDM  $sdm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SDM $sdm)
    {
        $data = [
            "nama_sdm" =>$request->nama_sdm,
            "alamat_sdm" =>$request->alamat_sdm,
            "desa_sdm_id" =>$request->desa_sdm_id,
            "kecamatan_sdm_id" =>$request->kecamatan_sdm_id,
            "kabupaten_sdm_id" =>$request->kabupaten_sdm_id,
            "provinsi_sdm_id" =>$request->provinsi_sdm_id,
            "provinsi_sdm_id" =>$request->provinsi_sdm_id,
            "nik" =>$request->nik,
            "nomor_hp" =>$request->nomor_hp,
            "jobdesk" =>$request->jobdesk,
            "tgl_lahir" =>$request->tgl_lahir,
            "umur" =>$request->umur,
            "gol_darah_id" =>$request->gol_darah_id,
            "agama_id" =>$request->agama_id,
            "isDokter" =>$request->isDokter,
            "jenis_kelamin" =>$request->jenis_kelamin,
            "status_nikah" =>$request->status_nikah,
            "tempat_lahir" =>$request->tempat_lahir,
        ];


        // dd($data);

        // DB::table('sdm')->update($data);
        DB::table('sdm')->where("sdm_id",'=',$sdm->sdm_id)->update($data);


        return redirect()
                ->route('sdm.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SDM  $sdm
     * @return \Illuminate\Http\Response
     */
    public function destroy(SDM $sdm)
    {


        $delete = SDM::findOrFail($sdm->sdm_id);
        $delete->delete();

        if ($delete) {
            return redirect()
                ->route('sdm.index')
                ->with([
                    'success' => 'sdm has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('sdm.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}

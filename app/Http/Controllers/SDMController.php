<?php

namespace App\Http\Controllers;

use App\Models\SDM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SDMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            "sdm" => DB::table("sdm")->where("deleted_at","=",null)->get(),
        ];

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
        ];



        // $cariData = DB::table("sdm")->where("sdm","LIKE", "%". $cari["sdm"]."%")->where("deleted_at","=",null)->get()
        $cariData = DB::table('sdm')->select("sdm.sdm_id", "sdm.nama_sdm", "sdm.jobdesk", "sdm.desa_sdm_id", "villages.id", "villages.name as nama_desa")->join("villages", "villages.id", "=", "sdm.desa_sdm_id")->where([
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
        ])->where("deleted_at","=",null)->orderBy("pasien.tgl_reg","desc")->get();

        $data = [
            "sdm" => $cariData,
            "filter_pencarian" => $cari,
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
        return view("sdm.create");
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SDM  $sdm
     * @return \Illuminate\Http\Response
     */
    public function edit(SDM $sdm)
    {
        $data = [
            "sdm" => DB::table("sdm")->where("id",'=', $sdm->sdm_id)->first(),
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
        ];


        // dd($data);

        // DB::table('sdm')->update($data);
        DB::table('sdm')->where("id",'=',$sdm->sdm_id)->update($data);


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

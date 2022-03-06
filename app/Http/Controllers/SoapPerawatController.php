<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use DataTables;
use App\Models\SoapPerawat;
use Illuminate\Http\Request;

class SoapPerawatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = [
            "soap_perawat" => DB::table('soap_perawat')->select(
                "soap_perawat.id",
                "soap_perawat.id_daftar",
                "daftar_periksa.waktu_daftar_periksa",
                "pasien.nama as nama_pasien",
                "poliklinik.nama as nama_poliklinik",
                "sdm.nama_sdm as nama_dokter",
                "soap_perawat.anamnesa",
                "soap_perawat.systolic",
                "soap_perawat.diastolic",
                "soap_perawat.nadi",
                "soap_perawat.suhu",
                "soap_perawat.pernafasan",
                "soap_perawat.tinggi",
                "soap_perawat.berat",
                "soap_perawat.lila",

            )
            ->join("daftar_periksa","daftar_periksa.id","=","soap_perawat.id_daftar")
            ->join("pasien","pasien.id","=","daftar_periksa.id_pasien")
            ->join("sdm","sdm.sdm_id","=", "daftar_periksa.id_dokter")
            ->join("poliklinik","poliklinik.id","=", "daftar_periksa.id_poli")
            ->where("soap_perawat.deleted_at","=",null)->orderBy("soap_perawat.id","desc")->get(),
        ];

        // dd($data);

        if ($request->ajax()) {
            $data = $data["soap_perawat"];
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function(){
                        return view('utils.action_two');
                    },0)
                 ->rawColumns(['action'])
                    ->make(true);
        }


        return view("soap_perawat.index", $data);
    }
    public function showSoapPerawat(Request $request, Int $id)
    {
        $data = [
            "soap_perawat" => DB::table('soap_perawat')->select(
                "soap_perawat.id",
                "soap_perawat.id_daftar",
                "daftar_periksa.waktu_daftar_periksa",
                "daftar_periksa.id_pasien",
                "pasien.nama as nama_pasien",
                "poliklinik.nama as nama_poliklinik",
                "sdm.nama_sdm as nama_dokter",
                "soap_perawat.anamnesa",
                "soap_perawat.systolic",
                "soap_perawat.diastolic",
                "soap_perawat.nadi",
                "soap_perawat.suhu",
                "soap_perawat.pernafasan",
                "soap_perawat.tinggi",
                "soap_perawat.berat",
                "soap_perawat.lila",

            )
            ->join("daftar_periksa","daftar_periksa.id","=","soap_perawat.id_daftar")
            ->join("pasien","pasien.id","=","daftar_periksa.id_pasien")
            ->join("sdm","sdm.sdm_id","=", "daftar_periksa.id_dokter")
            ->join("poliklinik","poliklinik.id","=", "daftar_periksa.id_poli")
            ->where("daftar_periksa.id_pasien","=",$id)
            ->where("soap_perawat.deleted_at","=",null)
            ->orderBy("soap_perawat.id","desc")->get(),
        ];

        // dd($data["soap_perawat"]);

        if ($request->ajax()) {
            $data = $data["soap_perawat"];
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function(){
                        return view('utils.action_two');
                    },0)
                 ->rawColumns(['action'])
                    ->make(true);
        }




        return view("soap_perawat.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            "soap_perawat" => DB::table("soap_perawat")->where("deleted_at","=",null)->get(),
        ];

        return view("soap_perawat.create", $data);
    }

    public function createSoapPerawat(Int $id, Int $id1)
    {
        $data = [
            "daftar_periksa" => DB::table('daftar_periksa')->select("daftar_periksa.id","daftar_periksa.id_pasien","daftar_periksa.waktu_daftar_periksa", "pasien.nama as nama_pasien", "pasien.nik", "pasien.norm", "poliklinik.nama as poli", "sdm.nama_sdm as nama_dokter",  "daftar_periksa.cara_bayar", "daftar_periksa.rujukan",  "daftar_periksa.penanggungjawab")->join("pasien","pasien.id","=", "daftar_periksa.id_pasien")->join("sdm","sdm.sdm_id","=", "daftar_periksa.id_dokter")->join("poliklinik","poliklinik.id","=", "daftar_periksa.id_poli")->where("daftar_periksa.id_pasien","=",$id)->where("daftar_periksa.id","=", $id1)->where("daftar_periksa.deleted_at","=",null)->orderBy("daftar_periksa.id","DESC")->first(),
        ];

        // dd($data);

        return view("soap_perawat.create", $data);
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
            "id_daftar" => $request->id_daftar,
        "anamnesa" => $request->anamnesa,
        "systolic" => $request->systolic,
        "diastolic" => $request->diastolic,
        "nadi" => $request->nadi,
        "suhu" => $request->suhu,
        "pernafasan" => $request->pernafasan,
        "tinggi" => $request->tinggi,
        "berat" => $request->berat,
        "lila" => $request->lila,
        "no_file_tracer" => "",
        ];

        DB::table('soap_perawat')->insert($data);


        return redirect()
                ->route('pasien.show', $request->id_pasien);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SoapPerawat  $soap_perawat
     * @return \Illuminate\Http\Response
     */
    public function show(SoapPerawat $soap_perawat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SoapPerawat  $soap_perawat
     * @return \Illuminate\Http\Response
     */
    public function edit(SoapPerawat $soap_perawat)
    {
        $data = [
            "soap_perawat" => DB::table('soap_perawat')->select(
            "soap_perawat.*", "daftar_periksa.waktu_daftar_periksa",
            "daftar_periksa.id_pasien", "pasien.nama as nama_pasien"
            )
            ->join("daftar_periksa","daftar_periksa.id","=","soap_perawat.id_daftar")
            ->join("pasien","pasien.id","=","daftar_periksa.id_pasien")
            ->where("soap_perawat.id","=",$soap_perawat->id)->where("soap_perawat.deleted_at","=",null)->orderBy("soap_perawat.id","DESC")->first(),
        ];

        // dd($data);
        return view("soap_perawat.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SoapPerawat  $soap_perawat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SoapPerawat $soap_perawat)
    {
        $data = [
            "id_daftar" => $request->id_daftar,
        "anamnesa" => $request->anamnesa,
        "systolic" => $request->systolic,
        "diastolic" => $request->diastolic,
        "nadi" => $request->nadi,
        "suhu" => $request->suhu,
        "pernafasan" => $request->pernafasan,
        "tinggi" => $request->tinggi,
        "berat" => $request->berat,
        "lila" => $request->lila,
        "no_file_tracer" => "",
        ];

        DB::table('soap_perawat')->where("id",'=',$soap_perawat->id)->update($data);


        return redirect()
                ->route('soap_perawat.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SoapPerawat  $soap_perawat
     * @return \Illuminate\Http\Response
     */
    public function destroy(SoapPerawat $soap_perawat)
    {

        $delete = SoapPerawat::findOrFail($soap_perawat->id);
        $delete->delete();

        if ($delete) {
            return redirect()
                ->route('soap_perawat.index')
                ->with([
                    'success' => 'soap_perawat has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('indexDaftarPeriksa')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
